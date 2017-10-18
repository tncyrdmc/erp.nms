#!/bin/bash
#echo "creando dump";
#dir=$DIRSTACK"/erp.nms/bk/";
dir=$HOME"/html/test/bk/";
hostname=$1;
username=$2;
password=$3;
database=$4;
crear=$(date +"%Y%m%d" )"_"$database; # echo ("en local --date='-1 day'");
eliminar=$(date +"%Y%m%d" --date='-15 day')"_"$database; 
#echo $archivo;
mysqldump -h $hostname -u $username -p$password $database > $dir$crear"_dump.sql";
if [[ $(find $dir*.sql | wc -l) -ge 15 ]]; then
		file=$dir$eliminar"_dump.sql"; 
		#file=$dir$crear"_dump.sql";
			if [ -f "$file" ]
			then
				rm $file;
			fi
fi
rm $dir"db_access.php";
