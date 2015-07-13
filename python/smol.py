import threading
import thread
from OpenGL.GLUT import *
from OpenGL.GLU import *
from OpenGL.GL import *
from logging import warning
import numpy as np
import sys
import pdb

class smol:
    def __init__(self):
        self.init_mol()
        self.glutloop_on = False
        self.cmdloop_on = False
    def init_mol(self):

        self.damping = 1
        self.left = 0
        self.right = 100
        self.bottom = 0
        self.top = 100
        self.near = 0
        self.far = 100
        self.BD = 10
        self.eyeX = 0
        self.eyeY = 0
        self.eyeZ = 1
        self.xrot = 0
        self.yrot = 0
        self.rotXY = False
        self.rotZ = False
        self.scale = False
        self.translate = False
        self.keyPressed = ''
        self.view = True
        self.zoom = 1
        self.pc = -1
        self.atom_coord = []
        self.atom_ele = []
        self.protein = []
        self.eye = []
        self.frustum = []
        self.cm = []
        self.pdb_code = []
        self.sphere_resol = 12
        self.idle_first = True
        self.model = 'CPK'
        self.lineWidth = 2
        self.lighting = 1

    def get_pdb(self,code):

        '''
        try:
        pdbID = sys.argv[1]
        except IndexError:
        pdbID = '1crn'
        '''
        self.code = code
        print(self.code)
        self.protein.append(pdb.pdb(self.code))
        self.pc += 1

        self.pdb_code.append(self.code)

        atom3 = self.protein[self.pc].atom
        natom = len(atom3)
        print("natom",natom)

        atm = []
        ele = []
        for a in atom3:
            atm.append(a.coord[0])
            atm.append(a.coord[1])
            atm.append(a.coord[2])
            ele.append(a.ele)

        self.atom_coord.append(atm)
        self.atom_ele.append(ele)

#========================== To be out of date ================================================
        cm = [0,0,0]
        for x in self.atom_coord[self.pc][0::3]: cm[0] += x
        for y in self.atom_coord[self.pc][1::3]: cm[1] += y
        for z in self.atom_coord[self.pc][2::3]: cm[2] += z
        for i in range(3): cm[i] = cm[i]/natom


        self.cm.append(cm)
        print ("CM %6.2f %6.2f %6.2f" % (cm[0],cm[1],cm[2]))

        for i in range(natom):
            i3 = i*3
            self.atom_coord[self.pc][i3]   -= cm[0]
            self.atom_coord[self.pc][i3+1] -= cm[1]
            self.atom_coord[self.pc][i3+2] -= cm[2]

