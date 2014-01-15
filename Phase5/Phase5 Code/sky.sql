-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2014 at 01:27 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sky`
--
CREATE DATABASE IF NOT EXISTS `sky` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sky`;

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `engdate`(`indate` VARCHAR(10) CHARSET utf8mb4) RETURNS varchar(10) CHARSET latin1
    NO SQL
return concat(toeng(SUBSTRING(indate,1,1)),toeng(SUBSTRING(indate,2,1)),toeng(SUBSTRING(indate,3,1)),toeng(SUBSTRING(indate,4,1)),'/',toeng(SUBSTRING(indate,6,1)),toeng(SUBSTRING(indate,7,1)),'/',toeng(SUBSTRING(indate,9,1)),toeng(SUBSTRING(indate,10,1)))$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fardate`(`indate` VARCHAR(10) CHARSET utf8mb4) RETURNS varchar(10) CHARSET utf8mb4
    NO SQL
return concat(tofa(SUBSTRING(indate,1,1)),tofa(SUBSTRING(indate,2,1)),tofa(SUBSTRING(indate,3,1)),tofa(SUBSTRING(indate,4,1)),'/',tofa(SUBSTRING(indate,6,1)),tofa(SUBSTRING(indate,7,1)),'/',tofa(SUBSTRING(indate,9,1)),tofa(SUBSTRING(indate,10,1)))$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fdate`(`inda` DATE) RETURNS varchar(100) CHARSET utf8mb4
    NO SQL
BEGIN

RETURN concat(fyear(pyear(inda)),'/',fmonth(PMONTH(inda)),'/',fday(pday(inda)));
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fday`(`jd` INT) RETURNS char(2) CHARSET utf8mb4
    NO SQL
BEGIN
CASE jd
		WHEN 01 THEN RETURN '۰۱';
		WHEN 02 THEN RETURN '۰۲';
		WHEN 03 THEN RETURN '۰۳';
		WHEN 04 THEN RETURN '۰۴';
		WHEN 05 THEN RETURN '۰۵';
		WHEN 06 THEN RETURN '۰۶';
		WHEN 07 THEN RETURN '۰۷';
		WHEN 08 THEN RETURN '۰۸';
		WHEN 09 THEN RETURN '۰۹';
		WHEN 10 THEN RETURN '۱۰';
		WHEN 11 THEN RETURN '۱۱';
		WHEN 12 THEN RETURN '۱۲';
		WHEN 13 THEN RETURN '۱۳';
		WHEN 14 THEN RETURN '۱۴';
		WHEN 15 THEN RETURN '۱۵';
		WHEN 16 THEN RETURN '۱۶';
		WHEN 17 THEN RETURN '۱۷';
		WHEN 18 THEN RETURN '۱۸';
		WHEN 19 THEN RETURN '۱۹';
		WHEN 20 THEN RETURN '۲۰';
		WHEN 21 THEN RETURN '۲۱';
		WHEN 22 THEN RETURN '۲۲';
		WHEN 23 THEN RETURN '۲۳';
		WHEN 24 THEN RETURN '۲۴';
		WHEN 25 THEN RETURN '۲۵';
		WHEN 26 THEN RETURN '۲۶';
		WHEN 27 THEN RETURN '۲۷';
		WHEN 28 THEN RETURN '۲۸';
		WHEN 29 THEN RETURN '۲۹';
		WHEN 30 THEN RETURN '۳۰';
		WHEN 31 THEN RETURN '۳۱';

	END CASE;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fmonth`(`jm` INT) RETURNS varchar(2) CHARSET utf8mb4
    NO SQL
