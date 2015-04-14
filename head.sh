#!/bin/bash
#head -$((${RANDOM} % `wc -l < subFeature.csv` + 1)) subFeature.csv | tail -1 > text.csv
FNAME=facebook-2014Mar31.csv
cp /media/My\ Passport/facebook\ missing/$FNAME /home/bal/Documents/shell/$FNAME
shuf $FNAME > tmp.csv
rm $FNAME
head -n 12000 tmp.csv > $FNAME
mv $FNAME data/$FNAME
rm tmp.csv