#========================== To be the new one  ================================================


        cm = [0,0,0]
        for at in self.protein[self.pc].atom:
            cm[0] += at.coord[0]
            cm[1] += at.coord[1]
            cm[2] += at.coord[2]

        for i in range(3): cm[i] = cm[i]/natom

        for i in range(natom):
            self.protein[self.pc].atom[i].coord[0]  -= cm[0]
            self.protein[self.pc].atom[i].coord[1]  -= cm[1]
            self.protein[self.pc].atom[i].coord[2]  -= cm[2]


        self.left   = min(self.atom_coord[self.pc][0::3])-self.BD
        self.right  = max(self.atom_coord[self.pc][0::3])+self.BD
        self.bottom = min(self.atom_coord[self.pc][1::3])-self.BD
        self.top    = max(self.atom_coord[self.pc][1::3])+self.BD
        self.near   = min(self.atom_coord[self.pc][2::3])-self.BD
        self.far    = max(self.atom_coord[self.pc][2::3])+self.BD
        #self.far    = 1000
        self.frustum.append([self.left, self.right, self.bottom, self.top, self.near, self.far])

        self.eyeX = 0
        self.eyeY = 0
        self.eyeZ = self.far
        self.eye.append([self.eyeX,self.eyeY,self.eyeZ])

        print ("Left   %6.2f Right %6.2f" % (self.left,self.right))
        print ("Bottom %6.2f Top   %6.2f" % (self.bottom,self.top))
        print ("Near   %6.2f Far   %6.2f" % (self.near,self.far))
        print ("BD     %6.2f" %self.BD)

        return



    def mouse(self,button, state, x, y):

        self.xnew = x
        self.ynew = y
        '''
        if state == GLUT_DOWN and self.cmdloop_on is False:
            self.cmdloop_on = True
            MyCmd.cmdloop()
        '''

        if state == GLUT_DOWN:
            if button == GLUT_LEFT_BUTTON:
                if glutGetModifiers() == GLUT_ACTIVE_SHIFT:

                    self.mouseDown = True
                    self.rotZ = True
                    self.rotXY = False
                    self.scale = False
                    self.translate = False
                    self.xrot = 0
                    self.yrot = 0
                elif glutGetModifiers() == GLUT_ACTIVE_CTRL:

                    self.mouseDown = True
                    self.scale = True
                    self.rotXY = False
                    self.rotZ = False
                    self.translate = False
                    self.xrot = 0
                    self.yrot = 0
                else:
                    self.mouseDown = True
                    self.rotXY = True
                    self.rotZ = False
                    self.scale = False
                    self.translate = False
                    self.xrot = 0
                    self.yrot = 0
        elif button == GLUT_MIDDLE_BUTTON:
            self.mouseDown = True
            self.translate = True
            self.rotXY = False
            self.rotZ = False
            self.scale = False
            self.xrot = 0
            self.yrot = 0
        else:
            self.mouseDown = False
            '''
            rotXY = False # No inertia when mousebutton is dowon
            rotZ = False  # No inertia when mousebutton is down
            '''
            self.scale = False
            '''
            self.translate = False
            xrot = 0 # no inertia
            yrot = 0 # no inertia
            '''

        self.xold = x
        self.yold = y

    def mouseMotion(self,x, y):

        self.xnew = x
        self.ynew = y

        if self.mouseDown:
            self.xrot = (y-self.yold)*0.1
            self.yrot = (x-self.xold)*0.1

        if self.scale:
            if self.xrot > 0:
                self.zoom = 0.98
            else:
                self.zoom =1.02

        self.xold = x
        self.yold = y


    def render_scene(self):

        glClear(GL_COLOR_BUFFER_BIT|GL_DEPTH_BUFFER_BIT)
        m = (GLfloat * 16)()
        glGetFloatv(GL_MODELVIEW_MATRIX,m)
        #print (list(m))
        glLoadIdentity()

        glTranslate(-self.eye[self.pc][0],-self.eye[self.pc][1],-self.eye[self.pc][2])

        if self.view: #View Transformation
            if self.rotXY is True:
                glRotate((self.xrot**2+self.yrot**2)**0.5, self.xrot, self.yrot,0)
            elif self.rotZ is True:
                if self.ynew*self.xrot-self.xnew*self.yrot < 0:
                    z = 1
                else:
                    z = -1
                glRotate((self.xrot**2+self.yrot**2)**0.5, 0.0, 0.0 ,z)
            elif self.scale is True:
                glScale(self.zoom,self.zoom,self.zoom)
            elif self.translate is True:
                glTranslate(self.yrot*0.2,-self.xrot*0.2,0)


            glTranslate(self.eye[self.pc][0],self.eye[self.pc][1],self.eye[self.pc][2])


            glMultMatrixf(m)

        else: #Object transformation
            glMultMatrixf(m)
            glRotate((self.xrot**2+self.yrot**2)**0.5, self.xrot, -self.yrot,0.)



        if self.pc is not -1:

            if self.model == 'CPK':
                self.cpk()
            elif self.model == 'WIRE':
                self.wire()
            elif self.model == 'TRACE':
                self.trace()

        glutSwapBuffers()

        glutPostRedisplay()

        return


    def trace(self):
        m = [0.,0.,0.]
        col1 = [0,1,0,1]
        glLineWidth(1.5)
        p = self.protein[self.pc]
        natom = len(p.atom)
        glBegin(GL_LINES)

        glEnd()

    def wire(self):
        m = [0.,0.,0.]
        col1 = [0,0,0,0]
        col2 = [0,0,0,0]
        glLineWidth(self.lineWidth)
        p = self.protein[self.pc]
        natom = len(p.atom)
        glBegin(GL_LINES)
        for l in p.nbr:
            for b in l:
                i = b[0]
                j = b[1]

                if self.protein[self.pc].atom[i].ele == 'C':
                    col1 = [0., 1.0, 0.0, 1]
                elif self.protein[self.pc].atom[i].ele == 'O':
                    col1 = [1., 0., 0., 1]
                elif self.protein[self.pc].atom[i].ele == 'N':
                    col1 = [1., 0., 1., 1]
                elif self.protein[self.pc].atom[i].ele == 'S':
                    col1 = [1., 1., 0., 1]

                if self.protein[self.pc].atom[j].ele == 'C':
                    col2 = [0., 1.0, 0.0, 1]
                elif self.protein[self.pc].atom[j].ele == 'O':
                    col2 = [1., 0., 0., 1]
                elif self.protein[self.pc].atom[j].ele == 'N':
                    col2 = [1., 0., 1., 1]
                elif self.protein[self.pc].atom[j].ele == 'S':
                    col2 = [1., 1., 0., 1]

                for k in range(3): m[k] = 0.5*(p.atom[i].coord[k] + p.atom[j].coord[k])

                glColor4f(col1[0],col1[1],col1[2],col1[3])

                glVertex3f(p.atom[i].coord[0],p.atom[i].coord[1],p.atom[i].coord[2])
                glVertex3f(m[0],m[1],m[2])
                #glEnd()

                #glBegin(GL_LINES)
                glColor4f(col2[0],col2[1],col2[2],col2[3])
                glVertex3f(m[0],m[1],m[2])
                glVertex3f(p.atom[j].coord[0],p.atom[j].coord[1],p.atom[j].coord[2])


        glEnd()
    def cpk(self):
        natom = len(self.atom_coord[self.pc])/3
        for i in range(natom):
            i3 = i*3
            color = [1., 1., 1., 1.]
            r = 1.2
            if self.atom_ele[self.pc][i] == 'C':
                color = [0., 1.0, 0.0, 1]
                r = 1.7
            if self.atom_ele[self.pc][i] == 'O':
                color = [1., 0., 0., 1]
                r = 1.52
            if self.atom_ele[self.pc][i] == 'N':
                color = [1., 0., 1., 1]
                r = 1.55
            if self.atom_ele[self.pc][i] == 'S':
                color = [1., 1., 0., 1]
                r = 1.8
            self.draw_atom(r,self.atom_coord[self.pc][i3],
                           self.atom_coord[self.pc][i3+1],
                           self.atom_coord[self.pc][i3+2],color)


    def draw_atom(self,r,x,y,z,color = [1.0, 0.0, 0.0, 1.0]):

        mat_specular = [ 1.0, 1.0, 1.0, 1.0 ]
        mat_shininess = [50.0]

        glPushMatrix()

        glTranslatef(x, y, z)

        glMaterialfv(GL_FRONT,GL_DIFFUSE,color)
        glMaterialfv(GL_FRONT, GL_SPECULAR, mat_specular)
        glMaterialfv(GL_FRONT, GL_SHININESS, mat_shininess)
        glutSolidSphere(r,self.sphere_resol,self.sphere_resol)

        glPopMatrix()
        return

    def initLight(self):

        light0_position = [0, 0.0, 1.0,0.0]
        light0_diffuse = [0.8,0.8,0.8,1.0]
        light0_specular = [ 0.5, 0.5, 0.5, 1.0 ]
        light0_ambient = [ 0.1, 0.1, 0.1, 1.0 ]


        glClearColor(0.,0.,0.,1.)

        glShadeModel(GL_SMOOTH)

        glLightfv(GL_LIGHT0, GL_POSITION, light0_position)
        glLightfv(GL_LIGHT0, GL_AMBIENT, light0_ambient)
        glLightfv(GL_LIGHT0, GL_DIFFUSE, light0_diffuse)
        glLightfv(GL_LIGHT0, GL_SPECULAR, light0_specular)

        glEnable(GL_CULL_FACE)
        glEnable(GL_DEPTH_TEST)
        if self.lighting is 1:
            glEnable(GL_LIGHTING)
        else:
            glDisable(GL_LIGHTING)
        glEnable(GL_LIGHT0)


    def idle(self):
        self.xrot = self.xrot * self.damping
        self.yrot = self.yrot * self.damping
        if self.idle_first is True:
            self.idle_first = False
            MyCmd.cmdloop()

    def initGLWindow(self):

        self.wW = 600
        self.wH = 600
        self.wX = self.wW*0.5
        self.wY = self.wH*0.5
        self.wR2 = (self.wX*self.wX + self.wY*self.wY)*0.7
        self.winName = self.code

        glutInit(sys.argv)
        print ("sys.argv",sys.argv)
        glutInitDisplayMode(GLUT_DOUBLE | GLUT_RGB | GLUT_DEPTH)
        glutInitWindowSize(self.wW,self.wH)
        self.win = glutCreateWindow(self.winName)
        print ("GluWindow ID",self.win, "GluWindow name",self.winName)

        self.createMenu()

    def setProjectMode(self):

        glMatrixMode(GL_PROJECTION)
        glLoadIdentity()
        glOrtho(self.frustum[self.pc][0],self.frustum[self.pc][1],
                self.frustum[self.pc][2],self.frustum[self.pc][3],
                self.frustum[self.pc][4],self.frustum[self.pc][5])
        glEnable(GL_BLEND)
        glBlendFunc(GL_SRC_ALPHA, GL_ONE_MINUS_SRC_ALPHA)


    def setModelMode(self):

        glMatrixMode(GL_MODELVIEW)
        glLoadIdentity()
        gluLookAt(self.eye[self.pc][0],
                  self.eye[self.pc][1],self.eye[self.pc][2],
                  0,0,0, 0,1,0)
        self.initLight()
        glEnable( GL_LINE_SMOOTH )
        glEnable( GL_POLYGON_SMOOTH )
        glEnable(GL_BLEND)
        glBlendFunc(GL_SRC_ALPHA, GL_ONE_MINUS_SRC_ALPHA)



    def setDisplay(self):

        glutDisplayFunc(self.render_scene)
        glutMotionFunc(self.mouseMotion)
        glutMouseFunc(self.mouse)
        glutKeyboardFunc(self.keyDown)
        glutIdleFunc(self.idle)


    def run_glut(self):

        self.initGLWindow()

        self.setProjectMode()
        self.setModelMode()
        self.setDisplay()

        glutMainLoop()

        return


    def keyDown(self,key, x, y):
        '''
        if key == '\x1b': #esc key

            try:
                MyCmd.cmdloop()
            except RuntimeError:
                print("RuntimeError: cannot enter cmdloop")

        else:
            print(key)
        '''
        self.keyPressed = key

