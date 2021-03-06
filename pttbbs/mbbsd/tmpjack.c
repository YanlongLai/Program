/* $Id: tmpjack.c,v 1.3 2000/09/13 06:23:54 davidyu Exp $ */
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <sys/types.h>
#include "config.h"
#include "pttstruct.h"
#include "modes.h"
#include "common.h"
#include "proto.h"

extern userec_t cuser;

#define p_MAX 5  /* president侯選人數 */
#define j_MAX 4  /* 4種選項 */

extern char *BBSName;

#define PD_RECORD "etc/Bet/president.data"
#define PD_USER   "etc/Bet/president.user"

#define TMP_JACK_RECORD  "etc/tmp_jack.data"
#define TMP_JACK_USER    "etc/tmp_jack.user"

#define BARBQ            "etc/barbq.user"
#define BARBQ_PICTURE    "etc/barbq.pic"


static char *p_betname[p_MAX] = {
    "連戰", "陳水扁", "宋楚瑜", "李敖", "許\信良"
};
static char *j_betname[j_MAX] = {
    "馬刺", "拓荒者",  "溜馬",  "尼克"
};

#ifndef _BBS_UTIL_C_
static int j_Is_Num(char*s, int n) {
    int i;
    for(i=0;i<n;i++)
	if(s[i]<'0' || s[i]>'9') return 0;
    return 1;
}

static void p_show_bet() {
    FILE *fp = fopen(PD_RECORD,"r");
    int i, total = 0, ticket[p_MAX] = {0, 0, 0, 0, 0};

    if(fp) {
	fscanf(fp,"%9d %9d %9d %9d %9d\n",
	       &ticket[0],&ticket[1],&ticket[2],&ticket[3],&ticket[4]);
	for(i = 0; i < p_MAX; i++)
	    total += ticket[i];
	fclose(fp);
    }

    prints("\033[33m1.%-6s: %-9d2.%-6s: %-9d3.%-6s: %-9d\n4.%-6s: %-9d5.%-6s: %-9d\n\033[m"
           "\033[42m 下押金額:\033[31m %d 元 \033[m",
           p_betname[0], ticket[0], p_betname[1], ticket[1],
           p_betname[2], ticket[2], p_betname[3], ticket[3],
           p_betname[4], ticket[4],
           total);
}

static void j_show_bet() {
    FILE *fp = fopen(TMP_JACK_RECORD,"r");
    int i, total = 0, ticket[j_MAX] = {0, 0, 0, 0};

    if(fp) {
        fscanf(fp,"%9d %9d %9d %9d\n",
               &ticket[0],&ticket[1],&ticket[2],&ticket[3]);
        for(i = 0; i < j_MAX; i++)
            total += ticket[i];
        fclose(fp);
    }

    prints("\033[33m1.%-6s: %-9d2.%-6s: %-9d3.%-6s: %-9d4.%-6s: %-9d\n\033[m\n"
           "\033[42m 下注總金額:\033[31m %d 元 \033[m",
           j_betname[0], ticket[0], j_betname[1], ticket[1],
           j_betname[2], ticket[2], j_betname[3], ticket[3],
           total);
}

static void p_show_ticket_data() {
    clear();
    showtitle("總統賭盤[作者:Heat]", BBSName);
    move(1, 0);
    /*outs("
      [[1;31m┌[[37m█[[31m    ┌[[37m█[[31m┌[[37m████[[31m    ┌[[37m███
      [[1;31m│[[37m██[[31m  │[[37m█[[31m│[[37m█[[31m──┐[[37m█[[31m┌[[37m█[[31m──┐[[37m
      [[1;31m│[[37m█[[31m┐[[37m█[[31m│[[37m█[[31m│[[37m████[[31m┘│[[37m█████
      [[1;31m│[[37m█[[31m└┐[[37m██[[31m│[[37m█[[31m──┐[[37m█[[31m│[[37m█[[31m──┐[[37m
      [[1;31m│[[37m█[[31m  └┐[[37m█[[31m│[[37m████[[31m┘│[[37m█[[31m    │[[37m█
      [[1;31m└┘    └┘└───┘  └┘    └┘
      [[1;33m◆[[37m───────────────────────────────[[33m◆[[m
      [[1;35m                        規則: 可購買四種不同選項。
      等結果出來就開票給錢唷 獎金由系統抽取5%之稅金。

      [[36m馬刺[[37m─────┐               ┌─────[[36m尼克
      [[37m ├─[[33mFinals(2,3,2)[[37m┤
      [[36m拓荒者[[37m────┘               └─────[[36m溜馬[[m");
    */
    move(6,0);
    outs("                          2000總統機\n");
    outs("        等結果出來就開票給錢唷 獎金由系統抽取5%之稅金。");

    move(15,0);
    outs("\033[1;32m目前情形:\033[m\n");
    p_show_bet();
    move(19, 0);
    reload_money();
    prints("\033[44m錢: %-10d \033[m\n\033[1m 請選擇要購買的種類(1~5)[Q:離開]"
	   "\033[m:", cuser.money);
}


