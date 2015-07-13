'''                                                                                                     
(c) 2015 Jenn-Kang Hwang

License: BSD-2-Clause
'''
'''
EXAMPLE
How run pdb.py?
Type python
>>> import pdb
>>> x = pdb.pdb('4cha')
>>> x.select('b','bc')       // select two chains
>>> x.plot2()

>>> x.wcn()           // compute chain b under the influence from c
>>> x.wcn(1)         // plot also
>>> x.plot2('bw')   // plot bf and wcn  only
Note that x.plot2 is the same as x.wcn(1)

'''
import re
import urllib2
import matplotlib.pyplot as plt
import matplotlib.patches as mpatches
import math
import numpy
import os.path 
import sys

aaLib = {'THR':[['N','CA'],['CA','C'],['C','O'],['CA','CB'],['CB','CG1'],['CB','OG1']],
         'SER':[['N','CA'],['CA','C'],['C','O'],['CA','CB'],['CB','OG']],
         'CYS':[['N','CA'],['CA','C'],['C','O'],['CA','CB'],['CB','SG']],
         'GLY':[['N','CA'],['CA','C'],['C','O']],
         'ALA':[['N','CA'],['CA','C'],['C','O'],['CA','CB']],
         'VAL':[['N','CA'],['CA','C'],['C','O'],['CA','CB'],['CB','CG1'],['CB','CG2']],
         'LEU':[['N','CA'],['CA','C'],['C','O'],['CA','CB'],['CB','CG'],['CG','CD1'],
                ['CG','CD2']],
         'ILE':[['N','CA'],['CA','C'],['C','O'],['CA','CB'],['CB','CG1'],['CB','CG2'],
                ['CG1','CD1']],
         'PRO':[['N','CA'],['CA','C'],['C','O'],['CA','CB'],['CB','CG'],['N','CD'],['CG','CD']],
         'HIS':[['N','CA'],['CA','C'],['C','O'],['CA','CB'],['CB','CG'],
                 ['CG','ND1'],['CG','CD2'],['CD2','NE2'],['ND1','CE1'],['CE1','NE2']],
         'ASP':[['N','CA'],['CA','C'],['C','O'],['CA','CB'],['CB','CG'],
                 ['CG','OD1'],['CG','OD2']],
         'ASN':[['N','CA'],['CA','C'],['C','O'],['CA','CB'],['CB','CG'],
                ['CG','OD1'],['CG','ND2']],
         'GLU':[['N','CA'],['CA','C'],['C','O'],['CA','CB'],['CB','CG'],
                ['CG','CD'],['CD','OE1'],['CD','OE2']],
         'GLN':[['N','CA'],['CA','C'],['C','O'],['CA','CB'],['CB','CG'],
                ['CG','CD'],['CD','OE1'],['CD','NE2']],
         'ARG':[['N','CA'],['CA','C'],['C','O'],['CA','CB'],['CB','CG'],
                ['CG','CD'],['CD','NE'],['NE','CZ'],['CZ','NH1'],['CZ','NH2']],
         'LYS':[['N','CA'],['CA','C'],['C','O'],['CA','CB'],['CB','CG'],
                ['CG','CD'],['CD','CE'],['CE','NZ']],
         'MET':[['N','CA'],['CA','C'],['C','O'],['CA','CB'],['CB','CG'],
                 ['CG','SD'],['SD','CE']],
         'PHE':[['N','CA'],['CA','C'],['C','O'],['CA','CB'],['CB','CG'],
                ['CG','CD1'],['CG','CD2'],['CD1','CE1'],['CD2','CE2'],
                ['CE1','CZ'],['CE2','CZ']],
         'TRP':[['N','CA'],['CA','C'],['C','O'],['CA','CB'],['CB','CG'],
                ['CG','CD1'],['CG','CD2'],['CD1','NE1'],['NE1','CE2'],
                ['CE2','CD2'],['CD2','CG'],['CE2','CZ2'],['CZ2','CH2'],['CH2','CZ3'],
                ['CZ3','CE3'],['CE3','CD2']],
         'TYR':[['N','CA'],['CA','C'],['C','O'],['CA','CB'],['CB','CG'],
                ['CG','CD1'],['CG','CD2'],['CD1','CE1'],['CD2','CE2'],
                ['CE1','CZ'],['CE2','CZ'],['CZ','OH']]
}
mcLib = ['CA','C','N','O']

