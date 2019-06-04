#!/bin/bash
BASEDIR=$(dirname "$0")

rm $BASEDIR/Packages.gz
rm $BASEDIR/Packages.bz2
find $BASEDIR -name '.DS_Store' -type f -delete

dpkg-scanpackages -m $BASEDIR/pkg /dev/null > $BASEDIR/Packages
gzip -c9 $BASEDIR/Packages > $BASEDIR/Packages.gz
bzip2 -c9 $BASEDIR/Packages > $BASEDIR/Packages.bz2