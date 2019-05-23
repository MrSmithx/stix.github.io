#!/bin/bash

rm ./Packages.bz2
find . -name '.DS_Store' -type f -delete

dpkg-scanpackages -m ./pkg > Packages
bzip2 Packages