#!/bin/bash
BASEDIR=$(dirname "$0")

rm $BASEDIR/Packages.bz2
find $BASEDIR -name '.DS_Store' -type f -delete

dpkg-scanpackages -m $BASEDIR/pkg > $BASEDIR/Packages
bzip2 $BASEDIR/Packages