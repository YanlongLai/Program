# $Id: Makefile,v 1.23.2.3 2001/05/10 00:16:33 davidyu Exp $

BBSHOME?=$(HOME)

# FreeBSD
CC_FreeBSD=	gcc
CFLAGS_FreeBSD=	-pipe -Wall -g -O3 -DHAVE_SETPROCTITLE -DBBSHOME='"$(BBSHOME)"' -I../include
LIBS_FreeBSD=
LIBMAIL_FreeBSD=-lutil
LIBCHAT_FreeBSD=

# Linux
CC_linux=	gcc
CFLAGS_linux=	-pipe -Wall -g -O3 -DHAVE_DES_CRYPT -DBBSHOME='"$(BBSHOME)"' -I../include
LIBS_linux=	-lresolv
LIBMAIL_linux=	
LIBCHAT_linux=	-lcrypt

CC=	$(CC_$(OSTYPE))
CFLAGS=	$(CFLAGS_$(OSTYPE))
LDFLAGS=$(LDFLAGS_$(OSTYPE))
LIBMAIL=$(LIBMAIL_$(OSTYPE))
LIBCHAT=$(LIBCHAT_$(OSTYPE))

CPROGS=	bbsmail BM_money post account birth deluserfile expire mandex\
	horoscope openvice parse_news openticket topusr yearsold uhash_loader\
	poststat showboard inndBM antispam countalldice webgrep bbsrf\
	initbbs outmail xchatd userlist tunepasswd buildir reaper shmsweep\
	merge_passwd merge_board
PROGS=	$(CPROGS) BM_money.sh backpasswd.sh mailog.sh opendice.sh\
	openticket.sh stock.sh topsong.sh weather.sh stock.perl weather.perl\
	cvslog.sh

all: $(PROGS)

bbsmail: bbsmail.c util_cache.c util_record.c util_passwd.c
	$(CC) $(CFLAGS) -o $@ $@.c util_cache.c util_record.c util_passwd.c

BM_money: BM_money.c util_cache.c util_record.c util_passwd.c
	$(CC) $(CFLAGS) -o $@ $@.c util_cache.c util_record.c util_passwd.c

post: post.c util_cache.c util_record.c util_passwd.c
	$(CC) $(CFLAGS) -o $@ $@.c util_cache.c util_record.c util_passwd.c

account: account.c util_cache.c util_record.c util_passwd.c
	$(CC) $(CFLAGS) -o $@ $@.c util_cache.c util_record.c util_passwd.c

birth: birth.c util_cache.c util_record.c util_passwd.c
	$(CC) $(CFLAGS) -o $@ $@.c util_cache.c util_record.c util_passwd.c

deluserfile: deluserfile.c util_cache.c util_record.c util_passwd.c
	$(CC) $(CFLAGS) -o $@ $@.c util_cache.c util_record.c util_passwd.c

expire: expire.c util_cache.c util_record.c util_passwd.c
	$(CC) $(CFLAGS) -o $@ $@.c util_cache.c util_record.c util_passwd.c

mandex: mandex.c util_cache.c util_record.c util_passwd.c
	$(CC) $(CFLAGS) -o $@ $@.c util_cache.c util_record.c util_passwd.c

horoscope: horoscope.c util_cache.c util_record.c util_passwd.c
	$(CC) $(CFLAGS) -o $@ $@.c util_cache.c util_record.c util_passwd.c

openvice: openvice.c util_cache.c util_record.c util_passwd.c
	$(CC) $(CFLAGS) -o $@ $@.c util_cache.c util_record.c util_passwd.c

parse_news: parse_news.c util_cache.c util_record.c util_passwd.c
	$(CC) $(CFLAGS) -o $@ $@.c util_cache.c util_record.c util_passwd.c

openticket: openticket.c util_cache.c util_record.c util_passwd.c
	$(CC) $(CFLAGS) -o $@ $@.c util_cache.c util_record.c util_passwd.c

topusr: topusr.c util_cache.c util_record.c util_passwd.c
	$(CC) $(CFLAGS) -o $@ $@.c util_cache.c util_record.c util_passwd.c

yearsold: yearsold.c util_cache.c util_record.c util_passwd.c
	$(CC) $(CFLAGS) -o $@ $@.c util_cache.c util_record.c util_passwd.c

xchatd: xchatd.c util_cache.c util_record.c util_passwd.c descrypt.c
	$(CC) $(CFLAGS) -o $@ $@.c util_cache.c util_record.c util_passwd.c descrypt.c $(LIBCHAT)

reaper: reaper.c util_passwd.c
	$(CC) $(CFLAGS) -o $@ $@.c util_passwd.c util_cache.c

shmsweep: shmsweep.c
	$(CC) $(CFLAGS) -o $@ $@.c

uhash_loader: uhash_loader.c
	$(CC) $(CFLAGS) -o $@ $@.c

showboard: showboard.c
	$(CC) $(CFLAGS) -o $@ $@.c

inndBM: inndBM.c
	$(CC) $(CFLAGS) -o $@ $@.c

antispam: antispam.c
	$(CC) $(CFLAGS) -o $@ $@.c

countalldice: countalldice.c
	$(CC) $(CFLAGS) -o $@ $@.c

webgrep: webgrep.c
	$(CC) $(CFLAGS) -o $@ $@.c

bbsrf: bbsrf.c
	$(CC) $(CFLAGS) -o $@ $@.c

initbbs: initbbs.c
	$(CC) $(CFLAGS) -o $@ $@.c

outmail: outmail.c
	$(CC) $(CFLAGS) -o $@ $@.c $(LIBMAIL)

userlist: userlist.c
	$(CC) $(CFLAGS) -o $@ $@.c

tunepasswd: tunepasswd.c
	$(CC) $(CFLAGS) -o $@ $@.c

buildir: buildir.c
	$(CC) $(CFLAGS) -o $@ $@.c

merge_passwd: merge_passwd.c
	$(CC) $(CFLAGS) -o $@ $@.c

merge_board : merge_board.c
	$(CC) $(CFLAGS) -o $@ $@.c

install: $(PROGS)
	install -d $(BBSHOME)/bin/
	install -c -m 755 $(PROGS) $(BBSHOME)/bin/
	chmod 4755 $(BBSHOME)/bin/post

clean:
	rm -f $(CPROGS)