BEGIN
CASE jm
		WHEN 01 THEN RETURN '۰۱';
		WHEN 02 THEN RETURN '۰۲';
		WHEN 03 THEN RETURN '۰۳';
		WHEN 04 THEN RETURN '۰۴';
		WHEN 05 THEN RETURN '۰۵';
		WHEN 06 THEN RETURN '۰۶';
		WHEN 07 THEN RETURN '۰۷';
		WHEN 08 THEN RETURN '۰۸';
		WHEN 09 THEN RETURN '۰۹';
		WHEN 10 THEN RETURN '۱۰';
		WHEN 11 THEN RETURN '۱۱';
		WHEN 12 THEN RETURN '۱۲';
	END CASE;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fyear`(`jy` INT) RETURNS varchar(4) CHARSET utf8mb4
    NO SQL
BEGIN
CASE jy
		WHEN 1301 THEN RETURN '۱۳۰۱';
		WHEN 1302 THEN RETURN '۱۳۰۲';
		WHEN 1303 THEN RETURN '۱۳۰۳';
		WHEN 1304 THEN RETURN '۱۳۰۴';
		WHEN 1305 THEN RETURN '۱۳۰۵';
		WHEN 1306 THEN RETURN '۱۳۰۶';
		WHEN 1307 THEN RETURN '۱۳۰۷';
		WHEN 1308 THEN RETURN '۱۳۰۸';
		WHEN 1309 THEN RETURN '۱۳۰۹';
		WHEN 1310 THEN RETURN '۱۳۱۰';
		WHEN 1311 THEN RETURN '۱۳۱۱';
		WHEN 1312 THEN RETURN '۱۳۱۲';
		WHEN 1313 THEN RETURN '۱۳۱۳';
		WHEN 1314 THEN RETURN '۱۳۱۴';
		WHEN 1315 THEN RETURN '۱۳۱۵';
		WHEN 1316 THEN RETURN '۱۳۱۶';
		WHEN 1317 THEN RETURN '۱۳۱۷';
		WHEN 1318 THEN RETURN '۱۳۱۸';
		WHEN 1319 THEN RETURN '۱۳۱۹';
		WHEN 1320 THEN RETURN '۱۳۲۰';
		WHEN 1321 THEN RETURN '۱۳۲۱';
		WHEN 1322 THEN RETURN '۱۳۲۲';
		WHEN 1323 THEN RETURN '۱۳۲۳';
		WHEN 1324 THEN RETURN '۱۳۲۴';
		WHEN 1325 THEN RETURN '۱۳۲۵';
		WHEN 1326 THEN RETURN '۱۳۲۶';
		WHEN 1327 THEN RETURN '۱۳۲۷';
		WHEN 1328 THEN RETURN '۱۳۲۸';
		WHEN 1329 THEN RETURN '۱۳۲۹';
		WHEN 1330 THEN RETURN '۱۳۳۰';
		WHEN 1331 THEN RETURN '۱۳۳۱';
		WHEN 1332 THEN RETURN '۱۳۳۲';
		WHEN 1333 THEN RETURN '۱۳۳۳';
		WHEN 1334 THEN RETURN '۱۳۳۴';
		WHEN 1335 THEN RETURN '۱۳۳۵';
		WHEN 1336 THEN RETURN '۱۳۳۶';
		WHEN 1337 THEN RETURN '۱۳۳۷';
		WHEN 1338 THEN RETURN '۱۳۳۸';
		WHEN 1339 THEN RETURN '۱۳۳۹';
		WHEN 1340 THEN RETURN '۱۳۴۰';
		WHEN 1341 THEN RETURN '۱۳۴۱';
		WHEN 1342 THEN RETURN '۱۳۴۲';
		WHEN 1343 THEN RETURN '۱۳۴۳';
		WHEN 1344 THEN RETURN '۱۳۴۴';
		WHEN 1345 THEN RETURN '۱۳۴۵';
		WHEN 1346 THEN RETURN '۱۳۴۶';
		WHEN 1347 THEN RETURN '۱۳۴۷';
		WHEN 1348 THEN RETURN '۱۳۴۸';
		WHEN 1349 THEN RETURN '۱۳۴۹';
		WHEN 1350 THEN RETURN '۱۳۵۰';
		WHEN 1351 THEN RETURN '۱۳۵۱';
		WHEN 1352 THEN RETURN '۱۳۵۲';
		WHEN 1353 THEN RETURN '۱۳۵۳';
		WHEN 1354 THEN RETURN '۱۳۵۴';
		WHEN 1355 THEN RETURN '۱۳۵۵';
		WHEN 1356 THEN RETURN '۱۳۵۶';
		WHEN 1357 THEN RETURN '۱۳۵۷';
		WHEN 1358 THEN RETURN '۱۳۵۸';
		WHEN 1359 THEN RETURN '۱۳۵۹';
		WHEN 1360 THEN RETURN '۱۳۶۰';
		WHEN 1361 THEN RETURN '۱۳۶۱';
		WHEN 1362 THEN RETURN '۱۳۶۲';
		WHEN 1363 THEN RETURN '۱۳۶۳';
		WHEN 1364 THEN RETURN '۱۳۶۴';
		WHEN 1365 THEN RETURN '۱۳۶۵';
		WHEN 1366 THEN RETURN '۱۳۶۶';
		WHEN 1367 THEN RETURN '۱۳۶۷';
		WHEN 1368 THEN RETURN '۱۳۶۸';
		WHEN 1369 THEN RETURN '۱۳۶۹';
		WHEN 1370 THEN RETURN '۱۳۷۰';
		WHEN 1371 THEN RETURN '۱۳۷۱';
		WHEN 1372 THEN RETURN '۱۳۷۲';
		WHEN 1373 THEN RETURN '۱۳۷۳';
		WHEN 1374 THEN RETURN '۱۳۷۴';
		WHEN 1375 THEN RETURN '۱۳۷۵';
		WHEN 1376 THEN RETURN '۱۳۷۶';
		WHEN 1377 THEN RETURN '۱۳۷۷';
		WHEN 1378 THEN RETURN '۱۳۷۸';
		WHEN 1379 THEN RETURN '۱۳۷۹';
		WHEN 1380 THEN RETURN '۱۳۸۰';
		WHEN 1381 THEN RETURN '۱۳۸۱';
		WHEN 1382 THEN RETURN '۱۳۸۲';
		WHEN 1383 THEN RETURN '۱۳۸۳';
		WHEN 1384 THEN RETURN '۱۳۸۴';
		WHEN 1385 THEN RETURN '۱۳۸۵';
		WHEN 1386 THEN RETURN '۱۳۸۶';
		WHEN 1387 THEN RETURN '۱۳۸۷';
		WHEN 1388 THEN RETURN '۱۳۸۸';
		WHEN 1389 THEN RETURN '۱۳۸۹';
		WHEN 1390 THEN RETURN '۱۳۹۰';
		WHEN 1391 THEN RETURN '۱۳۹۱';
		WHEN 1392 THEN RETURN '۱۳۹۲';
		WHEN 1393 THEN RETURN '۱۳۹۳';
		WHEN 1394 THEN RETURN '۱۳۹۴';
		WHEN 1395 THEN RETURN '۱۳۹۵';
		WHEN 1396 THEN RETURN '۱۳۹۶';
		WHEN 1397 THEN RETURN '۱۳۹۷';
		WHEN 1398 THEN RETURN '۱۳۹۸';
		WHEN 1399 THEN RETURN '۱۳۹۹';
		WHEN 1400 THEN RETURN '۱۴۰۰';
		WHEN 1401 THEN RETURN '۱۴۰۱';
		WHEN 1402 THEN RETURN '۱۴۰۲';
		WHEN 1403 THEN RETURN '۱۴۰۳';
		WHEN 1404 THEN RETURN '۱۴۰۴';
		WHEN 1405 THEN RETURN '۱۴۰۵';
		WHEN 1406 THEN RETURN '۱۴۰۶';
		WHEN 1407 THEN RETURN '۱۴۰۷';
		WHEN 1408 THEN RETURN '۱۴۰۸';
		WHEN 1409 THEN RETURN '۱۴۰۹';
		WHEN 1410 THEN RETURN '۱۴۱۰';
		WHEN 1411 THEN RETURN '۱۴۱۱';
		WHEN 1412 THEN RETURN '۱۴۱۲';
		WHEN 1413 THEN RETURN '۱۴۱۳';
		WHEN 1414 THEN RETURN '۱۴۱۴';
		WHEN 1415 THEN RETURN '۱۴۱۵';
		WHEN 1416 THEN RETURN '۱۴۱۶';
		WHEN 1417 THEN RETURN '۱۴۱۷';
		WHEN 1418 THEN RETURN '۱۴۱۸';
		WHEN 1419 THEN RETURN '۱۴۱۹';
		WHEN 1420 THEN RETURN '۱۴۲۰';
	END CASE;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `gdate`(`jy` smallint, `jm` smallint, `jd` smallint) RETURNS datetime
BEGIN
# Copyright (C) 2011-2012 Mehran . M . Spitman
# WebLog :spitman.azdaa.com
# Version V1.0.1

	DECLARE
		i, j, e, k, mo,
		gy, gm, gd,
		g_day_no, j_day_no, bkab, jmm, mday, g_day_mo, bkab1, j1
	INT DEFAULT 0; /* Can be unsigned int? */
	DECLARE resout char(100);
	DECLARE fdate datetime;

	
  SET bkab = __mymod(jy,33);

  IF (bkab = 1 or bkab= 5 or bkab = 9 or bkab = 13 or bkab = 17 or bkab = 22 or bkab = 26 or bkab = 30) THEN
    SET j=1;
  end IF;

  SET bkab1 = __mymod(jy+1,33);

  IF (bkab1 = 1 or bkab1= 5 or bkab1 = 9 or bkab1 = 13 or bkab1 = 17 or bkab1 = 22 or bkab1 = 26 or bkab1 = 30) THEN
    SET j1=1;
  end IF;

	CASE jm
		WHEN 1 THEN IF jd > _jdmarray2(jm) or jd <= 0 THEN SET e=1; end IF;
		WHEN 2 THEN IF jd > _jdmarray2(jm) or jd <= 0 THEN SET e=1; end IF;
		WHEN 3 THEN IF jd > _jdmarray2(jm) or jd <= 0 THEN SET e=1; end IF;
		WHEN 4 THEN IF jd > _jdmarray2(jm) or jd <= 0 THEN SET e=1; end IF;
		WHEN 5 THEN IF jd > _jdmarray2(jm) or jd <= 0 THEN SET e=1; end IF;
		WHEN 6 THEN IF jd > _jdmarray2(jm) or jd <= 0 THEN SET e=1; end IF;
		WHEN 7 THEN IF jd > _jdmarray2(jm) or jd <= 0 THEN SET e=1; end IF;
		WHEN 8 THEN IF jd > _jdmarray2(jm) or jd <= 0 THEN SET e=1; end IF;
		WHEN 9 THEN IF jd > _jdmarray2(jm) or jd <= 0 THEN SET e=1; end IF;
		WHEN 10 THEN IF jd > _jdmarray2(jm) or jd <= 0 THEN SET e=1; end IF;
		WHEN 11 THEN IF jd > _jdmarray2(jm) or jd <= 0 THEN SET e=1; end IF;
		WHEN 12 THEN IF jd > _jdmarray2(jm)+j or jd <= 0 THEN SET e=1; end IF;
	END CASE;
  IF jm > 12 or jm <= 0 THEN SET e=1; end IF;
  IF jy <= 0 THEN SET e=1; end IF;

  IF e>0 THEN
    RETURN 0;
  end IF;

  IF (jm>=11) or (jm=10 and jd>=11 and j=0) or (jm=10 and jd>11 and j=1) THEN
    SET i=1;
  end IF;
  SET gy = jy + 621 + i;

  IF (__mymod(gy,4)=0) THEN
    SET k=1;
  end IF;
	
	IF (__mymod(gy,100)=0) and (__mymod(gy,400)<>0) THEN
		SET k=0;
	END IF;

  SET jmm=jm-1;

  WHILE (jmm > 0) do
    SET mday=mday+_jdmarray2(jmm);
    SET jmm=jmm-1;
  end WHILE;

  SET j_day_no=(jy-1)*365+(__mydiv(jy,4))+mday+jd;
  SET g_day_no=j_day_no+226899;


  SET g_day_no=g_day_no-(__mydiv(gy-1,4));
  SET g_day_mo=__mymod(g_day_no,365);

	IF (k=1 and j=1) THEN
		IF (g_day_mo=0) THEN
			RETURN CONCAT_WS('-',gy,'12','30');
		END IF;
		IF (g_day_mo=1) THEN
			RETURN CONCAT_WS('-',gy,'12','31');
		END IF;
	END IF;

	IF (g_day_mo=0) THEN
		RETURN CONCAT_WS('-',gy,'12','31');
	END IF;
			

  SET mo=0;
  SET gm=gm+1;
  while g_day_mo>_gdmarray2(mo,k) do
		SET g_day_mo=g_day_mo-_gdmarray2(mo,k);
    SET mo=mo+1;
    SET gm=gm+1;
  end WHILE;
  SET gd=g_day_mo;

  RETURN CONCAT_WS('-',gy,gm,gd);
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `gdatestr`(`jdat` CHAR(20)) RETURNS datetime
BEGIN
# Copyright (C) 2011-2012 Mehran . M . Spitman
# WebLog spitman.azdaa.com
# Version V1.0.1

	DECLARE
		i, j, e, k, mo,
		gy, gm, gd,
		g_day_no, j_day_no, bkab, jmm, mday, g_day_mo, jd, jy, jm,bkab1,j1
	INT DEFAULT 0; /* ### Can't be unsigned int! ### */
	DECLARE resout char(100);
	DECLARE jdd, jyd, jmd, jt varchar(100);
	DECLARE fdate datetime;

	SET jdd = SUBSTRING_INDEX(jdat, '/', -1);
	SET jt = SUBSTRING_INDEX(jdat, '/', 2);
	SET jyd = SUBSTRING_INDEX(jt, '/', 1);
	SET jmd = SUBSTRING_INDEX(jt, '/', -1);
	SET jd = CAST(jdd as SIGNED);
	SET jy = CAST(jyd as SIGNED);
	SET jm = CAST(jmd as SIGNED);


	 SET bkab = __mymod(jy,33);

  IF (bkab = 1 or bkab= 5 or bkab = 9 or bkab = 13 or bkab = 17 or bkab = 22 or bkab = 26 or bkab = 30) THEN
    SET j=1;
  end IF;

  SET bkab1 = __mymod(jy+1,33);

  IF (bkab1 = 1 or bkab1= 5 or bkab1 = 9 or bkab1 = 13 or bkab1 = 17 or bkab1 = 22 or bkab1 = 26 or bkab1 = 30) THEN
    SET j1=1;
  end IF;

	CASE jm
		WHEN 1 THEN IF jd > _jdmarray2(jm) or jd <= 0 THEN SET e=1; end IF;
		WHEN 2 THEN IF jd > _jdmarray2(jm) or jd <= 0 THEN SET e=1; end IF;
		WHEN 3 THEN IF jd > _jdmarray2(jm) or jd <= 0 THEN SET e=1; end IF;
		WHEN 4 THEN IF jd > _jdmarray2(jm) or jd <= 0 THEN SET e=1; end IF;
		WHEN 5 THEN IF jd > _jdmarray2(jm) or jd <= 0 THEN SET e=1; end IF;
		WHEN 6 THEN IF jd > _jdmarray2(jm) or jd <= 0 THEN SET e=1; end IF;
		WHEN 7 THEN IF jd > _jdmarray2(jm) or jd <= 0 THEN SET e=1; end IF;
		WHEN 8 THEN IF jd > _jdmarray2(jm) or jd <= 0 THEN SET e=1; end IF;
		WHEN 9 THEN IF jd > _jdmarray2(jm) or jd <= 0 THEN SET e=1; end IF;
		WHEN 10 THEN IF jd > _jdmarray2(jm) or jd <= 0 THEN SET e=1; end IF;
		WHEN 11 THEN IF jd > _jdmarray2(jm) or jd <= 0 THEN SET e=1; end IF;
		WHEN 12 THEN IF jd > _jdmarray2(jm)+j or jd <= 0 THEN SET e=1; end IF;
	END CASE;
  IF jm > 12 or jm <= 0 THEN SET e=1; end IF;
  IF jy <= 0 THEN SET e=1; end IF;

  IF e>0 THEN
    RETURN 0;
  end IF;

  IF (jm>=11) or (jm=10 and jd>=11 and j=0) or (jm=10 and jd>11 and j=1) THEN
    SET i=1;
  end IF;
  SET gy = jy + 621 + i;

  IF (__mymod(gy,4)=0) THEN
    SET k=1;
  end IF;
	
	IF (__mymod(gy,100)=0) and (__mymod(gy,400)<>0) THEN
		SET k=0;
	END IF;

  SET jmm=jm-1;

  WHILE (jmm > 0) do
    SET mday=mday+_jdmarray2(jmm);
    SET jmm=jmm-1;
  end WHILE;

  SET j_day_no=(jy-1)*365+(__mydiv(jy,4))+mday+jd;
  SET g_day_no=j_day_no+226899;


  SET g_day_no=g_day_no-(__mydiv(gy-1,4));
  SET g_day_mo=__mymod(g_day_no,365);

	IF (k=1 and j=1) THEN
		IF (g_day_mo=0) THEN
			RETURN CONCAT_WS('-',gy,'12','30');
		END IF;
		IF (g_day_mo=1) THEN
			RETURN CONCAT_WS('-',gy,'12','31');
		END IF;
	END IF;

	IF (g_day_mo=0) THEN
		RETURN CONCAT_WS('-',gy,'12','31');
	END IF;
			

  SET mo=0;
  SET gm=gm+1;
  while g_day_mo>_gdmarray2(mo,k) do
		SET g_day_mo=g_day_mo-_gdmarray2(mo,k);
    SET mo=mo+1;
    SET gm=gm+1;
  end WHILE;
  SET gd=g_day_mo;

  RETURN CONCAT_WS('-',gy,gm,gd);
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `pdate`(`gdate` DATETIME) RETURNS varchar(100) CHARSET latin1
BEGIN
# Copyright (C) 2009-2012 Mohammad Saleh Souzanchi
# WebLog : www.saleh.soozanchi.ir
# Version V1.0.2

	DECLARE 
		i,
		gy, gm, gd,
		g_day_no, j_day_no, j_np,
		jy, jm, jd INT DEFAULT 0; /* Can be unsigned int? */
	DECLARE resout char(100);
	DECLARE ttime CHAR(20);
	DECLARE jy1 CHAR(4);
	DECLARE jm1,jd1 CHAR(2);

	SET gy = YEAR(gdate) - 1600;
	SET gm = MONTH(gdate) - 1;
	SET gd = DAY(gdate) - 1;
	SET ttime = TIME(gdate);
	SET g_day_no = ((365 * gy) + __mydiv(gy + 3, 4) - __mydiv(gy + 99, 100) + __mydiv (gy + 399, 400));
	SET i = 0;

	WHILE (i < gm) do
		SET g_day_no = g_day_no + _gdmarray(i);
		SET i = i + 1; 
	END WHILE;

	IF gm > 1 and ((gy % 4 = 0 and gy % 100 <> 0)) or gy % 400 = 0 THEN 
		SET g_day_no =	g_day_no + 1;
	END IF;
	
	SET g_day_no = g_day_no + gd; 
	SET j_day_no = g_day_no - 79;
	SET j_np = j_day_no DIV 12053;
	SET j_day_no = j_day_no % 12053;
	SET jy = 979 + 33 * j_np + 4 * __mydiv(j_day_no, 1461);
	SET j_day_no = j_day_no % 1461;

	IF j_day_no >= 366 then 
		SET jy = jy + __mydiv(j_day_no - 1, 365);
		SET j_day_no = (j_day_no - 1) % 365;
	END IF;

	SET i = 0;

	WHILE (i < 11 and j_day_no >= _jdmarray(i)) do
		SET j_day_no = j_day_no - _jdmarray(i);
		SET i = i + 1;
	END WHILE;

	SET jm = i + 1;
	SET jd = j_day_no + 1;
	SET resout = CONCAT_WS ('/', jy, jm, jd);

	IF (ttime <> '00:00:00') then
		SET resout = CONCAT_WS(' ', resout, ttime);
	END IF;

	RETURN resout;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `pday`(`gdate` DATETIME) RETURNS char(100) CHARSET utf8mb4
BEGIN
# Copyright (C) 2011-2012 Mohammad Saleh Souzanchi, Mehran . M . Spitman
# WebLog : www.saleh.soozanchi.ir, spitman.azdaa.com
# Version V1.0.1

	DECLARE
		i,
		gy, gm, gd,
		g_day_no, j_day_no, j_np,
		jy, jm, jd INT DEFAULT 0; /* Can be unsigned int? */
	DECLARE resout char(100);
	DECLARE ttime CHAR(20);

	SET gy = YEAR(gdate) - 1600;
	SET gm = MONTH(gdate) - 1;
	SET gd = DAY(gdate) - 1;
	SET ttime = TIME(gdate);
	SET g_day_no = ((365 * gy) + __mydiv(gy + 3, 4) - __mydiv(gy + 99 , 100) + __mydiv(gy + 399, 400));
	SET i = 0;

	WHILE (i < gm) do
		SET g_day_no = g_day_no + _gdmarray(i);
		SET i = i + 1;
	END WHILE;

	IF gm > 1 and ((gy % 4 = 0 and gy % 100 <> 0)) or gy % 400 = 0 THEN
		SET g_day_no = g_day_no + 1;
	END IF;
	
	SET g_day_no = g_day_no + gd;
	SET j_day_no = g_day_no - 79;
	SET j_np = j_day_no DIV 12053;
	SET j_day_no = j_day_no % 12053;
	SET jy = 979 + 33 * j_np + 4 * __mydiv(j_day_no, 1461);
	SET j_day_no = j_day_no % 1461;

	IF j_day_no >= 366 then
		SET jy = jy + __mydiv(j_day_no - 1, 365);
		SET j_day_no = (j_day_no-1) % 365;
	END IF;

	SET i = 0;

	WHILE (i < 11 and j_day_no >= _jdmarray(i)) do
		SET j_day_no = j_day_no - _jdmarray(i);
		SET i = i + 1;
	END WHILE;

	SET jm = i + 1;
	SET jd = j_day_no + 1;
	RETURN jd;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `PMONTH`(`gdate` datetime) RETURNS char(100) CHARSET utf8
BEGIN
# Copyright (C) 2009-2012 Mohammad Saleh Souzanchi
# WebLog : www.saleh.soozanchi.ir
# Version V1.0.2

	DECLARE 
		i,
		gy, gm, gd,
		g_day_no, j_day_no, j_np,
		jy, jm, jd INT DEFAULT 0; /* Can be unsigned int? */
	DECLARE resout char(100);
	DECLARE ttime CHAR(20);

	SET gy = YEAR(gdate) - 1600;
	SET gm = MONTH(gdate) - 1;
	SET gd = DAY(gdate) - 1;
	SET ttime = TIME(gdate);
	SET g_day_no = ((365 * gy) + __mydiv(gy + 3, 4) - __mydiv(gy + 99, 100) + __mydiv(gy + 399, 400));
	SET i = 0;

	WHILE (i < gm) do
		SET g_day_no = g_day_no + _gdmarray(i);
		SET i = i + 1; 
	END WHILE;

	IF gm > 1 and ((gy % 4 = 0 and gy % 100 <> 0)) or gy % 400 = 0 THEN 
		SET g_day_no = g_day_no + 1;
	END IF;
	
	SET g_day_no = g_day_no + gd;
	SET j_day_no = g_day_no - 79;
	SET j_np = j_day_no DIV 12053;
	set j_day_no = j_day_no % 12053;
	SET jy = 979 + 33 * j_np + 4 * __mydiv(j_day_no, 1461);
	SET j_day_no = j_day_no % 1461;

	IF j_day_no >= 366 then 
		SET jy = jy + __mydiv(j_day_no - 1, 365);
		SET j_day_no =(j_day_no - 1) % 365;
	END IF;

	SET i = 0;

	WHILE (i < 11 and j_day_no >= _jdmarray(i)) do
		SET j_day_no = j_day_no - _jdmarray(i);
		SET i = i + 1;
	END WHILE;

	SET jm = i + 1;
	SET jd = j_day_no + 1;
	RETURN jm;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `pmonthname`(`gdate` datetime) RETURNS varchar(100) CHARSET utf8
BEGIN
# Copyright (C) 2009-2012 Mohammad Saleh Souzanchi
# WebLog : www.saleh.soozanchi.ir
# Version V1.0.1

	CASE PMONTH(gdate)
		WHEN 1 THEN RETURN 'فروردين';
		WHEN 2 THEN RETURN 'ارديبهشت';
		WHEN 3 THEN	RETURN 'خرداد';
		WHEN 4 THEN	RETURN 'تير';
		WHEN 5 THEN	RETURN 'مرداد';
		WHEN 6 THEN	RETURN 'شهريور';
		WHEN 7 THEN	RETURN 'مهر';
		WHEN 8 THEN	RETURN 'آبان';
		WHEN 9 THEN	RETURN 'آذر';
		WHEN 10 THEN RETURN	'دي';
		WHEN 11 THEN RETURN	'بهمن';
		WHEN 12 THEN RETURN	'اسفند';
	END CASE;

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `pyear`(`gdate` datetime) RETURNS char(100) CHARSET utf8
BEGIN
# Copyright (C) 2009-2012 Mohammad Saleh Souzanchi
# WebLog : www.saleh.soozanchi.ir
# Version V1.0.1

	DECLARE
		i,
		gy, gm, gd,
		g_day_no, j_day_no, j_np,
		jy, jm, jd INT DEFAULT 0; /* Can be unsigned int? */
	DECLARE resout char(100);
	DECLARE ttime CHAR(20);

	SET gy = YEAR(gdate) - 1600;
	SET gm = MONTH(gdate) - 1;
	SET gd = DAY(gdate) - 1;
	SET ttime = TIME(gdate);
	SET g_day_no = ((365 * gy) + __mydiv(gy + 3, 4) - __mydiv(gy + 99, 100) + __mydiv(gy + 399, 400));
	SET i = 0;

	WHILE (i < gm) do
		SET g_day_no = g_day_no + _gdmarray(i);
		SET i = i + 1;
	END WHILE;

	IF gm > 1 and ((gy % 4 = 0 and gy % 100 <> 0)) or gy % 400 = 0 THEN
		SET g_day_no =	g_day_no + 1;
	END IF;
	
	SET g_day_no = g_day_no + gd;
	SET j_day_no = g_day_no - 79;
	SET j_np = j_day_no DIV 12053;
	set j_day_no = j_day_no % 12053;
	SET jy = 979 + 33 * j_np + 4 * __mydiv(j_day_no, 1461);
	SET j_day_no = j_day_no % 1461;

	IF j_day_no >= 366 then
		SET jy = jy + __mydiv(j_day_no - 1, 365);
		SET j_day_no = (j_day_no - 1) % 365;
	END IF;

	SET i = 0;

	WHILE (i < 11 and j_day_no >= _jdmarray(i)) do
		SET j_day_no = j_day_no - _jdmarray(i);
		SET i = i + 1;
	END WHILE;

	SET jm = i + 1;
	SET jd = j_day_no + 1;
	RETURN jy;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `toeng`(`input` CHAR CHARSET utf8mb4) RETURNS char(1) CHARSET latin1
    NO SQL
BEGIN
CASE input
		WHEN '۱' THEN RETURN '1';
		WHEN '۲' THEN RETURN '2';
		WHEN '۳' THEN RETURN '3';
		WHEN '۴' THEN RETURN '4';
		WHEN '۵' THEN RETURN '5';
		WHEN '۶' THEN RETURN '6';
		WHEN '۷' THEN RETURN '7';
		WHEN '۸' THEN RETURN '8';
		WHEN '۹' THEN RETURN '9';
		WHEN '۰' THEN RETURN '0';
	END CASE;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `tofa`(`input` CHAR CHARSET utf8mb4) RETURNS char(1) CHARSET utf8mb4
    NO SQL
BEGIN
CASE input
		WHEN '1' THEN RETURN '۱';
		WHEN '2' THEN RETURN '۲';
		WHEN '3' THEN RETURN '۳';
		WHEN '4' THEN RETURN '۴';
		WHEN '5' THEN RETURN '۵';
		WHEN '6' THEN RETURN '۶';
		WHEN '7' THEN RETURN '۷';
		WHEN '8' THEN RETURN '۸';
		WHEN '9' THEN RETURN '۹';
		WHEN '0' THEN RETURN '۰';
	END CASE;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `_gdmarray`(`m` smallint) RETURNS smallint(2)
BEGIN
# Copyright (C) 2009-2012 Mohammad Saleh Souzanchi
# WebLog : www.saleh.soozanchi.ir
# Version V1.0.1

	CASE m
		WHEN 0 THEN RETURN 31;
		WHEN 1 THEN RETURN 28;
		WHEN 2 THEN RETURN 31;
		WHEN 3 THEN RETURN 30;
		WHEN 4 THEN RETURN 31;
		WHEN 5 THEN RETURN 30;
		WHEN 6 THEN RETURN 31;
		WHEN 7 THEN RETURN 31;
		WHEN 8 THEN RETURN 30;
		WHEN 9 THEN RETURN 31;
		WHEN 10 THEN RETURN 30;
		WHEN 11 THEN RETURN 31;
	END CASE;

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `_gdmarray2`(`m` smallint, `k` SMALLINT) RETURNS smallint(2)
BEGIN
# Copyright (C) 2011-2012  Mehran . M . Spitman
# WebLog :spitman.azdaa.com
# Version V1.0

	CASE m
		WHEN 0 THEN RETURN 31;
		WHEN 1 THEN RETURN 28+k;
		WHEN 2 THEN RETURN 31;
		WHEN 3 THEN RETURN 30;
		WHEN 4 THEN RETURN 31;
		WHEN 5 THEN RETURN 30;
		WHEN 6 THEN RETURN 31;
		WHEN 7 THEN RETURN 31;
		WHEN 8 THEN RETURN 30;
		WHEN 9 THEN RETURN 31;
		WHEN 10 THEN RETURN 30;
		WHEN 11 THEN RETURN 31;
	END CASE;
   

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `_jdmarray`(`m` smallint) RETURNS smallint(2)
BEGIN
# Copyright (C) 2009-2012 Mohammad Saleh Souzanchi
# WebLog : www.saleh.soozanchi.ir
# Version V1.0.1

	CASE m
		WHEN 0 THEN RETURN 31;
		WHEN 1 THEN RETURN 31;
		WHEN 2 THEN RETURN 31;
		WHEN 3 THEN RETURN 31;
		WHEN 4 THEN RETURN 31;
		WHEN 5 THEN RETURN 31;
		WHEN 6 THEN RETURN 30;
		WHEN 7 THEN RETURN 30;
		WHEN 8 THEN RETURN 30;
		WHEN 9 THEN RETURN 30;
		WHEN 10 THEN RETURN 30;
		WHEN 11 THEN RETURN 29;
	END CASE;

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `_jdmarray2`(`m` smallint) RETURNS smallint(2)
BEGIN
# Copyright (C) 2011-2012 Mehran . M . Spitman
# WebLog :spitman.azdaa.com
# Version V1.0.1

	CASE m
		WHEN 1 THEN RETURN 31;
		WHEN 2 THEN RETURN 31;
		WHEN 3 THEN RETURN 31;
		WHEN 4 THEN RETURN 31;
		WHEN 5 THEN RETURN 31;
		WHEN 6 THEN RETURN 31;
		WHEN 7 THEN RETURN 30;
		WHEN 8 THEN RETURN 30;
		WHEN 9 THEN RETURN 30;
		WHEN 10 THEN RETURN 30;
		WHEN 11 THEN RETURN 30;
		WHEN 12 THEN RETURN 29;
	END CASE;

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `__mydiv`(`a` int, `b` int) RETURNS bigint(20)
BEGIN
# Copyright (C) 2009-2012 Mohammad Saleh Souzanchi
# WebLog : www.saleh.soozanchi.ir
# Version V1.0.2

	return FLOOR(a / b);
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `__mymod`(`a` int, `b` int) RETURNS bigint(20)
BEGIN
# Copyright (C) 2011-2012 Mehran . M . Spitman
# WebLog :spitman.azdaa.com
# Version V1.0.2

	return (a - b * FLOOR(a / b));
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `commentId` int(11) NOT NULL AUTO_INCREMENT,
  `SenderName` varchar(255) DEFAULT NULL,
  `SenderMail` varchar(255) NOT NULL,
  `ReceiverMail` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Body` longtext CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `SendDate` date NOT NULL,
  `SendTime` time NOT NULL,
  PRIMARY KEY (`commentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentId`, `SenderName`, `SenderMail`, `ReceiverMail`, `Category`, `Subject`, `Body`, `Status`, `SendDate`, `SendTime`) VALUES
