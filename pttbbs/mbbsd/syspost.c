/* $Id: syspost.c,v 1.2 2000/09/13 06:23:54 davidyu Exp $ */
#include <stdio.h>
#include <string.h>
#include <time.h>
#include <sys/types.h>
#include "config.h"
#include "pttstruct.h"
#include "perm.h"
#include "common.h"
#include "proto.h"

extern char *str_permid[];
extern userec_t cuser;

void post_change_perm(int oldperm, int newperm, char *sysopid, char *userid) {
    FILE *fp;
    fileheader_t fhdr;
    time_t now = time(0);
    char genbuf[200], reason[30];
    int i, flag=0;
    
    strcpy(genbuf, "boards/Security");
    stampfile(genbuf, &fhdr);
    if(!(fp = fopen(genbuf,"w")))
	return;
    
    fprintf(fp, "�@��: [�t�Φw����] �ݪO: Security\n"
	    "���D: [���w���i] �����ק��v�����i\n"
	    "�ɶ�: %s\n", ctime(&now));
    for(i = 5; i < NUMPERMS; i++) {
        if(((oldperm >> i) & 1) != ((newperm >> i) & 1)) {
            fprintf (fp, "   ����\033[1;32m%s%s%s%s\033[m���v��\n",
		     sysopid,
		     (((oldperm >> i) & 1) ? "\033[1;33m����":"\033[1;33m�}��"),
		     userid, str_permid[i]);
            flag++;
        }
    }
    
    if(flag) {
	clrtobot();
	clear();
	while(!getdata_str(5, 0, "�п�J�z�ѥH�ܭt�d�G",
			   reason, 60, DOECHO, "�ݪ����D:"));
	fprintf(fp, "\n   \033[1;37m����%s�ק��v���z�ѬO�G%s\033[m",
		cuser.userid, reason);
	fclose(fp);
	
	sprintf(fhdr.title, "[���w���i] ����%s�ק�%s�v�����i",
		cuser.userid, userid);
	strcpy(fhdr.owner, "[�t�Φw����]");
	append_record("boards/Security/.DIR", &fhdr, sizeof(fhdr));
    }
}

void post_violatelaw(char* crime, char* police, char* reason, char* result){
    char genbuf[200];
    fileheader_t fhdr;
    time_t now;
    FILE *fp;            
    strcpy(genbuf, "boards/Security");
    stampfile(genbuf, &fhdr);
    if(!(fp = fopen(genbuf,"w")))
        return;
    now = time(NULL);
    fprintf(fp, "�@��: [Ptt�k�|] �ݪO: Security\n"
	    "���D: [���i] %-20s �H�k�P�M���i\n"
	    "�ɶ�: %s\n"
	    "\033[1;32m%s\033[m�P�M�G\n     \033[1;32m%s\033[m"
	    "�]\033[1;35m%s\033[m�欰�A\n�H�ϥ������W�A�B�H\033[1;35m%s\033[m�A�S�����i",
	    crime, ctime(&now), police, crime, reason, result);
    fclose(fp);
    sprintf(fhdr.title, "[���i] %-20s �H�k�P�M���i", crime);
    strcpy(fhdr.owner, "[Ptt�k�|]");
    append_record("boards/Security/.DIR", &fhdr, sizeof(fhdr));
    
    strcpy(genbuf, "boards/ViolateLaw");
    stampfile(genbuf, &fhdr);
    if(!(fp = fopen(genbuf,"w")))
        return;
    now = time(NULL);
    fprintf(fp, "�@��: [Ptt�k�|] �ݪO: ViolateLaw\n"
	    "���D: [���i] %-20s �H�k�P�M���i\n"
	    "�ɶ�: %s\n"
	    "\033[1;32m%s\033[m�P�M�G\n     \033[1;32m%s\033[m"
	    "�]\033[1;35m%s\033[m�欰�A\n�H�ϥ������W�A�B�H\033[1;35m%s\033[m�A�S�����i",
	    crime, ctime(&now), police, crime, reason, result);
    fclose(fp);
    sprintf(fhdr.title, "[���i] %-20s �H�k�P�M���i", crime);
    strcpy(fhdr.owner, "[Ptt�k�|]");
    
    append_record("boards/ViolateLaw/.DIR", &fhdr, sizeof(fhdr));
                                 
}

void post_newboard(char* bgroup, char* bname, char* bms){
    FILE *fp;
    fileheader_t fhdr;
    time_t now = time(0);
    char genbuf[256];
  
    /* �b Record ���o���s�峹 */
    strcpy(genbuf, "boards/Record");
    stampfile(genbuf, &fhdr);
    fp = fopen(genbuf,"w");
    if(!fp)
  
	fprintf(fp, "�@��: [�t��] �ݪO: Record\n���D: [�s������] %s\n", bname);
    fprintf(fp, "�ɶ�: %s\n", ctime(&now));
    
    /* �峹�����e */
    fprintf(fp, "%s �}�F�@�ӷs�� %s : %s\n\n�s�����D�� %s\n\n����*^_^*\n",
	    cuser.userid, bname, bgroup, bms);
    fclose(fp);
                      		  
    /* �N�ɮץ[�J�C�� */
    fhdr.savemode = 'L';
    fhdr.filemode = FILE_LOCAL;
    sprintf(fhdr.title, "[�s������] %s", bname);
    strcpy(fhdr.owner, "[�t��]");
    append_record("boards/Record/.DIR", &fhdr, sizeof(fhdr));
}