#!/bin/bash
BASEDIR=$(dirname "$0")
cd "${BASEDIR}"

rm Packages.gz
rm Packages.bz2
find $BASEDIR -name '.DS_Store' -type f -delete

dpkg-scanpackages -m pkg /dev/null > Packages
gzip -c9 Packages > Packages.gz
bzip2 -c9 Packages > Packages.bz2