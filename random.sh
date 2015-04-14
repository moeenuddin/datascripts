#!/bin/bash
# replace with file to read
FILE=subFeature.csv
# count number of lines
NUM=$(wc -l < ${FILE})
# generate random number in range 0-NUM
let X=${RANDOM} % ${NUM} + 1
# extract X-th line
sed -n ${X}p ${FILE}