void j_show_ticket_data() {
    clear();
    showtitle("NBA賭盤[作者:Heat]", BBSName);
    move(1, 0);
    outs("
[1;31m┌[37m█[31m    ┌[37m█[31m┌[37m████[31m    ┌[37m███
[1;31m│[37m██[31m  │[37m█[31m│[37m█[31m──┐[37m█[31m┌[37m█[31m──┐[37m█
[1;31m│[37m█[31m┐[37m█[31m│[37m█[31m│[37m████[31m┘│[37m█████
[1;31m│[37m█[31m└┐[37m██[31m│[37m█[31m──┐[37m█[31m│[37m█[31m──┐[37m█
[1;31m│[37m█[31m  └┐[37m█[31m│[37m████[31m┘│[37m█[31m    │[37m█
[1;31m└┘    └┘└───┘  └┘    └┘
[1;33m◆[37m───────────────────────────────[33m◆[m
[1;35m                        規則: 可購買四種不同選項。
             等結果出來就開票給錢唷 獎金由系統抽取5%之稅金。

             [36m馬刺[37m─────┐               ┌─────[36m尼克
                          [37m ├─[33mFinals(2,3,2)[37m┤
             [36m拓荒者[37m────┘               └─────[36m溜馬[m");
    move(15,0);
    outs("\033[1;32m目前下注狀況:\033[m\n");
    j_show_bet();
    move(19, 0);
    reload_money();
    prints("\033[44m錢: %-10d \033[m\n\033[1m 請選擇要購買的種類(1~4)[Q:離開]"
           "\033[m:", cuser.money);
}

static void p_append_ticket_record(int ch, int n) {
    FILE *fp;
    int ticket[p_MAX] = {0,0,0,0,0};

    if((fp = fopen(PD_USER,"a"))) {
        fprintf(fp, "%s %d %d\n", cuser.userid, ch, n);
        fclose(fp);
    }

    if((fp = fopen(PD_RECORD,"r+"))) {
        fscanf(fp,"%9d %9d %9d %9d %9d\n",
	       &ticket[0], &ticket[1], &ticket[2], &ticket[3], &ticket[4]);
        ticket[ch] += n;
        rewind(fp);
        fprintf(fp, "%9d %9d %9d %9d %9d\n",
		ticket[0], ticket[1], ticket[2], ticket[3], ticket[4]);
        fclose(fp);
    } else if((fp = fopen(PD_RECORD,"w"))) {
        ticket[ch] += n;
        fprintf(fp,"%9d %9d %9d %9d %9d\n",
		ticket[0], ticket[1], ticket[2], ticket[3], ticket[4]);
        fclose(fp);
    }
}

static void j_append_ticket_record(int ch, int n) {
    FILE *fp;
    int ticket[j_MAX] = {0,0,0,0};

    if((fp = fopen(TMP_JACK_USER,"a"))) {
        fprintf(fp, "%s %d %d\n", cuser.userid, ch, n);
        fclose(fp);
    }

    if((fp = fopen(TMP_JACK_RECORD,"r+"))) {
        fscanf(fp,"%9d %9d %9d %9d\n",
               &ticket[0], &ticket[1], &ticket[2], &ticket[3]);
        ticket[ch] += n;
        rewind(fp);
        fprintf(fp, "%9d %9d %9d %9d\n",
                ticket[0], ticket[1], ticket[2], ticket[3]);
        fclose(fp);
    } else if((fp = fopen(TMP_JACK_RECORD,"w"))) {
        ticket[ch] += n;
        fprintf(fp,"%9d %9d %9d %9d\n",
                ticket[0], ticket[1], ticket[2], ticket[3]);
        fclose(fp);
    }
}

#define lockreturn0(unmode, state) if(lockutmpmode(unmode, state)) return 0

int p_ticket_main() {
    int ch, n;
    char buf[16];

    lockreturn0(TMPJACK, LOCK_MULTI);

    //more("etc/nba.doc",YEA);
    while(1) {
	p_show_ticket_data();
	ch = igetch();
	if(ch =='q' || ch == 'Q')
	    break;
	reload_money();
	if(cuser.money < 100)
	{
	    move(22,0);
	    prints("錢不夠唷 至少要100歐");
	    unlockutmpmode();
	    pressanykey();
	    return 0;
	}
	ch -= '1';

	if(ch > p_MAX-1 || ch < 0)
	    continue;
	n = 0;
	bzero(buf,sizeof(buf));
	do{
	    getdata(19, 0, "多少錢咧?(100以上 q:落跑)?",
		    buf, 8, LCECHO);
	    if(buf[0] == 'q')
	    {
		unlockutmpmode();
		return 0;
	    }
	}while(!j_Is_Num(buf,strlen(buf)) || (n=atoi(buf)) < 100 ||
	       n > cuser.money);
	demoney(n);
	p_append_ticket_record(ch,n);
    }
    unlockutmpmode();
    return 0;
}

int j_ticket_main() {
    int ch, n;
    char buf[16];

    lockreturn0(TMPJACK, LOCK_MULTI);

    more("etc/nba.doc",YEA);
    while(1) {
        j_show_ticket_data();
        ch = igetch();
        if(ch =='q' || ch == 'Q')
            break;
	reload_money();
        if(cuser.money < 100)
        {
            move(22,0);
            prints("錢不夠唷 至少要100歐");
	    unlockutmpmode();
            pressanykey();
            return 0;
        }
        ch -= '1';
        if(ch > j_MAX-1 || ch < 0)
            continue;
        n = 0;
        bzero(buf,sizeof(buf));
	do{
	    getdata(19, 0, "多少錢咧?(100以上 q:落跑)?",
		    buf, 8, LCECHO);
	    if(buf[0] == 'q')
	    {
		unlockutmpmode();
		return 0;
	    }
	}while(!j_Is_Num(buf,strlen(buf)) || (n=atoi(buf)) < 100 ||
	       n > cuser.money);
	demoney(n);
        j_append_ticket_record(ch,n);
    }
    unlockutmpmode();
    return 0;
}

//以下屬於烤肉雞子的程式
static int b_is_in(FILE *fp) {
    char buf[100],*ptr,id[20];

    while( fgets(buf,100,fp) )
    {
        ptr = buf;
        ptr += 5;
        strncpy(id,ptr,16);
        if( (ptr=strchr(id,' ')) ) *ptr = 0;
        if( !strcmp(id,cuser.userid) ) return 1;
    }
    return 0;
}

static void b_list_file() {
    more(BARBQ,YEA);
}

static void b_showfile(FILE *fd) {
    char buf[300];

    fseek(fd,0,SEEK_SET);
    move(1,0);
    while( fgets(buf,300,fd) )
	prints("%s",buf);
}

int reg_barbq() {
    char ch[2],sex[2],trf[2],nick[16];
    FILE *fp,*fd;

    if( !(fp = fopen(BARBQ,"r+")) || !(fd = fopen(BARBQ_PICTURE,"r")) )
    {
	move(22,0);prints("硬碟太燙了 發生錯誤!!");
	pressanykey();
	return 0;
    }


    while(1)
    {
	clear();
	b_showfile(fd);
	getdata(13, 0, "要參加烤肉嗎(y:加入 n:誰鳥你 s:列出目前去的人)?",
		ch, 2, LCECHO);
	if( ch[0] != 'y' && ch[0]!='s' )
	{
	    fclose(fp);
	    fclose(fd);
	    return 0;
	}

	if( ch[0] == 's' )
	{
	    b_list_file();
	    continue;
	}

	if( b_is_in(fp) )
	{
	    move(22,0);prints("你之前就加入了 再次提醒 不來扣錢唷 :)");
	    fclose(fp);
	    fclose(fd);
	    pressanykey();
	    return 0;
	}

	move(13,0);clrtoeol();prints("開始填寫資料.........");
	getdata(14, 0, "性別:[1:男 2:女]",
		sex, 2, LCECHO);
	getdata(14, 0, "前往方式:[1:自行  2:先集合給工作人員帶]",
		trf, 2, LCECHO);
	getdata(14, 0, "為自己取各暱稱吧:",
		nick, 9, LCECHO);

	if(
	    sex[0]<'1'||sex[0]>'2'||trf[0]<'1'||trf[0]>'2'||
	    strlen(nick)<=0
	    )
	{
	    move(15,0);prints("輸入格式不對 重來一次吧!!");
	    pressanykey();
	    continue;
	}

	fseek(fp,0,SEEK_END);

	fprintf(fp, "帳號:%-16s暱稱:%-12s性別:%-6s交通:%-6s\n",
		cuser.userid, nick, (sex[0]=='1')?"男":"女", (trf[0]=='1')?"自行":"集合");

	move(22,0);prints("完成加入手續 記得來歐 不然扣錢唷 ^_^ ");
	pressanykey();
	fclose(fp);
	fclose(fd);
	return 0;
    }
}
#endif