mass = {'H':1,'D':2, 'C': 12, 'N': 14, 'O':16, 'P': 31, 'S':32}
class atom_properties:
    def __init__(self, values):  #Initialization with an array
        self.name = values[0]
        self.alt = values[1]
        self.resn = values[2]
        self.chain = values[3]
        self.resi = int(values[4])
        self.coord = [float(values[5]), float(values[6]), float(values[7])]
        self.b = float(values[8])
        self.ele = values[9]
        self.mass = mass[self.ele]
        self.wcn = 0

"""
DESCRIPTION
c1: the chain
c2: the influencing chain

"""        
class pdb:
    def __init__(self, code):
        self.code = code.upper()
        self.atom = []
        self.chain_pdb = []
        self.chain = {}
        self.sele = {}
        self.sele1 = {} # the target selected objects for WCN computation
        self.sele2 = {} # the surrounding selected objects 
        self.c1 = [] #just the chain designators (i.e., A) whose WCN is computed
        self.c2 = [] #just the chain designators (i.e., A, B, C, D, ...) exerting influences on c1
        self.np={}
        self.wcn_score = [] #z-score
        self.cnsrf_score = [] #z-score
        self.bf_score = [] #z-score
        self.cm = {} #center of mass
        self.gr = {} #radius of gyration
        self.buffer = []
        self.nbr = []
    
        try:
            print "\nCheck local disk for  %s ...\n" % self.code
            file = open("%s.pdb" % self.code.lower())
        except IOError:
            print "\nFetch from PDB %s...\n" % self.code
            file = urllib2.urlopen("http://www.rcsb.org/pdb/files/%s.pdb" % self.code)

        CHAIN = re.compile(r'COMPND\s+\d+\s+CHAIN:\s+(.*;)')
        """
        ATOM = re.compile\
            (r'ATOM\s+\d+\s+([A-Z1-9]+)\s+([A-Z]+)\s+([A-Z])\s+([-0-9]+)\s+([-.0-9]+)\s+([-.0-9]+)\s+([-.0-9]+)\s+[-.0-9]+\s+([-.0-9]+)\s+([A-Z])')
        """
        for line in file:

            m = CHAIN.match(line)
            if m is not None:
                for x in [x[:-1] for x in m.group(1).split()]:
                    self.chain_pdb.append(x)

            #m = ATOM.match(line)
            #Format(A6,I5,1X,A4,A1,A3,1X,A1,I4,A1,3X,3F8.3,2F6.2,6X,A4,A2,A2 )
            m1 = []
            keyword = []
            keyword.append(line[0:7].strip())   #ATOM 
            m1.append(line[12:16].strip()) #name 0
            m1.append(line[16:17]) #alt  1
            m1.append(line[17:20]) #resn 2
            m1.append(line[21:22]) #chain 3
            m1.append(line[22:26]) #resi 4
            m1.append(line[30:38]) #X 5
            m1.append(line[38:46]) #Y 6
            m1.append(line[46:54]) #Z 7
            m1.append(line[60:66]) #B 8
            m1.append(line[77:78]) #ele 9


            if keyword[0] != "ATOM": #if not "ATOM", ignore
                continue
            if m1[1] == 'B': #the alternate residue is ignored 
                continue

            #print m1 #for debugging, print m1 array

            if float(m1[4]) <= 0: #ignore negative resi
                print m1[4]
                continue

            self.atom.append(atom_properties([m1[i] for i in range(0,10)])) #amazing syntax

        #Create chain list
        self.create_chain_list()

        self.create_nbr_list()

        if (len(self.atom)==0):
            print "Error"
        print 'Code: %4s total atoms: %d' % (self.code,len(self.atom))

        print "\nSelect all chains by default...\n"


    def create_nbr_list(self):
        

        for c in self.chain: # examing chain c
            print c,len(self.np[c])
            nres = len(self.np[c])-1 # nres = len(self.np[c]-1: Total residues
            for r in range(nres):  
                for j in range(self.np[c][r],self.np[c][r+1]-1):  # Given the jth atom
                    bond = []

                    if j is not 0:
                        if self.atom[j].name == 'N':
                            for j0 in range(self.np[c][r-1],self.np[c][r]-1):
                                if self.atom[j0].name == 'C':
                                    bond.append([j,j0])
                    for k in range(j+1,self.np[c][r+1]):  # Checking if kth atom is connected to it 
                        b = [self.atom[j].name,self.atom[k].name]
                        #print self.atom[j].resn, b
                        if (b or b[::-1]) in aaLib[self.atom[j].resn]:
                            bond.append([j,k])
                            #print self.atom[j].resn, b, "****"        
                    self.nbr.append(bond)
        '''
        for a in self.nbr:
            for b in a:
                print self.atom[b[0]].resn,self.atom[b[1]].resn, b[0], b[1], self.atom[b[0]].name, self.atom[b[1]].name
        '''

    def create_chain_list(self):
        print "reset self.chain"
        chain = []
        old = ''
        for at in self.atom:
            new = at.chain
            if new != old:
                chain.append(new)
                old = new
        print chain

        for c in chain:
            atoms = []
            for i,at in enumerate(self.atom):
                if at.chain == c:
                    atoms.append(i)
            self.chain.update({c: atoms})


        for c in self.chain.keys():
            old = -1
            np = []
            for i in self.chain[c]:
                new = self.atom[i].resi

                if new != old:
                    np.append(i)
                old = new
            np.append(i+1)
            self.np.update({c:np})

    def res2atm(self, c, resi):
        c = c.upper()
        return range(self.np[c][resi],self.np[c][resi+1])
    """
    DESCRIPTION
    select chains, the selected atom is "CA" by default
    It defines {chain ID: [list of selected atom numbers]}
    """

    def select(self, c1='ALL', c2='ALL', name='CA'):
        c1 = c1.upper()
        c2 = c2.upper()
        name = name.upper()
        self.select1(c1, name)
        self.select2(c2, name)
        self.wcn()

    def select1(self, chain='ALL', name='CA'):
        chain = chain.upper()
        self.c1 = chain
        name = name.upper()
        self.sele1={}

        print "\nUse only %s...\n" % name
        for c in chain:
            tmp = []
            for i in range(len(self.chain[c])):
                j = self.chain[c][i]
                if self.atom[j].name == name:
                    tmp.append(j)

            self.sele1.update({c:tmp})  #the target objects for WCN computation
            print "Chain %s - %s: %d" % (c, name, len(self.sele1[c]))

    def select2(self, chain='ALL', name='CA'):
        chain = chain.upper()
        self.c2 = chain

        name = name.upper()
        self.sele2={}

        print "\nUse only %s...\n" % name
        for c in chain:
            tmp = []
            for i in range(len(self.chain[c])):
                j = self.chain[c][i]
                if self.atom[j].name == name:
                    tmp.append(j)

            self.sele2.update({c:tmp}) #the surroudning objects for WCN computations
            print "Chain %s - %s: %d" % (c, name, len(self.sele2[c]))

    """
    DESCRIPTION
    wcn compute the WCN of c under the influence defined by SELECT. It will also plot WCN, CNSRF and B plot.
    """
    def wcn(self,plot = 0):

        use_c1 = 0

        print "%s - %s" % (self.c1, self.c2)

        tmp_c2=[]
        for x in self.sele2.keys():
            if x != self.c1:
                tmp_c2.append(x)
            else:
                use_c1= 1

        list1 = self.sele1[self.c1]

        for a in self.atom:
            a.wcn = 0

        if use_c1 == 1:
            for i,a in enumerate(list1[:-1]):
                for j,b in enumerate(list1[i+1:]):
                    dist = 1/sum(map(lambda x, y: (x-y)**2, self.atom[a].coord, self.atom[b].coord))
                    self.atom[a].wcn += dist
                    self.atom[b].wcn += dist

                    
        for i in list1:
            for c in tmp_c2:
                for j in self.sele2[c]:
                    dist = 1/sum(map(lambda x, y: (x-y)**2, self.atom[i].coord, self.atom[j].coord))
                    self.atom[i].wcn += dist
                    self.atom[j].wcn += dist
                        

        b=[]
        self.wcn_score = []
        self.cnsrf_score = []
        self.bf = []
        for i in list1:
            a = self.atom[i]
            b.append(a.b)
            if a.wcn != 0:
                a.wcn = 1./a.wcn
            self.wcn_score.append(a.wcn)

        self.wcn_score = z_score(self.wcn_score)  #WCN
        self.bf_score = z_score(b) #B-factor
        self.get_cnsrf(self.c1) #Consurf

        cc_wcn_bf    = numpy.dot(n_score(self.wcn_score),n_score(self.bf_score))
        if self.cnsrf_score != None:
            cc_wcn_cnsrf = numpy.dot(n_score(self.wcn_score),n_score(self.cnsrf_score))
            cc_bf_cnsrf = numpy.dot(n_score(self.bf_score),n_score(self.cnsrf_score))

        print "CC wcn-bf      = %f" % cc_wcn_bf
        if self.cnsrf_score != None:
            print "CC wcn-consurf = %f" % cc_wcn_cnsrf
            print "CC bf-consurf  = %f" % cc_bf_cnsrf
        

        if plot == 1:
            self.plot(range(len(self.wcn_score)),self.wcn_score,'blue','WCN')
            self.plot(range(len(self.bf_score)),self.bf_score,'green','B-Factor')
            if self.cnsrf_score != None:
                self.plot(range(len(self.cnsrf_score)),self.cnsrf_score,'red','CNSRF')
            plt.show()
    
    """
    DESCRIPTION
    A variant of plot
    key is "w", "c" or "b", or any number of the combination of them
    """
    def plot2(self,key = 'WBC'):
        options = {'W':self.plot_wcn,
                   'C':self.plot_cnsrf,
                   'B':self.plot_bf}
        plt.ion()
        key = key.upper()
        for c in key:
            options[c]();
        plt.legend()
        plt.show()

            
    def plot_wcn(self):
        self.plot(range(len(self.wcn_score)),self.wcn_score,'blue','WCN', ylabel = "WCN")

    def plot_cnsrf(self):
        if self.cnsrf_score != None:
            self.plot(range(len(self.cnsrf_score)),self.cnsrf_score,'red','CNSRF',ylabel="CNSRF")

    def plot_bf(self):
        self.plot(range(len(self.bf_score)),self.bf_score,'green','B-Factor',ylabel="BF")


    def flush(self):
        plt.show()

    def plot(self,x,y,color='black',label='',xlabel = 'Atom',ylabel = 'WCN'):
        plt.plot(x, y,color,lw=2,label=label)
        plt.xlabel(xlabel)
        plt.ylabel(ylabel)
        plt.title('%s %s-%s plot'% (self.code,self.c1,self.c2))
        plt.grid(True)
        plt.legend()
        plt.savefig("%s_%s_%s.png" % (self.code,self.c1,self.c2))


    def wcn3(self,c1,c2,flag=0):
        print "%s under the influence from %s" % (c1, c2)
        self.select(c1,c2,'CA')
        self.wcn(flag)
        self.select(c1,c2,'C')
        self.wcn(flag)
        self.select(c1,c2,'O')
        self.wcn(flag)
        self.select(c1,c2,'N')
        self.wcn(falg)
        self.flush()

    def get_wcn(self):
        return self.wcn_score

    def get_bf(self):
        return self.bf_score

    def get_cnsrf(self, chain):
        """
        DESCRIPTION
        
        Get CONSURF conservation profile from 140.113.239.100
        It calls read_cnsrf
        
        USAGE
        get_cnsrf pdb_id [,chain]
        
        SEE ALSO
        
        cnsrf
        
        EXAMPLE:
        get_consrf('4cha','b')
        
        
        """
        
        file = '/Users/jkhwang/Downloads/consurf/%s/%s/%s%s.consurf' % (self.code,chain,self.code,chain)
        print "\nFetching conservation profile:  \"%s\"...\n" % file
        if not os.path.isfile(file):
            print "Error: \"%s\" does not exist !!!\n" % file
            self.cnsrf_score = None
            return self.cnsrf_score

        handle = open(file)
        self.read_cnsrf(handle)
        self.cnsrf_score = s_score(self.cnsrf_score) #smooth
        self.cnsrf_score = z_score(self.cnsrf_score)
        return self.cnsrf_score
    """
    read_cnsrf is called by get_cnsrf; it is usually not called as an isolated function
    """
    def read_cnsrf(self,handle):
        
        pattern = re.compile(r'\s*[A-Z]\s+\d+\s+[-.0-9]+\s+([-.0-9]+)')
        
        self.cnsrf_score = []
        seqlist = []
        
        for line in handle:
            if line.startswith('#') or line.strip() == '':
                continue
            
            m = pattern.match(line)
            if m is None:
                continue
            
            self.cnsrf_score.append(float(m.group(1)))
        print "length of CNSRF profile %d" % len(self.cnsrf_score)

    def get_cm(self):
        cm = [0 for i in range(3)]
        for c in self.chain:
            print c,len(self.chain[c])
            for i in range(3):
                cm[i] = 0
            for i in self.chain[c]:
               cm[0] += self.atom[i].coord[0] 
               cm[1] += self.atom[i].coord[1] 
               cm[2] += self.atom[i].coord[2] 
            for i in range(3):
                cm[i] = cm[i]/len(self.chain[c])
            self.cm.update({c:cm})

        for c in self.chain:
            gr = 0
            tmass = 0
            for i in self.chain[c]:
                tmass += self.atom[i].mass
                gr += ((self.atom[i].coord[0]-self.cm[c][0])**2 
                + (self.atom[i].coord[1]-self.cm[c][1])**2 
                + (self.atom[i].coord[2]-self.cm[c][2])**2)*self.atom[i].mass 
            gr = (gr/tmass)**(0.5)
            self.gr.update({c:gr})

        for c in self.gr:
            print "Chain %s gr: %f" % (c, self.gr[c])

    def print_wcn(self):
        for c in self.chain.keys():
            print "chain %s " % c
            for i in self.chain[c]:
                if self.atom[i].name == 'CA':
                    print self.atom[i].name,self.atom[i].resn,self.atom[i].wcn





"""
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
Other non-pdb object functions
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
"""

def z_score(c):

    if len(c) == 0:
        print "z_score: the length of the chain is zero"
        return c
    avg = sum(c)/len(c)
    c = map(lambda x: x-avg,c)
    std = ((sum(map(lambda x: x**2,c)))/len(c))**(0.5)
    c = map(lambda x: x/std, c)
    return c

def n_score(c):

    if len(c) == 0:
        print "n_score: the length of the chain is zero"
        return c
    norm = ((sum(map(lambda x: x**2,c))))**(0.5)
    c = map(lambda x: x/norm, c)
    return c
"""
smooth scores
"""
def s_score(c):
    d = []
    l = len(c)
    #print "lenth of list %d" % l
    for i in range(l):
        d.append(0)
    d[0] = (c[0]+c[1])/2
    d[l-1] = (c[l-2]+c[l-1])/2
    for i in range(1,len(c)-2):
        d[i] = ((c[i-1]+c[i]+c[i+1])/3)
    return d