##########################################################################
#
#  Menu sections
#
#########################################################################
#    INTERACTIVE, DAMPING_ON, DAMPING_OFF = range(3)

    def menu(self,item):
        self.menudict[item]()
        return 0

    def createMenu(self):

        self.menudict = {1 : self.damping_on,
                         2 : self.damping_off,
                         3 : self.list,
                         4 : self.show_cpk,
                         5 : self.show_wire,
                         6 : self.set_lighting,
                         10 : self.quit}


        menu = glutCreateMenu(self.menu)
        glutAddMenuEntry("Damping on", 1)
        glutAddMenuEntry("List", 3)
        glutAddMenuEntry("CPK", 4)
        glutAddMenuEntry("WIRE", 5)
        glutAddMenuEntry("Lighting", 6)
        glutAddMenuEntry("QUIT", 10)
        glutAttachMenu(GLUT_RIGHT_BUTTON)
        return 0

    def damping_on(self):
        glutChangeToMenuEntry(1, "Damping off", 2)
        print("Damping on")
        self.damping = 0.9
        return

    def damping_off(self):
        glutChangeToMenuEntry(1, "Damping on", 1)
        print("Damping off")
        self.damping = 1.0
        return

    def show_cpk(self):
        MyCmd.do_cpk('')
        return

    def show_wire(self):
        MyCmd.do_wire('')
        return

    def set_lighting(self):
        MyCmd.do_lighting('')
        return

    def list(self):
        MyCmd.do_list('')
    def quit(self):
        MyCmd.do_quit('')
        return