(1, 'اکبر اکبری', 'akbari@yahoo.com', 'ali@yahoo.com', 'پیام', 'سلام', 'سلام \r\n\r\nسوالی درباره وضعیت فرزند خود دارم\r\nلطفا در اسرع وقت پاسخ دهید\r\n\r\nبا تشکر\r\n', 0, '2013-12-20', '20:20:00'),
(2, 'علی علوی', 'ali@yahoo.com', 'akbari@yahoo.com', 'انتقاد', 'پاسخ', 'سلام\r\n\r\nپیام شما مشاهده گردید\r\nپاسخ شما ارسال شد\r\n\r\nبا تشکر', 0, '2013-12-27', '08:08:00'),
(3, 'احمد احمدی', 'ahmadi@yahoo.com', 'ali@yahoo.com', 'پیشنهاد', 'یک پیشنهاد', 'با عرض سلام\r\n\r\nپیشنهادی درباره جوایز بچه ها دارم\r\n\r\nبا تشکر', 0, '2013-04-01', '06:09:00'),
(4, 'مسعود مسعودی', 'masoudi@yahoo.com', 'ali@yahoo.com', 'پیام', 'وضعیت دانش آموز احسان اکبری', 'با سلام\r\n\r\nوضعیت دانش آموز احسان اکبری در مدرسه به شرح زیر است :\r\n....\r\n\r\nبا تشکر از زحمات شما', 0, '2013-12-23', '00:00:00'),
(5, 'احمد احمدی', 'ahmadi@yahoo.com', 'ali@yahoo.com', 'انتقاد', 'یک انتقاد سازنده', 'با سلام\r\nاین یک انتقاد سازنده است\r\n\r\nبا تشکر', 0, '2013-04-01', '06:10:09'),
(7, 'فرهاد جلالی', 'jalali@yahoo.com', 'ahmadi@yahoo.com', 'پیام', 'سلام', 'خسته نباشید', 0, '2014-01-06', '16:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `googlemap`
--

CREATE TABLE IF NOT EXISTS `googlemap` (
  `Id` int(11) NOT NULL,
  `lat` decimal(18,15) NOT NULL DEFAULT '35.443140000000000',
  `lng` decimal(18,15) NOT NULL DEFAULT '51.300844000000000',
  UNIQUE KEY `id` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `googlemap`
--

INSERT INTO `googlemap` (`Id`, `lat`, `lng`) VALUES
(3, '35.443140000000000', '54.300844000000000'),
(9, '35.443140000000000', '51.300844000000000'),
(10, '35.443140000000000', '51.300844000000000'),
(11, '35.443140000000000', '51.300844000000000');

-- --------------------------------------------------------

--
-- Table structure for table `mosactivities`
--

CREATE TABLE IF NOT EXISTS `mosactivities` (
  `mosqueId` int(11) NOT NULL,
  `actId` int(11) NOT NULL,
  `counter` int(11) NOT NULL DEFAULT '0',
  `weekstart` varchar(10) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`mosqueId`,`actId`,`weekstart`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mosactivities`
--

INSERT INTO `mosactivities` (`mosqueId`, `actId`, `counter`, `weekstart`) VALUES
(3, 1, 3, ''),
(3, 1, 2, '۱۳۹۲/۱۰/۱۴'),
(3, 2, 1, ''),
(3, 2, 1, '۱۳۹۲/۱۰/۱۴'),
(3, 2, 7, '۱۳۹۲/۱۰/۲۱'),
(3, 3, 4, ''),
(3, 3, 1, '۱۳۹۲/۱۰/۱۴'),
(3, 4, 2, ''),
(3, 4, 1, '۱۳۹۲/۱۰/۱۴'),
(3, 5, 13, ''),
(3, 5, 1, '۱۳۹۲/۱۰/۱۴');

-- --------------------------------------------------------

--
-- Table structure for table `moscolact`
--

CREATE TABLE IF NOT EXISTS `moscolact` (
  `mosqueId` int(11) NOT NULL,
  `actId` int(11) NOT NULL,
  `actda` varchar(20) CHARACTER SET utf8 NOT NULL,
  `actcount` int(11) NOT NULL,
  PRIMARY KEY (`mosqueId`,`actId`,`actda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moscolact`
--

INSERT INTO `moscolact` (`mosqueId`, `actId`, `actda`, `actcount`) VALUES
(1, 2, '۱۳۹۲/۱۰', 1),
(3, 1, '۱۳۹۲/۱۰/۰۱', 1),
(3, 1, '۱۳۹۲/۱۰/۱۰', 2),
(3, 1, '۱۳۹۲/۱۰/۱۸', 2),
(3, 1, '۱۳۹۲/۱۰/۲۶', 1),
(3, 2, '۱۳۹۲/۱۰/۱۰', 2),
(3, 2, '۱۳۹۲/۱۰/۱۱', 1),
(3, 2, '۱۳۹۲/۱۰/۲۵', 2),
(3, 2, '۱۳۹۲/۱۰/۲۶', 1),
(3, 3, '۱۳۹۲/۱۰/۰۵', 1),
(3, 3, '۱۳۹۲/۱۰/۲۵', 1);

--
-- Triggers `moscolact`
--
DROP TRIGGER IF EXISTS `moscolact_month_insert`;
DELIMITER //
CREATE TRIGGER `moscolact_month_insert` AFTER INSERT ON `moscolact`
 FOR EACH ROW Begin
insert mosmonth(mosqueId,actId,counter,monthstart) values ( new.mosqueId,new.actId,new.actcount,new.actda) ON DUPLICATE KEY UPDATE counter=counter+1;
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `moscolact_month_update`;
DELIMITER //
CREATE TRIGGER `moscolact_month_update` AFTER UPDATE ON `moscolact`
 FOR EACH ROW insert mosmonth(mosqueId,actId,counter,monthstart) values ( new.mosqueId,new.actId,new.actcount,new.actda) ON DUPLICATE KEY UPDATE counter=counter+1
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `mosmonth`
--

CREATE TABLE IF NOT EXISTS `mosmonth` (
  `mosqueId` int(11) NOT NULL,
  `actId` int(11) NOT NULL,
  `counter` int(11) NOT NULL,
  `monthstart` varchar(7) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`mosqueId`,`actId`,`monthstart`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mosmonth`
--

INSERT INTO `mosmonth` (`mosqueId`, `actId`, `counter`, `monthstart`) VALUES
(1, 2, 1, '۱۳۹۲/۱۰'),
(3, 2, 3, '۱۳۹۲/۱۰'),
(3, 3, 3, '۱۳۹۲/۱۰');

-- --------------------------------------------------------

--
-- Table structure for table `mosqueculturalliablee`
--

CREATE TABLE IF NOT EXISTS `mosqueculturalliablee` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `family` varchar(255) NOT NULL,
  `mosqueName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tel` int(11) NOT NULL,
  `mobile` int(11) DEFAULT NULL,
  `mosqueAddress` text NOT NULL,
  `image` blob,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `regdate` varchar(10) NOT NULL DEFAULT '۱۳۹۲/۱۰/۱۶',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `mosqueculturalliablee`
--

INSERT INTO `mosqueculturalliablee` (`Id`, `name`, `family`, `mosqueName`, `email`, `password`, `tel`, `mobile`, `mosqueAddress`, `image`, `status`, `regdate`) VALUES
(3, 'احمد', 'احمدی', 'حقانی', 'ahmadi@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 987, NULL, 'چهار راه فرهنگ', 0x3d3f5554462d383f423f3f3d, 1, '۱۳۹۲/۱۰/۱۶'),
(9, 'جعفر', 'مجیدی', 'شفا', 'majidi@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 956, 63542, 'ولیعصر', 0x3d3f5554462d383f423f3f3d, 1, '۱۳۹۲/۱۰/۱۶'),
(10, 'حسین', 'حسینی', 'قائم آل محمد', 'hoseini@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 756, 2587, 'میدان شهداء', 0x3d3f5554462d383f423f3f3d, 1, '۱۳۹۲/۱۰/۱۶'),
(11, 'علی', 'علوی', 'امام علی', 'ali@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 222, 222, 'بزرگراه امام علی', 0x3d3f5554462d383f423f3f3d, 0, '۱۳۹۲/۱۰/۱۶');

--
-- Triggers `mosqueculturalliablee`
--
DROP TRIGGER IF EXISTS `initiate`;
DELIMITER //
CREATE TRIGGER `initiate` BEFORE INSERT ON `mosqueculturalliablee`
 FOR EACH ROW set new.regdate=fardate(pdate(now()))
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE IF NOT EXISTS `parent` (
  `parentCode` int(11) NOT NULL,
  `parentName` varchar(255) NOT NULL,
  `parentFamily` varchar(255) NOT NULL,
  `homePhone` int(11) NOT NULL,
  `mobileNum` int(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`parentCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parentCode`, `parentName`, `parentFamily`, `homePhone`, `mobileNum`, `password`, `email`) VALUES
(1000100010, 'اکبر', 'اکبری', 222, 0, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'akbari@yahoo.com'),
(2147483647, 'رضا', 'رحمتی', 987, 12, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'rahmati@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `participantcounter`
--

CREATE TABLE IF NOT EXISTS `participantcounter` (
  `Id` int(11) NOT NULL,
  `counter` int(11) NOT NULL DEFAULT '0',
  `weekstart` varchar(10) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`Id`,`weekstart`),
  KEY `id` (`Id`),
  KEY `Id_2` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participantcounter`
--

INSERT INTO `participantcounter` (`Id`, `counter`, `weekstart`) VALUES
(3, 1, '۱۳۹۲/۱۰/۱۴');

-- --------------------------------------------------------

--
-- Table structure for table `point`
--

CREATE TABLE IF NOT EXISTS `point` (
  `actId` int(11) NOT NULL,
  `stCode` int(10) NOT NULL,
  `pcounter` int(11) NOT NULL,
  `da` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`actId`,`stCode`,`da`),
  KEY `point_ibfk_1` (`actId`),
  KEY `stCode` (`stCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `point`
--

INSERT INTO `point` (`actId`, `stCode`, `pcounter`, `da`) VALUES
(1, 2147481647, 1, '۱۳۹۲/۱۰/۱۹'),
(1, 2147483647, 1, '۱۳۹۲/۱۰/۱۹'),
(1, 2147483647, 1, '۱۳۹۲/۱۰/۲۶'),
(1, 2147483647, 1, '۱۳۹۳/۰۱/۱۱'),
(2, 2147481647, 1, '۱۳۹۲/۱۰/۱۹'),
(2, 2147483647, 60, '۱۳۹۲/۱۰/۲۲'),
(2, 2147483647, 40, '۱۳۹۲/۱۰/۲۵'),
(2, 2147483647, 7, '۱۳۹۲/۱۰/۲۶'),
(3, 2147481647, 1, '۱۳۹۲/۱۰/۱۹'),
(3, 2147483647, 1, '۱۳۹۲/۱۰/۲۶'),
(4, 2147481647, 1, '۱۳۹۲/۱۰/۲۰'),
(5, 2147481647, 1, '۱۳۹۲/۱۰/۲۰'),
(5, 2147483647, 1, '۱۳۹۲/۱۰/۱۹');

--
-- Triggers `point`
--
DROP TRIGGER IF EXISTS `point_week_insert`;
DELIMITER //
CREATE TRIGGER `point_week_insert` AFTER INSERT ON `point`
 FOR EACH ROW BEGIN
insert studentweek(stCode,actId,counter,weekstart) values ( new.stCode,new.actId,new.pcounter,fardate(pdate(date_sub(gdatestr(engdate(new.da)) , INTERVAL (weekday(gdatestr(engdate(new.da)))+2)%7 DAY)))) ON DUPLICATE KEY UPDATE counter=counter+new.pcounter;
update student set total=total+(new.pcounter) where (student.stCode=new.stCode);
update student set current=current+(new.pcounter) where (student.stCode=new.stCode);
insert schactivities(schoolId,actId,counter,weekstart) values ((select distinct schoolId from student where(student.stCode=new.stCode)),new.actId,new.pcounter,fardate(pdate(date_sub(gdatestr(engdate(new.da)) , INTERVAL (weekday(gdatestr(engdate(new.da)))+2)%7 DAY)))) ON DUPLICATE KEY UPDATE counter=counter+new.pcounter;
insert mosactivities(mosqueId,actId,counter,weekstart) values ((select distinct Id from student where(student.stCode=new.stCode)),new.actId,new.pcounter,fardate(pdate(date_sub(gdatestr(engdate(new.da)) , INTERVAL (weekday(gdatestr(engdate(new.da)))+2)%7 DAY)))) ON DUPLICATE KEY UPDATE counter=counter+new.pcounter;

END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `point_week_update`;
DELIMITER //
CREATE TRIGGER `point_week_update` BEFORE UPDATE ON `point`
 FOR EACH ROW begin
insert studentweek(stCode,actId,counter,weekstart) values ( new.stCode,new.actId,new.pcounter,fardate(pdate(date_sub(gdatestr(engdate(new.da)) , INTERVAL (weekday(gdatestr(engdate(new.da)))+2)%7 DAY)))) ON DUPLICATE KEY UPDATE counter=counter+(new.pcounter-old.pcounter);
update student set total=total+(new.pcounter-old.pcounter) where (student.stCode=new.stCode);
update student set total=total+(new.pcounter-old.pcounter) where (student.stCode=new.stCode);
insert schactivities(schoolId,actId,counter,weekstart) values ((select distinct schoolId from student where(student.stCode=new.stCode)),new.actId,new.pcounter,fardate(pdate(date_sub(gdatestr(engdate(new.da)) , INTERVAL (weekday(gdatestr(engdate(new.da)))+2)%7 DAY)))) ON DUPLICATE KEY UPDATE counter=counter+(new.pcounter-old.pcounter);
insert mosactivities(mosqueId,actId,counter,weekstart) values ((select distinct Id from student where(student.stCode=new.stCode)),new.actId,new.pcounter,fardate(pdate(date_sub(gdatestr(engdate(new.da)) , INTERVAL (weekday(gdatestr(engdate(new.da)))+2)%7 DAY)))) ON DUPLICATE KEY UPDATE counter=counter+(new.pcounter-old.pcounter);

end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `refrencepoint`
--

CREATE TABLE IF NOT EXISTS `refrencepoint` (
  `actId` int(11) NOT NULL AUTO_INCREMENT,
  `actPoint` int(11) NOT NULL,
  `actTopic` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL,
  `collective` tinyint(1) NOT NULL,
  PRIMARY KEY (`actId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `refrencepoint`
--

INSERT INTO `refrencepoint` (`actId`, `actPoint`, `actTopic`, `userID`, `collective`) VALUES
(1, 10, 'نماز جماعت ظهر و عصر', 1, 1),
(2, 10, 'نماز جماعت مغرب و عشا', 1, 1),
(3, 5, 'شرکت در جلسه هفتگی قرآن', 1, 1),
(4, 10, 'تکبیر گفتن', 1, 0),
(5, 5, 'کمک در حفظ نظافت مسجد', 1, 0),
(6, 5, 'رعایت انضباط در مدرسه', 2, 0),
(7, 10, 'کمک به همکلاسی ها در دروس', 2, 0),
(8, 10, 'کمک در انجام کارهای منزل', 3, 0),
(9, 5, 'تمیز و مرتب بودن', 3, 0),
(10, 5, 'انجام به موقع تکالیف', 3, 0),
(11, 15, 'شرکت در اردو', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reward`
--

CREATE TABLE IF NOT EXISTS `reward` (
  `rewardTopic` varchar(255) NOT NULL,
  `neededPoint` int(11) NOT NULL,
  `Id` int(11) NOT NULL,
  PRIMARY KEY (`rewardTopic`,`Id`),
  KEY `Id` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reward`
--

INSERT INTO `reward` (`rewardTopic`, `neededPoint`, `Id`) VALUES
('تی شرت', 400, 3),
('خودنویس', 300, 3),
('فلش', 2000, 3),
('لوازم التحریر', 100, 11),
('ماشین حساب', 1000, 3),
('میکروسکوپ', 1000, 11),
('نرم افزار قرآنی', 500, 11),
('کتاب داستان', 250, 11);

-- --------------------------------------------------------

--
-- Table structure for table `schactivities`
--

CREATE TABLE IF NOT EXISTS `schactivities` (
  `schoolId` int(11) NOT NULL,
  `actId` int(11) NOT NULL,
  `counter` int(11) NOT NULL DEFAULT '0',
  `weekstart` varchar(10) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`schoolId`,`actId`,`weekstart`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schactivities`
--

INSERT INTO `schactivities` (`schoolId`, `actId`, `counter`, `weekstart`) VALUES
(12356, 1, 2, '۱۳۹۲/۱۰/۱۴'),
(12356, 2, 1, '۱۳۹۲/۱۰/۱۴'),
(12356, 2, 7, '۱۳۹۲/۱۰/۲۱'),
(12356, 3, 1, '۱۳۹۲/۱۰/۱۴'),
(12356, 4, 1, '۱۳۹۲/۱۰/۱۴'),
(12356, 5, 1, '۱۳۹۲/۱۰/۱۴');

-- --------------------------------------------------------

--
-- Table structure for table `schcolact`
--

CREATE TABLE IF NOT EXISTS `schcolact` (
  `schoolId` int(11) NOT NULL,
  `actId` int(11) NOT NULL,
  `actda` varchar(20) CHARACTER SET utf8 NOT NULL,
  `actcount` int(11) NOT NULL,
  PRIMARY KEY (`schoolId`,`actId`,`actda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schcolact`
--

INSERT INTO `schcolact` (`schoolId`, `actId`, `actda`, `actcount`) VALUES
(6, 7, '۱۳۹۲/۱۰/۲۵', 2),
(12356, 11, '۱۳۹۲/۱۰/۱۰', 1);

--
-- Triggers `schcolact`
--
DROP TRIGGER IF EXISTS `schcol_month_insert`;
DELIMITER //
CREATE TRIGGER `schcol_month_insert` AFTER INSERT ON `schcolact`
 FOR EACH ROW insert schmonth(schoolId,actId,counter,monthstart) values ( new.schoolId,new.actId,new.actcount,new.actda) ON DUPLICATE KEY UPDATE counter=counter+1
//
DELIMITER ;
DROP TRIGGER IF EXISTS `schcol_month_update`;
DELIMITER //
CREATE TRIGGER `schcol_month_update` AFTER UPDATE ON `schcolact`
 FOR EACH ROW insert schmonth(schoolId,actId,counter,monthstart) values ( new.schoolId,new.actId,new.actcount,new.actda) ON DUPLICATE KEY UPDATE counter=counter+1
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `schmonth`
--

CREATE TABLE IF NOT EXISTS `schmonth` (
  `schoolId` int(11) NOT NULL,
  `actId` int(11) NOT NULL,
  `counter` int(11) NOT NULL,
  `monthstart` varchar(7) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`schoolId`,`actId`,`monthstart`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schmonth`
--

INSERT INTO `schmonth` (`schoolId`, `actId`, `counter`, `monthstart`) VALUES
(2, 7, 1, '۱۳۹۲/۱۰'),
(6, 7, 2, '۱۳۹۲/۱۰');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE IF NOT EXISTS `school` (
  `schoolId` int(11) NOT NULL,
  `schoolName` varchar(255) NOT NULL,
  `schoolPhone` int(11) NOT NULL,
  `schoolAddress` text NOT NULL,
  `teacherName` varchar(255) NOT NULL,
  `teacherFamily` varchar(255) NOT NULL,
  `teacherPhone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`schoolId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`schoolId`, `schoolName`, `schoolPhone`, `schoolAddress`, `teacherName`, `teacherFamily`, `teacherPhone`, `email`, `password`) VALUES
(777, 'پویا', 123, 'پاسداران', 'مسعود', 'مسعودی', 4544, 'masoudi@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(12356, 'شهید بهشتی', 1567, 'شهید مدنی', 'فرهاد', 'جلالی', 12569, 'jalali@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `stName` varchar(255) NOT NULL,
  `stFamily` varchar(255) NOT NULL,
  `fatherName` varchar(255) NOT NULL,
  `stCode` int(11) NOT NULL,
  `school` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthdate` varchar(20) DEFAULT NULL,
  `picture` blob,
  `parentCode` int(10) NOT NULL,
  `Id` int(11) NOT NULL,
  `schoolId` int(11) DEFAULT NULL,
  `regda` varchar(20) NOT NULL,
  `total` int(11) NOT NULL DEFAULT '0',
  `current` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`stCode`),
  KEY `student_ibfk_1` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stName`, `stFamily`, `fatherName`, `stCode`, `school`, `address`, `birthdate`, `picture`, `parentCode`, `Id`, `schoolId`, `regda`, `total`, `current`) VALUES
('مجید', 'مجیدی', 'ماجد', 2147481647, 'شهید بهشتی', 'خیابان فرجام', '۱۳۸۳/۱۰/۱۸', NULL, 1234211233, 3, 12356, '۱۳۹۲/۱۰/۱۶', 5, 5),
('مجید', 'مجیدی', 'ماجد', 2147483647, 'شهید بهشتی', 'خیابان فرجام', '۱۳۸۳/۱۰/۱۸', NULL, 1234211233, 3, 12356, '۱۳۹۲/۱۰/۱۶', 13, 1);

--
-- Triggers `student`
--
DROP TRIGGER IF EXISTS `participant_week_insert`;
DELIMITER //
CREATE TRIGGER `participant_week_insert` AFTER INSERT ON `student`
 FOR EACH ROW insert participantcounter(Id,counter,weekstart) values ( new.Id,1,fardate(pdate(date_sub(gdatestr(engdate(new.regda)) , INTERVAL (weekday(gdatestr(engdate(new.regda)))+2)%7 DAY)))) ON DUPLICATE KEY UPDATE counter=counter+1
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `studentweek`
--

CREATE TABLE IF NOT EXISTS `studentweek` (
  `stCode` int(10) NOT NULL,
  `actId` int(11) NOT NULL,
  `counter` int(11) NOT NULL,
  `weekstart` varchar(10) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`stCode`,`actId`,`weekstart`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentweek`
--

INSERT INTO `studentweek` (`stCode`, `actId`, `counter`, `weekstart`) VALUES
(2147481647, 1, 1, '۱۳۹۲/۱۰/۱۴'),
(2147481647, 2, 1, '۱۳۹۲/۱۰/۱۴'),
(2147481647, 3, 1, '۱۳۹۲/۱۰/۱۴'),
(2147481647, 4, 1, '۱۳۹۲/۱۰/۱۴'),
(2147481647, 5, 1, '۱۳۹۲/۱۰/۱۴'),
(2147483647, 1, 1, '۱۳۹۲/۱۰/۱۴'),
(2147483647, 1, 1, '۱۳۹۲/۱۰/۲۱'),
(2147483647, 2, 67, '۱۳۹۲/۱۰/۲۱'),
(2147483647, 3, 1, '۱۳۹۲/۱۰/۲۱');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `googlemap`
--
ALTER TABLE `googlemap`
  ADD CONSTRAINT `googlemap_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `mosqueculturalliablee` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `participantcounter`
--
ALTER TABLE `participantcounter`
  ADD CONSTRAINT `participantcounter_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `mosqueculturalliablee` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `point`
--
ALTER TABLE `point`
  ADD CONSTRAINT `point_ibfk_1` FOREIGN KEY (`actId`) REFERENCES `refrencepoint` (`actId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `point_ibfk_2` FOREIGN KEY (`stCode`) REFERENCES `student` (`stCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reward`
--
ALTER TABLE `reward`
  ADD CONSTRAINT `reward_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `mosqueculturalliablee` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `mosqueculturalliablee` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
