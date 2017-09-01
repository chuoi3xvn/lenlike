<?php
if($_GET[like] ==  '150')
{
	if($_GET['ngay'] == '3') $tien = '5100';
	if($_GET['ngay'] == '15') $tien = '25000';
	if($_GET['ngay'] == '30') $tien = '50000';
	if($_GET['ngay'] == '60') $tien = '100000';
	if($_GET['ngay'] == '90') $tien = '150000';
	if($_GET['ngay'] == '120') $tien = '200000';
	if($_GET['ngay'] == '180') $tien = '250000';
}
if($_GET[like] ==  '300')
{
	if($_GET['ngay'] == '15') $tien = '50000';
	if($_GET['ngay'] == '30') $tien = '100000';
	if($_GET['ngay'] == '60') $tien = '200000';
	if($_GET['ngay'] == '90') $tien = '300000';
	if($_GET['ngay'] == '120') $tien = '400000';
	if($_GET['ngay'] == '180') $tien = '600000';
}
if($_GET[like] ==  '500')
{
	if($_GET['ngay'] == '15') $tien = '75000';
	if($_GET['ngay'] == '30') $tien = '150000';
	if($_GET['ngay'] == '60') $tien = '300000';
	if($_GET['ngay'] == '90') $tien = '450000';
	if($_GET['ngay'] == '120') $tien = '600000';
	if($_GET['ngay'] == '180') $tien = '800000';
}
if($_GET[like] ==  '700')
{
	if($_GET['ngay'] == '15') $tien = '100000';
	if($_GET['ngay'] == '30') $tien = '200000';
	if($_GET['ngay'] == '60') $tien = '400000';
	if($_GET['ngay'] == '90') $tien = '600000';
	if($_GET['ngay'] == '120') $tien = '800000';
	if($_GET['ngay'] == '180') $tien = '1200000';
}
if($_GET[like] ==  '1000')
{
	if($_GET['ngay'] == '15') $tien = '125000';
	if($_GET['ngay'] == '30') $tien = '250000';
	if($_GET['ngay'] == '60') $tien = '500000';
	if($_GET['ngay'] == '90') $tien = '750000';
	if($_GET['ngay'] == '120') $tien = '1250000';
	if($_GET['ngay'] == '180') $tien = '1500000';
}
/*
if($_GET[like] != '150' || $_GET[like] != '500' || $_GET[like] != '700' || $_GET[like] != '300' || $_GET[like] != '1000' || $_GET[ngay] != '15' || $_GET[ngay] != '30' || $_GET[ngay] != '60' || $_GET[ngay] != '120' || $_GET[ngay] != '180' || $_GET[ngay] != '90')
{
	echo 'error';
	exit;
}
*/
echo $tien;
?>