#============================================================================
#
#   cmd : Interpreter Section
#
#============================================================================

import cmd
import os
import readline

class smol_cmd(cmd.Cmd):
    prompt = '(sMol) '
    intro = "\n".join(["Smol: a Simple Molecular System by Jenn-Kang Hwang, NCTU"])
    def __init_(self):

        cmd.Cmd.__init__(self)
        self.prompt = '(Smol) '
        self.intro = "\n".join(["Smol: a Simple Molecular System",
                                "      Type help [command] for available commands or detailed help"])
        self.doc_header = 'Commands'
        self.misc_header = 'misc_header'
        self.undoc_header = 'Undocumented commands'

        self.ruler = '-'

#============================================================================
#
#   OpenGL
#
#============================================================================

    def do_fetch(self,line):

        MyMol.get_pdb(line)

        glutSetWindowTitle(MyMol.pdb_code[MyMol.pc])

        if MyMol.glutloop_on is True:
            MyMol.setProjectMode()
            MyMol.setModelMode()
        else:
            MyMol.glutloop_on = True
            MyMol.run_glut()


    def help_fetch(self):
        print ('\n'.join([ 'fetch [pdbid]',
                           '=> Load the named PDB and start glutMainLoop',]))
#============================================================================
    def do_list(self,line):

        n = len(MyMol.protein)
        print ("%d proteins available in memory:" % n)
        for i in range(n):
            print (MyMol.protein[i].code)

    def help_list(self):
        print ('\n'.join([ 'list',
                           '=> List available proteins in memory',]))
#============================================================================

    def do_select(self,line):
        n = len(MyMol.protein)
        for i in range(n):
            if line.upper() == MyMol.protein[i].code:
                MyMol.pc = i
                MyMol.setProjectMode()
                MyMol.setModelMode()
                glutSetWindowTitle(MyMol.pdb_code[MyMol.pc])
                print(">>> OpenGL")

        #return True

    def help_select(self):
        print ('\n'.join([ 'select [pdbid]',
                           '=> Select the named PDB frm memory',]))
#============================================================================

    def do_getcm(self,line):
        p = MyMol.cm[MyMol.pc]
        print ("CM %6.2f %6.2f %6.2f" % (p[0],p[1],p[2]))


    def do_getI(self,line):
        print (MyMol.eyeX, MyMol.eyeY, MyMol.eyeZ)

    def do_setIz(self,line):
        print("eyeZ",MyMol.eyeZ)
        MyMol.eyeZ = float(line)

    def do_resetI(self,line):
        MyMol.eyeX = MyMol.eye[MyMol.pc][0]
        MyMol.eyeY = MyMol.eye[MyMol.pc][1]
        MyMol.eyez = MyMol.eye[MyMol.pc][2]

    def do_damping(self,line):
        print ("Default damping is 0.9, the current damping is",MyMol.damping)
        MyMol.damping = float(line)
    def help_damping(self):
        print ('\n'.join([ 'damping [value]','0 < damping < 1; 1: no damping',]))


    def do_resol(self,s):
        t = int(s)
        if t < 2: t = 3
        MyMol.sphere_resol = t
    def help_resol(self):
        print ('\n'.join([ 'resol [int]','=> Set sphere resolution',]))


    def do_init(self,line):
        MyMol.init_mol()
    def help_init(self):
        print ('\n'.join([ 'init','=> Clear up memory',]))


    def do_quit(self,line):
        sys.exit("bye")
    def help_quit(self):
        print ('\n'.join([ 'quit','=> Quit from the program',]))



    def emptyline(self):
        pass
    '''
    def do_EOF(self,line):
        print( ">>> openGL")
        #return True
    def help_EOF(self):
        print ('\n'.join([ 'EOF','=> Switch to OpenGL mode',]))
    '''




###########################################################################
#
#   PDB section
#
###########################################################################
    def do_load(self,line):
        MyMol.get_pdb(line)

    def help_load(self):
        print('\n'.join(['load [pdb id]: Load the protein only']))
#=========================================================================
    def do_plot(self,s):
        s=s.split()
        if len(s) is 4:
            x = pdb.pdb(s[0])
            x.select(s[1],s[2])
            x.plot2(s[3])
        else:
            self.help_plot()


    def help_plot(self):
        print ('\n'.join([ 'plot [pdbid c1 c2 flag]',
                           'Compare WCN, BF and CNSRF of the chain c1 of the named PDB under',
                           'the influence of c2 where c2 can designate multiple chains flag',
                           'can be w, b, c or any combinations of them']))
#=========================================================================
# For residue i in chain c, it is numbered  range(np[c][i], np[c][i+1])
# To get all residue in chain c, the residues are in range( np[c][0], np[c][len(p.np[c]-1])
#
#=========================================================================
    def do_res(self, s):
        s = s.upper().split()
        p = MyMol.protein[MyMol.pc]

        if len(s) > 1: c = s[0]

        c = s[0]
        if c not in p.chain:
            print c,"not in", [c for c in p.chain]
            return

        if len(s) is 1:
            res1 = 0
            res2 = len(p.np[c])-1

        elif len(s) is 2:
            res1 = int(s[1])-1
            res2 = res1+1
        elif len(s) is 3:
            res1 = int(s[1])-1
            res2 = int(s[2])
        else:
            print "resi [chain, res1, res2]"
            return


        for i in range(p.np[c][res1],p.np[c][res2]):
            a = p.atom[i]
            print ("%5d %4s %4s %4d %s %6.2f %6.2f %6.2f %6.2f" %
                (i, a.name, a.resn, int(a.resi), a.chain,
                 a.coord[0], a.coord[1], a.coord[2], a.b))


    def help_res(self):
        print('\n'.join(['res [c] [i] [j]: List residues from residue i to residue j  in chain c']))

    def do_atom(self, s):
        p = MyMol.protein[MyMol.pc]
        print "Total atoms",len(p.atom)
        # Method 1: cycle all atoms; a straightforward way of using p.atom
        for i in range(len(p.atom)):
            a = p.atom[i]
            print ("%5d %4s %4s %4d %s %6.2f %6.2f %6.2f %6.2f" %
                   (i, a.name, a.resn, int(a.resi), a.chain,
                    a.coord[0], a.coord[1], a.coord[2],a.b))


    def do_chain(self, s):

        p = MyMol.protein[MyMol.pc]

        if len(s) == 0:
            #Method 2: cycle all atoms; an indirect way of using p.chain
            for c in p.chain:
                pc = p.chain[c]
                for i in range(len(pc)):
                    j = pc[i]  # i: local atom counter in chain, j: the global atom counter
                    a = p.atom[j]
                    print ("%5d %4s %4s %4d %s %6.2f %6.2f %6.2f %6.2f" %
                           (j, a.name, a.resn, int(a.resi), a.chain,
                            a.coord[0], a.coord[1], a.coord[2],a.b))
            return

        print "Chains:",[c for c in p.chain]
        c = s.split()[0].upper()
        if c in p.chain:
            pc = p.chain[c]
            for i in range(len(pc)):
                j = pc[i]  # i: local atom counter in chain, j: the global atom counter
                a = p.atom[j]
                print ("%5d %4s %4s %4d %s %6.2f %6.2f %6.2f %6.2f" %
                       (j, a.name, a.resn, int(a.resi), a.chain,
                        a.coord[0], a.coord[1], a.coord[2],a.b))
        else:
            print c,"is not in", [c for c in p.chain]

    def help_chain(self):
        print('\n'.join(['chain [c]: List residues of chain c']))

    def do_cpk(self,line):
        MyMol.model = 'CPK'

    def do_wire(self,line):
        MyMol.model = 'WIRE'

    def do_trace(self,line):
        MyMol.model = 'TRACE'


    def do_linewidth(self,line):
        MyMol.lineWidth = float(line)
        MyMol.wire()
        glutSwapBuffers()
        glutPostRedisplay()

    def do_lighting(self,line):
        if MyMol.lighting is 0:
            print "Enable GL_LIGHTING"
            glEnable(GL_LIGHTING)
            MyMol.lighting = 1
        else:
            print "Disable GL_LIGHTING"
            glDisable(GL_LIGHTING)
            MyMol.lighting = 0

    def do_lightpos(self,line):
        p = line.split()
        if len(p) is not 4:
            print 'lightpos x y z flag'
            return
        p = [float(x) for x in p]

        m = (GLfloat * 16)()
        glGetFloatv(GL_MODELVIEW_MATRIX,m)
        glLoadIdentity()
        glLightfv(GL_LIGHT0, GL_POSITION, p)
        glMultMatrixf(m)

    def do_lightdif(self,line):
        p = line.split()
        if len(p) is not 4:
            print 'diffuse x y z a'
            return
        p = [float(x) for x in p]

        m = (GLfloat * 16)()
        glGetFloatv(GL_MODELVIEW_MATRIX,m)
        glLoadIdentity()
        glLightfv(GL_LIGHT0, GL_DIFFUSE, p)
        glMultMatrixf(m)


    def do_light(self,line):
        p = line.split()
        if len(p) is not 5:
            print 'pos/diff/amb/spec  x y z a'
            return
        k = p[0].upper()
        p = [float(x) for x in p[1::]]
        print k,p
        m = (GLfloat * 16)()
        glGetFloatv(GL_MODELVIEW_MATRIX,m)
        glLoadIdentity()
        if k == 'POS':
            glLightfv(GL_LIGHT0, GL_POSITION, p)
        elif k == 'DIFF':
            glLightfv(GL_LIGHT0, GL_DIFFUSE, p)
        elif k == 'AMB':
            glLightfv(GL_LIGHT0, GL_AMBIENT, p)
        elif k == 'SPEC':
            glLightfv(GL_LIGHT0, GL_SPECULAR, p)
        else:
            print 'pos/diff/amb/spec  x y z a'
        glMultMatrixf(m)

###########################################################################
#
#   OS
#
###########################################################################
    def do_pwd(self,s):
        os.system('pwd')

    def do_ls(self,s):
        os.system('ls')


    def do_date(self,s):
        os.system('date')

    def do_man(self,s):
        os.system('man '+s)

    def do_shell(self,s):
        os.system(s)


###########################################################################



if __name__ == '__main__':
    readline.parse_and_bind('tab: complete')
    readline.parse_and_bind('set editing-mode vi')

    MyMol = smol()
    MyCmd = smol_cmd()
    cmd.reaper = threading.currentThread()

    MyCmd.cmdloop()
