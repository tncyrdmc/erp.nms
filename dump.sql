 
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 68.178.143.40    Database: erpMultinivel
-- ------------------------------------------------------
-- Server version	5.5.43-37.2-log

 
--
-- Table structure for table `City`
--

DROP TABLE IF EXISTS `City`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `City` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` char(35) DEFAULT NULL,
  `CountryCode` char(3) DEFAULT NULL,
  `id_estate` int(11) DEFAULT NULL,
  `District` char(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=9084 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `City`
--

LOCK TABLES `City` WRITE;
/*!40000 ALTER TABLE `City` DISABLE KEYS */;
INSERT INTO `City` VALUES (4542,'Kabul','AFG',614,'Kabol'),(4543,'Qandahar','AFG',1041,'Qandahar'),(4544,'Herat','AFG',531,'Herat'),(4545,'Mazar-e-Sharif','AFG',166,'Balkh'),(4546,'Amsterdam','NLD',916,'Noord-Holland'),(4547,'Rotterdam','NLD',1420,'Zuid-Holland'),(4548,'Haag','NLD',1420,'Zuid-Holland'),(4549,'Utrecht','NLD',1329,'Utrecht'),(4550,'Eindhoven','NLD',915,'Noord-Brabant'),(4551,'Tilburg','NLD',915,'Noord-Brabant'),(4552,'Groningen','NLD',482,'Groningen'),(4553,'Breda','NLD',915,'Noord-Brabant'),(4554,'Apeldoorn','NLD',461,'Gelderland'),(4555,'Nijmegen','NLD',461,'Gelderland'),(4556,'Enschede','NLD',978,'Overijssel'),(4557,'Haarlem','NLD',916,'Noord-Holland'),(4558,'Almere','NLD',435,'Flevoland'),(4559,'Arnhem','NLD',461,'Gelderland'),(4560,'Zaanstad','NLD',916,'Noord-Holland'),(4561,'Â´s-Hertogenbosch','NLD',915,'Noord-Brabant'),(4562,'Amersfoort','NLD',1329,'Utrecht'),(4563,'Maastricht','NLD',743,'Limburg'),(4564,'Dordrecht','NLD',1420,'Zuid-Holland'),(4565,'Leiden','NLD',1420,'Zuid-Holland'),(4566,'Haarlemmermeer','NLD',916,'Noord-Holland'),(4567,'Zoetermeer','NLD',1420,'Zuid-Holland'),(4568,'Emmen','NLD',391,'Drenthe'),(4569,'Zwolle','NLD',978,'Overijssel'),(4570,'Ede','NLD',461,'Gelderland'),(4571,'Delft','NLD',1420,'Zuid-Holland'),(4572,'Heerlen','NLD',743,'Limburg'),(4573,'Alkmaar','NLD',916,'Noord-Holland'),(4574,'Willemstad','ANT',350,'CuraÃ§ao'),(4575,'Tirana','ALB',1278,'Tirana'),(4576,'Alger','DZA',64,'Alger'),(4577,'Oran','DZA',959,'Oran'),(4578,'Constantine','DZA',341,'Constantine'),(4579,'Annaba','DZA',85,'Annaba'),(4580,'Batna','DZA',186,'Batna'),(4581,'SÃ©tif','DZA',1141,'SÃ©tif'),(4582,'Sidi Bel AbbÃ¨s','DZA',1168,'Sidi Bel AbbÃ¨s'),(4583,'Skikda','DZA',1178,'Skikda'),(4584,'Biskra','DZA',213,'Biskra'),(4585,'Blida (el-Boulaida)','DZA',216,'Blida'),(4586,'BÃ©jaÃ¯a','DZA',193,'BÃ©jaÃ¯a'),(4587,'Mostaganem','DZA',861,'Mostaganem'),(4588,'TÃ©bessa','DZA',1256,'TÃ©bessa'),(4589,'Tlemcen (Tilimsen)','DZA',1281,'Tlemcen'),(4590,'BÃ©char','DZA',192,'BÃ©char'),(4591,'Tiaret','DZA',1273,'Tiaret'),(4592,'Ech-Chleff (el-Asnam)','DZA',319,'Chlef'),(4593,'GhardaÃ¯a','DZA',466,'GhardaÃ¯a'),(4594,'Tafuna','ASM',1308,'Tutuila'),(4595,'Fagatogo','ASM',1308,'Tutuila'),(4596,'Andorra la Vella','AND',81,'Andorra la Vella'),(4597,'Luanda','AGO',761,'Luanda'),(4598,'Huambo','AGO',553,'Huambo'),(4599,'Lobito','AGO',201,'Benguela'),(4600,'Benguela','AGO',201,'Benguela'),(4601,'Namibe','AGO',879,'Namibe'),(4602,'South Hill','AIA',133,'â€“'),(4603,'South Hill','AIA',134,'â€“'),(4604,'South Hill','AIA',135,'â€“'),(4605,'South Hill','AIA',136,'â€“'),(4606,'South Hill','AIA',137,'â€“'),(4607,'South Hill','AIA',138,'â€“'),(4608,'South Hill','AIA',139,'â€“'),(4609,'South Hill','AIA',140,'â€“'),(4610,'South Hill','AIA',141,'â€“'),(4611,'South Hill','AIA',142,'â€“'),(4612,'South Hill','AIA',143,'â€“'),(4613,'South Hill','AIA',144,'â€“'),(4614,'South Hill','AIA',145,'â€“'),(4615,'South Hill','AIA',146,'â€“'),(4616,'The Valley','AIA',133,'â€“'),(4617,'The Valley','AIA',134,'â€“'),(4618,'The Valley','AIA',135,'â€“'),(4619,'The Valley','AIA',136,'â€“'),(4620,'The Valley','AIA',137,'â€“'),(4621,'The Valley','AIA',138,'â€“'),(4622,'The Valley','AIA',139,'â€“'),(4623,'The Valley','AIA',140,'â€“'),(4624,'The Valley','AIA',141,'â€“'),(4625,'The Valley','AIA',142,'â€“'),(4626,'The Valley','AIA',143,'â€“'),(4627,'The Valley','AIA',144,'â€“'),(4628,'The Valley','AIA',145,'â€“'),(4629,'The Valley','AIA',146,'â€“'),(4630,'Saint JohnÂ´s','ATG',1201,'St John'),(4631,'Dubai','ARE',393,'Dubai'),(4632,'Abu Dhabi','ARE',13,'Abu Dhabi'),(4633,'Sharja','ARE',1161,'Sharja'),(4634,'al-Ayn','ARE',13,'Abu Dhabi'),(4635,'Ajman','ARE',26,'Ajman'),(4636,'Buenos Aires','ARG',374,'Distrito Federal'),(4637,'Buenos Aires','ARG',375,'Distrito Federal'),(4638,'Buenos Aires','ARG',376,'Distrito Federal'),(4639,'Buenos Aires','ARG',377,'Distrito Federal'),(4640,'La Matanza','ARG',241,'Buenos Aires'),(4641,'CÃ³rdoba','ARG',281,'CÃ³rdoba'),(4642,'CÃ³rdoba','ARG',282,'CÃ³rdoba'),(4643,'Rosario','ARG',1125,'Santa FÃ©'),(4644,'Lomas de Zamora','ARG',241,'Buenos Aires'),(4645,'Quilmes','ARG',241,'Buenos Aires'),(4646,'Almirante Brown','ARG',241,'Buenos Aires'),(4647,'La Plata','ARG',241,'Buenos Aires'),(4648,'Mar del Plata','ARG',241,'Buenos Aires'),(4649,'San Miguel de TucumÃ¡n','ARG',1303,'TucumÃ¡n'),(4650,'LanÃºs','ARG',241,'Buenos Aires'),(4651,'Merlo','ARG',241,'Buenos Aires'),(4652,'General San MartÃ­n','ARG',241,'Buenos Aires'),(4653,'Salta','ARG',1104,'Salta'),(4654,'Moreno','ARG',241,'Buenos Aires'),(4655,'Santa FÃ©','ARG',1125,'Santa FÃ©'),(4656,'Avellaneda','ARG',241,'Buenos Aires'),(4657,'Tres de Febrero','ARG',241,'Buenos Aires'),(4658,'MorÃ³n','ARG',241,'Buenos Aires'),(4659,'Florencio Varela','ARG',241,'Buenos Aires'),(4660,'San Isidro','ARG',241,'Buenos Aires'),(4661,'Tigre','ARG',241,'Buenos Aires'),(4662,'Malvinas Argentinas','ARG',241,'Buenos Aires'),(4663,'Vicente LÃ³pez','ARG',241,'Buenos Aires'),(4664,'Berazategui','ARG',241,'Buenos Aires'),(4665,'Corrientes','ARG',344,'Corrientes'),(4666,'San Miguel','ARG',241,'Buenos Aires'),(4667,'BahÃ­a Blanca','ARG',241,'Buenos Aires'),(4668,'Esteban EcheverrÃ­a','ARG',241,'Buenos Aires'),(4669,'Resistencia','ARG',300,'Chaco'),(4670,'JosÃ© C. Paz','ARG',241,'Buenos Aires'),(4671,'ParanÃ¡','ARG',415,'Entre Rios'),(4672,'Godoy Cruz','ARG',828,'Mendoza'),(4673,'Posadas','ARG',841,'Misiones'),(4674,'GuaymallÃ©n','ARG',828,'Mendoza'),(4675,'Santiago del Estero','ARG',1131,'Santiago del Estero'),(4676,'San Salvador de Jujuy','ARG',611,'Jujuy'),(4677,'Hurlingham','ARG',241,'Buenos Aires'),(4678,'NeuquÃ©n','ARG',894,'NeuquÃ©n'),(4679,'ItuzaingÃ³','ARG',241,'Buenos Aires'),(4680,'San Fernando','ARG',241,'Buenos Aires'),(4681,'Formosa','ARG',437,'Formosa'),(4682,'Las Heras','ARG',828,'Mendoza'),(4683,'La Rioja','ARG',720,'La Rioja'),(4684,'La Rioja','ARG',721,'La Rioja'),(4685,'San Fernando del Valle de Cata','ARG',277,'Catamarca'),(4686,'RÃ­o Cuarto','ARG',281,'CÃ³rdoba'),(4687,'RÃ­o Cuarto','ARG',282,'CÃ³rdoba'),(4688,'Comodoro Rivadavia','ARG',323,'Chubut'),(4689,'Mendoza','ARG',828,'Mendoza'),(4690,'San NicolÃ¡s de los Arroyos','ARG',241,'Buenos Aires'),(4691,'San Juan','ARG',1110,'San Juan'),(4692,'San Juan','ARG',1111,'San Juan'),(4693,'Escobar','ARG',241,'Buenos Aires'),(4694,'Concordia','ARG',415,'Entre Rios'),(4695,'Pilar','ARG',241,'Buenos Aires'),(4696,'San Luis','ARG',1112,'San Luis'),(4697,'Ezeiza','ARG',241,'Buenos Aires'),(4698,'San Rafael','ARG',828,'Mendoza'),(4699,'Tandil','ARG',241,'Buenos Aires'),(4700,'Yerevan','ARM',1403,'Yerevan'),(4701,'Gjumri','ARM',1424,'Å irak'),(4702,'Vanadzor','ARM',755,'Lori'),(4703,'Oranjestad','ABW',133,'â€“'),(4704,'Oranjestad','ABW',134,'â€“'),(4705,'Oranjestad','ABW',135,'â€“'),(4706,'Oranjestad','ABW',136,'â€“'),(4707,'Oranjestad','ABW',137,'â€“'),(4708,'Oranjestad','ABW',138,'â€“'),(4709,'Oranjestad','ABW',139,'â€“'),(4710,'Oranjestad','ABW',140,'â€“'),(4711,'Oranjestad','ABW',141,'â€“'),(4712,'Oranjestad','ABW',142,'â€“'),(4713,'Oranjestad','ABW',143,'â€“'),(4714,'Oranjestad','ABW',144,'â€“'),(4715,'Oranjestad','ABW',145,'â€“'),(4716,'Oranjestad','ABW',146,'â€“'),(4717,'Sydney','AUS',900,'New South Wales'),(4718,'Melbourne','AUS',1350,'Victoria'),(4719,'Brisbane','AUS',1054,'Queensland'),(4720,'Perth','AUS',1370,'West Australia'),(4721,'Adelaide','AUS',1188,'South Australia'),(4722,'Canberra','AUS',266,'Capital Region'),(4723,'Gold Coast','AUS',1054,'Queensland'),(4724,'Newcastle','AUS',900,'New South Wales'),(4725,'Central Coast','AUS',900,'New South Wales'),(4726,'Wollongong','AUS',900,'New South Wales'),(4727,'Hobart','AUS',1252,'Tasmania'),(4728,'Geelong','AUS',1350,'Victoria'),(4729,'Townsville','AUS',1054,'Queensland'),(4730,'Cairns','AUS',1054,'Queensland'),(4731,'Baku','AZE',162,'Baki'),(4732,'GÃ¤ncÃ¤','AZE',459,'GÃ¤ncÃ¤'),(4733,'Sumqayit','AZE',1220,'Sumqayit'),(4734,'MingÃ¤Ã§evir','AZE',837,'MingÃ¤Ã§evir'),(4735,'Nassau','BHS',899,'New Providence'),(4736,'al-Manama','BHR',42,'al-Manama'),(4737,'Dhaka','BGD',367,'Dhaka'),(4738,'Chittagong','BGD',318,'Chittagong'),(4739,'Khulna','BGD',673,'Khulna'),(4740,'Rajshahi','BGD',1064,'Rajshahi'),(4741,'Narayanganj','BGD',367,'Dhaka'),(4742,'Rangpur','BGD',1064,'Rajshahi'),(4743,'Mymensingh','BGD',367,'Dhaka'),(4744,'Barisal','BGD',178,'Barisal'),(4745,'Tungi','BGD',367,'Dhaka'),(4746,'Jessore','BGD',673,'Khulna'),(4747,'Comilla','BGD',318,'Chittagong'),(4748,'Nawabganj','BGD',1064,'Rajshahi'),(4749,'Dinajpur','BGD',1064,'Rajshahi'),(4750,'Bogra','BGD',1064,'Rajshahi'),(4751,'Sylhet','BGD',1225,'Sylhet'),(4752,'Brahmanbaria','BGD',318,'Chittagong'),(4753,'Tangail','BGD',367,'Dhaka'),(4754,'Jamalpur','BGD',367,'Dhaka'),(4755,'Pabna','BGD',1064,'Rajshahi'),(4756,'Naogaon','BGD',1064,'Rajshahi'),(4757,'Sirajganj','BGD',1064,'Rajshahi'),(4758,'Narsinghdi','BGD',367,'Dhaka'),(4759,'Saidpur','BGD',1064,'Rajshahi'),(4760,'Gazipur','BGD',367,'Dhaka'),(4761,'Bridgetown','BRB',1202,'St Michael'),(4762,'Antwerpen','BEL',90,'Antwerpen'),(4763,'Gent','BEL',398,'East Flanderi'),(4764,'Charleroi','BEL',503,'Hainaut'),(4765,'LiÃ¨ge','BEL',737,'LiÃ¨ge'),(4766,'Bruxelles [Brussel]','BEL',239,'Bryssel'),(4767,'Brugge','BEL',1373,'West Flanderi'),(4768,'Schaerbeek','BEL',239,'Bryssel'),(4769,'Namur','BEL',882,'Namur'),(4770,'Mons','BEL',503,'Hainaut'),(4771,'Belize City','BLZ',197,'Belize City'),(4772,'Belmopan','BLZ',280,'Cayo'),(4773,'Cotonou','BEN',123,'Atlantique'),(4774,'Porto-Novo','BEN',974,'OuÃ©mÃ©'),(4775,'Djougou','BEN',122,'Atacora'),(4776,'Parakou','BEN',219,'Borgou'),(4777,'Saint George','BMU',1095,'Saint GeorgeÂ´s'),(4778,'Hamilton','BMU',512,'Hamilton'),(4779,'Hamilton','BMU',513,'Hamilton'),(4780,'Thimphu','BTN',1270,'Thimphu'),(4781,'Santa Cruz de la Sierra','BOL',1124,'Santa Cruz'),(4782,'La Paz','BOL',719,'La Paz'),(4783,'El Alto','BOL',719,'La Paz'),(4784,'Cochabamba','BOL',335,'Cochabamba'),(4785,'Oruro','BOL',967,'Oruro'),(4786,'Sucre','BOL',326,'Chuquisaca'),(4787,'PotosÃ­','BOL',1025,'PotosÃ­'),(4788,'Tarija','BOL',1250,'Tarija'),(4789,'Sarajevo','BIH',431,'Federaatio'),(4790,'Banja Luka','BIH',1068,'Republika Srpska'),(4791,'Zenica','BIH',431,'Federaatio'),(4792,'Gaborone','BWA',451,'Gaborone'),(4793,'Francistown','BWA',440,'Francistown'),(4794,'SÃ£o Paulo','BRA',1139,'SÃ£o Paulo'),(4795,'Rio de Janeiro','BRA',1076,'Rio de Janeiro'),(4796,'Salvador','BRA',157,'Bahia'),(4797,'Belo Horizonte','BRA',836,'Minas Gerais'),(4798,'Fortaleza','BRA',283,'CearÃ¡'),(4799,'BrasÃ­lia','BRA',374,'Distrito Federal'),(4800,'BrasÃ­lia','BRA',375,'Distrito Federal'),(4801,'BrasÃ­lia','BRA',376,'Distrito Federal'),(4802,'BrasÃ­lia','BRA',377,'Distrito Federal'),(4803,'Curitiba','BRA',985,'ParanÃ¡'),(4804,'Recife','BRA',996,'Pernambuco'),(4805,'Porto Alegre','BRA',1078,'Rio Grande do Sul'),(4806,'Manaus','BRA',71,'Amazonas'),(4807,'BelÃ©m','BRA',986,'ParÃ¡'),(4808,'Guarulhos','BRA',1139,'SÃ£o Paulo'),(4809,'GoiÃ¢nia','BRA',470,'GoiÃ¡s'),(4810,'Campinas','BRA',1139,'SÃ£o Paulo'),(4811,'SÃ£o GonÃ§alo','BRA',1076,'Rio de Janeiro'),(4812,'Nova IguaÃ§u','BRA',1076,'Rio de Janeiro'),(4813,'SÃ£o LuÃ­s','BRA',798,'MaranhÃ£o'),(4814,'MaceiÃ³','BRA',59,'Alagoas'),(4815,'Duque de Caxias','BRA',1076,'Rio de Janeiro'),(4816,'SÃ£o Bernardo do Campo','BRA',1139,'SÃ£o Paulo'),(4817,'Teresina','BRA',998,'PiauÃ­'),(4818,'Natal','BRA',1077,'Rio Grande do Norte'),(4819,'Osasco','BRA',1139,'SÃ£o Paulo'),(4820,'Campo Grande','BRA',813,'Mato Grosso do Sul'),(4821,'Santo AndrÃ©','BRA',1139,'SÃ£o Paulo'),(4822,'JoÃ£o Pessoa','BRA',983,'ParaÃ­ba'),(4823,'JaboatÃ£o dos Guararapes','BRA',996,'Pernambuco'),(4824,'Contagem','BRA',836,'Minas Gerais'),(4825,'SÃ£o JosÃ© dos Campos','BRA',1139,'SÃ£o Paulo'),(4826,'UberlÃ¢ndia','BRA',836,'Minas Gerais'),(4827,'Feira de Santana','BRA',157,'Bahia'),(4828,'RibeirÃ£o Preto','BRA',1139,'SÃ£o Paulo'),(4829,'Sorocaba','BRA',1139,'SÃ£o Paulo'),(4830,'NiterÃ³i','BRA',1076,'Rio de Janeiro'),(4831,'CuiabÃ¡','BRA',812,'Mato Grosso'),(4832,'Juiz de Fora','BRA',836,'Minas Gerais'),(4833,'Aracaju','BRA',1149,'Sergipe'),(4834,'SÃ£o JoÃ£o de Meriti','BRA',1076,'Rio de Janeiro'),(4835,'Londrina','BRA',985,'ParanÃ¡'),(4836,'Joinville','BRA',1123,'Santa Catarina'),(4837,'Belford Roxo','BRA',1076,'Rio de Janeiro'),(4838,'Santos','BRA',1139,'SÃ£o Paulo'),(4839,'Ananindeua','BRA',986,'ParÃ¡'),(4840,'Campos dos Goytacazes','BRA',1076,'Rio de Janeiro'),(4841,'MauÃ¡','BRA',1139,'SÃ£o Paulo'),(4842,'CarapicuÃ­ba','BRA',1139,'SÃ£o Paulo'),(4843,'Olinda','BRA',996,'Pernambuco'),(4844,'Campina Grande','BRA',983,'ParaÃ­ba'),(4845,'SÃ£o JosÃ© do Rio Preto','BRA',1139,'SÃ£o Paulo'),(4846,'Caxias do Sul','BRA',1078,'Rio Grande do Sul'),(4847,'Moji das Cruzes','BRA',1139,'SÃ£o Paulo'),(4848,'Diadema','BRA',1139,'SÃ£o Paulo'),(4849,'Aparecida de GoiÃ¢nia','BRA',470,'GoiÃ¡s'),(4850,'Piracicaba','BRA',1139,'SÃ£o Paulo'),(4851,'Cariacica','BRA',422,'EspÃ­rito Santo'),(4852,'Vila Velha','BRA',422,'EspÃ­rito Santo'),(4853,'Pelotas','BRA',1078,'Rio Grande do Sul'),(4854,'Bauru','BRA',1139,'SÃ£o Paulo'),(4855,'Porto Velho','BRA',1085,'RondÃ´nia'),(4856,'Serra','BRA',422,'EspÃ­rito Santo'),(4857,'Betim','BRA',836,'Minas Gerais'),(4858,'JundÃ­aÃ­','BRA',1139,'SÃ£o Paulo'),(4859,'Canoas','BRA',1078,'Rio Grande do Sul'),(4860,'Franca','BRA',1139,'SÃ£o Paulo'),(4861,'SÃ£o Vicente','BRA',1139,'SÃ£o Paulo'),(4862,'MaringÃ¡','BRA',985,'ParanÃ¡'),(4863,'Montes\n Claros','BRA',836,'Minas Gerais'),(4864,'AnÃ¡polis','BRA',470,'GoiÃ¡s'),(4865,'FlorianÃ³polis','BRA',1123,'Santa Catarina'),(4866,'PetrÃ³polis','BRA',1076,'Rio de Janeiro'),(4867,'Itaquaquecetuba','BRA',1139,'SÃ£o Paulo'),(4868,'VitÃ³ria','BRA',422,'EspÃ­rito Santo'),(4869,'Ponta Grossa','BRA',985,'ParanÃ¡'),(4870,'Rio Branco','BRA',15,'Acre'),(4871,'Foz do IguaÃ§u','BRA',985,'ParanÃ¡'),(4872,'MacapÃ¡','BRA',70,'AmapÃ¡'),(4873,'IlhÃ©us','BRA',157,'Bahia'),(4874,'VitÃ³ria da Conquista','BRA',157,'Bahia'),(4875,'Uberaba','BRA',836,'Minas Gerais'),(4876,'Paulista','BRA',996,'Pernambuco'),(4877,'Limeira','BRA',1139,'SÃ£o Paulo'),(4878,'Blumenau','BRA',1123,'Santa Catarina'),(4879,'Caruaru','BRA',996,'Pernambuco'),(4880,'SantarÃ©m','BRA',986,'ParÃ¡'),(4881,'Volta Redonda','BRA',1076,'Rio de Janeiro'),(4882,'Novo Hamburgo','BRA',1078,'Rio Grande do Sul'),(4883,'Caucaia','BRA',283,'CearÃ¡'),(4884,'Santa Maria','BRA',1078,'Rio Grande do Sul'),(4885,'Cascavel','BRA',985,'ParanÃ¡'),(4886,'GuarujÃ¡','BRA',1139,'SÃ£o Paulo'),(4887,'RibeirÃ£o das Neves','BRA',836,'Minas Gerais'),(4888,'Governador Valadares','BRA',836,'Minas Gerais'),(4889,'TaubatÃ©','BRA',1139,'SÃ£o Paulo'),(4890,'Imperatriz','BRA',798,'MaranhÃ£o'),(4891,'GravataÃ­','BRA',1078,'Rio Grande do Sul'),(4892,'Embu','BRA',1139,'SÃ£o Paulo'),(4893,'MossorÃ³','BRA',1077,'Rio Grande do Norte'),(4894,'VÃ¡rzea Grande','BRA',812,'Mato Grosso'),(4895,'Petrolina','BRA',996,'Pernambuco'),(4896,'Barueri','BRA',1139,'SÃ£o Paulo'),(4897,'ViamÃ£o','BRA',1078,'Rio Grande do Sul'),(4898,'Ipatinga','BRA',836,'Minas Gerais'),(4899,'Juazeiro','BRA',157,'Bahia'),(4900,'Juazeiro do Norte','BRA',283,'CearÃ¡'),(4901,'TaboÃ£o da Serra','BRA',1139,'SÃ£o Paulo'),(4902,'SÃ£o JosÃ© dos Pinhais','BRA',985,'ParanÃ¡'),(4903,'MagÃ©','BRA',1076,'Rio de Janeiro'),(4904,'Suzano','BRA',1139,'SÃ£o Paulo'),(4905,'SÃ£o Leopoldo','BRA',1078,'Rio Grande do Sul'),(4906,'MarÃ­lia','BRA',1139,'SÃ£o Paulo'),(4907,'SÃ£o Carlos','BRA',1139,'SÃ£o Paulo'),(4908,'SumarÃ©','BRA',1139,'SÃ£o Paulo'),(4909,'Presidente Prudente','BRA',1139,'SÃ£o Paulo'),(4910,'DivinÃ³polis','BRA',836,'Minas Gerais'),(4911,'Sete Lagoas','BRA',836,'Minas Gerais'),(4912,'Rio Grande','BRA',1078,'Rio Grande do Sul'),(4913,'Itabuna','BRA',157,'Bahia'),(4914,'JequiÃ©','BRA',157,'Bahia'),(4915,'Arapiraca','BRA',59,'Alagoas'),(4916,'Colombo','BRA',985,'ParanÃ¡'),(4917,'Americana','BRA',1139,'SÃ£o Paulo'),(4918,'Alvorada','BRA',1078,'Rio Grande do Sul'),(4919,'Araraquara','BRA',1139,'SÃ£o Paulo'),(4920,'ItaboraÃ­','BRA',1076,'Rio de Janeiro'),(4921,'Santa BÃ¡rbara dÂ´Oeste','BRA',1139,'SÃ£o Paulo'),(4922,'Nova Friburgo','BRA',1076,'Rio de Janeiro'),(4923,'JacareÃ­','BRA',1139,'SÃ£o Paulo'),(4924,'AraÃ§atuba','BRA',1139,'SÃ£o Paulo'),(4925,'Barra Mansa','BRA',1076,'Rio de Janeiro'),(4926,'Praia Grande','BRA',1139,'SÃ£o Paulo'),(4927,'MarabÃ¡','BRA',986,'ParÃ¡'),(4928,'CriciÃºma','BRA',1123,'Santa Catarina'),(4929,'Boa Vista','BRA',1086,'Roraima'),(4930,'Passo Fundo','BRA',1078,'Rio Grande do Sul'),(4931,'Dourados','BRA',813,'Mato Grosso do Sul'),(4932,'Santa Luzia','BRA',836,'Minas Gerais'),(4933,'Rio Claro','BRA',1139,'SÃ£o Paulo'),(4934,'MaracanaÃº','BRA',283,'CearÃ¡'),(4935,'Guarapuava','BRA',985,'ParanÃ¡'),(4936,'RondonÃ³polis','BRA',812,'Mato Grosso'),(4937,'SÃ£o JosÃ©','BRA',1123,'Santa Catarina'),(4938,'Cachoeiro de Itapemirim','BRA',422,'EspÃ­rito Santo'),(4939,'NilÃ³polis','BRA',1076,'Rio de Janeiro'),(4940,'Itapevi','BRA',1139,'SÃ£o Paulo'),(4941,'Cabo de Santo Agostinho','BRA',996,'Pernambuco'),(4942,'CamaÃ§ari','BRA',157,'Bahia'),(4943,'Sobral','BRA',283,'CearÃ¡'),(4944,'ItajaÃ­','BRA',1123,'Santa Catarina'),(4945,'ChapecÃ³','BRA',1123,'Santa Catarina'),(4946,'Cotia','BRA',1139,'SÃ£o Paulo'),(4947,'Lages','BRA',1123,'Santa Catarina'),(4948,'Ferraz de Vasconcelos','BRA',1139,'SÃ£o Paulo'),(4949,'Indaiatuba','BRA',1139,'SÃ£o Paulo'),(4950,'HortolÃ¢ndia','BRA',1139,'SÃ£o Paulo'),(4951,'Caxias','BRA',798,'MaranhÃ£o'),(4952,'SÃ£o Caetano do Sul','BRA',1139,'SÃ£o Paulo'),(4953,'Itu','BRA',1139,'SÃ£o Paulo'),(4954,'Nossa Senhora do Socorro','BRA',1149,'Sergipe'),(4955,'ParnaÃ­ba','BRA',998,'PiauÃ­'),(4956,'PoÃ§os de Caldas','BRA',836,'Minas Gerais'),(4957,'TeresÃ³polis','BRA',1076,'Rio de Janeiro'),(4958,'Barreiras','BRA',157,'Bahia'),(4959,'Castanhal','BRA',986,'ParÃ¡'),(4960,'Alagoinhas','BRA',157,'Bahia'),(4961,'Itapecerica da Serra','BRA',1139,'SÃ£o Paulo'),(4962,'Uruguaiana','BRA',1078,'Rio Grande do Sul'),(4963,'ParanaguÃ¡','BRA',985,'ParanÃ¡'),(4964,'IbiritÃ©','BRA',836,'Minas Gerais'),(4965,'Timon','BRA',798,'MaranhÃ£o'),(4966,'LuziÃ¢nia','BRA',470,'GoiÃ¡s'),(4967,'MacaÃ©','BRA',1076,'Rio de Janeiro'),(4968,'TeÃ³filo Otoni','BRA',836,'Minas Gerais'),(4969,'Moji-GuaÃ§u','BRA',1139,'SÃ£o Paulo'),(4970,'Palmas','BRA',1284,'Tocantins'),(4971,'Pindamonhangaba','BRA',1139,'SÃ£o Paulo'),(4972,'Francisco Morato','BRA',1139,'SÃ£o Paulo'),(4973,'BagÃ©','BRA',1078,'Rio Grande do Sul'),(4974,'Sapucaia do Sul','BRA',1078,'Rio Grande do Sul'),(4975,'Cabo Frio','BRA',1076,'Rio de Janeiro'),(4976,'Itapetininga','BRA',1139,'SÃ£o Paulo'),(4977,'Patos de Minas','BRA',836,'Minas Gerais'),(4978,'Camaragibe','BRA',996,'Pernambuco'),(4979,'BraganÃ§a Paulista','BRA',1139,'SÃ£o Paulo'),(4980,'Queimados','BRA',1076,'Rio de Janeiro'),(4981,'AraguaÃ­na','BRA',1284,'Tocantins'),(4982,'Garanhuns','BRA',996,'Pernambuco'),(4983,'VitÃ³ria de Santo AntÃ£o','BRA',996,'Pernambuco'),(4984,'Santa Rita','BRA',983,'ParaÃ­ba'),(4985,'Barbacena','BRA',836,'Minas Gerais'),(4986,'Abaetetuba','BRA',986,'ParÃ¡'),(4987,'JaÃº','BRA',1139,'SÃ£o Paulo'),(4988,'Lauro de Freitas','BRA',157,'Bahia'),(4989,'Franco da Rocha','BRA',1139,'SÃ£o Paulo'),(4990,'Teixeira de Freitas','BRA',157,'Bahia'),(4991,'Varginha','BRA',836,'Minas Gerais'),(4992,'RibeirÃ£o Pires','BRA',1139,'SÃ£o Paulo'),(4993,'SabarÃ¡','BRA',836,'Minas Gerais'),(4994,'Catanduva','BRA',1139,'SÃ£o Paulo'),(4995,'Rio Verde','BRA',470,'GoiÃ¡s'),(4996,'Botucatu','BRA',1139,'SÃ£o Paulo'),(4997,'Colatina','BRA',422,'EspÃ­rito Santo'),(4998,'Santa Cruz do Sul','BRA',1078,'Rio Grande do Sul'),(4999,'Linhares','BRA',422,'EspÃ­rito Santo'),(5000,'Apucarana','BRA',985,'ParanÃ¡'),(5001,'Barretos','BRA',1139,'SÃ£o Paulo'),(5002,'GuaratinguetÃ¡','BRA',1139,'SÃ£o Paulo'),(5003,'Cachoeirinha','BRA',1078,'Rio Grande do Sul'),(5004,'CodÃ³','BRA',798,'MaranhÃ£o'),(5005,'JaraguÃ¡ do Sul','BRA',1123,'Santa Catarina'),(5006,'CubatÃ£o','BRA',1139,'SÃ£o Paulo'),(5007,'Itabira','BRA',836,'Minas Gerais'),(5008,'Itaituba','BRA',986,'ParÃ¡'),(5009,'Araras','BRA',1139,'SÃ£o Paulo'),(5010,'Resende','BRA',1076,'Rio de Janeiro'),(5011,'Atibaia','BRA',1139,'SÃ£o Paulo'),(5012,'Pouso Alegre','BRA',836,'Minas Gerais'),(5013,'Toledo','BRA',985,'ParanÃ¡'),(5014,'Crato','BRA',283,'CearÃ¡'),(5015,'Passos','BRA',836,'Minas Gerais'),(5016,'Araguari','BRA',836,'Minas Gerais'),(5017,'SÃ£o JosÃ© de Ribamar','BRA',798,'MaranhÃ£o'),(5018,'Pinhais','BRA',985,'ParanÃ¡'),(5019,'SertÃ£ozinho','BRA',1139,'SÃ£o Paulo'),(5020,'Conselheiro Lafaiete','BRA',836,'Minas Gerais'),(5021,'Paulo Afonso','BRA',157,'Bahia'),(5022,'Angra dos Reis','BRA',1076,'Rio de Janeiro'),(5023,'EunÃ¡polis','BRA',157,'Bahia'),(5024,'Salto','BRA',1139,'SÃ£o Paulo'),(5025,'Ourinhos','BRA',1139,'SÃ£o Paulo'),(5026,'Parnamirim','BRA',1077,'Rio Grande do Norte'),(5027,'Jacobina','BRA',157,'Bahia'),(5028,'Coronel Fabriciano','BRA',836,'Minas Gerais'),(5029,'Birigui','BRA',1139,'SÃ£o Paulo'),(5030,'TatuÃ­','BRA',1139,'SÃ£o Paulo'),(5031,'Ji-ParanÃ¡','BRA',1085,'RondÃ´nia'),(5032,'Bacabal','BRA',798,'MaranhÃ£o'),(5033,'CametÃ¡','BRA',986,'ParÃ¡'),(5034,'GuaÃ­ba','BRA',1078,'Rio Grande do Sul'),(5035,'SÃ£o LourenÃ§o da Mata','BRA',996,'Pernambuco'),(5036,'Santana do Livramento','BRA',1078,'Rio Grande do Sul'),(5037,'Votorantim','BRA',1139,'SÃ£o Paulo'),(5038,'Campo Largo','BRA',985,'ParanÃ¡'),(5039,'Patos','BRA',983,'ParaÃ­ba'),(5040,'Ituiutaba','BRA',836,'Minas Gerais'),(5041,'CorumbÃ¡','BRA',813,'Mato Grosso do Sul'),(5042,'PalhoÃ§a','BRA',1123,'Santa Catarina'),(5043,'Barra do PiraÃ­','BRA',1076,'Rio de Janeiro'),(5044,'Bento GonÃ§alves','BRA',1078,'Rio Grande do Sul'),(5045,'PoÃ¡','BRA',1139,'SÃ£o Paulo'),(5046,'Ãguas Lindas de GoiÃ¡s','BRA',470,'GoiÃ¡s'),(5047,'London','GBR',414,'England'),(5048,'Birmingham','GBR',414,'England'),(5049,'Glasgow','GBR',1145,'Scotland'),(5050,'Liverpool','GBR',414,'England'),(5051,'Edinburgh','GBR',1145,'Scotland'),(5052,'Sheffield','GBR',414,'England'),(5053,'Manchester','GBR',414,'England'),(5054,'Leeds','GBR',414,'England'),(5055,'Bristol','GBR',414,'England'),(5056,'Cardiff','GBR',1364,'Wales'),(5057,'Coventry','GBR',414,'England'),(5058,'Leicester','GBR',414,'England'),(5059,'Bradford','GBR',414,'England'),(5060,'Belfast','GBR',928,'North Ireland'),(5061,'Nottingham','GBR',414,'England'),(5062,'Kingston upon Hull','GBR',414,'England'),(5063,'Plymouth','GBR',414,'England'),(5064,'Stoke-on-Trent','GBR',414,'England'),(5065,'Wolverhampton','GBR',414,'England'),(5066,'Derby','GBR',414,'England'),(5067,'Swansea','GBR',1364,'Wales'),(5068,'Southampton','GBR',414,'England'),(5069,'Aberdeen','GBR',1145,'Scotland'),(5070,'Northampton','GBR',414,'England'),(5071,'Dudley','GBR',414,'England'),(5072,'Portsmouth','GBR',414,'England'),(5073,'Newcastle upon Tyne','GBR',414,'England'),(5074,'Sunderland','GBR',414,'England'),(5075,'Luton','GBR',414,'England'),(5076,'Swindon','GBR',414,'England'),(5077,'Southend-on-Sea','GBR',414,'England'),(5078,'Walsall','GBR',414,'England'),(5079,'Bournemouth','GBR',414,'England'),(5080,'Peterborough','GBR',414,'England'),(5081,'Brighton','GBR',414,'England'),(5082,'Blackpool','GBR',414,'England'),(5083,'Dundee','GBR',1145,'Scotland'),(5084,'West Bromwich','GBR',414,'England'),(5085,'Reading','GBR',414,'England'),(5086,'Oldbury/Smethwick (Warley)','GBR',414,'England'),(5087,'Middlesbrough','GBR',414,'England'),(5088,'Huddersfield','GBR',414,'England'),(5089,'Oxford','GBR',414,'England'),(5090,'Poole','GBR',414,'England'),(5091,'Bolton','GBR',414,'England'),(5092,'Blackburn','GBR',414,'England'),(5093,'Newport','GBR',1364,'Wales'),(5094,'Preston','GBR',414,'England'),(5095,'Stockport','GBR',414,'England'),(5096,'Norwich','GBR',414,'England'),(5097,'Rotherham','GBR',414,'England'),(5098,'Cambridge','GBR',414,'England'),(5099,'Watford','GBR',414,'England'),(5100,'Ipswich','GBR',414,'England'),(5101,'Slough','GBR',414,'England'),(5102,'Exeter','GBR',414,'England'),(5103,'Cheltenham','GBR',414,'England'),(5104,'Gloucester','GBR',414,'England'),(5105,'Saint Helens','GBR',414,'England'),(5106,'Sutton Coldfield','GBR',414,'England'),(5107,'York','GBR',414,'England'),(5108,'Oldham','GBR',414,'England'),(5109,'Basildon','GBR',414,'England'),(5110,'Worthing','GBR',414,'England'),(5111,'Chelmsford','GBR',414,'England'),(5112,'Colchester','GBR',414,'England'),(5113,'Crawley','GBR',414,'England'),(5114,'Gillingham','GBR',414,'England'),(5115,'Solihull','GBR',414,'England'),(5116,'Rochdale','GBR',414,'England'),(5117,'Birkenhead','GBR',414,'England'),(5118,'Worcester','GBR',414,'England'),(5119,'Hartlepool','GBR',414,'England'),(5120,'Halifax','GBR',414,'England'),(5121,'Woking/Byfleet','GBR',414,'England'),(5122,'Southport','GBR',414,'England'),(5123,'Maidstone','GBR',414,'England'),(5124,'Eastbourne','GBR',414,'England'),(5125,'Grimsby','GBR',414,'England'),(5126,'Saint\n Helier','GBR',601,'Jersey'),(5127,'Douglas','GBR',133,'â€“'),(5128,'Douglas','GBR',134,'â€“'),(5129,'Douglas','GBR',135,'â€“'),(5130,'Douglas','GBR',136,'â€“'),(5131,'Douglas','GBR',137,'â€“'),(5132,'Douglas','GBR',138,'â€“'),(5133,'Douglas','GBR',139,'â€“'),(5134,'Douglas','GBR',140,'â€“'),(5135,'Douglas','GBR',141,'â€“'),(5136,'Douglas','GBR',142,'â€“'),(5137,'Douglas','GBR',143,'â€“'),(5138,'Douglas','GBR',144,'â€“'),(5139,'Douglas','GBR',145,'â€“'),(5140,'Douglas','GBR',146,'â€“'),(5141,'Road Town','VGB',1292,'Tortola'),(5142,'Bandar Seri Begawan','BRN',238,'Brunei and Muara'),(5143,'Sofija','BGR',474,'Grad Sofija'),(5144,'Plovdiv','BGR',1010,'Plovdiv'),(5145,'Varna','BGR',1337,'Varna'),(5146,'Burgas','BGR',246,'Burgas'),(5147,'Ruse','BGR',1088,'Ruse'),(5148,'Stara Zagora','BGR',520,'Haskovo'),(5149,'Pleven','BGR',760,'Lovec'),(5150,'Sliven','BGR',246,'Burgas'),(5151,'Dobric','BGR',1337,'Varna'),(5152,'Å umen','BGR',1337,'Varna'),(5153,'Ouagadougou','BFA',615,'Kadiogo'),(5154,'Bobo-Dioulasso','BFA',550,'Houet'),(5155,'Koudougou','BFA',224,'BoulkiemdÃ©'),(5156,'Bujumbura','BDI',243,'Bujumbura'),(5157,'George Town','CYM',476,'Grand Cayman'),(5158,'Santiago de Chile','CHL',1128,'Santiago'),(5159,'Santiago de Chile','CHL',1129,'Santiago'),(5160,'Puente Alto','CHL',1128,'Santiago'),(5161,'Puente Alto','CHL',1129,'Santiago'),(5162,'ViÃ±a del Mar','CHL',1335,'ValparaÃ­so'),(5163,'ValparaÃ­so','CHL',1335,'ValparaÃ­so'),(5164,'Talcahuano','CHL',194,'BÃ­obÃ­o'),(5165,'Antofagasta','CHL',89,'Antofagasta'),(5166,'San Bernardo','CHL',1128,'Santiago'),(5167,'San Bernardo','CHL',1129,'Santiago'),(5168,'Temuco','CHL',714,'La AraucanÃ­a'),(5169,'ConcepciÃ³n','CHL',194,'BÃ­obÃ­o'),(5170,'Rancagua','CHL',947,'OÂ´Higgins'),(5171,'Arica','CHL',1248,'TarapacÃ¡'),(5172,'Talca','CHL',814,'Maule'),(5173,'ChillÃ¡n','CHL',194,'BÃ­obÃ­o'),(5174,'Iquique','CHL',1248,'TarapacÃ¡'),(5175,'Los Angeles','CHL',194,'BÃ­obÃ­o'),(5176,'Puerto Montt','CHL',757,'Los Lagos'),(5177,'Coquimbo','CHL',343,'Coquimbo'),(5178,'Osorno','CHL',757,'Los Lagos'),(5179,'La Serena','CHL',343,'Coquimbo'),(5180,'Calama','CHL',89,'Antofagasta'),(5181,'Valdivia','CHL',757,'Los Lagos'),(5182,'Punta Arenas','CHL',776,'Magallanes'),(5183,'CopiapÃ³','CHL',121,'Atacama'),(5184,'QuilpuÃ©','CHL',1335,'ValparaÃ­so'),(5185,'CuricÃ³','CHL',814,'Maule'),(5186,'Ovalle','CHL',343,'Coquimbo'),(5187,'Coronel','CHL',194,'BÃ­obÃ­o'),(5188,'San Pedro de la Paz','CHL',194,'BÃ­obÃ­o'),(5189,'Melipilla','CHL',1128,'Santiago'),(5190,'Melipilla','CHL',1129,'Santiago'),(5191,'Avarua','COK',1067,'Rarotonga'),(5192,'San JosÃ©','CRI',1109,'San JosÃ©'),(5193,'Djibouti','DJI',381,'Djibouti'),(5194,'Roseau','DMA',1197,'St George'),(5195,'Roseau','DMA',1198,'St George'),(5196,'Roseau','DMA',1199,'St George'),(5197,'Santo Domingo de GuzmÃ¡n','DOM',378,'Distrito Nacional'),(5198,'Santiago de los Caballeros','DOM',1128,'Santiago'),(5199,'Santiago de los Caballeros','DOM',1129,'Santiago'),(5200,'La Romana','DOM',722,'La Romana'),(5201,'San Pedro de MacorÃ­s','DOM',1117,'San Pedro de MacorÃ­'),(5202,'San Francisco de MacorÃ­s','DOM',392,'Duarte'),(5203,'San Felipe de Puerto Plata','DOM',1031,'Puerto Plata'),(5204,'Guayaquil','ECU',488,'Guayas'),(5205,'Quito','ECU',1000,'Pichincha'),(5206,'Cuenca','ECU',132,'Azuay'),(5207,'Machala','ECU',410,'El Oro'),(5208,'Santo Domingo de los Colorados','ECU',1000,'Pichincha'),(5209,'Portoviejo','ECU',786,'ManabÃ­'),(5210,'Ambato','ECU',1306,'Tungurahua'),(5211,'Manta','ECU',786,'ManabÃ­'),(5212,'Duran [Eloy Alfaro]','ECU',488,'Guayas'),(5213,'Ibarra','ECU',572,'Imbabura'),(5214,'Quevedo','ECU',758,'Los RÃ­os'),(5215,'Milagro','ECU',488,'Guayas'),(5216,'Loja','ECU',751,'Loja'),(5217,'RÃ­obamba','ECU',315,'Chimborazo'),(5218,'Esmeraldas','ECU',421,'Esmeraldas'),(5219,'Cairo','EGY',622,'Kairo'),(5220,'Alexandria','EGY',62,'Aleksandria'),(5221,'Giza','EGY',469,'Giza'),(5222,'Shubra al-Khayma','EGY',48,'al-Qalyubiya'),(5223,'Port Said','EGY',1020,'Port Said'),(5224,'Suez','EGY',1212,'Suez'),(5225,'al-Mahallat al-Kubra','EGY',38,'al-Gharbiya'),(5226,'Tanta','EGY',38,'al-Gharbiya'),(5227,'al-Mansura','EGY',36,'al-Daqahliya'),(5228,'Luxor','EGY',767,'Luxor'),(5229,'Asyut','EGY',120,'Asyut'),(5230,'Bahtim','EGY',48,'al-Qalyubiya'),(5231,'Zagazig','EGY',52,'al-Sharqiya'),(5232,'Zagazig','EGY',53,'al-Sharqiya'),(5233,'al-Faiyum','EGY',37,'al-Faiyum'),(5234,'Ismailia','EGY',588,'Ismailia'),(5235,'Kafr al-Dawwar','EGY',35,'al-Buhayra'),(5236,'Assuan','EGY',115,'Assuan'),(5237,'Damanhur','EGY',35,'al-Buhayra'),(5238,'al-Minya','EGY',44,'al-Minya'),(5239,'Bani Suwayf','EGY',174,'Bani Suwayf'),(5240,'Qina','EGY',1046,'Qina'),(5241,'Sawhaj','EGY',1138,'Sawhaj'),(5242,'Shibin al-Kawm','EGY',43,'al-Minufiya'),(5243,'Bulaq al-Dakrur','EGY',469,'Giza'),(5244,'Banha','EGY',48,'al-Qalyubiya'),(5245,'Warraq al-Arab','EGY',469,'Giza'),(5246,'Kafr al-Shaykh','EGY',618,'Kafr al-Shaykh'),(5247,'Mallawi','EGY',44,'al-Minya'),(5248,'Bilbays','EGY',52,'al-Sharqiya'),(5249,'Bilbays','EGY',53,'al-Sharqiya'),(5250,'Mit Ghamr','EGY',36,'al-Daqahliya'),(5251,'al-Arish','EGY',1156,'Shamal Sina'),(5252,'Talkha','EGY',36,'al-Daqahliya'),(5253,'Qalyub','EGY',48,'al-Qalyubiya'),(5254,'Jirja','EGY',1138,'Sawhaj'),(5255,'Idfu','EGY',1046,'Qina'),(5256,'al-Hawamidiya','EGY',469,'Giza'),(5257,'Disuq','EGY',618,'Kafr al-Shaykh'),(5258,'San Salvador','SLV',1118,'San Salvador'),(5259,'Santa Ana','SLV',1122,'Santa Ana'),(5260,'Mejicanos','SLV',1118,'San Salvador'),(5261,'Soyapango','SLV',1118,'San Salvador'),(5262,'San Miguel','SLV',1115,'San Miguel'),(5263,'Nueva San Salvador','SLV',717,'La Libertad'),(5264,'Nueva San Salvador','SLV',718,'La Libertad'),(5265,'Apopa','SLV',1118,'San Salvador'),(5266,'Asmara','ERI',774,'Maekel'),(5267,'Madrid','ESP',773,'Madrid'),(5268,'Barcelona','ESP',650,'Katalonia'),(5269,'Valencia','ESP',1333,'Valencia'),(5270,'Sevilla','ESP',78,'Andalusia'),(5271,'Zaragoza','ESP',100,'Aragonia'),(5272,'MÃ¡laga','ESP',78,'Andalusia'),(5273,'Bilbao','ESP',181,'Baskimaa'),(5274,'Las Palmas de Gran Canaria','ESP',262,'Canary Islands'),(5275,'Murcia','ESP',864,'Murcia'),(5276,'Palma de Mallorca','ESP',163,'Balears'),(5277,'Valladolid','ESP',275,'Castilla and LeÃ³n'),(5278,'CÃ³rdoba','ESP',78,'Andalusia'),(5279,'Vigo','ESP',453,'Galicia'),(5280,'Alicante [Alacant]','ESP',1333,'Valencia'),(5281,'GijÃ³n','ESP',118,'Asturia'),(5282,'LÂ´Hospitalet de Llobregat','ESP',650,'Katalonia'),(5283,'Granada','ESP',78,'Andalusia'),(5284,'A CoruÃ±a (La CoruÃ±a)','ESP',453,'Galicia'),(5285,'Vitoria-Gasteiz','ESP',181,'Baskimaa'),(5286,'Santa Cruz de Tenerife','ESP',262,'Canary Islands'),(5287,'Badalona','ESP',650,'Katalonia'),(5288,'Oviedo','ESP',118,'Asturia'),(5289,'MÃ³stoles','ESP',773,'Madrid'),(5290,'Elche [Elx]','ESP',1333,'Valencia'),(5291,'Sabadell','ESP',650,'Katalonia'),(5292,'Santander','ESP',263,'Cantabria'),(5293,'Jerez de la Frontera','ESP',78,'Andalusia'),(5294,'Pamplona [IruÃ±a]','ESP',888,'Navarra'),(5295,'Donostia-San SebastiÃ¡n','ESP',181,'Baskimaa'),(5296,'Cartagena','ESP',864,'Murcia'),(5297,'LeganÃ©s','ESP',773,'Madrid'),(5298,'Fuenlabrada','ESP',773,'Madrid'),(5299,'AlmerÃ­a','ESP',78,'Andalusia'),(5300,'Terrassa','ESP',650,'Katalonia'),(5301,'AlcalÃ¡ de Henares','ESP',773,'Madrid'),(5302,'Burgos','ESP',275,'Castilla and LeÃ³n'),(5303,'Salamanca','ESP',275,'Castilla and LeÃ³n'),(5304,'Albacete','ESP',649,'Kastilia-La Mancha'),(5305,'Getafe','ESP',773,'Madrid'),(5306,'CÃ¡diz','ESP',78,'Andalusia'),(5307,'AlcorcÃ³n','ESP',773,'Madrid'),(5308,'Huelva','ESP',78,'Andalusia'),(5309,'LeÃ³n','ESP',275,'Castilla and LeÃ³n'),(5310,'CastellÃ³n de la Plana [Castell','ESP',1333,'Valencia'),(5311,'Badajoz','ESP',425,'Extremadura'),(5312,'[San CristÃ³bal de] la Laguna','ESP',262,'Canary Islands'),(5313,'LogroÃ±o','ESP',720,'La Rioja'),(5314,'LogroÃ±o','ESP',721,'La Rioja'),(5315,'Santa Coloma de Gramenet','ESP',650,'Katalonia'),(5316,'Tarragona','ESP',650,'Katalonia'),(5317,'Lleida (LÃ©rida)','ESP',650,'Katalonia'),(5318,'JaÃ©n','ESP',78,'Andalusia'),(5319,'Ourense (Orense)','ESP',453,'Galicia'),(5320,'MatarÃ³','ESP',650,'Katalonia'),(5321,'Algeciras','ESP',78,'Andalusia'),(5322,'Marbella','ESP',78,'Andalusia'),(5323,'Barakaldo','ESP',181,'Baskimaa'),(5324,'Dos Hermanas','ESP',78,'Andalusia'),(5325,'Santiago de Compostela','ESP',453,'Galicia'),(5326,'TorrejÃ³n de Ardoz','ESP',773,'Madrid'),(5327,'Cape Town','ZAF',1385,'Western Cape'),(5328,'Soweto','ZAF',455,'Gauteng'),(5329,'Johannesburg','ZAF',455,'Gauteng'),(5330,'Port Elizabeth','ZAF',405,'Eastern Cape'),(5331,'Pretoria','ZAF',455,'Gauteng'),(5332,'Inanda','ZAF',709,'KwaZulu-Natal'),(5333,'Durban','ZAF',709,'KwaZulu-Natal'),(5334,'Vanderbijlpark','ZAF',455,'Gauteng'),(5335,'Kempton Park','ZAF',455,'Gauteng'),(5336,'Alberton','ZAF',455,'Gauteng'),(5337,'Pinetown','ZAF',709,'KwaZulu-Natal'),(5338,'Pietermaritzburg','ZAF',709,'KwaZulu-Natal'),(5339,'Benoni','ZAF',455,'Gauteng'),(5340,'Randburg','ZAF',455,'Gauteng'),(5341,'Umlazi','ZAF',709,'KwaZulu-Natal'),(5342,'Bloemfontein','ZAF',442,'Free State'),(5343,'Vereeniging','ZAF',455,'Gauteng'),(5344,'Wonderboom','ZAF',455,'Gauteng'),(5345,'Roodepoort','ZAF',455,'Gauteng'),(5346,'Boksburg','ZAF',455,'Gauteng'),(5347,'Klerksdorp','ZAF',932,'North West'),(5348,'Soshanguve','ZAF',455,'Gauteng'),(5349,'Newcastle','ZAF',709,'KwaZulu-Natal'),(5350,'East London','ZAF',405,'Eastern Cape'),(5351,'Welkom','ZAF',442,'Free State'),(5352,'Kimberley','ZAF',935,'Northern Cape'),(5353,'Uitenhage','ZAF',405,'Eastern Cape'),(5354,'Chatsworth','ZAF',709,'KwaZulu-Natal'),(5355,'Mdantsane','ZAF',405,'Eastern Cape'),(5356,'Krugersdorp','ZAF',455,'Gauteng'),(5357,'Botshabelo','ZAF',442,'Free State'),(5358,'Brakpan','ZAF',455,'Gauteng'),(5359,'Witbank','ZAF',862,'Mpumalanga'),(5360,'Oberholzer','ZAF',455,'Gauteng'),(5361,'Germiston','ZAF',455,'Gauteng'),(5362,'Springs','ZAF',455,'Gauteng'),(5363,'Westonaria','ZAF',455,'Gauteng'),(5364,'Randfontein','ZAF',455,'Gauteng'),(5365,'Paarl','ZAF',1385,'Western Cape'),(5366,'Potchefstroom','ZAF',932,'North West'),(5367,'Rustenburg','ZAF',932,'North West'),(5368,'Nigel','ZAF',455,'Gauteng'),(5369,'George','ZAF',1385,'Western Cape'),(5370,'Ladysmith','ZAF',709,'KwaZulu-Natal'),(5371,'Addis Abeba','ETH',17,'Addis Abeba'),(5372,'Dire Dawa','ETH',371,'Dire Dawa'),(5373,'Nazret','ETH',966,'Oromia'),(5374,'Gonder','ETH',72,'Amhara'),(5375,'Dese','ETH',72,'Amhara'),(5376,'Mekele','ETH',1276,'Tigray'),(5377,'Bahir Dar','ETH',72,'Amhara'),(5378,'Stanley','FLK',397,'East Falkland'),(5379,'Suva','FJI',284,'Central'),(5380,'Suva','FJI',285,'Central'),(5381,'Suva','FJI',286,'Central'),(5382,'Suva','FJI',287,'Central'),(5383,'Suva','FJI',288,'Central'),(5384,'Suva','FJI',289,'Central'),(5385,'Suva','FJI',290,'Central'),(5386,'Quezon','PHL',887,'National Capital Reg'),(5387,'Manila','PHL',887,'National Capital Reg'),(5388,'Kalookan','PHL',887,'National Capital Reg'),(5389,'Davao','PHL',1194,'Southern Mindanao'),(5390,'Cebu','PHL',296,'Central Visayas'),(5391,'Zamboanga','PHL',1386,'Western Mindanao'),(5392,'Pasig','PHL',887,'National Capital Reg'),(5393,'Valenzuela','PHL',887,'National Capital Reg'),(5394,'Las PiÃ±as','PHL',887,'National Capital Reg'),(5395,'Antipolo','PHL',1195,'Southern Tagalog'),(5396,'Taguig','PHL',887,'National Capital Reg'),(5397,'Cagayan de Oro','PHL',936,'Northern Mindanao'),(5398,'ParaÃ±aque','PHL',887,'National Capital Reg'),(5399,'Makati','PHL',887,'National Capital Reg'),(5400,'Bacolod','PHL',1387,'Western Visayas'),(5401,'General Santos','PHL',1194,'Southern Mindanao'),(5402,'Marikina','PHL',887,'National Capital Reg'),(5403,'DasmariÃ±as','PHL',1195,'Southern Tagalog'),(5404,'Muntinlupa','PHL',887,'National Capital Reg'),(5405,'Iloilo','PHL',1387,'Western Visayas'),(5406,'Pasay','PHL',887,'National Capital Reg'),(5407,'Malabon','PHL',887,'National Capital Reg'),(5408,'San JosÃ© del Monte','PHL',292,'Central Luzon'),(5409,'Bacoor','PHL',1195,'Southern Tagalog'),(5410,'Iligan','PHL',294,'Central Mindanao'),(5411,'Calamba','PHL',1195,'Southern Tagalog'),(5412,'Mandaluyong','PHL',887,'National Capital Reg'),(5413,'Butuan','PHL',270,'Caraga'),(5414,'Angeles','PHL',292,'Central Luzon'),(5415,'Tarlac','PHL',292,'Central Luzon'),(5416,'Mandaue','PHL',296,'Central Visayas'),(5417,'Baguio','PHL',268,'CAR'),(5418,'Batangas','PHL',1195,'Southern Tagalog'),(5419,'Cainta','PHL',1195,'Southern Tagalog'),(5420,'San\n Pedro','PHL',1195,'Southern Tagalog'),(5421,'Navotas','PHL',887,'National Capital Reg'),(5422,'Cabanatuan','PHL',292,'Central Luzon'),(5423,'San Fernando','PHL',292,'Central Luzon'),(5424,'Lipa','PHL',1195,'Southern Tagalog'),(5425,'Lapu-Lapu','PHL',296,'Central Visayas'),(5426,'San Pablo','PHL',1195,'Southern Tagalog'),(5427,'BiÃ±an','PHL',1195,'Southern Tagalog'),(5428,'Taytay','PHL',1195,'Southern Tagalog'),(5429,'Lucena','PHL',1195,'Southern Tagalog'),(5430,'Imus','PHL',1195,'Southern Tagalog'),(5431,'Olongapo','PHL',292,'Central Luzon'),(5432,'Binangonan','PHL',1195,'Southern Tagalog'),(5433,'Santa Rosa','PHL',1195,'Southern Tagalog'),(5434,'Tagum','PHL',1194,'Southern Mindanao'),(5435,'Tacloban','PHL',406,'Eastern Visayas'),(5436,'Malolos','PHL',292,'Central Luzon'),(5437,'Mabalacat','PHL',292,'Central Luzon'),(5438,'Cotabato','PHL',294,'Central Mindanao'),(5439,'Meycauayan','PHL',292,'Central Luzon'),(5440,'Puerto Princesa','PHL',1195,'Southern Tagalog'),(5441,'Legazpi','PHL',205,'Bicol'),(5442,'Silang','PHL',1195,'Southern Tagalog'),(5443,'Ormoc','PHL',406,'Eastern Visayas'),(5444,'San Carlos','PHL',571,'Ilocos'),(5445,'Kabankalan','PHL',1387,'Western Visayas'),(5446,'Talisay','PHL',296,'Central Visayas'),(5447,'Valencia','PHL',936,'Northern Mindanao'),(5448,'Calbayog','PHL',406,'Eastern Visayas'),(5449,'Santa Maria','PHL',292,'Central Luzon'),(5450,'Pagadian','PHL',1386,'Western Mindanao'),(5451,'Cadiz','PHL',1387,'Western Visayas'),(5452,'Bago','PHL',1387,'Western Visayas'),(5453,'Toledo','PHL',296,'Central Visayas'),(5454,'Naga','PHL',205,'Bicol'),(5455,'San Mateo','PHL',1195,'Southern Tagalog'),(5456,'Panabo','PHL',1194,'Southern Mindanao'),(5457,'Koronadal','PHL',1194,'Southern Mindanao'),(5458,'Marawi','PHL',294,'Central Mindanao'),(5459,'Dagupan','PHL',571,'Ilocos'),(5460,'Sagay','PHL',1387,'Western Visayas'),(5461,'Roxas','PHL',1387,'Western Visayas'),(5462,'Lubao','PHL',292,'Central Luzon'),(5463,'Digos','PHL',1194,'Southern Mindanao'),(5464,'San Miguel','PHL',292,'Central Luzon'),(5465,'Malaybalay','PHL',936,'Northern Mindanao'),(5466,'Tuguegarao','PHL',251,'Cagayan Valley'),(5467,'Ilagan','PHL',251,'Cagayan Valley'),(5468,'Baliuag','PHL',292,'Central Luzon'),(5469,'Surigao','PHL',270,'Caraga'),(5470,'San Carlos','PHL',1387,'Western Visayas'),(5471,'San Juan del Monte','PHL',887,'National Capital Reg'),(5472,'Tanauan','PHL',1195,'Southern Tagalog'),(5473,'Concepcion','PHL',292,'Central Luzon'),(5474,'Rodriguez (Montalban)','PHL',1195,'Southern Tagalog'),(5475,'Sariaya','PHL',1195,'Southern Tagalog'),(5476,'Malasiqui','PHL',571,'Ilocos'),(5477,'General Mariano Alvarez','PHL',1195,'Southern Tagalog'),(5478,'Urdaneta','PHL',571,'Ilocos'),(5479,'Hagonoy','PHL',292,'Central Luzon'),(5480,'San Jose','PHL',1195,'Southern Tagalog'),(5481,'Polomolok','PHL',1194,'Southern Mindanao'),(5482,'Santiago','PHL',251,'Cagayan Valley'),(5483,'Tanza','PHL',1195,'Southern Tagalog'),(5484,'Ozamis','PHL',936,'Northern Mindanao'),(5485,'Mexico','PHL',292,'Central Luzon'),(5486,'San Jose','PHL',292,'Central Luzon'),(5487,'Silay','PHL',1387,'Western Visayas'),(5488,'General Trias','PHL',1195,'Southern Tagalog'),(5489,'Tabaco','PHL',205,'Bicol'),(5490,'Cabuyao','PHL',1195,'Southern Tagalog'),(5491,'Calapan','PHL',1195,'Southern Tagalog'),(5492,'Mati','PHL',1194,'Southern Mindanao'),(5493,'Midsayap','PHL',294,'Central Mindanao'),(5494,'Cauayan','PHL',251,'Cagayan Valley'),(5495,'Gingoog','PHL',936,'Northern Mindanao'),(5496,'Dumaguete','PHL',296,'Central Visayas'),(5497,'San Fernando','PHL',571,'Ilocos'),(5498,'Arayat','PHL',292,'Central Luzon'),(5499,'Bayawan (Tulong)','PHL',296,'Central Visayas'),(5500,'Kidapawan','PHL',294,'Central Mindanao'),(5501,'Daraga (Locsin)','PHL',205,'Bicol'),(5502,'Marilao','PHL',292,'Central Luzon'),(5503,'Malita','PHL',1194,'Southern Mindanao'),(5504,'Dipolog','PHL',1386,'Western Mindanao'),(5505,'Cavite','PHL',1195,'Southern Tagalog'),(5506,'Danao','PHL',296,'Central Visayas'),(5507,'Bislig','PHL',270,'Caraga'),(5508,'Talavera','PHL',292,'Central Luzon'),(5509,'Guagua','PHL',292,'Central Luzon'),(5510,'Bayambang','PHL',571,'Ilocos'),(5511,'Nasugbu','PHL',1195,'Southern Tagalog'),(5512,'Baybay','PHL',406,'Eastern Visayas'),(5513,'Capas','PHL',292,'Central Luzon'),(5514,'Sultan Kudarat','PHL',110,'ARMM'),(5515,'Laoag','PHL',571,'Ilocos'),(5516,'Bayugan','PHL',270,'Caraga'),(5517,'Malungon','PHL',1194,'Southern Mindanao'),(5518,'Santa Cruz','PHL',1195,'Southern Tagalog'),(5519,'Sorsogon','PHL',205,'Bicol'),(5520,'Candelaria','PHL',1195,'Southern Tagalog'),(5521,'Ligao','PHL',205,'Bicol'),(5522,'TÃ³rshavn','FRO',1208,'Streymoyar'),(5523,'Libreville','GAB',423,'Estuaire'),(5524,'Serekunda','GMB',688,'Kombo St Mary'),(5525,'Banjul','GMB',175,'Banjul'),(5526,'Tbilisi','GEO',1257,'Tbilisi'),(5527,'Kutaisi','GEO',573,'Imereti'),(5528,'Rustavi','GEO',706,'Kvemo Kartli'),(5529,'Batumi','GEO',21,'Adzaria [AtÅ¡ara]'),(5530,'Sohumi','GEO',10,'Abhasia [Aphazeti]'),(5531,'Accra','GHA',480,'Greater Accra'),(5532,'Kumasi','GHA',112,'Ashanti'),(5533,'Tamale','GHA',933,'Northern'),(5534,'Tamale','GHA',934,'Northern'),(5535,'Tema','GHA',480,'Greater Accra'),(5536,'Sekondi-Takoradi','GHA',1381,'Western'),(5537,'Sekondi-Takoradi','GHA',1382,'Western'),(5538,'Sekondi-Takoradi','GHA',1383,'Western'),(5539,'Sekondi-Takoradi','GHA',1384,'Western'),(5540,'Gibraltar','GIB',133,'â€“'),(5541,'Gibraltar','GIB',134,'â€“'),(5542,'Gibraltar','GIB',135,'â€“'),(5543,'Gibraltar','GIB',136,'â€“'),(5544,'Gibraltar','GIB',137,'â€“'),(5545,'Gibraltar','GIB',138,'â€“'),(5546,'Gibraltar','GIB',139,'â€“'),(5547,'Gibraltar','GIB',140,'â€“'),(5548,'Gibraltar','GIB',141,'â€“'),(5549,'Gibraltar','GIB',142,'â€“'),(5550,'Gibraltar','GIB',143,'â€“'),(5551,'Gibraltar','GIB',144,'â€“'),(5552,'Gibraltar','GIB',145,'â€“'),(5553,'Gibraltar','GIB',146,'â€“'),(5554,'Saint GeorgeÂ´s','GRD',1197,'St George'),(5555,'Saint GeorgeÂ´s','GRD',1198,'St George'),(5556,'Saint GeorgeÂ´s','GRD',1199,'St George'),(5557,'Nuuk','GRL',684,'Kitaa'),(5558,'Les Abymes','GLP',478,'Grande-Terre'),(5559,'Basse-Terre','GLP',184,'Basse-Terre'),(5560,'Tamuning','GUM',133,'â€“'),(5561,'Tamuning','GUM',134,'â€“'),(5562,'Tamuning','GUM',135,'â€“'),(5563,'Tamuning','GUM',136,'â€“'),(5564,'Tamuning','GUM',137,'â€“'),(5565,'Tamuning','GUM',138,'â€“'),(5566,'Tamuning','GUM',139,'â€“'),(5567,'Tamuning','GUM',140,'â€“'),(5568,'Tamuning','GUM',141,'â€“'),(5569,'Tamuning','GUM',142,'â€“'),(5570,'Tamuning','GUM',143,'â€“'),(5571,'Tamuning','GUM',144,'â€“'),(5572,'Tamuning','GUM',145,'â€“'),(5573,'Tamuning','GUM',146,'â€“'),(5574,'AgaÃ±a','GUM',133,'â€“'),(5575,'AgaÃ±a','GUM',134,'â€“'),(5576,'AgaÃ±a','GUM',135,'â€“'),(5577,'AgaÃ±a','GUM',136,'â€“'),(5578,'AgaÃ±a','GUM',137,'â€“'),(5579,'AgaÃ±a','GUM',138,'â€“'),(5580,'AgaÃ±a','GUM',139,'â€“'),(5581,'AgaÃ±a','GUM',140,'â€“'),(5582,'AgaÃ±a','GUM',141,'â€“'),(5583,'AgaÃ±a','GUM',142,'â€“'),(5584,'AgaÃ±a','GUM',143,'â€“'),(5585,'AgaÃ±a','GUM',144,'â€“'),(5586,'AgaÃ±a','GUM',145,'â€“'),(5587,'AgaÃ±a','GUM',146,'â€“'),(5588,'Ciudad de Guatemala','GTM',487,'Guatemala'),(5589,'Mixco','GTM',487,'Guatemala'),(5590,'Villa Nueva','GTM',487,'Guatemala'),(5591,'Quetzaltenango','GTM',1057,'Quetzaltenango'),(5592,'Conakry','GIN',338,'Conakry'),(5593,'Bissau','GNB',214,'Bissau'),(5594,'Georgetown','GUY',463,'Georgetown'),(5595,'Port-au-Prince','HTI',975,'Ouest'),(5596,'Port-au-Prince','HTI',976,'Ouest'),(5597,'Carrefour','HTI',975,'Ouest'),(5598,'Carrefour','HTI',976,'Ouest'),(5599,'Delmas','HTI',975,'Ouest'),(5600,'Delmas','HTI',976,'Ouest'),(5601,'Le-Cap-HaÃ¯tien','HTI',917,'Nord'),(5602,'Le-Cap-HaÃ¯tien','HTI',918,'Nord'),(5603,'Tegucigalpa','HND',373,'Distrito Central'),(5604,'San Pedro Sula','HND',345,'CortÃ©s'),(5605,'La Ceiba','HND',125,'AtlÃ¡ntida'),(5606,'Kowloon and New Kowloon','HKG',697,'Kowloon and New Kowl'),(5607,'Victoria','HKG',545,'Hongkong'),(5608,'Longyearbyen','SJM',732,'LÃ¤nsimaa'),(5609,'Jakarta','IDN',595,'Jakarta Raya'),(5610,'Surabaya','IDN',400,'East Java'),(5611,'Bandung','IDN',1378,'West Java'),(5612,'Medan','IDN',1219,'Sumatera Utara'),(5613,'Palembang','IDN',1218,'Sumatera Selatan'),(5614,'Tangerang','IDN',1378,'West Java'),(5615,'Semarang','IDN',291,'Central Java'),(5616,'Ujung Pandang','IDN',1213,'Sulawesi Selatan'),(5617,'Malang','IDN',400,'East Java'),(5618,'Bandar Lampung','IDN',726,'Lampung'),(5619,'Bekasi','IDN',1378,'West Java'),(5620,'Padang','IDN',1217,'Sumatera Barat'),(5621,'Surakarta','IDN',291,'Central Java'),(5622,'Banjarmasin','IDN',625,'Kalimantan Selatan'),(5623,'Pekan Baru','IDN',1073,'Riau'),(5624,'Denpasar','IDN',164,'Bali'),(5625,'Yogyakarta','IDN',1404,'Yogyakarta'),(5626,'Pontianak','IDN',624,'Kalimantan Barat'),(5627,'Samarinda','IDN',627,'Kalimantan Timur'),(5628,'Jambi','IDN',597,'Jambi'),(5629,'Depok','IDN',1378,'West Java'),(5630,'Cimahi','IDN',1378,'West Java'),(5631,'Balikpapan','IDN',627,'Kalimantan Timur'),(5632,'Manado','IDN',1216,'Sulawesi Utara'),(5633,'Mataram','IDN',943,'Nusa Tenggara Barat'),(5634,'Pekalongan','IDN',291,'Central Java'),(5635,'Tegal','IDN',291,'Central Java'),(5636,'Bogor','IDN',1378,'West Java'),(5637,'Ciputat','IDN',1378,'West Java'),(5638,'Pondokgede','IDN',1378,'West Java'),(5639,'Cirebon','IDN',1378,'West Java'),(5640,'Kediri','IDN',400,'East Java'),(5641,'Ambon','IDN',849,'Molukit'),(5642,'Jember','IDN',400,'East Java'),(5643,'Cilacap','IDN',291,'Central Java'),(5644,'Cimanggis','IDN',1378,'West Java'),(5645,'Pematang Siantar','IDN',1219,'Sumatera Utara'),(5646,'Purwokerto','IDN',291,'Central Java'),(5647,'Ciomas','IDN',1378,'West Java'),(5648,'Tasikmalaya','IDN',1378,'West Java'),(5649,'Madiun','IDN',400,'East Java'),(5650,'Bengkulu','IDN',200,'Bengkulu'),(5651,'Karawang','IDN',1378,'West Java'),(5652,'Banda Aceh','IDN',14,'Aceh'),(5653,'Palu','IDN',1214,'Sulawesi Tengah'),(5654,'Pasuruan','IDN',400,'East Java'),(5655,'Kupang','IDN',944,'Nusa Tenggara Timur'),(5656,'Tebing Tinggi','IDN',1219,'Sumatera Utara'),(5657,'Percut Sei Tuan','IDN',1219,'Sumatera Utara'),(5658,'Binjai','IDN',1219,'Sumatera Utara'),(5659,'Sukabumi','IDN',1378,'West Java'),(5660,'Waru','IDN',400,'East Java'),(5661,'Pangkal Pinang','IDN',1218,'Sumatera Selatan'),(5662,'Magelang','IDN',291,'Central Java'),(5663,'Blitar','IDN',400,'East Java'),(5664,'Serang','IDN',1378,'West Java'),(5665,'Probolinggo','IDN',400,'East Java'),(5666,'Cilegon','IDN',1378,'West Java'),(5667,'Cianjur','IDN',1378,'West Java'),(5668,'Ciparay','IDN',1378,'West Java'),(5669,'Lhokseumawe','IDN',14,'Aceh'),(5670,'Taman','IDN',400,'East Java'),(5671,'Depok','IDN',1404,'Yogyakarta'),(5672,'Citeureup','IDN',1378,'West Java'),(5673,'Pemalang','IDN',291,'Central Java'),(5674,'Klaten','IDN',291,'Central Java'),(5675,'Salatiga','IDN',291,'Central Java'),(5676,'Cibinong','IDN',1378,'West Java'),(5677,'Palangka Raya','IDN',626,'Kalimantan Tengah'),(5678,'Mojokerto','IDN',400,'East Java'),(5679,'Purwakarta','IDN',1378,'West Java'),(5680,'Garut','IDN',1378,'West Java'),(5681,'Kudus','IDN',291,'Central Java'),(5682,'Kendari','IDN',1215,'Sulawesi Tenggara'),(5683,'Jaya Pura','IDN',1376,'West Irian'),(5684,'Gorontalo','IDN',1216,'Sulawesi Utara'),(5685,'Majalaya','IDN',1378,'West Java'),(5686,'Pondok Aren','IDN',1378,'West Java'),(5687,'Jombang','IDN',400,'East Java'),(5688,'Sunggal','IDN',1219,'Sumatera Utara'),(5689,'Batam','IDN',1073,'Riau'),(5690,'Padang Sidempuan','IDN',1219,'Sumatera Utara'),(5691,'Sawangan','IDN',1378,'West Java'),(5692,'Banyuwangi','IDN',400,'East Java'),(5693,'Tanjung Pinang','IDN',1073,'Riau'),(5694,'Mumbai (Bombay)','IND',780,'Maharashtra'),(5695,'Delhi','IND',365,'Delhi'),(5696,'Calcutta [Kolkata]','IND',1372,'West Bengali'),(5697,'Chennai (Madras)','IND',1244,'Tamil Nadu'),(5698,'Hyderabad','IND',79,'Andhra Pradesh'),(5699,'Ahmedabad','IND',493,'Gujarat'),(5700,'Bangalore','IND',645,'Karnataka'),(5701,'Kanpur','IND',1330,'Uttar Pradesh'),(5702,'Nagpur','IND',780,'Maharashtra'),(5703,'Lucknow','IND',1330,'Uttar Pradesh'),(5704,'Pune','IND',780,'Maharashtra'),(5705,'Surat','IND',493,'Gujarat'),(5706,'Jaipur','IND',1063,'Rajasthan'),(5707,'Indore','IND',772,'Madhya Pradesh'),(5708,'Bhopal','IND',772,'Madhya Pradesh'),(5709,'Ludhiana','IND',1034,'Punjab'),(5710,'Ludhiana','IND',1035,'Punjab'),(5711,'Vadodara (Baroda)','IND',493,'Gujarat'),(5712,'Kalyan','IND',780,'Maharashtra'),(5713,'Madurai','IND',1244,'Tamil Nadu'),(5714,'Haora (Howrah)','IND',1372,'West Bengali'),(5715,'Varanasi (Benares)','IND',1330,'Uttar Pradesh'),(5716,'Patna','IND',206,'Bihar'),(5717,'Srinagar','IND',598,'Jammu and Kashmir'),(5718,'Agra','IND',1330,'Uttar Pradesh'),(5719,'Coimbatore','IND',1244,'Tamil Nadu'),(5720,'Thane (Thana)','IND',780,'Maharashtra'),(5721,'Allahabad','IND',1330,'Uttar Pradesh'),(5722,'Meerut','IND',1330,'Uttar Pradesh'),(5723,'Vishakhapatnam','IND',79,'Andhra Pradesh'),(5724,'Jabalpur','IND',772,'Madhya Pradesh'),(5725,'Amritsar','IND',1034,'Punjab'),(5726,'Amritsar','IND',1035,'Punjab'),(5727,'Faridabad','IND',519,'Haryana'),(5728,'Vijayawada','IND',79,'Andhra Pradesh'),(5729,'Gwalior','IND',771,'Madhya\n Pradesh'),(5730,'Jodhpur','IND',1063,'Rajasthan'),(5731,'Nashik (Nasik)','IND',780,'Maharashtra'),(5732,'Hubli-Dharwad','IND',645,'Karnataka'),(5733,'Solapur (Sholapur)','IND',780,'Maharashtra'),(5734,'Ranchi','IND',603,'Jharkhand'),(5735,'Bareilly','IND',1330,'Uttar Pradesh'),(5736,'Guwahati (Gauhati)','IND',114,'Assam'),(5737,'Shambajinagar (Aurangabad)','IND',780,'Maharashtra'),(5738,'Cochin (Kochi)','IND',662,'Kerala'),(5739,'Rajkot','IND',493,'Gujarat'),(5740,'Kota','IND',1063,'Rajasthan'),(5741,'Thiruvananthapuram (Trivandrum','IND',662,'Kerala'),(5742,'Pimpri-Chinchwad','IND',780,'Maharashtra'),(5743,'Jalandhar (Jullundur)','IND',1034,'Punjab'),(5744,'Jalandhar (Jullundur)','IND',1035,'Punjab'),(5745,'Gorakhpur','IND',1330,'Uttar Pradesh'),(5746,'Chandigarh','IND',304,'Chandigarh'),(5747,'Mysore','IND',645,'Karnataka'),(5748,'Aligarh','IND',1330,'Uttar Pradesh'),(5749,'Guntur','IND',79,'Andhra Pradesh'),(5750,'Jamshedpur','IND',603,'Jharkhand'),(5751,'Ghaziabad','IND',1330,'Uttar Pradesh'),(5752,'Warangal','IND',79,'Andhra Pradesh'),(5753,'Raipur','IND',309,'Chhatisgarh'),(5754,'Moradabad','IND',1330,'Uttar Pradesh'),(5755,'Durgapur','IND',1372,'West Bengali'),(5756,'Amravati','IND',780,'Maharashtra'),(5757,'Calicut (Kozhikode)','IND',662,'Kerala'),(5758,'Bikaner','IND',1063,'Rajasthan'),(5759,'Bhubaneswar','IND',964,'Orissa'),(5760,'Kolhapur','IND',780,'Maharashtra'),(5761,'Kataka (Cuttack)','IND',964,'Orissa'),(5762,'Ajmer','IND',1063,'Rajasthan'),(5763,'Bhavnagar','IND',493,'Gujarat'),(5764,'Tiruchirapalli','IND',1244,'Tamil Nadu'),(5765,'Bhilai','IND',309,'Chhatisgarh'),(5766,'Bhiwandi','IND',780,'Maharashtra'),(5767,'Saharanpur','IND',1330,'Uttar Pradesh'),(5768,'Ulhasnagar','IND',780,'Maharashtra'),(5769,'Salem','IND',1244,'Tamil Nadu'),(5770,'Ujjain','IND',772,'Madhya Pradesh'),(5771,'Malegaon','IND',780,'Maharashtra'),(5772,'Jamnagar','IND',493,'Gujarat'),(5773,'Bokaro Steel City','IND',603,'Jharkhand'),(5774,'Akola','IND',780,'Maharashtra'),(5775,'Belgaum','IND',645,'Karnataka'),(5776,'Rajahmundry','IND',79,'Andhra Pradesh'),(5777,'Nellore','IND',79,'Andhra Pradesh'),(5778,'Udaipur','IND',1063,'Rajasthan'),(5779,'New Bombay','IND',780,'Maharashtra'),(5780,'Bhatpara','IND',1372,'West Bengali'),(5781,'Gulbarga','IND',645,'Karnataka'),(5782,'New Delhi','IND',365,'Delhi'),(5783,'Jhansi','IND',1330,'Uttar Pradesh'),(5784,'Gaya','IND',206,'Bihar'),(5785,'Kakinada','IND',79,'Andhra Pradesh'),(5786,'Dhule (Dhulia)','IND',780,'Maharashtra'),(5787,'Panihati','IND',1372,'West Bengali'),(5788,'Nanded (Nander)','IND',780,'Maharashtra'),(5789,'Mangalore','IND',645,'Karnataka'),(5790,'Dehra Dun','IND',1331,'Uttaranchal'),(5791,'Kamarhati','IND',1372,'West Bengali'),(5792,'Davangere','IND',645,'Karnataka'),(5793,'Asansol','IND',1372,'West Bengali'),(5794,'Bhagalpur','IND',206,'Bihar'),(5795,'Bellary','IND',645,'Karnataka'),(5796,'Barddhaman (Burdwan)','IND',1372,'West Bengali'),(5797,'Rampur','IND',1330,'Uttar Pradesh'),(5798,'Jalgaon','IND',780,'Maharashtra'),(5799,'Muzaffarpur','IND',206,'Bihar'),(5800,'Nizamabad','IND',79,'Andhra Pradesh'),(5801,'Muzaffarnagar','IND',1330,'Uttar Pradesh'),(5802,'Patiala','IND',1034,'Punjab'),(5803,'Patiala','IND',1035,'Punjab'),(5804,'Shahjahanpur','IND',1330,'Uttar Pradesh'),(5805,'Kurnool','IND',79,'Andhra Pradesh'),(5806,'Tiruppur (Tirupper)','IND',1244,'Tamil Nadu'),(5807,'Rohtak','IND',519,'Haryana'),(5808,'South Dum Dum','IND',1372,'West Bengali'),(5809,'Mathura','IND',1330,'Uttar Pradesh'),(5810,'Chandrapur','IND',780,'Maharashtra'),(5811,'Barahanagar (Baranagar)','IND',1372,'West Bengali'),(5812,'Darbhanga','IND',206,'Bihar'),(5813,'Siliguri (Shiliguri)','IND',1372,'West Bengali'),(5814,'Raurkela','IND',964,'Orissa'),(5815,'Ambattur','IND',1244,'Tamil Nadu'),(5816,'Panipat','IND',519,'Haryana'),(5817,'Firozabad','IND',1330,'Uttar Pradesh'),(5818,'Ichalkaranji','IND',780,'Maharashtra'),(5819,'Jammu','IND',598,'Jammu and Kashmir'),(5820,'Ramagundam','IND',79,'Andhra Pradesh'),(5821,'Eluru','IND',79,'Andhra Pradesh'),(5822,'Brahmapur','IND',964,'Orissa'),(5823,'Alwar','IND',1063,'Rajasthan'),(5824,'Pondicherry','IND',1019,'Pondicherry'),(5825,'Thanjavur','IND',1244,'Tamil Nadu'),(5826,'Bihar Sharif','IND',206,'Bihar'),(5827,'Tuticorin','IND',1244,'Tamil Nadu'),(5828,'Imphal','IND',792,'Manipur'),(5829,'Latur','IND',780,'Maharashtra'),(5830,'Sagar','IND',772,'Madhya Pradesh'),(5831,'Farrukhabad-cum-Fatehgarh','IND',1330,'Uttar Pradesh'),(5832,'Sangli','IND',780,'Maharashtra'),(5833,'Parbhani','IND',780,'Maharashtra'),(5834,'Nagar Coil','IND',1244,'Tamil Nadu'),(5835,'Bijapur','IND',645,'Karnataka'),(5836,'Kukatpalle','IND',79,'Andhra Pradesh'),(5837,'Bally','IND',1372,'West Bengali'),(5838,'Bhilwara','IND',1063,'Rajasthan'),(5839,'Ratlam','IND',772,'Madhya Pradesh'),(5840,'Avadi','IND',1244,'Tamil Nadu'),(5841,'Dindigul','IND',1244,'Tamil Nadu'),(5842,'Ahmadnagar','IND',780,'Maharashtra'),(5843,'Bilaspur','IND',309,'Chhatisgarh'),(5844,'Shimoga','IND',645,'Karnataka'),(5845,'Kharagpur','IND',1372,'West Bengali'),(5846,'Mira Bhayandar','IND',780,'Maharashtra'),(5847,'Vellore','IND',1244,'Tamil Nadu'),(5848,'Jalna','IND',780,'Maharashtra'),(5849,'Burnpur','IND',1372,'West Bengali'),(5850,'Anantapur','IND',79,'Andhra Pradesh'),(5851,'Allappuzha (Alleppey)','IND',662,'Kerala'),(5852,'Tirupati','IND',79,'Andhra Pradesh'),(5853,'Karnal','IND',519,'Haryana'),(5854,'Burhanpur','IND',772,'Madhya Pradesh'),(5855,'Hisar (Hissar)','IND',519,'Haryana'),(5856,'Tiruvottiyur','IND',1244,'Tamil Nadu'),(5857,'Mirzapur-cum-Vindhyachal','IND',1330,'Uttar Pradesh'),(5858,'Secunderabad','IND',79,'Andhra Pradesh'),(5859,'Nadiad','IND',493,'Gujarat'),(5860,'Dewas','IND',772,'Madhya Pradesh'),(5861,'Murwara (Katni)','IND',772,'Madhya Pradesh'),(5862,'Ganganagar','IND',1063,'Rajasthan'),(5863,'Vizianagaram','IND',79,'Andhra Pradesh'),(5864,'Erode','IND',1244,'Tamil Nadu'),(5865,'Machilipatnam (Masulipatam)','IND',79,'Andhra Pradesh'),(5866,'Bhatinda (Bathinda)','IND',1034,'Punjab'),(5867,'Bhatinda (Bathinda)','IND',1035,'Punjab'),(5868,'Raichur','IND',645,'Karnataka'),(5869,'Agartala','IND',1301,'Tripura'),(5870,'Arrah (Ara)','IND',206,'Bihar'),(5871,'Satna','IND',772,'Madhya Pradesh'),(5872,'Lalbahadur Nagar','IND',79,'Andhra Pradesh'),(5873,'Aizawl','IND',847,'Mizoram'),(5874,'Uluberia','IND',1372,'West Bengali'),(5875,'Katihar','IND',206,'Bihar'),(5876,'Cuddalore','IND',1244,'Tamil Nadu'),(5877,'Hugli-Chinsurah','IND',1372,'West Bengali'),(5878,'Dhanbad','IND',603,'Jharkhand'),(5879,'Raiganj','IND',1372,'West Bengali'),(5880,'Sambhal','IND',1330,'Uttar Pradesh'),(5881,'Durg','IND',309,'Chhatisgarh'),(5882,'Munger (Monghyr)','IND',206,'Bihar'),(5883,'Kanchipuram','IND',1244,'Tamil Nadu'),(5884,'North Dum Dum','IND',1372,'West Bengali'),(5885,'Karimnagar','IND',79,'Andhra Pradesh'),(5886,'Bharatpur','IND',1063,'Rajasthan'),(5887,'Sikar','IND',1063,'Rajasthan'),(5888,'Hardwar (Haridwar)','IND',1331,'Uttaranchal'),(5889,'Dabgram','IND',1372,'West Bengali'),(5890,'Morena','IND',772,'Madhya Pradesh'),(5891,'Noida','IND',1330,'Uttar Pradesh'),(5892,'Hapur','IND',1330,'Uttar Pradesh'),(5893,'Bhusawal','IND',780,'Maharashtra'),(5894,'Khandwa','IND',772,'Madhya Pradesh'),(5895,'Yamuna Nagar','IND',519,'Haryana'),(5896,'Sonipat (Sonepat)','IND',519,'Haryana'),(5897,'Tenali','IND',79,'Andhra Pradesh'),(5898,'Raurkela Civil Township','IND',964,'Orissa'),(5899,'Kollam (Quilon)','IND',662,'Kerala'),(5900,'Kumbakonam','IND',1244,'Tamil Nadu'),(5901,'Ingraj Bazar (English Bazar)','IND',1372,'West Bengali'),(5902,'Timkur','IND',645,'Karnataka'),(5903,'Amroha','IND',1330,'Uttar Pradesh'),(5904,'Serampore','IND',1372,'West Bengali'),(5905,'Chapra','IND',206,'Bihar'),(5906,'Pali','IND',1063,'Rajasthan'),(5907,'Maunath Bhanjan','IND',1330,'Uttar Pradesh'),(5908,'Adoni','IND',79,'Andhra Pradesh'),(5909,'Jaunpur','IND',1330,'Uttar Pradesh'),(5910,'Tirunelveli','IND',1244,'Tamil Nadu'),(5911,'Bahraich','IND',1330,'Uttar Pradesh'),(5912,'Gadag Betigeri','IND',645,'Karnataka'),(5913,'Proddatur','IND',79,'Andhra Pradesh'),(5914,'Chittoor','IND',79,'Andhra Pradesh'),(5915,'Barrackpur','IND',1372,'West Bengali'),(5916,'Bharuch (Broach)','IND',493,'Gujarat'),(5917,'Naihati','IND',1372,'West Bengali'),(5918,'Shillong','IND',824,'Meghalaya'),(5919,'Sambalpur','IND',964,'Orissa'),(5920,'Junagadh','IND',493,'Gujarat'),(5921,'Rae Bareli','IND',1330,'Uttar Pradesh'),(5922,'Rewa','IND',772,'Madhya Pradesh'),(5923,'Gurgaon','IND',519,'Haryana'),(5924,'Khammam','IND',79,'Andhra Pradesh'),(5925,'Bulandshahr','IND',1330,'Uttar Pradesh'),(5926,'Navsari','IND',493,'Gujarat'),(5927,'Malkajgiri','IND',79,'Andhra Pradesh'),(5928,'Midnapore (Medinipur)','IND',1372,'West Bengali'),(5929,'Miraj','IND',780,'Maharashtra'),(5930,'Raj Nandgaon','IND',309,'Chhatisgarh'),(5931,'Alandur','IND',1244,'Tamil Nadu'),(5932,'Puri','IND',964,'Orissa'),(5933,'Navadwip','IND',1372,'West Bengali'),(5934,'Sirsa','IND',519,'Haryana'),(5935,'Korba','IND',309,'Chhatisgarh'),(5936,'Faizabad','IND',1330,'Uttar Pradesh'),(5937,'Etawah','IND',1330,'Uttar Pradesh'),(5938,'Pathankot','IND',1034,'Punjab'),(5939,'Pathankot','IND',1035,'Punjab'),(5940,'Gandhinagar','IND',493,'Gujarat'),(5941,'Palghat (Palakkad)','IND',662,'Kerala'),(5942,'Veraval','IND',493,'Gujarat'),(5943,'Hoshiarpur','IND',1034,'Punjab'),(5944,'Hoshiarpur','IND',1035,'Punjab'),(5945,'Ambala','IND',519,'Haryana'),(5946,'Sitapur','IND',1330,'Uttar Pradesh'),(5947,'Bhiwani','IND',519,'Haryana'),(5948,'Cuddapah','IND',79,'Andhra Pradesh'),(5949,'Bhimavaram','IND',79,'Andhra Pradesh'),(5950,'Krishnanagar','IND',1372,'West Bengali'),(5951,'Chandannagar','IND',1372,'West Bengali'),(5952,'Mandya','IND',645,'Karnataka'),(5953,'Dibrugarh','IND',114,'Assam'),(5954,'Nandyal','IND',79,'Andhra Pradesh'),(5955,'Balurghat','IND',1372,'West Bengali'),(5956,'Neyveli','IND',1244,'Tamil Nadu'),(5957,'Fatehpur','IND',1330,'Uttar Pradesh'),(5958,'Mahbubnagar','IND',79,'Andhra Pradesh'),(5959,'Budaun','IND',1330,'Uttar Pradesh'),(5960,'Porbandar','IND',493,'Gujarat'),(5961,'Silchar','IND',114,'Assam'),(5962,'Berhampore (Baharampur)','IND',1372,'West Bengali'),(5963,'Purnea (Purnia)','IND',603,'Jharkhand'),(5964,'Bankura','IND',1372,'West Bengali'),(5965,'Rajapalaiyam','IND',1244,'Tamil Nadu'),(5966,'Titagarh','IND',1372,'West Bengali'),(5967,'Halisahar','IND',1372,'West Bengali'),(5968,'Hathras','IND',1330,'Uttar Pradesh'),(5969,'Bhir (Bid)','IND',780,'Maharashtra'),(5970,'Pallavaram','IND',1244,'Tamil Nadu'),(5971,'Anand','IND',493,'Gujarat'),(5972,'Mango','IND',603,'Jharkhand'),(5973,'Santipur','IND',1372,'West Bengali'),(5974,'Bhind','IND',772,'Madhya Pradesh'),(5975,'Gondiya','IND',780,'Maharashtra'),(5976,'Tiruvannamalai','IND',1244,'Tamil Nadu'),(5977,'Yeotmal (Yavatmal)','IND',780,'Maharashtra'),(5978,'Kulti-Barakar','IND',1372,'West Bengali'),(5979,'Moga','IND',1034,'Punjab'),(5980,'Moga','IND',1035,'Punjab'),(5981,'Shivapuri','IND',772,'Madhya Pradesh'),(5982,'Bidar','IND',645,'Karnataka'),(5983,'Guntakal','IND',79,'Andhra Pradesh'),(5984,'Unnao','IND',1330,'Uttar Pradesh'),(5985,'Barasat','IND',1372,'West Bengali'),(5986,'Tambaram','IND',1244,'Tamil Nadu'),(5987,'Abohar','IND',1034,'Punjab'),(5988,'Abohar','IND',1035,'Punjab'),(5989,'Pilibhit','IND',1330,'Uttar Pradesh'),(5990,'Valparai','IND',1243,'Tamil\n Nadu'),(5991,'Gonda','IND',1330,'Uttar Pradesh'),(5992,'Surendranagar','IND',493,'Gujarat'),(5993,'Qutubullapur','IND',79,'Andhra Pradesh'),(5994,'Beawar','IND',1063,'Rajasthan'),(5995,'Hindupur','IND',79,'Andhra Pradesh'),(5996,'Gandhidham','IND',493,'Gujarat'),(5997,'Haldwani-cum-Kathgodam','IND',1331,'Uttaranchal'),(5998,'Tellicherry (Thalassery)','IND',662,'Kerala'),(5999,'Wardha','IND',780,'Maharashtra'),(6000,'Rishra','IND',1372,'West Bengali'),(6001,'Bhuj','IND',493,'Gujarat'),(6002,'Modinagar','IND',1330,'Uttar Pradesh'),(6003,'Gudivada','IND',79,'Andhra Pradesh'),(6004,'Basirhat','IND',1372,'West Bengali'),(6005,'Uttarpara-Kotrung','IND',1372,'West Bengali'),(6006,'Ongole','IND',79,'Andhra Pradesh'),(6007,'North Barrackpur','IND',1372,'West Bengali'),(6008,'Guna','IND',772,'Madhya Pradesh'),(6009,'Haldia','IND',1372,'West Bengali'),(6010,'Habra','IND',1372,'West Bengali'),(6011,'Kanchrapara','IND',1372,'West Bengali'),(6012,'Tonk','IND',1063,'Rajasthan'),(6013,'Champdani','IND',1372,'West Bengali'),(6014,'Orai','IND',1330,'Uttar Pradesh'),(6015,'Pudukkottai','IND',1244,'Tamil Nadu'),(6016,'Sasaram','IND',206,'Bihar'),(6017,'Hazaribag','IND',603,'Jharkhand'),(6018,'Palayankottai','IND',1244,'Tamil Nadu'),(6019,'Banda','IND',1330,'Uttar Pradesh'),(6020,'Godhra','IND',493,'Gujarat'),(6021,'Hospet','IND',645,'Karnataka'),(6022,'Ashoknagar-Kalyangarh','IND',1372,'West Bengali'),(6023,'Achalpur','IND',780,'Maharashtra'),(6024,'Patan','IND',493,'Gujarat'),(6025,'Mandasor','IND',772,'Madhya Pradesh'),(6026,'Damoh','IND',772,'Madhya Pradesh'),(6027,'Satara','IND',780,'Maharashtra'),(6028,'Meerut Cantonment','IND',1330,'Uttar Pradesh'),(6029,'Dehri','IND',206,'Bihar'),(6030,'Delhi Cantonment','IND',365,'Delhi'),(6031,'Chhindwara','IND',772,'Madhya Pradesh'),(6032,'Bansberia','IND',1372,'West Bengali'),(6033,'Nagaon','IND',114,'Assam'),(6034,'Kanpur Cantonment','IND',1330,'Uttar Pradesh'),(6035,'Vidisha','IND',772,'Madhya Pradesh'),(6036,'Bettiah','IND',206,'Bihar'),(6037,'Purulia','IND',603,'Jharkhand'),(6038,'Hassan','IND',645,'Karnataka'),(6039,'Ambala Sadar','IND',519,'Haryana'),(6040,'Baidyabati','IND',1372,'West Bengali'),(6041,'Morvi','IND',493,'Gujarat'),(6042,'Raigarh','IND',309,'Chhatisgarh'),(6043,'Vejalpur','IND',493,'Gujarat'),(6044,'Baghdad','IRQ',156,'Baghdad'),(6045,'Mosul','IRQ',910,'Ninawa'),(6046,'Irbil','IRQ',582,'Irbil'),(6047,'Kirkuk','IRQ',55,'al-Tamim'),(6048,'Basra','IRQ',182,'Basra'),(6049,'al-Sulaymaniya','IRQ',54,'al-Sulaymaniya'),(6050,'al-Najaf','IRQ',45,'al-Najaf'),(6051,'Karbala','IRQ',643,'Karbala'),(6052,'al-Hilla','IRQ',152,'Babil'),(6053,'al-Nasiriya','IRQ',368,'DhiQar'),(6054,'al-Amara','IRQ',816,'Maysan'),(6055,'al-Diwaniya','IRQ',47,'al-Qadisiya'),(6056,'al-Ramadi','IRQ',30,'al-Anbar'),(6057,'al-Kut','IRQ',1368,'Wasit'),(6058,'Baquba','IRQ',379,'Diyala'),(6059,'Teheran','IRN',1258,'Teheran'),(6060,'Mashhad','IRN',670,'Khorasan'),(6061,'Esfahan','IRN',419,'Esfahan'),(6062,'Tabriz','IRN',396,'East Azerbaidzan'),(6063,'Shiraz','IRN',429,'Fars'),(6064,'Karaj','IRN',1258,'Teheran'),(6065,'Ahvaz','IRN',674,'Khuzestan'),(6066,'Qom','IRN',1048,'Qom'),(6067,'Kermanshah','IRN',664,'Kermanshah'),(6068,'Urmia','IRN',1371,'West Azerbaidzan'),(6069,'Zahedan','IRN',1175,'Sistan va Baluchesta'),(6070,'Rasht','IRN',468,'Gilan'),(6071,'Hamadan','IRN',508,'Hamadan'),(6072,'Kerman','IRN',663,'Kerman'),(6073,'Arak','IRN',803,'Markazi'),(6074,'Ardebil','IRN',102,'Ardebil'),(6075,'Yazd','IRN',1401,'Yazd'),(6076,'Qazvin','IRN',1045,'Qazvin'),(6077,'Zanjan','IRN',1410,'Zanjan'),(6078,'Sanandaj','IRN',691,'Kordestan'),(6079,'Bandar-e-Abbas','IRN',549,'Hormozgan'),(6080,'Khorramabad','IRN',753,'Lorestan'),(6081,'Eslamshahr','IRN',1258,'Teheran'),(6082,'Borujerd','IRN',753,'Lorestan'),(6083,'Abadan','IRN',674,'Khuzestan'),(6084,'Dezful','IRN',674,'Khuzestan'),(6085,'Kashan','IRN',419,'Esfahan'),(6086,'Sari','IRN',817,'Mazandaran'),(6087,'Gorgan','IRN',471,'Golestan'),(6088,'Najafabad','IRN',419,'Esfahan'),(6089,'Sabzevar','IRN',670,'Khorasan'),(6090,'Khomeynishahr','IRN',419,'Esfahan'),(6091,'Amol','IRN',817,'Mazandaran'),(6092,'Neyshabur','IRN',670,'Khorasan'),(6093,'Babol','IRN',817,'Mazandaran'),(6094,'Khoy','IRN',1371,'West Azerbaidzan'),(6095,'Malayer','IRN',508,'Hamadan'),(6096,'Bushehr','IRN',249,'Bushehr'),(6097,'Qaemshahr','IRN',817,'Mazandaran'),(6098,'Qarchak','IRN',1258,'Teheran'),(6099,'Qods','IRN',1258,'Teheran'),(6100,'Sirjan','IRN',663,'Kerman'),(6101,'Bojnurd','IRN',670,'Khorasan'),(6102,'Maragheh','IRN',396,'East Azerbaidzan'),(6103,'Birjand','IRN',670,'Khorasan'),(6104,'Ilam','IRN',568,'Ilam'),(6105,'Bukan','IRN',1371,'West Azerbaidzan'),(6106,'Masjed-e-Soleyman','IRN',674,'Khuzestan'),(6107,'Saqqez','IRN',691,'Kordestan'),(6108,'Gonbad-e Qabus','IRN',817,'Mazandaran'),(6109,'Saveh','IRN',1048,'Qom'),(6110,'Mahabad','IRN',1371,'West Azerbaidzan'),(6111,'Varamin','IRN',1258,'Teheran'),(6112,'Andimeshk','IRN',674,'Khuzestan'),(6113,'Khorramshahr','IRN',674,'Khuzestan'),(6114,'Shahrud','IRN',1147,'Semnan'),(6115,'Marv Dasht','IRN',429,'Fars'),(6116,'Zabol','IRN',1175,'Sistan va Baluchesta'),(6117,'Shahr-e Kord','IRN',302,'Chaharmahal va Bakht'),(6118,'Bandar-e Anzali','IRN',468,'Gilan'),(6119,'Rafsanjan','IRN',663,'Kerman'),(6120,'Marand','IRN',396,'East Azerbaidzan'),(6121,'Torbat-e Heydariyeh','IRN',670,'Khorasan'),(6122,'Jahrom','IRN',429,'Fars'),(6123,'Semnan','IRN',1147,'Semnan'),(6124,'Miandoab','IRN',1371,'West Azerbaidzan'),(6125,'Qomsheh','IRN',419,'Esfahan'),(6126,'Dublin','IRL',735,'Leinster'),(6127,'Cork','IRL',863,'Munster'),(6128,'ReykjavÃ­k','ISL',526,'HÃ¶fuÃ°borgarsvÃ¦Ã°i'),(6129,'Jerusalem','ISR',602,'Jerusalem'),(6130,'Tel Aviv-Jaffa','ISR',1260,'Tel Aviv'),(6131,'Haifa','ISR',500,'Haifa'),(6132,'Rishon Le Ziyyon','ISR',497,'Ha Merkaz'),(6133,'Beerseba','ISR',496,'Ha Darom'),(6134,'Holon','ISR',1260,'Tel Aviv'),(6135,'Petah Tiqwa','ISR',497,'Ha Merkaz'),(6136,'Ashdod','ISR',496,'Ha Darom'),(6137,'Netanya','ISR',497,'Ha Merkaz'),(6138,'Bat Yam','ISR',1260,'Tel Aviv'),(6139,'Bene Beraq','ISR',1260,'Tel Aviv'),(6140,'Ramat Gan','ISR',1260,'Tel Aviv'),(6141,'Ashqelon','ISR',496,'Ha Darom'),(6142,'Rehovot','ISR',497,'Ha Merkaz'),(6143,'Roma','ITA',731,'Latium'),(6144,'Milano','ITA',752,'Lombardia'),(6145,'Napoli','ITA',259,'Campania'),(6146,'Torino','ITA',1001,'Piemonte'),(6147,'Palermo','ITA',1174,'Sisilia'),(6148,'Genova','ITA',739,'Liguria'),(6149,'Bologna','ITA',413,'Emilia-Romagna'),(6150,'Firenze','ITA',1293,'Toscana'),(6151,'Catania','ITA',1174,'Sisilia'),(6152,'Bari','ITA',94,'Apulia'),(6153,'Venezia','ITA',1346,'Veneto'),(6154,'Messina','ITA',1174,'Sisilia'),(6155,'Verona','ITA',1346,'Veneto'),(6156,'Trieste','ITA',443,'Friuli-Venezia Giuli'),(6157,'Padova','ITA',1346,'Veneto'),(6158,'Taranto','ITA',94,'Apulia'),(6159,'Brescia','ITA',752,'Lombardia'),(6160,'Reggio di Calabria','ITA',254,'Calabria'),(6161,'Modena','ITA',413,'Emilia-Romagna'),(6162,'Prato','ITA',1293,'Toscana'),(6163,'Parma','ITA',413,'Emilia-Romagna'),(6164,'Cagliari','ITA',1134,'Sardinia'),(6165,'Livorno','ITA',1293,'Toscana'),(6166,'Perugia','ITA',1324,'Umbria'),(6167,'Foggia','ITA',94,'Apulia'),(6168,'Reggio nellÂ´ Emilia','ITA',413,'Emilia-Romagna'),(6169,'Salerno','ITA',259,'Campania'),(6170,'Ravenna','ITA',413,'Emilia-Romagna'),(6171,'Ferrara','ITA',413,'Emilia-Romagna'),(6172,'Rimini','ITA',413,'Emilia-Romagna'),(6173,'Syrakusa','ITA',1174,'Sisilia'),(6174,'Sassari','ITA',1134,'Sardinia'),(6175,'Monza','ITA',752,'Lombardia'),(6176,'Bergamo','ITA',752,'Lombardia'),(6177,'Pescara','ITA',12,'Abruzzit'),(6178,'Latina','ITA',731,'Latium'),(6179,'Vicenza','ITA',1346,'Veneto'),(6180,'Terni','ITA',1324,'Umbria'),(6181,'ForlÃ¬','ITA',413,'Emilia-Romagna'),(6182,'Trento','ITA',1299,'Trentino-Alto Adige'),(6183,'Novara','ITA',1001,'Piemonte'),(6184,'Piacenza','ITA',413,'Emilia-Romagna'),(6185,'Ancona','ITA',799,'Marche'),(6186,'Lecce','ITA',94,'Apulia'),(6187,'Bolzano','ITA',1299,'Trentino-Alto Adige'),(6188,'Catanzaro','ITA',254,'Calabria'),(6189,'La Spezia','ITA',739,'Liguria'),(6190,'Udine','ITA',443,'Friuli-Venezia Giuli'),(6191,'Torre del Greco','ITA',259,'Campania'),(6192,'Andria','ITA',94,'Apulia'),(6193,'Brindisi','ITA',94,'Apulia'),(6194,'Giugliano in Campania','ITA',259,'Campania'),(6195,'Pisa','ITA',1293,'Toscana'),(6196,'Barletta','ITA',94,'Apulia'),(6197,'Arezzo','ITA',1293,'Toscana'),(6198,'Alessandria','ITA',1001,'Piemonte'),(6199,'Cesena','ITA',413,'Emilia-Romagna'),(6200,'Pesaro','ITA',799,'Marche'),(6201,'Dili','TMP',369,'Dili'),(6202,'Wien','AUT',1389,'Wien'),(6203,'Graz','AUT',1207,'Steiermark'),(6204,'Linz','AUT',925,'North Austria'),(6205,'Salzburg','AUT',1105,'Salzburg'),(6206,'Innsbruck','AUT',1279,'Tiroli'),(6207,'Klagenfurt','AUT',654,'KÃ¤rnten'),(6208,'Spanish Town','JAM',1205,'St. Catherine'),(6209,'Kingston','JAM',1204,'St. Andrew'),(6210,'Portmore','JAM',1204,'St. Andrew'),(6211,'Tokyo','JPN',1288,'Tokyo-to'),(6212,'Jokohama [Yokohama]','JPN',632,'Kanagawa'),(6213,'Osaka','JPN',968,'Osaka'),(6214,'Nagoya','JPN',25,'Aichi'),(6215,'Sapporo','JPN',542,'Hokkaido'),(6216,'Kioto','JPN',713,'Kyoto'),(6217,'Kobe','JPN',560,'Hyogo'),(6218,'Fukuoka','JPN',446,'Fukuoka'),(6219,'Kawasaki','JPN',632,'Kanagawa'),(6220,'Hiroshima','JPN',537,'Hiroshima'),(6221,'Kitakyushu','JPN',446,'Fukuoka'),(6222,'Sendai','JPN',845,'Miyagi'),(6223,'Chiba','JPN',313,'Chiba'),(6224,'Sakai','JPN',968,'Osaka'),(6225,'Kumamoto','JPN',702,'Kumamoto'),(6226,'Okayama','JPN',952,'Okayama'),(6227,'Sagamihara','JPN',632,'Kanagawa'),(6228,'Hamamatsu','JPN',1165,'Shizuoka'),(6229,'Kagoshima','JPN',620,'Kagoshima'),(6230,'Funabashi','JPN',313,'Chiba'),(6231,'Higashiosaka','JPN',968,'Osaka'),(6232,'Hachioji','JPN',1288,'Tokyo-to'),(6233,'Niigata','JPN',909,'Niigata'),(6234,'Amagasaki','JPN',560,'Hyogo'),(6235,'Himeji','JPN',560,'Hyogo'),(6236,'Shizuoka','JPN',1165,'Shizuoka'),(6237,'Urawa','JPN',1101,'Saitama'),(6238,'Matsuyama','JPN',409,'Ehime'),(6239,'Matsudo','JPN',313,'Chiba'),(6240,'Kanazawa','JPN',586,'Ishikawa'),(6241,'Kawaguchi','JPN',1101,'Saitama'),(6242,'Ichikawa','JPN',313,'Chiba'),(6243,'Omiya','JPN',1101,'Saitama'),(6244,'Utsunomiya','JPN',1285,'Tochigi'),(6245,'Oita','JPN',951,'Oita'),(6246,'Nagasaki','JPN',871,'Nagasaki'),(6247,'Yokosuka','JPN',632,'Kanagawa'),(6248,'Kurashiki','JPN',952,'Okayama'),(6249,'Gifu','JPN',467,'Gifu'),(6250,'Hirakata','JPN',968,'Osaka'),(6251,'Nishinomiya','JPN',560,'Hyogo'),(6252,'Toyonaka','JPN',968,'Osaka'),(6253,'Wakayama','JPN',1363,'Wakayama'),(6254,'Fukuyama','JPN',537,'Hiroshima'),(6255,'Fujisawa','JPN',632,'Kanagawa'),(6256,'Asahikawa','JPN',542,'Hokkaido'),(6257,'Machida','JPN',1288,'Tokyo-to'),(6258,'Nara','JPN',884,'Nara'),(6259,'Takatsuki','JPN',968,'Osaka'),(6260,'Iwaki','JPN',447,'Fukushima'),(6261,'Nagano','JPN',870,'Nagano'),(6262,'Toyohashi','JPN',25,'Aichi'),(6263,'Toyota','JPN',25,'Aichi'),(6264,'Suita','JPN',968,'Osaka'),(6265,'Takamatsu','JPN',619,'Kagawa'),(6266,'Koriyama','JPN',447,'Fukushima'),(6267,'Okazaki','JPN',25,'Aichi'),(6268,'Kawagoe','JPN',1101,'Saitama'),(6269,'Tokorozawa','JPN',1101,'Saitama'),(6270,'Toyama','JPN',1297,'Toyama'),(6271,'Kochi','JPN',687,'Kochi'),(6272,'Kashiwa','JPN',313,'Chiba'),(6273,'Akita\n','JPN',28,'Akita'),(6274,'Miyazaki','JPN',846,'Miyazaki'),(6275,'Koshigaya','JPN',1101,'Saitama'),(6276,'Naha','JPN',953,'Okinawa'),(6277,'Aomori','JPN',93,'Aomori'),(6278,'Hakodate','JPN',542,'Hokkaido'),(6279,'Akashi','JPN',560,'Hyogo'),(6280,'Yokkaichi','JPN',835,'Mie'),(6281,'Fukushima','JPN',447,'Fukushima'),(6282,'Morioka','JPN',593,'Iwate'),(6283,'Maebashi','JPN',494,'Gumma'),(6284,'Kasugai','JPN',25,'Aichi'),(6285,'Otsu','JPN',1163,'Shiga'),(6286,'Ichihara','JPN',313,'Chiba'),(6287,'Yao','JPN',968,'Osaka'),(6288,'Ichinomiya','JPN',25,'Aichi'),(6289,'Tokushima','JPN',1287,'Tokushima'),(6290,'Kakogawa','JPN',560,'Hyogo'),(6291,'Ibaraki','JPN',968,'Osaka'),(6292,'Neyagawa','JPN',968,'Osaka'),(6293,'Shimonoseki','JPN',1395,'Yamaguchi'),(6294,'Yamagata','JPN',1394,'Yamagata'),(6295,'Fukui','JPN',445,'Fukui'),(6296,'Hiratsuka','JPN',632,'Kanagawa'),(6297,'Mito','JPN',563,'Ibaragi'),(6298,'Sasebo','JPN',871,'Nagasaki'),(6299,'Hachinohe','JPN',93,'Aomori'),(6300,'Takasaki','JPN',494,'Gumma'),(6301,'Shimizu','JPN',1165,'Shizuoka'),(6302,'Kurume','JPN',446,'Fukuoka'),(6303,'Fuji','JPN',1165,'Shizuoka'),(6304,'Soka','JPN',1101,'Saitama'),(6305,'Fuchu','JPN',1288,'Tokyo-to'),(6306,'Chigasaki','JPN',632,'Kanagawa'),(6307,'Atsugi','JPN',632,'Kanagawa'),(6308,'Numazu','JPN',1165,'Shizuoka'),(6309,'Ageo','JPN',1101,'Saitama'),(6310,'Yamato','JPN',632,'Kanagawa'),(6311,'Matsumoto','JPN',870,'Nagano'),(6312,'Kure','JPN',537,'Hiroshima'),(6313,'Takarazuka','JPN',560,'Hyogo'),(6314,'Kasukabe','JPN',1101,'Saitama'),(6315,'Chofu','JPN',1288,'Tokyo-to'),(6316,'Odawara','JPN',632,'Kanagawa'),(6317,'Kofu','JPN',1397,'Yamanashi'),(6318,'Kushiro','JPN',542,'Hokkaido'),(6319,'Kishiwada','JPN',968,'Osaka'),(6320,'Hitachi','JPN',563,'Ibaragi'),(6321,'Nagaoka','JPN',909,'Niigata'),(6322,'Itami','JPN',560,'Hyogo'),(6323,'Uji','JPN',713,'Kyoto'),(6324,'Suzuka','JPN',835,'Mie'),(6325,'Hirosaki','JPN',93,'Aomori'),(6326,'Ube','JPN',1395,'Yamaguchi'),(6327,'Kodaira','JPN',1288,'Tokyo-to'),(6328,'Takaoka','JPN',1297,'Toyama'),(6329,'Obihiro','JPN',542,'Hokkaido'),(6330,'Tomakomai','JPN',542,'Hokkaido'),(6331,'Saga','JPN',1091,'Saga'),(6332,'Sakura','JPN',313,'Chiba'),(6333,'Kamakura','JPN',632,'Kanagawa'),(6334,'Mitaka','JPN',1288,'Tokyo-to'),(6335,'Izumi','JPN',968,'Osaka'),(6336,'Hino','JPN',1288,'Tokyo-to'),(6337,'Hadano','JPN',632,'Kanagawa'),(6338,'Ashikaga','JPN',1285,'Tochigi'),(6339,'Tsu','JPN',835,'Mie'),(6340,'Sayama','JPN',1101,'Saitama'),(6341,'Yachiyo','JPN',313,'Chiba'),(6342,'Tsukuba','JPN',563,'Ibaragi'),(6343,'Tachikawa','JPN',1288,'Tokyo-to'),(6344,'Kumagaya','JPN',1101,'Saitama'),(6345,'Moriguchi','JPN',968,'Osaka'),(6346,'Otaru','JPN',542,'Hokkaido'),(6347,'Anjo','JPN',25,'Aichi'),(6348,'Narashino','JPN',313,'Chiba'),(6349,'Oyama','JPN',1285,'Tochigi'),(6350,'Ogaki','JPN',467,'Gifu'),(6351,'Matsue','JPN',1164,'Shimane'),(6352,'Kawanishi','JPN',560,'Hyogo'),(6353,'Hitachinaka','JPN',1288,'Tokyo-to'),(6354,'Niiza','JPN',1101,'Saitama'),(6355,'Nagareyama','JPN',313,'Chiba'),(6356,'Tottori','JPN',1296,'Tottori'),(6357,'Tama','JPN',563,'Ibaragi'),(6358,'Iruma','JPN',1101,'Saitama'),(6359,'Ota','JPN',494,'Gumma'),(6360,'Omuta','JPN',446,'Fukuoka'),(6361,'Komaki','JPN',25,'Aichi'),(6362,'Ome','JPN',1288,'Tokyo-to'),(6363,'Kadoma','JPN',968,'Osaka'),(6364,'Yamaguchi','JPN',1395,'Yamaguchi'),(6365,'Higashimurayama','JPN',1288,'Tokyo-to'),(6366,'Yonago','JPN',1296,'Tottori'),(6367,'Matsubara','JPN',968,'Osaka'),(6368,'Musashino','JPN',1288,'Tokyo-to'),(6369,'Tsuchiura','JPN',563,'Ibaragi'),(6370,'Joetsu','JPN',909,'Niigata'),(6371,'Miyakonojo','JPN',846,'Miyazaki'),(6372,'Misato','JPN',1101,'Saitama'),(6373,'Kakamigahara','JPN',467,'Gifu'),(6374,'Daito','JPN',968,'Osaka'),(6375,'Seto','JPN',25,'Aichi'),(6376,'Kariya','JPN',25,'Aichi'),(6377,'Urayasu','JPN',313,'Chiba'),(6378,'Beppu','JPN',951,'Oita'),(6379,'Niihama','JPN',409,'Ehime'),(6380,'Minoo','JPN',968,'Osaka'),(6381,'Fujieda','JPN',1165,'Shizuoka'),(6382,'Abiko','JPN',313,'Chiba'),(6383,'Nobeoka','JPN',846,'Miyazaki'),(6384,'Tondabayashi','JPN',968,'Osaka'),(6385,'Ueda','JPN',870,'Nagano'),(6386,'Kashihara','JPN',884,'Nara'),(6387,'Matsusaka','JPN',835,'Mie'),(6388,'Isesaki','JPN',494,'Gumma'),(6389,'Zama','JPN',632,'Kanagawa'),(6390,'Kisarazu','JPN',313,'Chiba'),(6391,'Noda','JPN',313,'Chiba'),(6392,'Ishinomaki','JPN',845,'Miyagi'),(6393,'Fujinomiya','JPN',1165,'Shizuoka'),(6394,'Kawachinagano','JPN',968,'Osaka'),(6395,'Imabari','JPN',409,'Ehime'),(6396,'Aizuwakamatsu','JPN',447,'Fukushima'),(6397,'Higashihiroshima','JPN',537,'Hiroshima'),(6398,'Habikino','JPN',968,'Osaka'),(6399,'Ebetsu','JPN',542,'Hokkaido'),(6400,'Hofu','JPN',1395,'Yamaguchi'),(6401,'Kiryu','JPN',494,'Gumma'),(6402,'Okinawa','JPN',953,'Okinawa'),(6403,'Yaizu','JPN',1165,'Shizuoka'),(6404,'Toyokawa','JPN',25,'Aichi'),(6405,'Ebina','JPN',632,'Kanagawa'),(6406,'Asaka','JPN',1101,'Saitama'),(6407,'Higashikurume','JPN',1288,'Tokyo-to'),(6408,'Ikoma','JPN',884,'Nara'),(6409,'Kitami','JPN',542,'Hokkaido'),(6410,'Koganei','JPN',1288,'Tokyo-to'),(6411,'Iwatsuki','JPN',1101,'Saitama'),(6412,'Mishima','JPN',1165,'Shizuoka'),(6413,'Handa','JPN',25,'Aichi'),(6414,'Muroran','JPN',542,'Hokkaido'),(6415,'Komatsu','JPN',586,'Ishikawa'),(6416,'Yatsushiro','JPN',702,'Kumamoto'),(6417,'Iida','JPN',870,'Nagano'),(6418,'Tokuyama','JPN',1395,'Yamaguchi'),(6419,'Kokubunji','JPN',1288,'Tokyo-to'),(6420,'Akishima','JPN',1288,'Tokyo-to'),(6421,'Iwakuni','JPN',1395,'Yamaguchi'),(6422,'Kusatsu','JPN',1163,'Shiga'),(6423,'Kuwana','JPN',835,'Mie'),(6424,'Sanda','JPN',560,'Hyogo'),(6425,'Hikone','JPN',1163,'Shiga'),(6426,'Toda','JPN',1101,'Saitama'),(6427,'Tajimi','JPN',467,'Gifu'),(6428,'Ikeda','JPN',968,'Osaka'),(6429,'Fukaya','JPN',1101,'Saitama'),(6430,'Ise','JPN',835,'Mie'),(6431,'Sakata','JPN',1394,'Yamagata'),(6432,'Kasuga','JPN',446,'Fukuoka'),(6433,'Kamagaya','JPN',313,'Chiba'),(6434,'Tsuruoka','JPN',1394,'Yamagata'),(6435,'Hoya','JPN',1288,'Tokyo-to'),(6436,'Nishio','JPN',313,'Chiba'),(6437,'Tokai','JPN',25,'Aichi'),(6438,'Inazawa','JPN',25,'Aichi'),(6439,'Sakado','JPN',1101,'Saitama'),(6440,'Isehara','JPN',632,'Kanagawa'),(6441,'Takasago','JPN',560,'Hyogo'),(6442,'Fujimi','JPN',1101,'Saitama'),(6443,'Urasoe','JPN',953,'Okinawa'),(6444,'Yonezawa','JPN',1394,'Yamagata'),(6445,'Konan','JPN',25,'Aichi'),(6446,'Yamatokoriyama','JPN',884,'Nara'),(6447,'Maizuru','JPN',713,'Kyoto'),(6448,'Onomichi','JPN',537,'Hiroshima'),(6449,'Higashimatsuyama','JPN',1101,'Saitama'),(6450,'Kimitsu','JPN',313,'Chiba'),(6451,'Isahaya','JPN',871,'Nagasaki'),(6452,'Kanuma','JPN',1285,'Tochigi'),(6453,'Izumisano','JPN',968,'Osaka'),(6454,'Kameoka','JPN',713,'Kyoto'),(6455,'Mobara','JPN',313,'Chiba'),(6456,'Narita','JPN',313,'Chiba'),(6457,'Kashiwazaki','JPN',909,'Niigata'),(6458,'Tsuyama','JPN',952,'Okayama'),(6459,'Sanaa','YEM',1119,'Sanaa'),(6460,'Aden','YEM',18,'Aden'),(6461,'Taizz','YEM',1239,'Taizz'),(6462,'Hodeida','YEM',541,'Hodeida'),(6463,'al-Mukalla','YEM',499,'Hadramawt'),(6464,'Ibb','YEM',564,'Ibb'),(6465,'Amman','JOR',73,'Amman'),(6466,'al-Zarqa','JOR',56,'al-Zarqa'),(6467,'Irbid','JOR',581,'Irbid'),(6468,'al-Rusayfa','JOR',56,'al-Zarqa'),(6469,'Wadi al-Sir','JOR',73,'Amman'),(6470,'Flying Fish Cove','CXR',133,'â€“'),(6471,'Flying Fish Cove','CXR',134,'â€“'),(6472,'Flying Fish Cove','CXR',135,'â€“'),(6473,'Flying Fish Cove','CXR',136,'â€“'),(6474,'Flying Fish Cove','CXR',137,'â€“'),(6475,'Flying Fish Cove','CXR',138,'â€“'),(6476,'Flying Fish Cove','CXR',139,'â€“'),(6477,'Flying Fish Cove','CXR',140,'â€“'),(6478,'Flying Fish Cove','CXR',141,'â€“'),(6479,'Flying Fish Cove','CXR',142,'â€“'),(6480,'Flying Fish Cove','CXR',143,'â€“'),(6481,'Flying Fish Cove','CXR',144,'â€“'),(6482,'Flying Fish Cove','CXR',145,'â€“'),(6483,'Flying Fish Cove','CXR',146,'â€“'),(6484,'Beograd','YUG',295,'Central Serbia'),(6485,'Novi Sad','YUG',1357,'Vojvodina'),(6486,'NiÅ¡','YUG',295,'Central Serbia'),(6487,'PriÅ¡tina','YUG',694,'Kosovo and Metohija'),(6488,'Kragujevac','YUG',295,'Central Serbia'),(6489,'Podgorica','YUG',853,'Montenegro'),(6490,'Subotica','YUG',1357,'Vojvodina'),(6491,'Prizren','YUG',694,'Kosovo and Metohija'),(6492,'Phnom Penh','KHM',997,'Phnom Penh'),(6493,'Battambang','KHM',187,'Battambang'),(6494,'Siem Reap','KHM',1169,'Siem Reap'),(6495,'Douala','CMR',748,'Littoral'),(6496,'YaoundÃ©','CMR',297,'Centre'),(6497,'YaoundÃ©','CMR',298,'Centre'),(6498,'Garoua','CMR',917,'Nord'),(6499,'Garoua','CMR',918,'Nord'),(6500,'Maroua','CMR',424,'ExtrÃªme-Nord'),(6501,'Bamenda','CMR',919,'Nord-Ouest'),(6502,'Bafoussam','CMR',975,'Ouest'),(6503,'Bafoussam','CMR',976,'Ouest'),(6504,'Nkongsamba','CMR',748,'Littoral'),(6505,'MontrÃ©al','CAN',1053,'QuÃ©bec'),(6506,'Calgary','CAN',61,'Alberta'),(6507,'Toronto','CAN',957,'Ontario'),(6508,'North York','CAN',957,'Ontario'),(6509,'Winnipeg','CAN',794,'Manitoba'),(6510,'Edmonton','CAN',61,'Alberta'),(6511,'Mississauga','CAN',957,'Ontario'),(6512,'Scarborough','CAN',957,'Ontario'),(6513,'Vancouver','CAN',236,'British Colombia'),(6514,'Etobicoke','CAN',957,'Ontario'),(6515,'London','CAN',957,'Ontario'),(6516,'Hamilton','CAN',957,'Ontario'),(6517,'Ottawa','CAN',957,'Ontario'),(6518,'Laval','CAN',1053,'QuÃ©bec'),(6519,'Surrey','CAN',236,'British Colombia'),(6520,'Brampton','CAN',957,'Ontario'),(6521,'Windsor','CAN',957,'Ontario'),(6522,'Saskatoon','CAN',1135,'Saskatchewan'),(6523,'Kitchener','CAN',957,'Ontario'),(6524,'Markham','CAN',957,'Ontario'),(6525,'Regina','CAN',1135,'Saskatchewan'),(6526,'Burnaby','CAN',236,'British Colombia'),(6527,'QuÃ©bec','CAN',1053,'QuÃ©bec'),(6528,'York','CAN',957,'Ontario'),(6529,'Richmond','CAN',236,'British Colombia'),(6530,'Vaughan','CAN',957,'Ontario'),(6531,'Burlington','CAN',957,'Ontario'),(6532,'Oshawa','CAN',957,'Ontario'),(6533,'Oakville','CAN',957,'Ontario'),(6534,'Saint Catharines','CAN',957,'Ontario'),(6535,'Longueuil','CAN',1053,'QuÃ©bec'),(6536,'Richmond Hill','CAN',957,'Ontario'),(6537,'Thunder Bay','CAN',957,'Ontario'),(6538,'Nepean','CAN',957,'Ontario'),(6539,'Cape Breton','CAN',939,'Nova Scotia'),(6540,'East York','CAN',957,'Ontario'),(6541,'Halifax','CAN',939,'Nova Scotia'),(6542,'Cambridge','CAN',957,'Ontario'),(6543,'Gloucester','CAN',957,'Ontario'),(6544,'Abbotsford','CAN',236,'British Colombia'),(6545,'Guelph','CAN',957,'Ontario'),(6546,'Saint JohnÂ´s','CAN',902,'Newfoundland'),(6547,'Coquitlam','CAN',236,'British Colombia'),(6548,'Saanich','CAN',236,'British Colombia'),(6549,'Gatineau','CAN',1053,'QuÃ©bec'),(6550,'Delta','CAN',236,'British Colombia'),(6551,'Sudbury','CAN',957,'Ontario'),(6552,'Kelowna','CAN',236,'British Colombia'),(6553,'Barrie','CAN',957,'Ontario'),(6554,'Praia','CPV',1140,'SÃ£o Tiago'),(6555,'Almaty','KAZ',66,'Almaty Qalasy'),(6556,'Qaraghandy','KAZ',1042,'Qaraghandy'),(6557,'Shymkent','KAZ',1191,'South Kazakstan'),(6558,'Taraz','KAZ',1249,'Taraz'),(6559,'Astana','KAZ',116,'Astana'),(6560,'Ã–skemen','KAZ',402,'East Kazakstan'),(6561,'Pavlodar','KAZ',987,'Pavlodar'),(6562,'Semey','KAZ',402,'East Kazakstan'),(6563,'AqtÃ¶be','KAZ',96,'AqtÃ¶be'),(6564,'Qostanay','KAZ',1049,'Qostanay'),(6565,'Petropavl','KAZ',929,'North Kazakstan'),(6566,'Oral','KAZ',1380,'West Kazakstan'),(6567,'Temirtau','KAZ',1042,'Qaraghandy'),(6568,'Qyzylorda','KAZ',1060,'Qyzylorda'),(6569,'Aqtau','KAZ',789,'Mangghystau'),(6570,'Atyrau','KAZ',127,'Atyrau'),(6571,'Ekibastuz','KAZ',987,'Pavlodar'),(6572,'KÃ¶kshetau','KAZ',929,'North Kazakstan'),(6573,'Rudnyy','KAZ',1049,'Qostanay'),(6574,'Taldyqorghan','KAZ',65,'Almaty'),(6575,'Zhezqazghan','KAZ',1042,'Qaraghandy'),(6576,'Nairobi','KEN',872,'Nairobi'),(6577,'Mombasa','KEN',333,'Coast'),(6578,'Kisumu','KEN',945,'Nyanza'),(6579,'Nakuru','KEN',1074,'Rift Valley'),(6580,'Machakos','KEN',403,'Eastern'),(6581,'Machakos','KEN',404,'Eastern'),(6582,'Eldoret','KEN',1074,'Rift Valley'),(6583,'Meru','KEN',403,'Eastern'),(6584,'Meru','KEN',404,'Eastern'),(6585,'Nyeri','KEN',284,'Central'),(6586,'Nyeri','KEN',285,'Central'),(6587,'Nyeri','KEN',286,'Central'),(6588,'Nyeri','KEN',287,'Central'),(6589,'Nyeri','KEN',288,'Central'),(6590,'Nyeri','KEN',289,'Central'),(6591,'Nyeri','KEN',290,'Central'),(6592,'Bangui','CAF',173,'Bangui'),(6593,'Shanghai','CHN',1159,'Shanghai'),(6594,'Peking','CHN',991,'Peking'),(6595,'Chongqing','CHN',322,'Chongqing'),(6596,'Tianjin','CHN',1272,'Tianjin'),(6597,'Wuhan','CHN',555,'Hubei'),(6598,'Harbin','CHN',529,'Heilongjiang'),(6599,'Shenyang','CHN',736,'Liaoning'),(6600,'Kanton [Guangzhou]','CHN',484,'Guangdong'),(6601,'Chengdu','CHN',1167,'Sichuan'),(6602,'Nanking [Nanjing]','CHN',604,'Jiangsu'),(6603,'Changchun','CHN',606,'Jilin'),(6604,'XiÂ´an','CHN',1154,'Shaanxi'),(6605,'Dalian','CHN',736,'Liaoning'),(6606,'Qingdao','CHN',1158,'Shandong'),(6607,'Jinan','CHN',1158,'Shandong'),(6608,'Hangzhou','CHN',1415,'Zhejiang'),(6609,'Zhengzhou','CHN',530,'Henan'),(6610,'Shijiazhuang','CHN',527,'Hebei'),(6611,'Taiyuan','CHN',1160,'Shanxi'),(6612,'Kunming','CHN',1406,'Yunnan'),(6613,'Changsha','CHN',557,'Hunan'),(6614,'Nanchang','CHN',605,'Jiangxi'),(6615,'Fuzhou','CHN',444,'Fujian'),(6616,'Lanzhou','CHN',454,'Gansu'),(6617,'Guiyang','CHN',492,'Guizhou'),(6618,'Ningbo','CHN',1415,'Zhejiang'),(6619,'Hefei','CHN',83,'Anhui'),(6620,'UrumtÅ¡i [ÃœrÃ¼mqi]','CHN',1393,'Xinxiang'),(6621,'Anshan','CHN',736,'Liaoning'),(6622,'Fushun','CHN',736,'Liaoning'),(6623,'Nanning','CHN',485,'Guangxi'),(6624,'Zibo','CHN',1158,'Shandong'),(6625,'Qiqihar','CHN',529,'Heilongjiang'),(6626,'Jilin','CHN',606,'Jilin'),(6627,'Tangshan','CHN',527,'Hebei'),(6628,'Baotou','CHN',579,'Inner Mongolia'),(6629,'Shenzhen','CHN',484,'Guangdong'),(6630,'Hohhot','CHN',579,'Inner Mongolia'),(6631,'Handan','CHN',527,'Hebei'),(6632,'Wuxi','CHN',604,'Jiangsu'),(6633,'Xuzhou','CHN',604,'Jiangsu'),(6634,'Datong','CHN',1160,'Shanxi'),(6635,'Yichun','CHN',529,'Heilongjiang'),(6636,'Benxi','CHN',736,'Liaoning'),(6637,'Luoyang','CHN',530,'Henan'),(6638,'Suzhou','CHN',604,'Jiangsu'),(6639,'Xining','CHN',1047,'Qinghai'),(6640,'Huainan','CHN',83,'Anhui'),(6641,'Jixi','CHN',529,'Heilongjiang'),(6642,'Daqing','CHN',529,'Heilongjiang'),(6643,'Fuxin','CHN',736,'Liaoning'),(6644,'Amoy [Xiamen]','CHN',444,'Fujian'),(6645,'Liuzhou','CHN',485,'Guangxi'),(6646,'Shantou','CHN',484,'Guangdong'),(6647,'Jinzhou','CHN',736,'Liaoning'),(6648,'Mudanjiang','CHN',529,'Heilongjiang'),(6649,'Yinchuan','CHN',911,'Ningxia'),(6650,'Changzhou','CHN',604,'Jiangsu'),(6651,'Zhangjiakou','CHN',527,'Hebei'),(6652,'Dandong','CHN',736,'Liaoning'),(6653,'Hegang','CHN',529,'Heilongjiang'),(6654,'Kaifeng','CHN',530,'Henan'),(6655,'Jiamusi','CHN',529,'Heilongjiang'),(6656,'Liaoyang','CHN',736,'Liaoning'),(6657,'Hengyang','CHN',557,'Hunan'),(6658,'Baoding','CHN',527,'Hebei'),(6659,'Hunjiang','CHN',606,'Jilin'),(6660,'Xinxiang','CHN',530,'Henan'),(6661,'Huangshi','CHN',555,'Hubei'),(6662,'Haikou','CHN',502,'Hainan'),(6663,'Yantai','CHN',1158,'Shandong'),(6664,'Bengbu','CHN',83,'Anhui'),(6665,'Xiangtan','CHN',557,'Hunan'),(6666,'Weifang','CHN',1158,'Shandong'),(6667,'Wuhu','CHN',83,'Anhui'),(6668,'Pingxiang','CHN',605,'Jiangxi'),(6669,'Yingkou','CHN',736,'Liaoning'),(6670,'Anyang','CHN',530,'Henan'),(6671,'Panzhihua','CHN',1167,'Sichuan'),(6672,'Pingdingshan','CHN',530,'Henan'),(6673,'Xiangfan','CHN',555,'Hubei'),(6674,'Zhuzhou','CHN',557,'Hunan'),(6675,'Jiaozuo','CHN',530,'Henan'),(6676,'Wenzhou','CHN',1415,'Zhejiang'),(6677,'Zhangjiang','CHN',484,'Guangdong'),(6678,'Zigong','CHN',1167,'Sichuan'),(6679,'Shuangyashan','CHN',529,'Heilongjiang'),(6680,'Zaozhuang','CHN',1158,'Shandong'),(6681,'Yakeshi','CHN',579,'Inner Mongolia'),(6682,'Yichang','CHN',555,'Hubei'),(6683,'Zhenjiang','CHN',604,'Jiangsu'),(6684,'Huaibei','CHN',83,'Anhui'),(6685,'Qinhuangdao','CHN',527,'Hebei'),(6686,'Guilin','CHN',485,'Guangxi'),(6687,'Liupanshui','CHN',492,'Guizhou'),(6688,'Panjin','CHN',736,'Liaoning'),(6689,'Yangquan','CHN',1160,'Shanxi'),(6690,'Jinxi','CHN',736,'Liaoning'),(6691,'Liaoyuan','CHN',606,'Jilin'),(6692,'Lianyungang','CHN',604,'Jiangsu'),(6693,'Xianyang','CHN',1154,'Shaanxi'),(6694,'TaiÂ´an','CHN',1158,'Shandong'),(6695,'Chifeng','CHN',579,'Inner Mongolia'),(6696,'Shaoguan','CHN',484,'Guangdong'),(6697,'Nantong','CHN',604,'Jiangsu'),(6698,'Leshan','CHN',1167,'Sichuan'),(6699,'Baoji','CHN',1154,'Shaanxi'),(6700,'Linyi','CHN',1158,'Shandong'),(6701,'Tonghua','CHN',606,'Jilin'),(6702,'Siping','CHN',606,'Jilin'),(6703,'Changzhi','CHN',1160,'Shanxi'),(6704,'Tengzhou','CHN',1158,'Shandong'),(6705,'Chaozhou','CHN',484,'Guangdong'),(6706,'Yangzhou','CHN',604,'Jiangsu'),(6707,'Dongwan','CHN',484,'Guangdong'),(6708,'MaÂ´anshan','CHN',83,'Anhui'),(6709,'Foshan','CHN',484,'Guangdong'),(6710,'Yueyang','CHN',557,'Hunan'),(6711,'Xingtai','CHN',527,'Hebei'),(6712,'Changde','CHN',557,'Hunan'),(6713,'Shihezi','CHN',1393,'Xinxiang'),(6714,'Yancheng','CHN',604,'Jiangsu'),(6715,'Jiujiang','CHN',605,'Jiangxi'),(6716,'Dongying','CHN',1158,'Shandong'),(6717,'Shashi','CHN',555,'Hubei'),(6718,'Xintai','CHN',1158,'Shandong'),(6719,'Jingdezhen','CHN',605,'Jiangxi'),(6720,'Tongchuan','CHN',1154,'Shaanxi'),(6721,'Zhongshan','CHN',484,'Guangdong'),(6722,'Shiyan','CHN',555,'Hubei'),(6723,'Tieli','CHN',529,'Heilongjiang'),(6724,'Jining','CHN',1158,'Shandong'),(6725,'Wuhai','CHN',579,'Inner Mongolia'),(6726,'Mianyang','CHN',1167,'Sichuan'),(6727,'Luzhou','CHN',1167,'Sichuan'),(6728,'Zunyi','CHN',492,'Guizhou'),(6729,'Shizuishan','CHN',911,'Ningxia'),(6730,'Neijiang','CHN',1167,'Sichuan'),(6731,'Tongliao','CHN',579,'Inner Mongolia'),(6732,'Tieling','CHN',736,'Liaoning'),(6733,'Wafangdian','CHN',736,'Liaoning'),(6734,'Anqing','CHN',83,'Anhui'),(6735,'Shaoyang','CHN',557,'Hunan'),(6736,'Laiwu','CHN',1158,'Shandong'),(6737,'Chengde','CHN',527,'Hebei'),(6738,'Tianshui','CHN',454,'Gansu'),(6739,'Nanyang','CHN',530,'Henan'),(6740,'Cangzhou','CHN',527,'Hebei'),(6741,'Yibin','CHN',1167,'Sichuan'),(6742,'Huaiyin','CHN',604,'Jiangsu'),(6743,'Dunhua','CHN',606,'Jilin'),(6744,'Yanji','CHN',606,'Jilin'),(6745,'Jiangmen','CHN',484,'Guangdong'),(6746,'Tongling','CHN',83,'Anhui'),(6747,'Suihua','CHN',529,'Heilongjiang'),(6748,'Gongziling','CHN',606,'Jilin'),(6749,'Xiantao','CHN',555,'Hubei'),(6750,'Chaoyang','CHN',736,'Liaoning'),(6751,'Ganzhou','CHN',605,'Jiangxi'),(6752,'Huzhou','CHN',1415,'Zhejiang'),(6753,'Baicheng','CHN',606,'Jilin'),(6754,'Shangzi','CHN',529,'Heilongjiang'),(6755,'Yangjiang','CHN',484,'Guangdong'),(6756,'Qitaihe','CHN',529,'Heilongjiang'),(6757,'Gejiu','CHN',1406,'Yunnan'),(6758,'Jiangyin','CHN',604,'Jiangsu'),(6759,'Hebi','CHN',530,'Henan'),(6760,'Jiaxing','CHN',1415,'Zhejiang'),(6761,'Wuzhou','CHN',485,'Guangxi'),(6762,'Meihekou','CHN',606,'Jilin'),(6763,'Xuchang','CHN',530,'Henan'),(6764,'Liaocheng','CHN',1158,'Shandong'),(6765,'Haicheng','CHN',736,'Liaoning'),(6766,'Qianjiang','CHN',555,'Hubei'),(6767,'Baiyin','CHN',454,'Gansu'),(6768,'BeiÂ´an','CHN',529,'Heilongjiang'),(6769,'Yixing','CHN',604,'Jiangsu'),(6770,'Laizhou','CHN',1158,'Shandong'),(6771,'Qaramay','CHN',1393,'Xinxiang'),(6772,'Acheng','CHN',529,'Heilongjiang'),(6773,'Dezhou','CHN',1158,'Shandong'),(6774,'Nanping','CHN',444,'Fujian'),(6775,'Zhaoqing','CHN',484,'Guangdong'),(6776,'Beipiao','CHN',736,'Liaoning'),(6777,'Fengcheng','CHN',605,'Jiangxi'),(6778,'Fuyu','CHN',606,'Jilin'),(6779,'Xinyang','CHN',530,'Henan'),(6780,'Dongtai','CHN',604,'Jiangsu'),(6781,'Yuci','CHN',1160,'Shanxi'),(6782,'Honghu','CHN',555,'Hubei'),(6783,'Ezhou','CHN',555,'Hubei'),(6784,'Heze','CHN',1158,'Shandong'),(6785,'Daxian','CHN',1167,'Sichuan'),(6786,'Linfen','CHN',1160,'Shanxi'),(6787,'Tianmen','CHN',555,'Hubei'),(6788,'Yiyang','CHN',557,'Hunan'),(6789,'Quanzhou','CHN',444,'Fujian'),(6790,'Rizhao','CHN',1158,'Shandong'),(6791,'Deyang','CHN',1167,'Sichuan'),(6792,'Guangyuan','CHN',1167,'Sichuan'),(6793,'Changshu','CHN',604,'Jiangsu'),(6794,'Zhangzhou','CHN',444,'Fujian'),(6795,'Hailar','CHN',579,'Inner Mongolia'),(6796,'Nanchong','CHN',1167,'Sichuan'),(6797,'Jiutai','CHN',606,'Jilin'),(6798,'Zhaodong','CHN',529,'Heilongjiang'),(6799,'Shaoxing','CHN',1415,'Zhejiang'),(6800,'Fuyang','CHN',83,'Anhui'),(6801,'Maoming','CHN',484,'Guangdong'),(6802,'Qujing','CHN',1406,'Yunnan'),(6803,'Ghulja','CHN',1393,'Xinxiang'),(6804,'Jiaohe','CHN',606,'Jilin'),(6805,'Puyang','CHN',530,'Henan'),(6806,'Huadian','CHN',606,'Jilin'),(6807,'Jiangyou','CHN',1167,'Sichuan'),(6808,'Qashqar','CHN',1393,'Xinxiang'),(6809,'Anshun','CHN',492,'Guizhou'),(6810,'Fuling','CHN',1167,'Sichuan'),(6811,'Xinyu','CHN',605,'Jiangxi'),(6812,'Hanzhong','CHN',1154,'Shaanxi'),(6813,'Danyang','CHN',604,'Jiangsu'),(6814,'Chenzhou','CHN',557,'Hunan'),(6815,'Xiaogan','CHN',555,'Hubei'),(6816,'Shangqiu','CHN',530,'Henan'),(6817,'Zhuhai','CHN',484,'Guangdong'),(6818,'Qingyuan','CHN',484,'Guangdong'),(6819,'Aqsu','CHN',1393,'Xinxiang'),(6820,'Jining','CHN',579,'Inner Mongolia'),(6821,'Xiaoshan','CHN',1415,'Zhejiang'),(6822,'Zaoyang','CHN',555,'Hubei'),(6823,'Xinghua','CHN',604,'Jiangsu'),(6824,'Hami','CHN',1393,'Xinxiang'),(6825,'Huizhou','CHN',484,'Guangdong'),(6826,'Jinmen','CHN',555,'Hubei'),(6827,'Sanming','CHN',444,'Fujian'),(6828,'Ulanhot','CHN',579,'Inner Mongolia'),(6829,'Korla','CHN',1393,'Xinxiang'),(6830,'Wanxian','CHN',1167,'Sichuan'),(6831,'RuiÂ´an','CHN',1415,'Zhejiang'),(6832,'Zhoushan','CHN',1415,'Zhejiang'),(6833,'Liangcheng','CHN',1158,'Shandong'),(6834,'Jiaozhou','CHN',1158,'Shandong'),(6835,'Taizhou','CHN',604,'Jiangsu'),(6836,'Suzhou','CHN',83,'Anhui'),(6837,'Yichun','CHN',605,'Jiangxi'),(6838,'Taonan','CHN',606,'Jilin'),(6839,'Pingdu','CHN',1158,'Shandong'),(6840,'JiÂ´an','CHN',605,'Jiangxi'),(6841,'Longkou','CHN',1158,'Shandong'),(6842,'Langfang','CHN',527,'Hebei'),(6843,'Zhoukou','CHN',530,'Henan'),(6844,'Suining','CHN',1167,'Sichuan'),(6845,'Yulin','CHN',485,'Guangxi'),(6846,'Jinhua','CHN',1415,'Zhejiang'),(6847,'LiuÂ´an','CHN',83,'Anhui'),(6848,'Shuangcheng','CHN',529,'Heilongjiang'),(6849,'Suizhou','CHN',555,'Hubei'),(6850,'Ankang','CHN',1154,'Shaanxi'),(6851,'Weinan','CHN',1154,'Shaanxi'),(6852,'Longjing','CHN',606,'Jilin'),(6853,'DaÂ´an','CHN',606,'Jilin'),(6854,'Lengshuijiang','CHN',557,'Hunan'),(6855,'Laiyang','CHN',1158,'Shandong'),(6856,'Xianning','CHN',555,'Hubei'),(6857,'Dali','CHN',1406,'Yunnan'),(6858,'Anda','CHN',529,'Heilongjiang'),(6859,'Jincheng','CHN',1160,'Shanxi'),(6860,'Longyan','CHN',444,'Fujian'),(6861,'Xichang','CHN',1167,'Sichuan'),(6862,'Wendeng','CHN',1158,'Shandong'),(6863,'Hailun','CHN',529,'Heilongjiang'),(6864,'Binzhou','CHN',1158,'Shandong'),(6865,'Linhe','CHN',579,'Inner Mongolia'),(6866,'Wuwei','CHN',454,'Gansu'),(6867,'Duyun','CHN',492,'Guizhou'),(6868,'Mishan','CHN',529,'Heilongjiang'),(6869,'Shangrao','CHN',605,'Jiangxi'),(6870,'Changji','CHN',1393,'Xinxiang'),(6871,'Meixian','CHN',484,'Guangdong'),(6872,'Yushu','CHN',606,'Jilin'),(6873,'Tiefa','CHN',736,'Liaoning'),(6874,'HuaiÂ´an','CHN',604,'Jiangsu'),(6875,'Leiyang','CHN',557,'Hunan'),(6876,'Zalantun','CHN',579,'Inner Mongolia'),(6877,'Weihai','CHN',1158,'Shandong'),(6878,'Loudi','CHN',557,'Hunan'),(6879,'Qingzhou','CHN',1158,'Shandong'),(6880,'Qidong','CHN',604,'Jiangsu'),(6881,'Huaihua','CHN',557,'Hunan'),(6882,'Luohe','CHN',530,'Henan'),(6883,'Chuzhou','CHN',83,'Anhui'),(6884,'Kaiyuan','CHN',736,'Liaoning'),(6885,'Linqing','CHN',1158,'Shandong'),(6886,'Chaohu','CHN',83,'Anhui'),(6887,'Laohekou','CHN',555,'Hubei'),(6888,'Dujiangyan','CHN',1167,'Sichuan'),(6889,'Zhumadian','CHN',530,'Henan'),(6890,'Linchuan','CHN',605,'Jiangxi'),(6891,'Jiaonan','CHN',1158,'Shandong'),(6892,'Sanmenxia','CHN',530,'Henan'),(6893,'Heyuan','CHN',484,'Guangdong'),(6894,'Manzhouli','CHN',579,'Inner Mongolia'),(6895,'Lhasa','CHN',1274,'Tibet'),(6896,'Lianyuan','CHN',557,'Hunan'),(6897,'Kuytun','CHN',1393,'Xinxiang'),(6898,'Puqi','CHN',555,'Hubei'),(6899,'Hongjiang','CHN',557,'Hunan'),(6900,'Qinzhou','CHN',485,'Guangxi'),(6901,'Renqiu','CHN',527,'Hebei'),(6902,'Yuyao','CHN',1415,'Zhejiang'),(6903,'Guigang','CHN',485,'Guangxi'),(6904,'Kaili','CHN',492,'Guizhou'),(6905,'YanÂ´an','CHN',1154,'Shaanxi'),(6906,'Beihai','CHN',485,'Guangxi'),(6907,'Xuangzhou','CHN',83,'Anhui'),(6908,'Quzhou','CHN',1415,'Zhejiang'),(6909,'YongÂ´an','CHN',444,'Fujian'),(6910,'Zixing','CHN',557,'Hunan'),(6911,'Liyang','CHN',604,'Jiangsu'),(6912,'Yizheng','CHN',604,'Jiangsu'),(6913,'Yumen','CHN',454,'Gansu'),(6914,'Liling','CHN',557,'Hunan'),(6915,'Yuncheng','CHN',1160,'Shanxi'),(6916,'Shanwei','CHN',484,'Guangdong'),(6917,'Cixi','CHN',1415,'Zhejiang'),(6918,'Yuanjiang','CHN',557,'Hunan'),(6919,'Bozhou','CHN',83,'Anhui'),(6920,'Jinchang','CHN',454,'Gansu'),(6921,'FuÂ´an','CHN',444,'Fujian'),(6922,'Suqian','CHN',604,'Jiangsu'),(6923,'Shishou','CHN',555,'Hubei'),(6924,'Hengshui','CHN',527,'Hebei'),(6925,'Danjiangkou','CHN',555,'Hubei'),(6926,'Fujin','CHN',529,'Heilongjiang'),(6927,'Sanya','CHN',502,'Hainan'),(6928,'Guangshui','CHN',555,'Hubei'),(6929,'Huangshan','CHN',83,'Anhui'),(6930,'Xingcheng','CHN',736,'Liaoning'),(6931,'Zhucheng','CHN',1158,'Shandong'),(6932,'Kunshan','CHN',604,'Jiangsu'),(6933,'Haining','CHN',1415,'Zhejiang'),(6934,'Pingliang','CHN',454,'Gansu'),(6935,'Fuqing','CHN',444,'Fujian'),(6936,'Xinzhou','CHN',1160,'Shanxi'),(6937,'Jieyang','CHN',484,'Guangdong'),(6938,'Zhangjiagang','CHN',604,'Jiangsu'),(6939,'Tong Xian','CHN',991,'Peking'),(6940,'YaÂ´an','CHN',1167,'Sichuan'),(6941,'Jinzhou','CHN',736,'Liaoning'),(6942,'Emeishan','CHN',1167,'Sichuan'),(6943,'Enshi','CHN',555,'Hubei'),(6944,'Bose','CHN',485,'Guangxi'),(6945,'Yuzhou','CHN',530,'Henan'),(6946,'Kaiyuan','CHN',1406,'Yunnan'),(6947,'Tumen','CHN',606,'Jilin'),(6948,'Putian','CHN',444,'Fujian'),(6949,'Linhai','CHN',1415,'Zhejiang'),(6950,'Xilin Hot','CHN',579,'Inner Mongolia'),(6951,'Shaowu','CHN',444,'Fujian'),(6952,'Junan','CHN',1158,'Shandong'),(6953,'Huaying','CHN',1167,'Sichuan'),(6954,'Pingyi','CHN',1158,'Shandong'),(6955,'Huangyan','CHN',1415,'Zhejiang'),(6956,'Bishkek','KGZ',212,'Bishkek shaary'),(6957,'Osh','KGZ',969,'Osh'),(6958,'Bikenibeu','KIR',1193,'South Tarawa'),(6959,'Bairiki','KIR',1193,'South Tarawa'),(6960,'SantafÃ© de BogotÃ¡','COL',1126,'SantafÃ© de BogotÃ¡'),(6961,'Cali','COL',1334,'Valle'),(6963,'MedellÃ­n','COL',88,'Antioquia'),(6964,'Barranquilla','COL',124,'AtlÃ¡ntico'),(6966,'Cartagena','COL',218,'BolÃ­var'),(6967,'CÃºcuta','COL',923,'Norte de Santander'),(6968,'Bucaramanga','COL',1127,'Santander'),(6970,'IbaguÃ©','COL',1289,'Tolima'),(6971,'Pereira','COL',1079,'Risaralda'),(6972,'Santa Marta','COL',777,'Magdalena'),(6973,'Manizales','COL',255,'Caldas'),(6975,'Bello','COL',88,'Antioquia'),(6976,'Pasto','COL',885,'NariÃ±o'),(6977,'Neiva','COL',556,'Huila'),(6978,'Soledad','COL',124,'AtlÃ¡ntico'),(6979,'Armenia','COL',1058,'QuindÃ­o'),(6980,'Villavicencio','COL',829,'Meta'),(6982,'Soacha','COL',349,'Cundinamarca'),(6983,'Valledupar','COL',299,'Cesar'),(6984,'MonterÃ­a','COL',281,'CÃ³rdoba'),(6985,'MonterÃ­a','COL',282,'CÃ³rdoba'),(6987,'ItagÃ¼Ã­','COL',88,'Antioquia'),(6988,'Palmira','COL',1334,'Valle'),(6989,'Buenaventura','COL',1334,'Valle'),(6990,'Floridablanca','COL',1127,'Santander'),(6992,'Sincelejo','COL',1211,'Sucre'),(6993,'PopayÃ¡n','COL',278,'Cauca'),(6994,'Barrancabermeja','COL',1127,'Santander'),(6995,'Dos Quebradas','COL',1079,'Risaralda'),(6996,'TuluÃ¡','COL',1334,'Valle'),(6998,'Envigado','COL',88,'Antioquia'),(6999,'Cartago','COL',1334,'Valle'),(7001,'Girardot','COL',349,'Cundinamarca'),(7002,'Buga','COL',1334,'Valle'),(7003,'Tunja','COL',226,'BoyacÃ¡'),(7004,'Florencia','COL',267,'CaquetÃ¡'),(7005,'Maicao','COL',715,'La Guajira'),(7006,'Sogamoso','COL',226,'BoyacÃ¡'),(7007,'Giron','COL',1127,'Santander'),(7008,'Moroni','COM',913,'Njazidja'),(7009,'Brazzaville','COG',232,'Brazzaville'),(7010,'Pointe-Noire','COG',696,'Kouilou'),(7011,'Kinshasa','COD',679,'Kinshasa'),(7012,'Lubumbashi','COD',1155,'Shaba'),(7013,'Mbuji-Mayi','COD',401,'East Kasai'),(7014,'Kolwezi','COD',1155,'Shaba'),(7015,'Kisangani','COD',523,'Haute-ZaÃ¯re'),(7016,'Kananga','COD',1379,'West Kasai'),(7017,'Likasi','COD',1155,'Shaba'),(7018,'Bukavu','COD',1192,'South Kivu'),(7019,'Kikwit','COD',171,'Bandundu'),(7020,'Tshikapa','COD',1379,'West Kasai'),(7021,'Matadi','COD',179,'Bas-ZaÃ¯re'),(7022,'Mbandaka','COD',416,'Equateur'),(7023,'Mwene-Ditu','COD',401,'East Kasai'),(7024,'Boma','COD',179,'Bas-ZaÃ¯re'),(7025,'Uvira','COD',1192,'South Kivu'),(7026,'Butembo','COD',930,'North Kivu'),(7027,'Goma','COD',930,'North Kivu'),(7028,'Kalemie','COD',1155,'Shaba'),(7029,'Bantam','CCK',544,'Home Island'),(7030,'West Island','CCK',1377,'West Island'),(7031,'Pyongyang','PRK',1040,'Pyongyang-si'),(7032,'Hamhung','PRK',510,'Hamgyong N'),(7033,'Chongjin','PRK',511,'Hamgyong P'),(7034,'Nampo','PRK',880,'Nampo-si'),(7035,'Sinuiju','PRK',1039,'Pyongan P'),(7036,'Wonsan','PRK',634,'Kangwon'),(7037,'Phyongsong','PRK',1038,'Pyongan N'),(7038,'Sariwon','PRK',559,'Hwanghae P'),(7039,'Haeju','PRK',558,'Hwanghae N'),(7040,'Kanggye','PRK',301,'Chagang'),(7041,'Kimchaek','PRK',511,'Hamgyong P'),(7042,'Hyesan','PRK',1399,'Yanggang'),(7043,'Kaesong','PRK',617,'Kaesong-si'),(7044,'Seoul','KOR',1148,'Seoul'),(7045,'Pusan','KOR',1037,'Pusan'),(7046,'Inchon','KOR',575,'Inchon'),(7047,'Taegu','KOR',1232,'Taegu'),(7048,'Taejon','KOR',1233,'Taejon'),(7049,'Kwangju','KOR',707,'Kwangju'),(7050,'Ulsan','KOR',712,'Kyongsangnam'),(7051,'Songnam','KOR',710,'Kyonggi'),(7052,'Puchon','KOR',710,'Kyonggi'),(7053,'Suwon','KOR',710,'Kyonggi'),(7054,'Anyang','KOR',710,'Kyonggi'),(7055,'Chonju','KOR',320,'Chollabuk'),(7056,'Chongju','KOR',324,'Chungchongbuk'),(7057,'Koyang','KOR',710,'Kyonggi'),(7058,'Ansan','KOR',710,'Kyonggi'),(7059,'Pohang','KOR',711,'Kyongsangbuk'),(7060,'Chang-won','KOR',712,'Kyongsangnam'),(7061,'Masan','KOR',712,'Kyongsangnam'),(7062,'Kwangmyong','KOR',710,'Kyonggi'),(7063,'Chonan','KOR',325,'Chungchongnam'),(7064,'Chinju','KOR',712,'Kyongsangnam'),(7065,'Iksan','KOR',320,'Chollabuk'),(7066,'Pyongtaek','KOR',710,'Kyonggi'),(7067,'Kumi','KOR',711,'Kyongsangbuk'),(7068,'Uijongbu','KOR',710,'Kyonggi'),(7069,'Kyongju','KOR',711,'Kyongsangbuk'),(7070,'Kunsan','KOR',320,'Chollabuk'),(7071,'Cheju','KOR',308,'Cheju'),(7072,'Kimhae','KOR',712,'Kyongsangnam'),(7073,'Sunchon','KOR',321,'Chollanam'),(7074,'Mokpo','KOR',321,'Chollanam'),(7075,'Yong-in','KOR',710,'Kyonggi'),(7076,'Wonju','KOR',633,'Kang-won'),(7077,'Kunpo','KOR',710,'Kyonggi'),(7078,'Chunchon','KOR',633,'Kang-won'),(7079,'Namyangju','KOR',710,'Kyonggi'),(7080,'Kangnung','KOR',633,'Kang-won'),(7081,'Chungju','KOR',324,'Chungchongbuk'),(7082,'Andong','KOR',711,'Kyongsangbuk'),(7083,'Yosu','KOR',321,'Chollanam'),(7084,'Kyongsan','KOR',711,'Kyongsangbuk'),(7085,'Paju','KOR',710,'Kyonggi'),(7086,'Yangsan','KOR',712,'Kyongsangnam'),(7087,'Ichon','KOR',710,'Kyonggi'),(7088,'Asan','KOR',325,'Chungchongnam'),(7089,'Koje','KOR',712,'Kyongsangnam'),(7090,'Kimchon','KOR',711,'Kyongsangbuk'),(7091,'Nonsan','KOR',325,'Chungchongnam'),(7092,'Kuri','KOR',710,'Kyonggi'),(7093,'Chong-up','KOR',320,'Chollabuk'),(7094,'Chechon','KOR',324,'Chungchongbuk'),(7095,'Sosan','KOR',325,'Chungchongnam'),(7096,'Shihung','KOR',710,'Kyonggi'),(7097,'Tong-yong','KOR',712,'Kyongsangnam'),(7098,'Kongju','KOR',325,'Chungchongnam'),(7099,'Yongju','KOR',711,'Kyongsangbuk'),(7100,'Chinhae','KOR',712,'Kyongsangnam'),(7101,'Sangju','KOR',711,'Kyongsangbuk'),(7102,'Poryong','KOR',325,'Chungchongnam'),(7103,'Kwang-yang','KOR',321,'Chollanam'),(7104,'Miryang','KOR',712,'Kyongsangnam'),(7105,'Hanam','KOR',710,'Kyonggi'),(7106,'Kimje','KOR',320,'Chollabuk'),(7107,'Yongchon','KOR',711,'Kyongsangbuk'),(7108,'Sachon','KOR',712,'Kyongsangnam'),(7109,'Uiwang','KOR',710,'Kyonggi'),(7110,'Naju','KOR',321,'Chollanam'),(7111,'Namwon','KOR',320,'Chollabuk'),(7112,'Tonghae','KOR',633,'Kang-won'),(7113,'Mun-gyong','KOR',711,'Kyongsangbuk'),(7114,'Athenai','GRC',126,'Attika'),(7115,'Thessaloniki','GRC',293,'Central Macedonia'),(7116,'Pireus','GRC',126,'Attika'),(7117,'Patras','GRC',1375,'West Greece'),(7118,'Peristerion','GRC',126,'Attika'),(7119,'Herakleion','GRC',346,'Crete'),(7120,'Kallithea','GRC',126,'Attika'),(7121,'Larisa','GRC',1268,'Thessalia'),(7122,'Zagreb','HRV',475,'Grad Zagreb'),(7123,'Split','HRV',1196,'Split-Dalmatia'),(7124,'Rijeka','HRV',1028,'Primorje-Gorski Kota'),(7125,'Osijek','HRV',970,'Osijek-Baranja'),(7126,'La Habana','CUB',716,'La Habana'),(7127,'Santiago de Cuba','CUB',1130,'Santiago de Cuba'),(7128,'CamagÃ¼ey','CUB',258,'CamagÃ¼ey'),(7129,'HolguÃ­n','CUB',543,'HolguÃ­n'),(7130,'Santa Clara','CUB',1351,'Villa Clara'),(7131,'GuantÃ¡namo','CUB',486,'GuantÃ¡namo'),(7132,'Pinar del RÃ­o','CUB',1004,'Pinar del RÃ­o'),(7133,'Bayamo','CUB',479,'Granma'),(7134,'Cienfuegos','CUB',329,'Cienfuegos'),(7135,'Victoria de las Tunas','CUB',729,'Las Tunas'),(7136,'Matanzas','CUB',811,'Matanzas'),(7137,'Manzanillo','CUB',479,'Granma'),(7138,'Sancti-SpÃ­ritus','CUB',1120,'Sancti-SpÃ­ritus'),(7139,'Ciego de Ãvila','CUB',328,'Ciego de Ãvila'),(7140,'al-Salimiya','KWT',525,'Hawalli'),(7141,'Jalib al-Shuyukh','KWT',525,'Hawalli'),(7142,'Kuwait','KWT',31,'al-Asima'),(7143,'Nicosia','CYP',906,'Nicosia'),(7144,'Limassol','CYP',742,'Limassol'),(7145,'Vientiane','LAO',1349,'Viangchan'),(7146,'Savannakhet','LAO',1137,'Savannakhet'),(7147,'Riga','LVA',1075,'Riika'),(7148,'Daugavpils','LVA',362,'Daugavpils'),(7149,'Liepaja','LVA',738,'Liepaja'),(7150,'Maseru','LSO',808,'Maseru'),(7151,'Beirut','LBN',195,'Beirut'),(7152,'Tripoli','LBN',51,'al-Shamal'),(7153,'Monrovia','LBR',855,'Montserrado'),(7154,'Tripoli','LBY',1300,'Tripoli'),(7155,'Bengasi','LBY',199,'Bengasi'),(7156,'Misrata','LBY',842,'Misrata'),(7157,'al-Zawiya','LBY',57,'al-Zawiya'),(7158,'Schaan','LIE',1143,'Schaan'),(7159,'Vaduz','LIE',1332,'Vaduz'),(7160,'Vilnius','LTU',1352,'Vilna'),(7161,'Kaunas','LTU',652,'Kaunas'),(7162,'Klaipeda','LTU',685,'Klaipeda'),(7163,'Å iauliai','LTU',1423,'Å iauliai'),(7164,'Panevezys','LTU',982,'Panevezys'),(7165,'Luxembourg [Luxemburg/LÃ«tzebuerg]','LUX',766,'Luxembourg'),(7166,'El-AaiÃºn','ESH',411,'El-AaiÃºn'),(7167,'Macao','MAC',770,'Macau'),(7168,'Antananarivo','MDG',87,'Antananarivo'),(7169,'Toamasina','MDG',1283,'Toamasina'),(7170,'AntsirabÃ©','MDG',87,'Antananarivo'),(7171,'Mahajanga','MDG',779,'Mahajanga'),(7172,'Fianarantsoa','MDG',434,'Fianarantsoa'),(7173,'Skopje','MKD',1179,'Skopje'),(7174,'Blantyre','MWI',215,'Blantyre'),(7175,'Lilongwe','MWI',740,'Lilongwe'),(7176,'Male','MDV',769,'Maale'),(7177,'Kuala Lumpur','MYS',1390,'Wilayah Persekutuan'),(7178,'Ipoh','MYS',994,'Perak'),(7179,'Johor Baharu','MYS',609,'Johor'),(7180,'Petaling Jaya','MYS',1146,'Selangor'),(7181,'Kelang','MYS',1146,'Selangor'),(7182,'Kuala Terengganu','MYS',1263,'Terengganu'),(7183,'Pinang','MYS',1032,'Pulau Pinang'),(7184,'Kota Bharu','MYS',659,'Kelantan'),(7185,'Kuantan','MYS',980,'Pahang'),(7186,'Taiping','MYS',994,'Perak'),(7187,'Seremban','MYS',893,'Negeri\n Sembilan'),(7188,'Kuching','MYS',1133,'Sarawak'),(7189,'Sibu','MYS',1133,'Sarawak'),(7190,'Sandakan','MYS',1090,'Sabah'),(7191,'Alor Setar','MYS',657,'Kedah'),(7192,'Selayang Baru','MYS',1146,'Selangor'),(7193,'Sungai Petani','MYS',657,'Kedah'),(7194,'Shah Alam','MYS',1146,'Selangor'),(7195,'Bamako','MLI',169,'Bamako'),(7196,'Birkirkara','MLT',977,'Outer Harbour'),(7197,'Valletta','MLT',578,'Inner Harbour'),(7198,'Casablanca','MAR',274,'Casablanca'),(7199,'Rabat','MAR',1061,'Rabat-SalÃ©-Zammour-'),(7200,'Marrakech','MAR',804,'Marrakech-Tensift-Al'),(7201,'FÃ¨s','MAR',430,'FÃ¨s-Boulemane'),(7202,'Tanger','MAR',1246,'Tanger-TÃ©touan'),(7203,'SalÃ©','MAR',1061,'Rabat-SalÃ©-Zammour-'),(7204,'MeknÃ¨s','MAR',827,'MeknÃ¨s-Tafilalet'),(7205,'Oujda','MAR',963,'Oriental'),(7206,'KÃ©nitra','MAR',465,'Gharb-Chrarda-BÃ©ni'),(7207,'TÃ©touan','MAR',1246,'Tanger-TÃ©touan'),(7208,'Safi','MAR',390,'Doukkala-Abda'),(7209,'Agadir','MAR',1186,'Souss Massa-DraÃ¢'),(7210,'Mohammedia','MAR',274,'Casablanca'),(7211,'Khouribga','MAR',306,'Chaouia-Ouardigha'),(7212,'Beni-Mellal','MAR',1231,'Tadla-Azilal'),(7213,'TÃ©mara','MAR',1061,'Rabat-SalÃ©-Zammour-'),(7214,'El Jadida','MAR',390,'Doukkala-Abda'),(7215,'Nador','MAR',963,'Oriental'),(7216,'Ksar el Kebir','MAR',1246,'Tanger-TÃ©touan'),(7217,'Settat','MAR',306,'Chaouia-Ouardigha'),(7218,'Taza','MAR',1254,'Taza-Al Hoceima-Taou'),(7219,'El Araich','MAR',1246,'Tanger-TÃ©touan'),(7220,'Dalap-Uliga-Darrit','MHL',782,'Majuro'),(7221,'Fort-de-France','MTQ',438,'Fort-de-France'),(7222,'Nouakchott','MRT',938,'Nouakchott'),(7223,'NouÃ¢dhibou','MRT',354,'Dakhlet NouÃ¢dhibou'),(7224,'Port-Louis','MUS',1021,'Port-Louis'),(7225,'Beau Bassin-Rose Hill','MUS',1008,'Plaines Wilhelms'),(7226,'Vacoas-Phoenix','MUS',1008,'Plaines Wilhelms'),(7227,'Mamoutzou','MYT',785,'Mamoutzou'),(7228,'Ciudad de MÃ©xico','MEX',374,'Distrito Federal'),(7229,'Ciudad de MÃ©xico','MEX',375,'Distrito Federal'),(7230,'Ciudad de MÃ©xico','MEX',376,'Distrito Federal'),(7231,'Ciudad de MÃ©xico','MEX',377,'Distrito Federal'),(7232,'Guadalajara','MEX',596,'Jalisco'),(7233,'Ecatepec de Morelos','MEX',820,'MÃ©xico'),(7234,'Puebla','MEX',1030,'Puebla'),(7235,'NezahualcÃ³yotl','MEX',820,'MÃ©xico'),(7236,'JuÃ¡rez','MEX',314,'Chihuahua'),(7237,'Tijuana','MEX',160,'Baja California'),(7238,'LeÃ³n','MEX',483,'Guanajuato'),(7239,'Monterrey','MEX',942,'Nuevo LeÃ³n'),(7240,'Zapopan','MEX',596,'Jalisco'),(7241,'Naucalpan de JuÃ¡rez','MEX',820,'MÃ©xico'),(7242,'Mexicali','MEX',160,'Baja California'),(7243,'CuliacÃ¡n','MEX',1171,'Sinaloa'),(7244,'Acapulco de JuÃ¡rez','MEX',491,'Guerrero'),(7245,'Tlalnepantla de Baz','MEX',820,'MÃ©xico'),(7246,'MÃ©rida','MEX',1405,'YucatÃ¡n'),(7247,'Chihuahua','MEX',314,'Chihuahua'),(7248,'San Luis PotosÃ­','MEX',1113,'San Luis PotosÃ­'),(7249,'Guadalupe','MEX',942,'Nuevo LeÃ³n'),(7250,'Toluca','MEX',820,'MÃ©xico'),(7251,'Aguascalientes','MEX',23,'Aguascalientes'),(7252,'QuerÃ©taro','MEX',1056,'QuerÃ©taro de Arteag'),(7253,'Morelia','MEX',832,'MichoacÃ¡n de Ocampo'),(7254,'Hermosillo','MEX',1185,'Sonora'),(7255,'Saltillo','MEX',332,'Coahuila de Zaragoza'),(7256,'TorreÃ³n','MEX',332,'Coahuila de Zaragoza'),(7257,'Centro (Villahermosa)','MEX',1227,'Tabasco'),(7258,'San NicolÃ¡s de los Garza','MEX',942,'Nuevo LeÃ³n'),(7259,'Durango','MEX',395,'Durango'),(7260,'ChimalhuacÃ¡n','MEX',820,'MÃ©xico'),(7261,'Tlaquepaque','MEX',596,'Jalisco'),(7262,'AtizapÃ¡n de Zaragoza','MEX',820,'MÃ©xico'),(7263,'Veracruz','MEX',1347,'Veracruz'),(7264,'CuautitlÃ¡n Izcalli','MEX',820,'MÃ©xico'),(7265,'Irapuato','MEX',483,'Guanajuato'),(7266,'Tuxtla GutiÃ©rrez','MEX',311,'Chiapas'),(7267,'TultitlÃ¡n','MEX',820,'MÃ©xico'),(7268,'Reynosa','MEX',1241,'Tamaulipas'),(7269,'Benito JuÃ¡rez','MEX',1059,'Quintana Roo'),(7270,'Matamoros','MEX',1241,'Tamaulipas'),(7271,'Xalapa','MEX',1347,'Veracruz'),(7272,'Celaya','MEX',483,'Guanajuato'),(7273,'MazatlÃ¡n','MEX',1171,'Sinaloa'),(7274,'Ensenada','MEX',160,'Baja California'),(7275,'Ahome','MEX',1171,'Sinaloa'),(7276,'Cajeme','MEX',1185,'Sonora'),(7277,'Cuernavaca','MEX',857,'Morelos'),(7278,'TonalÃ¡','MEX',596,'Jalisco'),(7279,'Valle de Chalco Solidaridad','MEX',820,'MÃ©xico'),(7280,'Nuevo Laredo','MEX',1241,'Tamaulipas'),(7281,'Tepic','MEX',890,'Nayarit'),(7282,'Tampico','MEX',1241,'Tamaulipas'),(7283,'Ixtapaluca','MEX',820,'MÃ©xico'),(7284,'Apodaca','MEX',942,'Nuevo LeÃ³n'),(7285,'Guasave','MEX',1171,'Sinaloa'),(7286,'GÃ³mez Palacio','MEX',395,'Durango'),(7287,'Tapachula','MEX',311,'Chiapas'),(7288,'NicolÃ¡s Romero','MEX',820,'MÃ©xico'),(7289,'Coatzacoalcos','MEX',1347,'Veracruz'),(7290,'Uruapan','MEX',832,'MichoacÃ¡n de Ocampo'),(7291,'Victoria','MEX',1241,'Tamaulipas'),(7292,'Oaxaca de JuÃ¡rez','MEX',946,'Oaxaca'),(7293,'Coacalco de BerriozÃ¡bal','MEX',820,'MÃ©xico'),(7294,'Pachuca de Soto','MEX',535,'Hidalgo'),(7295,'General Escobedo','MEX',942,'Nuevo LeÃ³n'),(7296,'Salamanca','MEX',483,'Guanajuato'),(7297,'Santa Catarina','MEX',942,'Nuevo LeÃ³n'),(7298,'TehuacÃ¡n','MEX',1030,'Puebla'),(7299,'Chalco','MEX',820,'MÃ©xico'),(7300,'CÃ¡rdenas','MEX',1227,'Tabasco'),(7301,'Campeche','MEX',260,'Campeche'),(7302,'La Paz','MEX',820,'MÃ©xico'),(7303,'OthÃ³n P. Blanco (Chetumal)','MEX',1059,'Quintana Roo'),(7304,'Texcoco','MEX',820,'MÃ©xico'),(7305,'La Paz','MEX',161,'Baja California Sur'),(7306,'Metepec','MEX',820,'MÃ©xico'),(7307,'Monclova','MEX',332,'Coahuila de Zaragoza'),(7308,'Huixquilucan','MEX',820,'MÃ©xico'),(7309,'Chilpancingo de los Bravo','MEX',491,'Guerrero'),(7310,'Puerto Vallarta','MEX',596,'Jalisco'),(7311,'Fresnillo','MEX',1407,'Zacatecas'),(7312,'Ciudad Madero','MEX',1241,'Tamaulipas'),(7313,'Soledad de Graciano SÃ¡nchez','MEX',1113,'San Luis PotosÃ­'),(7314,'San Juan del RÃ­o','MEX',1055,'QuerÃ©taro'),(7315,'San Felipe del Progreso','MEX',820,'MÃ©xico'),(7316,'CÃ³rdoba','MEX',1347,'Veracruz'),(7317,'TecÃ¡mac','MEX',820,'MÃ©xico'),(7318,'Ocosingo','MEX',311,'Chiapas'),(7319,'Carmen','MEX',260,'Campeche'),(7320,'LÃ¡zaro CÃ¡rdenas','MEX',832,'MichoacÃ¡n de Ocampo'),(7321,'Jiutepec','MEX',857,'Morelos'),(7322,'Papantla','MEX',1347,'Veracruz'),(7323,'Comalcalco','MEX',1227,'Tabasco'),(7324,'Zamora','MEX',832,'MichoacÃ¡n de Ocampo'),(7325,'Nogales','MEX',1185,'Sonora'),(7326,'Huimanguillo','MEX',1227,'Tabasco'),(7327,'Cuautla','MEX',857,'Morelos'),(7328,'MinatitlÃ¡n','MEX',1347,'Veracruz'),(7329,'Poza Rica de Hidalgo','MEX',1347,'Veracruz'),(7330,'Ciudad Valles','MEX',1113,'San Luis PotosÃ­'),(7331,'Navolato','MEX',1171,'Sinaloa'),(7332,'San Luis RÃ­o Colorado','MEX',1185,'Sonora'),(7333,'PÃ©njamo','MEX',483,'Guanajuato'),(7334,'San AndrÃ©s Tuxtla','MEX',1347,'Veracruz'),(7335,'Guanajuato','MEX',483,'Guanajuato'),(7336,'Navojoa','MEX',1185,'Sonora'),(7337,'ZitÃ¡cuaro','MEX',832,'MichoacÃ¡n de Ocampo'),(7338,'Boca del RÃ­o','MEX',1348,'Veracruz-Llave'),(7339,'Allende','MEX',483,'Guanajuato'),(7340,'Silao','MEX',483,'Guanajuato'),(7341,'Macuspana','MEX',1227,'Tabasco'),(7342,'San Juan Bautista Tuxtepec','MEX',946,'Oaxaca'),(7343,'San CristÃ³bal de las Casas','MEX',311,'Chiapas'),(7344,'Valle de Santiago','MEX',483,'Guanajuato'),(7345,'Guaymas','MEX',1185,'Sonora'),(7346,'Colima','MEX',336,'Colima'),(7347,'Dolores Hidalgo','MEX',483,'Guanajuato'),(7348,'Lagos de Moreno','MEX',596,'Jalisco'),(7349,'Piedras Negras','MEX',332,'Coahuila de Zaragoza'),(7350,'Altamira','MEX',1241,'Tamaulipas'),(7351,'TÃºxpam','MEX',1347,'Veracruz'),(7352,'San Pedro Garza GarcÃ­a','MEX',942,'Nuevo LeÃ³n'),(7353,'CuauhtÃ©moc','MEX',314,'Chihuahua'),(7354,'Manzanillo','MEX',336,'Colima'),(7355,'Iguala de la Independencia','MEX',491,'Guerrero'),(7356,'Zacatecas','MEX',1407,'Zacatecas'),(7357,'Tlajomulco de ZÃºÃ±iga','MEX',596,'Jalisco'),(7358,'Tulancingo de Bravo','MEX',535,'Hidalgo'),(7359,'Zinacantepec','MEX',820,'MÃ©xico'),(7360,'San MartÃ­n Texmelucan','MEX',1030,'Puebla'),(7361,'TepatitlÃ¡n de Morelos','MEX',596,'Jalisco'),(7362,'MartÃ­nez de la Torre','MEX',1347,'Veracruz'),(7363,'Orizaba','MEX',1347,'Veracruz'),(7364,'ApatzingÃ¡n','MEX',832,'MichoacÃ¡n de Ocampo'),(7365,'Atlixco','MEX',1030,'Puebla'),(7366,'Delicias','MEX',314,'Chihuahua'),(7367,'Ixtlahuaca','MEX',820,'MÃ©xico'),(7368,'El Mante','MEX',1241,'Tamaulipas'),(7369,'Lerdo','MEX',395,'Durango'),(7370,'Almoloya de JuÃ¡rez','MEX',820,'MÃ©xico'),(7371,'AcÃ¡mbaro','MEX',483,'Guanajuato'),(7372,'AcuÃ±a','MEX',332,'Coahuila de Zaragoza'),(7373,'Guadalupe','MEX',1407,'Zacatecas'),(7374,'Huejutla de Reyes','MEX',535,'Hidalgo'),(7375,'Hidalgo','MEX',832,'MichoacÃ¡n de Ocampo'),(7376,'Los Cabos','MEX',161,'Baja California Sur'),(7377,'ComitÃ¡n de DomÃ­nguez','MEX',311,'Chiapas'),(7378,'CunduacÃ¡n','MEX',1227,'Tabasco'),(7379,'RÃ­o Bravo','MEX',1241,'Tamaulipas'),(7380,'Temapache','MEX',1347,'Veracruz'),(7381,'Chilapa de Alvarez','MEX',491,'Guerrero'),(7382,'Hidalgo del Parral','MEX',314,'Chihuahua'),(7383,'San Francisco del RincÃ³n','MEX',483,'Guanajuato'),(7384,'Taxco de AlarcÃ³n','MEX',491,'Guerrero'),(7385,'Zumpango','MEX',820,'MÃ©xico'),(7386,'San Pedro Cholula','MEX',1030,'Puebla'),(7387,'Lerma','MEX',820,'MÃ©xico'),(7388,'TecomÃ¡n','MEX',336,'Colima'),(7389,'Las Margaritas','MEX',311,'Chiapas'),(7390,'Cosoleacaque','MEX',1347,'Veracruz'),(7391,'San Luis de la Paz','MEX',483,'Guanajuato'),(7392,'JosÃ© Azueta','MEX',491,'Guerrero'),(7393,'Santiago Ixcuintla','MEX',890,'Nayarit'),(7394,'San Felipe','MEX',483,'Guanajuato'),(7395,'Tejupilco','MEX',820,'MÃ©xico'),(7396,'Tantoyuca','MEX',1347,'Veracruz'),(7397,'Salvatierra','MEX',483,'Guanajuato'),(7398,'Tultepec','MEX',820,'MÃ©xico'),(7399,'Temixco','MEX',857,'Morelos'),(7400,'Matamoros','MEX',332,'Coahuila de Zaragoza'),(7401,'PÃ¡nuco','MEX',1347,'Veracruz'),(7402,'El Fuerte','MEX',1171,'Sinaloa'),(7403,'Tierra Blanca','MEX',1347,'Veracruz'),(7404,'Weno','FSM',327,'Chuuk'),(7405,'Palikir','FSM',1016,'Pohnpei'),(7406,'Chisinau','MDA',317,'Chisinau'),(7407,'Tiraspol','MDA',383,'Dnjestria'),(7408,'Balti','MDA',167,'Balti'),(7409,'Bender (TÃ®ghina)','MDA',198,'Bender (TÃ®ghina)'),(7410,'Monte-Carlo','MCO',133,'â€“'),(7411,'Monte-Carlo','MCO',134,'â€“'),(7412,'Monte-Carlo','MCO',135,'â€“'),(7413,'Monte-Carlo','MCO',136,'â€“'),(7414,'Monte-Carlo','MCO',137,'â€“'),(7415,'Monte-Carlo','MCO',138,'â€“'),(7416,'Monte-Carlo','MCO',139,'â€“'),(7417,'Monte-Carlo','MCO',140,'â€“'),(7418,'Monte-Carlo','MCO',141,'â€“'),(7419,'Monte-Carlo','MCO',142,'â€“'),(7420,'Monte-Carlo','MCO',143,'â€“'),(7421,'Monte-Carlo','MCO',144,'â€“'),(7422,'Monte-Carlo','MCO',145,'â€“'),(7423,'Monte-Carlo','MCO',146,'â€“'),(7424,'Monaco-Ville','MCO',133,'â€“'),(7425,'Monaco-Ville','MCO',134,'â€“'),(7426,'Monaco-Ville','MCO',135,'â€“'),(7427,'Monaco-Ville','MCO',136,'â€“'),(7428,'Monaco-Ville','MCO',137,'â€“'),(7429,'Monaco-Ville','MCO',138,'â€“'),(7430,'Monaco-Ville','MCO',139,'â€“'),(7431,'Monaco-Ville','MCO',140,'â€“'),(7432,'Monaco-Ville','MCO',141,'â€“'),(7433,'Monaco-Ville','MCO',142,'â€“'),(7434,'Monaco-Ville','MCO',143,'â€“'),(7435,'Monaco-Ville','MCO',144,'â€“'),(7436,'Monaco-Ville','MCO',145,'â€“'),(7437,'Monaco-Ville','MCO',146,'â€“'),(7438,'Ulan Bator','MNG',1322,'Ulaanbaatar'),(7439,'Plymouth','MSR',1011,'Plymouth'),(7440,'Maputo','MOZ',795,'Maputo'),(7441,'Matola','MOZ',795,'Maputo'),(7442,'Beira','MOZ',1182,'Sofala'),(7443,'Nampula','MOZ',881,'Nampula'),(7444,'Chimoio','MOZ',790,'Manica'),(7445,'NaÃ§ala-Porto','MOZ',881,'Nampula'),(7446,'Quelimane','MOZ',1409,'ZambÃ©zia'),(7447,'Mocuba','MOZ',1409,'ZambÃ©zia'),(7448,'Tete','MOZ',1265,'Tete'),(7449,'Xai-Xai','MOZ',456,'Gaza'),(7450,'Xai-Xai','MOZ',457,'Gaza'),(7451,'Gurue','MOZ',1409,'ZambÃ©zia'),(7452,'Maxixe','MOZ',577,'Inhambane'),(7453,'Rangoon (Yangon)','MMR',1066,'Rangoon [Yangon]'),(7454,'Mandalay','MMR',788,'Mandalay'),(7455,'Moulmein (Mawlamyine)','MMR',850,'Mon'),(7456,'Pegu (Bago)','MMR',990,'Pegu [Bago]'),(7457,'Bassein (Pathein)','MMR',585,'Irrawaddy [Ayeyarwad'),(7458,'Monywa','MMR',1092,'Sagaing'),(7459,'Sittwe (Akyab)','MMR',1065,'Rakhine'),(7460,'Taunggyi (Taunggye)','MMR',1157,'Shan'),(7461,'Meikhtila','MMR',788,'Mandalay'),(7462,'Mergui (Myeik)','MMR',1261,'Tenasserim [Tanintha'),(7463,'Lashio (Lasho)','MMR',1157,'Shan'),(7464,'Prome (Pyay)','MMR',990,'Pegu [Bago]'),(7465,'Henzada (Hinthada)','MMR',584,'Irrawaddy\n [Ayeyarwa'),(7466,'Myingyan','MMR',788,'Mandalay'),(7467,'Tavoy (Dawei)','MMR',1261,'Tenasserim [Tanintha'),(7468,'Pagakku (Pakokku)','MMR',778,'Magwe [Magway]'),(7469,'Windhoek','NAM',668,'Khomas'),(7470,'Yangor','NRU',133,'â€“'),(7471,'Yangor','NRU',134,'â€“'),(7472,'Yangor','NRU',135,'â€“'),(7473,'Yangor','NRU',136,'â€“'),(7474,'Yangor','NRU',137,'â€“'),(7475,'Yangor','NRU',138,'â€“'),(7476,'Yangor','NRU',139,'â€“'),(7477,'Yangor','NRU',140,'â€“'),(7478,'Yangor','NRU',141,'â€“'),(7479,'Yangor','NRU',142,'â€“'),(7480,'Yangor','NRU',143,'â€“'),(7481,'Yangor','NRU',144,'â€“'),(7482,'Yangor','NRU',145,'â€“'),(7483,'Yangor','NRU',146,'â€“'),(7484,'Yaren','NRU',133,'â€“'),(7485,'Yaren','NRU',134,'â€“'),(7486,'Yaren','NRU',135,'â€“'),(7487,'Yaren','NRU',136,'â€“'),(7488,'Yaren','NRU',137,'â€“'),(7489,'Yaren','NRU',138,'â€“'),(7490,'Yaren','NRU',139,'â€“'),(7491,'Yaren','NRU',140,'â€“'),(7492,'Yaren','NRU',141,'â€“'),(7493,'Yaren','NRU',142,'â€“'),(7494,'Yaren','NRU',143,'â€“'),(7495,'Yaren','NRU',144,'â€“'),(7496,'Yaren','NRU',145,'â€“'),(7497,'Yaren','NRU',146,'â€“'),(7498,'Kathmandu','NPL',284,'Central'),(7499,'Kathmandu','NPL',285,'Central'),(7500,'Kathmandu','NPL',286,'Central'),(7501,'Kathmandu','NPL',287,'Central'),(7502,'Kathmandu','NPL',288,'Central'),(7503,'Kathmandu','NPL',289,'Central'),(7504,'Kathmandu','NPL',290,'Central'),(7505,'Biratnagar','NPL',403,'Eastern'),(7506,'Biratnagar','NPL',404,'Eastern'),(7507,'Pokhara','NPL',1381,'Western'),(7508,'Pokhara','NPL',1382,'Western'),(7509,'Pokhara','NPL',1383,'Western'),(7510,'Pokhara','NPL',1384,'Western'),(7511,'Lalitapur','NPL',284,'Central'),(7512,'Lalitapur','NPL',285,'Central'),(7513,'Lalitapur','NPL',286,'Central'),(7514,'Lalitapur','NPL',287,'Central'),(7515,'Lalitapur','NPL',288,'Central'),(7516,'Lalitapur','NPL',289,'Central'),(7517,'Lalitapur','NPL',290,'Central'),(7518,'Birgunj','NPL',284,'Central'),(7519,'Birgunj','NPL',285,'Central'),(7520,'Birgunj','NPL',286,'Central'),(7521,'Birgunj','NPL',287,'Central'),(7522,'Birgunj','NPL',288,'Central'),(7523,'Birgunj','NPL',289,'Central'),(7524,'Birgunj','NPL',290,'Central'),(7525,'Managua','NIC',787,'Managua'),(7526,'LeÃ³n','NIC',733,'LeÃ³n'),(7527,'Chinandega','NIC',316,'Chinandega'),(7528,'Masaya','NIC',807,'Masaya'),(7529,'Niamey','NER',905,'Niamey'),(7530,'Zinder','NER',1417,'Zinder'),(7531,'Maradi','NER',796,'Maradi'),(7532,'Lagos','NGA',723,'Lagos'),(7533,'Ibadan','NGA',979,'Oyo & Osun'),(7534,'Ogbomosho','NGA',979,'Oyo & Osun'),(7535,'Kano','NGA',635,'Kano & Jigawa'),(7536,'Oshogbo','NGA',979,'Oyo & Osun'),(7537,'Ilorin','NGA',708,'Kwara & Kogi'),(7538,'Abeokuta','NGA',949,'Ogun'),(7539,'Port Harcourt','NGA',1080,'Rivers & Bayelsa'),(7540,'Zaria','NGA',616,'Kaduna'),(7541,'Ilesha','NGA',979,'Oyo & Osun'),(7542,'Onitsha','NGA',76,'Anambra & Enugu & Eb'),(7543,'Iwo','NGA',979,'Oyo & Osun'),(7544,'Ado-Ekiti','NGA',956,'Ondo & Ekiti'),(7545,'Abuja','NGA',432,'Federal Capital Dist'),(7546,'Kaduna','NGA',616,'Kaduna'),(7547,'Mushin','NGA',723,'Lagos'),(7548,'Maiduguri','NGA',220,'Borno & Yobe'),(7549,'Enugu','NGA',76,'Anambra & Enugu & Eb'),(7550,'Ede','NGA',979,'Oyo & Osun'),(7551,'Aba','NGA',574,'Imo & Abia'),(7552,'Ife','NGA',979,'Oyo & Osun'),(7553,'Ila','NGA',979,'Oyo & Osun'),(7554,'Oyo','NGA',979,'Oyo & Osun'),(7555,'Ikerre','NGA',956,'Ondo & Ekiti'),(7556,'Benin City','NGA',408,'Edo & Delta'),(7557,'Iseyin','NGA',979,'Oyo & Osun'),(7558,'Katsina','NGA',651,'Katsina'),(7559,'Jos','NGA',1009,'Plateau & Nassarawa'),(7560,'Sokoto','NGA',1183,'Sokoto & Kebbi & Zam'),(7561,'Ilobu','NGA',979,'Oyo & Osun'),(7562,'Offa','NGA',708,'Kwara & Kogi'),(7563,'Ikorodu','NGA',723,'Lagos'),(7564,'Ilawe-Ekiti','NGA',956,'Ondo & Ekiti'),(7565,'Owo','NGA',956,'Ondo & Ekiti'),(7566,'Ikirun','NGA',979,'Oyo & Osun'),(7567,'Shaki','NGA',979,'Oyo & Osun'),(7568,'Calabar','NGA',347,'Cross River'),(7569,'Ondo','NGA',956,'Ondo & Ekiti'),(7570,'Akure','NGA',956,'Ondo & Ekiti'),(7571,'Gusau','NGA',1183,'Sokoto & Kebbi & Zam'),(7572,'Ijebu-Ode','NGA',949,'Ogun'),(7573,'Effon-Alaiye','NGA',979,'Oyo & Osun'),(7574,'Kumo','NGA',188,'Bauchi & Gombe'),(7575,'Shomolu','NGA',723,'Lagos'),(7576,'Oka-Akoko','NGA',956,'Ondo & Ekiti'),(7577,'Ikare','NGA',956,'Ondo & Ekiti'),(7578,'Sapele','NGA',408,'Edo & Delta'),(7579,'Deba Habe','NGA',188,'Bauchi & Gombe'),(7580,'Minna','NGA',908,'Niger'),(7581,'Warri','NGA',408,'Edo & Delta'),(7582,'Bida','NGA',908,'Niger'),(7583,'Ikire','NGA',979,'Oyo & Osun'),(7584,'Makurdi','NGA',202,'Benue'),(7585,'Lafia','NGA',1009,'Plateau & Nassarawa'),(7586,'Inisa','NGA',979,'Oyo & Osun'),(7587,'Shagamu','NGA',949,'Ogun'),(7588,'Awka','NGA',76,'Anambra & Enugu & Eb'),(7589,'Gombe','NGA',188,'Bauchi & Gombe'),(7590,'Igboho','NGA',979,'Oyo & Osun'),(7591,'Ejigbo','NGA',979,'Oyo & Osun'),(7592,'Agege','NGA',723,'Lagos'),(7593,'Ise-Ekiti','NGA',956,'Ondo & Ekiti'),(7594,'Ugep','NGA',347,'Cross River'),(7595,'Epe','NGA',723,'Lagos'),(7596,'Alofi','NIU',133,'â€“'),(7597,'Alofi','NIU',134,'â€“'),(7598,'Alofi','NIU',135,'â€“'),(7599,'Alofi','NIU',136,'â€“'),(7600,'Alofi','NIU',137,'â€“'),(7601,'Alofi','NIU',138,'â€“'),(7602,'Alofi','NIU',139,'â€“'),(7603,'Alofi','NIU',140,'â€“'),(7604,'Alofi','NIU',141,'â€“'),(7605,'Alofi','NIU',142,'â€“'),(7606,'Alofi','NIU',143,'â€“'),(7607,'Alofi','NIU',144,'â€“'),(7608,'Alofi','NIU',145,'â€“'),(7609,'Alofi','NIU',146,'â€“'),(7610,'Kingston','NFK',133,'â€“'),(7611,'Kingston','NFK',134,'â€“'),(7612,'Kingston','NFK',135,'â€“'),(7613,'Kingston','NFK',136,'â€“'),(7614,'Kingston','NFK',137,'â€“'),(7615,'Kingston','NFK',138,'â€“'),(7616,'Kingston','NFK',139,'â€“'),(7617,'Kingston','NFK',140,'â€“'),(7618,'Kingston','NFK',141,'â€“'),(7619,'Kingston','NFK',142,'â€“'),(7620,'Kingston','NFK',143,'â€“'),(7621,'Kingston','NFK',144,'â€“'),(7622,'Kingston','NFK',145,'â€“'),(7623,'Kingston','NFK',146,'â€“'),(7624,'Oslo','NOR',971,'Oslo'),(7625,'Bergen','NOR',548,'Hordaland'),(7626,'Trondheim','NOR',1142,'SÃ¸r-TrÃ¸ndelag'),(7627,'Stavanger','NOR',1084,'Rogaland'),(7628,'BÃ¦rum','NOR',27,'Akershus'),(7629,'Abidjan','CIV',11,'Abidjan'),(7630,'BouakÃ©','CIV',223,'BouakÃ©'),(7631,'Yamoussoukro','CIV',1398,'Yamoussoukro'),(7632,'Daloa','CIV',355,'Daloa'),(7633,'Korhogo','CIV',692,'Korhogo'),(7634,'al-Sib','OMN',809,'Masqat'),(7635,'Salala','OMN',1419,'Zufar'),(7636,'Bawshar','OMN',809,'Masqat'),(7637,'Suhar','OMN',34,'al-Batina'),(7638,'Masqat','OMN',809,'Masqat'),(7639,'Karachi','PAK',1173,'Sindh'),(7640,'Lahore','PAK',1034,'Punjab'),(7641,'Lahore','PAK',1035,'Punjab'),(7642,'Faisalabad','PAK',1034,'Punjab'),(7643,'Faisalabad','PAK',1035,'Punjab'),(7644,'Rawalpindi','PAK',1034,'Punjab'),(7645,'Rawalpindi','PAK',1035,'Punjab'),(7646,'Multan','PAK',1034,'Punjab'),(7647,'Multan','PAK',1035,'Punjab'),(7648,'Hyderabad','PAK',1173,'Sindh'),(7649,'Gujranwala','PAK',1034,'Punjab'),(7650,'Gujranwala','PAK',1035,'Punjab'),(7651,'Peshawar','PAK',937,'Nothwest Border Prov'),(7652,'Quetta','PAK',168,'Baluchistan'),(7653,'Islamabad','PAK',587,'Islamabad'),(7654,'Sargodha','PAK',1034,'Punjab'),(7655,'Sargodha','PAK',1035,'Punjab'),(7656,'Sialkot','PAK',1034,'Punjab'),(7657,'Sialkot','PAK',1035,'Punjab'),(7658,'Bahawalpur','PAK',1034,'Punjab'),(7659,'Bahawalpur','PAK',1035,'Punjab'),(7660,'Sukkur','PAK',1173,'Sindh'),(7661,'Jhang','PAK',1034,'Punjab'),(7662,'Jhang','PAK',1035,'Punjab'),(7663,'Sheikhupura','PAK',1034,'Punjab'),(7664,'Sheikhupura','PAK',1035,'Punjab'),(7665,'Larkana','PAK',1173,'Sindh'),(7666,'Gujrat','PAK',1034,'Punjab'),(7667,'Gujrat','PAK',1035,'Punjab'),(7668,'Mardan','PAK',937,'Nothwest Border Prov'),(7669,'Kasur','PAK',1034,'Punjab'),(7670,'Kasur','PAK',1035,'Punjab'),(7671,'Rahim Yar Khan','PAK',1034,'Punjab'),(7672,'Rahim Yar Khan','PAK',1035,'Punjab'),(7673,'Sahiwal','PAK',1034,'Punjab'),(7674,'Sahiwal','PAK',1035,'Punjab'),(7675,'Okara','PAK',1034,'Punjab'),(7676,'Okara','PAK',1035,'Punjab'),(7677,'Wah','PAK',1034,'Punjab'),(7678,'Wah','PAK',1035,'Punjab'),(7679,'Dera Ghazi Khan','PAK',1034,'Punjab'),(7680,'Dera Ghazi Khan','PAK',1035,'Punjab'),(7681,'Mirpur Khas','PAK',1172,'Sind'),(7682,'Nawabshah','PAK',1172,'Sind'),(7683,'Mingora','PAK',937,'Nothwest Border Prov'),(7684,'Chiniot','PAK',1034,'Punjab'),(7685,'Chiniot','PAK',1035,'Punjab'),(7686,'Kamoke','PAK',1034,'Punjab'),(7687,'Kamoke','PAK',1035,'Punjab'),(7688,'Mandi Burewala','PAK',1034,'Punjab'),(7689,'Mandi Burewala','PAK',1035,'Punjab'),(7690,'Jhelum','PAK',1034,'Punjab'),(7691,'Jhelum','PAK',1035,'Punjab'),(7692,'Sadiqabad','PAK',1034,'Punjab'),(7693,'Sadiqabad','PAK',1035,'Punjab'),(7694,'Jacobabad','PAK',1172,'Sind'),(7695,'Shikarpur','PAK',1172,'Sind'),(7696,'Khanewal','PAK',1034,'Punjab'),(7697,'Khanewal','PAK',1035,'Punjab'),(7698,'Hafizabad','PAK',1034,'Punjab'),(7699,'Hafizabad','PAK',1035,'Punjab'),(7700,'Kohat','PAK',937,'Nothwest Border Prov'),(7701,'Muzaffargarh','PAK',1034,'Punjab'),(7702,'Muzaffargarh','PAK',1035,'Punjab'),(7703,'Khanpur','PAK',1034,'Punjab'),(7704,'Khanpur','PAK',1035,'Punjab'),(7705,'Gojra','PAK',1034,'Punjab'),(7706,'Gojra','PAK',1035,'Punjab'),(7707,'Bahawalnagar','PAK',1034,'Punjab'),(7708,'Bahawalnagar','PAK',1035,'Punjab'),(7709,'Muridke','PAK',1034,'Punjab'),(7710,'Muridke','PAK',1035,'Punjab'),(7711,'Pak Pattan','PAK',1034,'Punjab'),(7712,'Pak Pattan','PAK',1035,'Punjab'),(7713,'Abottabad','PAK',937,'Nothwest Border Prov'),(7714,'Tando Adam','PAK',1172,'Sind'),(7715,'Jaranwala','PAK',1034,'Punjab'),(7716,'Jaranwala','PAK',1035,'Punjab'),(7717,'Khairpur','PAK',1172,'Sind'),(7718,'Chishtian Mandi','PAK',1034,'Punjab'),(7719,'Chishtian Mandi','PAK',1035,'Punjab'),(7720,'Daska','PAK',1034,'Punjab'),(7721,'Daska','PAK',1035,'Punjab'),(7722,'Dadu','PAK',1172,'Sind'),(7723,'Mandi Bahauddin','PAK',1034,'Punjab'),(7724,'Mandi Bahauddin','PAK',1035,'Punjab'),(7725,'Ahmadpur East','PAK',1034,'Punjab'),(7726,'Ahmadpur East','PAK',1035,'Punjab'),(7727,'Kamalia','PAK',1034,'Punjab'),(7728,'Kamalia','PAK',1035,'Punjab'),(7729,'Khuzdar','PAK',168,'Baluchistan'),(7730,'Vihari','PAK',1034,'Punjab'),(7731,'Vihari','PAK',1035,'Punjab'),(7732,'Dera Ismail Khan','PAK',937,'Nothwest Border Prov'),(7733,'Wazirabad','PAK',1034,'Punjab'),(7734,'Wazirabad','PAK',1035,'Punjab'),(7735,'Nowshera','PAK',937,'Nothwest Border Prov'),(7736,'Koror','PLW',693,'Koror'),(7737,'Ciudad de PanamÃ¡','PAN',981,'PanamÃ¡'),(7738,'San Miguelito','PAN',1116,'San Miguelito'),(7739,'Port Moresby','PNG',886,'National Capital Dis'),(7740,'AsunciÃ³n','PRY',119,'AsunciÃ³n'),(7741,'Ciudad del Este','PRY',69,'Alto ParanÃ¡'),(7742,'San Lorenzo','PRY',284,'Central'),(7743,'San Lorenzo','PRY',285,'Central'),(7744,'San Lorenzo','PRY',286,'Central'),(7745,'San Lorenzo','PRY',287,'Central'),(7746,'San Lorenzo','PRY',288,'Central'),(7747,'San Lorenzo','PRY',289,'Central'),(7748,'San Lorenzo','PRY',290,'Central'),(7749,'LambarÃ©','PRY',284,'Central'),(7750,'LambarÃ©','PRY',285,'Central'),(7751,'LambarÃ©','PRY',286,'Central'),(7752,'LambarÃ©','PRY',287,'Central'),(7753,'LambarÃ©','PRY',288,'Central'),(7754,'LambarÃ©','PRY',289,'Central'),(7755,'LambarÃ©','PRY',290,'Central'),(7756,'Fernando de la Mora','PRY',284,'Central'),(7757,'Fernando de la Mora','PRY',285,'Central'),(7758,'Fernando de la Mora','PRY',286,'Central'),(7759,'Fernando de la Mora','PRY',287,'Central'),(7760,'Fernando de la Mora','PRY',288,'Central'),(7761,'Fernando de la Mora','PRY',289,'Central'),(7762,'Fernando de la Mora','PRY',290,'Central'),(7763,'Lima','PER',741,'Lima'),(7764,'Arequipa','PER',104,'Arequipa'),(7765,'Trujillo','PER',717,'La Libertad'),(7766,'Trujillo','PER',718,'La Libertad'),(7767,'Chiclayo','PER',725,'Lambayeque'),(7768,'Callao','PER',257,'Callao'),(7769,'Iquitos','PER',754,'Loreto'),(7770,'Chimbote','PER',77,'Ancash'),(7771,'Huancayo','PER',612,'JunÃ­n'),(7772,'Piura','PER',1007,'Piura'),(7773,'Cusco','PER',351,'Cusco'),(7774,'Pucallpa','PER',1319,'Ucayali'),(7775,'Tacna','PER',1230,'Tacna'),(7776,'Ica','PER',565,'Ica'),(7777,'Sullana','PER',1007,'Piura'),(7778,'Juliaca','PER',1036,'Puno'),(7779,'HuÃ¡nuco','PER',554,'Huanuco'),(7780,'Ayacucho','PER',130,'Ayacucho'),(7781,'Chincha Alta','PER',565,'Ica'),(7782,'Cajamarca','PER',253,'Cajamarca'),(7783,'Puno','PER',1036,'Puno'),(7784,'Ventanilla','PER',257,'Callao'),(7785,'Castilla','PER',1007,'Piura'),(7786,'Adamstown','PCN',133,'â€“'),(7787,'Adamstown','PCN',134,'â€“'),(7788,'Adamstown','PCN',135,'â€“'),(7789,'Adamstown','PCN',136,'â€“'),(7790,'Adamstown','PCN',137,'â€“'),(7791,'Adamstown','PCN',138,'â€“'),(7792,'Adamstown','PCN',139,'â€“'),(7793,'Adamstown','PCN',140,'â€“'),(7794,'Adamstown','PCN',141,'â€“'),(7795,'Adamstown','PCN',142,'â€“'),(7796,'Adamstown','PCN',143,'â€“'),(7797,'Adamstown','PCN',144,'â€“'),(7798,'Adamstown','PCN',145,'â€“'),(7799,'Adamstown','PCN',146,'â€“'),(7800,'Garapan','MNP',1100,'Saipan'),(7801,'Lisboa','PRT',746,'Lisboa'),(7802,'Lisboa','PRT',747,'Lisboa'),(7803,'Porto','PRT',1023,'Porto'),(7804,'Amadora','PRT',746,'Lisboa'),(7805,'Amadora','PRT',747,'Lisboa'),(7806,'CoÃ­mbra','PRT',334,'CoÃ­mbra'),(7807,'Braga','PRT',227,'Braga'),(7808,'San Juan','PRI',1110,'San Juan'),(7809,'San Juan','PRI',1111,'San Juan'),(7810,'BayamÃ³n','PRI',189,'BayamÃ³n'),(7811,'Ponce','PRI',1018,'Ponce'),(7812,'Carolina','PRI',272,'Carolina'),(7813,'Caguas','PRI',252,'Caguas'),(7814,'Arecibo','PRI',103,'Arecibo'),(7815,'Guaynabo','PRI',489,'Guaynabo'),(7816,'MayagÃ¼ez','PRI',815,'MayagÃ¼ez'),(7817,'Toa Baja','PRI',1282,'Toa Baja'),(7818,'Warszawa','POL',818,'Mazowieckie'),(7819,'LÃ³dz','POL',749,'Lodzkie'),(7820,'KrakÃ³w','POL',784,'Malopolskie'),(7821,'Wroclaw','POL',387,'Dolnoslaskie'),(7822,'Poznan','POL',1388,'Wielkopolskie'),(7823,'Gdansk','POL',1017,'Pomorskie'),(7824,'Szczecin','POL',1408,'Zachodnio-Pomorskie'),(7825,'Bydgoszcz','POL',701,'Kujawsko-Pomorskie'),(7826,'Lublin','POL',762,'Lubelskie'),(7827,'Katowice','POL',1180,'Slaskie'),(7828,'Bialystok','POL',1013,'Podlaskie'),(7829,'Czestochowa','POL',1180,'Slaskie'),(7830,'Gdynia','POL',1017,'Pomorskie'),(7831,'Sosnowiec','POL',1180,'Slaskie'),(7832,'Radom','POL',818,'Mazowieckie'),(7833,'Kielce','POL',1224,'Swietokrzyskie'),(7834,'Gliwice','POL',1180,'Slaskie'),(7835,'Torun','POL',701,'Kujawsko-Pomorskie'),(7836,'Bytom','POL',1180,'Slaskie'),(7837,'Zabrze','POL',1180,'Slaskie'),(7838,'Bielsko-Biala','POL',1180,'Slaskie'),(7839,'Olsztyn','POL',1366,'Warminsko-Mazurskie'),(7840,'RzeszÃ³w','POL',1012,'Podkarpackie'),(7841,'Ruda Slaska','POL',1180,'Slaskie'),(7842,'Rybnik','POL',1180,'Slaskie'),(7843,'Walbrzych','POL',387,'Dolnoslaskie'),(7844,'Tychy','POL',1180,'Slaskie'),(7845,'Dabrowa GÃ³rnicza','POL',1180,'Slaskie'),(7846,'Plock','POL',818,'Mazowieckie'),(7847,'Elblag','POL',1366,'Warminsko-Mazurskie'),(7848,'Opole','POL',958,'Opolskie'),(7849,'GorzÃ³w Wielkopolski','POL',763,'Lubuskie'),(7850,'Wloclawek','POL',701,'Kujawsko-Pomorskie'),(7851,'ChorzÃ³w','POL',1180,'Slaskie'),(7852,'TarnÃ³w','POL',784,'Malopolskie'),(7853,'Zielona GÃ³ra','POL',763,'Lubuskie'),(7854,'Koszalin','POL',1408,'Zachodnio-Pomorskie'),(7855,'Legnica','POL',387,'Dolnoslaskie'),(7856,'Kalisz','POL',1388,'Wielkopolskie'),(7857,'Grudziadz','POL',701,'Kujawsko-Pomorskie'),(7858,'Slupsk','POL',1017,'Pomorskie'),(7859,'Jastrzebie-ZdrÃ³j','POL',1180,'Slaskie'),(7860,'Jaworzno','POL',1180,'Slaskie'),(7861,'Jelenia GÃ³ra','POL',387,'Dolnoslaskie'),(7862,'Malabo','GNQ',210,'Bioko'),(7863,'Doha','QAT',385,'Doha'),(7864,'Paris','FRA',149,'ÃŽle-de-France'),(7865,'Marseille','FRA',1029,'Provence-Alpes-CÃ´te'),(7866,'Lyon','FRA',1069,'RhÃ´ne-Alpes'),(7867,'Toulouse','FRA',833,'Midi-PyrÃ©nÃ©es'),(7868,'Nice','FRA',1029,'Provence-Alpes-CÃ´te'),(7869,'Nantes','FRA',988,'Pays de la Loire'),(7870,'Strasbourg','FRA',67,'Alsace'),(7871,'Montpellier','FRA',727,'Languedoc-Roussillon'),(7872,'Bordeaux','FRA',98,'Aquitaine'),(7873,'Rennes','FRA',522,'Haute-Normandie'),(7874,'Le Havre','FRA',303,'Champagne-Ardenne'),(7875,'Reims','FRA',920,'Nord-Pas-de-Calais'),(7876,'Lille','FRA',1069,'RhÃ´ne-Alpes'),(7877,'St-Ã‰tienne','FRA',235,'Bretagne'),(7878,'Toulon','FRA',1029,'Provence-Alpes-CÃ´te'),(7879,'Grenoble','FRA',1069,'RhÃ´ne-Alpes'),(7880,'Angers','FRA',988,'Pays de la Loire'),(7881,'Dijon','FRA',225,'Bourgogne'),(7882,'Brest','FRA',235,'Bretagne'),(7883,'Le Mans','FRA',988,'Pays de la Loire'),(7884,'Clermont-Ferrand','FRA',129,'Auvergne'),(7885,'Amiens','FRA',999,'Picardie'),(7886,'Aix-en-Provence','FRA',1029,'Provence-Alpes-CÃ´te'),(7887,'Limoges','FRA',744,'Limousin'),(7888,'NÃ®mes','FRA',727,'Languedoc-Roussillon'),(7889,'Tours','FRA',297,'Centre'),(7890,'Tours','FRA',298,'Centre'),(7891,'Villeurbanne','FRA',1069,'RhÃ´ne-Alpes'),(7892,'Metz','FRA',756,'Lorraine'),(7893,'BesanÃ§on','FRA',439,'Franche-ComtÃ©'),(7894,'Caen','FRA',183,'Basse-Normandie'),(7895,'OrlÃ©ans','FRA',297,'Centre'),(7896,'OrlÃ©ans','FRA',298,'Centre'),(7897,'Mulhouse','FRA',67,'Alsace'),(7898,'Rouen','FRA',522,'Haute-Normandie'),(7899,'Boulogne-Billancourt','FRA',149,'ÃŽle-de-France'),(7900,'Perpignan','FRA',727,'Languedoc-Roussillon'),(7901,'Nancy','FRA',756,'Lorraine'),(7902,'Roubaix','FRA',920,'Nord-Pas-de-Calais'),(7903,'Argenteuil','FRA',149,'ÃŽle-de-France'),(7904,'Tourcoing','FRA',920,'Nord-Pas-de-Calais'),(7905,'Montreuil','FRA',149,'ÃŽle-de-France'),(7906,'Cayenne','GUF',279,'Cayenne'),(7907,'Faaa','PYF',1234,'Tahiti'),(7908,'Papeete','PYF',1234,'Tahiti'),(7909,'Saint-Denis','REU',1097,'Saint-Denis'),(7910,'Bucuresti','ROM',244,'Bukarest'),(7911,'Iasi','ROM',561,'Iasi'),(7912,'Constanta','ROM',340,'Constanta'),(7913,'Cluj-Napoca','ROM',331,'Cluj'),(7914,'Galati','ROM',452,'Galati'),(7915,'Timisoara','ROM',1277,'Timis'),(7916,'Brasov','ROM',230,'Brasov'),(7917,'Craiova','ROM',386,'Dolj'),(7918,'Ploiesti','ROM',1026,'Prahova'),(7919,'Braila','ROM',228,'Braila'),(7920,'Oradea','ROM',207,'Bihor'),(7921,'Bacau','ROM',154,'Bacau'),(7922,'Pitesti','ROM',105,'Arges'),(7923,'Arad','ROM',99,'Arad'),(7924,'Sibiu','ROM',1166,'Sibiu'),(7925,'TÃ¢rgu Mures','ROM',865,'Mures'),(7926,'Baia Mare','ROM',797,'Maramures'),(7927,'Buzau','ROM',250,'Buzau'),(7928,'Satu Mare','ROM',1136,'Satu Mare'),(7929,'Botosani','ROM',222,'Botosani'),(7930,'Piatra Neamt','ROM',891,'Neamt'),(7931,'RÃ¢mnicu VÃ¢lcea','ROM',1340,'VÃ¢lcea'),(7932,'Suceava','ROM',1209,'Suceava'),(7933,'Drobeta-Turnu Severin','ROM',825,'Mehedinti'),(7934,'TÃ¢rgoviste','ROM',364,'DÃ¢mbovita'),(7935,'Focsani','ROM',1362,'Vrancea'),(7936,'TÃ¢rgu Jiu','ROM',473,'Gorj'),(7937,'Tulcea','ROM',1305,'Tulcea'),(7938,'Resita','ROM',271,'Caras-Severin'),(7939,'Kigali','RWA',676,'Kigali'),(7940,'Stockholm','SWE',746,'Lisboa'),(7941,'Stockholm','SWE',747,'Lisboa'),(7942,'Gothenburg [GÃ¶teborg]','SWE',1374,'West GÃ¶tanmaan lÃ¤n'),(7943,'MalmÃ¶','SWE',1177,'SkÃ¥ne lÃ¤n'),(7944,'Uppsala','SWE',1326,'Uppsala lÃ¤n'),(7945,'LinkÃ¶ping','SWE',399,'East GÃ¶tanmaan lÃ¤n'),(7946,'VÃ¤sterÃ¥s','SWE',1343,'VÃ¤stmanlands lÃ¤n'),(7947,'Ã–rebro','SWE',150,'Ã–rebros lÃ¤n'),(7948,'NorrkÃ¶ping','SWE',399,'East GÃ¶tanmaan lÃ¤n'),(7949,'Helsingborg','SWE',1177,'SkÃ¥ne lÃ¤n'),(7950,'JÃ¶nkÃ¶ping','SWE',600,'JÃ¶nkÃ¶pings lÃ¤n'),(7951,'UmeÃ¥','SWE',1341,'VÃ¤sterbottens lÃ¤n'),(7952,'Lund','SWE',1177,'SkÃ¥ne lÃ¤n'),(7953,'BorÃ¥s','SWE',1374,'West GÃ¶tanmaan lÃ¤n'),(7954,'Sundsvall','SWE',1342,'VÃ¤sternorrlands lÃ¤'),(7955,'GÃ¤vle','SWE',460,'GÃ¤vleborgs lÃ¤n'),(7956,'Jamestown','SHN',1096,'Saint Helena'),(7957,'Basseterre','KNA',1200,'St George Basseterre'),(7958,'Castries','LCA',276,'Castries'),(7959,'Kingstown','VCT',1197,'St George'),(7960,'Kingstown','VCT',1198,'St George'),(7961,'Kingstown','VCT',1199,'St George'),(7962,'Saint-Pierre','SPM',1099,'Saint-Pierre'),(7963,'Berlin','DEU',203,'Berliini'),(7964,'Hamburg','DEU',509,'Hamburg'),(7965,'Munich [MÃ¼nchen]','DEU',159,'Baijeri'),(7966,'KÃ¶ln','DEU',922,'Nordrhein-Westfalen'),(7967,'Frankfurt am Main','DEU',533,'Hessen'),(7968,'Essen','DEU',922,'Nordrhein-Westfalen'),(7969,'Dortmund','DEU',922,'Nordrhein-Westfalen'),(7970,'Stuttgart','DEU',155,'Baden-WÃ¼rttemberg'),(7971,'DÃ¼sseldorf','DEU',922,'Nordrhein-Westfalen'),(7972,'Bremen','DEU',233,'Bremen'),(7973,'Duisburg','DEU',922,'Nordrhein-Westfalen'),(7974,'Hannover','DEU',907,'Niedersachsen'),(7975,'Leipzig','DEU',1103,'Saksi'),(7976,'NÃ¼rnberg','DEU',159,'Baijeri'),(7977,'Dresden','DEU',1103,'Saksi'),(7978,'Bochum','DEU',922,'Nordrhein-Westfalen'),(7979,'Wuppertal','DEU',922,'Nordrhein-Westfalen'),(7980,'Bielefeld','DEU',922,'Nordrhein-Westfalen'),(7981,'Mannheim','DEU',155,'Baden-WÃ¼rttemberg'),(7982,'Bonn','DEU',922,'Nordrhein-Westfalen'),(7983,'Gelsenkirchen','DEU',922,'Nordrhein-Westfalen'),(7984,'Karlsruhe','DEU',155,'Baden-WÃ¼rttemberg'),(7985,'Wiesbaden','DEU',533,'Hessen'),(7986,'MÃ¼nster','DEU',922,'Nordrhein-Westfalen'),(7987,'MÃ¶nchengladbach','DEU',922,'Nordrhein-Westfalen'),(7988,'Chemnitz','DEU',1103,'Saksi'),(7989,'Augsburg','DEU',159,'Baijeri'),(7990,'Halle/Saale','DEU',82,'Anhalt Sachsen'),(7991,'Braunschweig','DEU',907,'Niedersachsen'),(7992,'Aachen','DEU',922,'Nordrhein-Westfalen'),(7993,'Krefeld','DEU',922,'Nordrhein-Westfalen'),(7994,'Magdeburg','DEU',82,'Anhalt Sachsen'),(7995,'Kiel','DEU',1144,'Schleswig-Holstein'),(7996,'Oberhausen','DEU',922,'Nordrhein-Westfalen'),(7997,'LÃ¼beck','DEU',1144,'Schleswig-Holstein'),(7998,'Hagen','DEU',922,'Nordrhein-Westfalen'),(7999,'Rostock','DEU',822,'Mecklenburg-Vorpomme'),(8000,'Freiburg im Breisgau','DEU',155,'Baden-WÃ¼rttemberg'),(8001,'Erfurt','DEU',1267,'ThÃ¼ringen'),(8002,'Kassel','DEU',533,'Hessen'),(8003,'SaarbrÃ¼cken','DEU',1089,'Saarland'),(8004,'Mainz','DEU',1070,'Rheinland-Pfalz'),(8005,'Hamm','DEU',922,'Nordrhein-Westfalen'),(8006,'Herne','DEU',922,'Nordrhein-Westfalen'),(8007,'MÃ¼lheim an der Ruhr','DEU',922,'Nordrhein-Westfalen'),(8008,'Solingen','DEU',922,'Nordrhein-Westfalen'),(8009,'OsnabrÃ¼ck','DEU',907,'Niedersachsen'),(8010,'Ludwigshafen am Rhein','DEU',1070,'Rheinland-Pfalz'),(8011,'Leverkusen','DEU',922,'Nordrhein-Westfalen'),(8012,'Oldenburg','DEU',907,'Niedersachsen'),(8013,'Neuss','DEU',922,'Nordrhein-Westfalen'),(8014,'Heidelberg','DEU',155,'Baden-WÃ¼rttemberg'),(8015,'Darmstadt','DEU',533,'Hessen'),(8016,'Paderborn','DEU',922,'Nordrhein-Westfalen'),(8017,'Potsdam','DEU',229,'Brandenburg'),(8018,'WÃ¼rzburg','DEU',159,'Baijeri'),(8019,'Regensburg','DEU',159,'Baijeri'),(8020,'Recklinghausen','DEU',922,'Nordrhein-Westfalen'),(8021,'GÃ¶ttingen','DEU',907,'Niedersachsen'),(8022,'Bremerhaven','DEU',233,'Bremen'),(8023,'Wolfsburg','DEU',907,'Niedersachsen'),(8024,'Bottrop','DEU',922,'Nordrhein-Westfalen'),(8025,'Remscheid','DEU',922,'Nordrhein-Westfalen'),(8026,'Heilbronn','DEU',155,'Baden-WÃ¼rttemberg'),(8027,'Pforzheim','DEU',155,'Baden-WÃ¼rttemberg'),(8028,'Offenbach am Main','DEU',533,'Hessen'),(8029,'Ulm','DEU',155,'Baden-WÃ¼rttemberg'),(8030,'Ingolstadt','DEU',159,'Baijeri'),(8031,'Gera','DEU',1267,'ThÃ¼ringen'),(8032,'Salzgitter','DEU',907,'Niedersachsen'),(8033,'Cottbus','DEU',229,'Brandenburg'),(8034,'Reutlingen','DEU',155,'Baden-WÃ¼rttemberg'),(8035,'FÃ¼rth','DEU',159,'Baijeri'),(8036,'Siegen','DEU',922,'Nordrhein-Westfalen'),(8037,'Koblenz','DEU',1070,'Rheinland-Pfalz'),(8038,'Moers','DEU',922,'Nordrhein-Westfalen'),(8039,'Bergisch Gladbach','DEU',922,'Nordrhein-Westfalen'),(8040,'Zwickau','DEU',1103,'Saksi'),(8041,'Hildesheim','DEU',907,'Niedersachsen'),(8042,'Witten','DEU',922,'Nordrhein-Westfalen'),(8043,'Schwerin','DEU',822,'Mecklenburg-Vorpomme'),(8044,'Erlangen','DEU',159,'Baijeri'),(8045,'Kaiserslautern','DEU',1070,'Rheinland-Pfalz'),(8046,'Trier','DEU',1070,'Rheinland-Pfalz'),(8047,'Jena','DEU',1267,'ThÃ¼ringen'),(8048,'Iserlohn','DEU',922,'Nordrhein-Westfalen'),(8049,'GÃ¼tersloh','DEU',922,'Nordrhein-Westfalen'),(8050,'Marl','DEU',922,'Nordrhein-Westfalen'),(8051,'LÃ¼nen','DEU',922,'Nordrhein-Westfalen'),(8052,'DÃ¼ren','DEU',922,'Nordrhein-Westfalen'),(8053,'Ratingen','DEU',922,'Nordrhein-Westfalen'),(8054,'Velbert','DEU',922,'Nordrhein-Westfalen'),(8055,'Esslingen am Neckar','DEU',155,'Baden-WÃ¼rttemberg'),(8056,'Honiara','SLB',546,'Honiara'),(8057,'Lusaka','ZMB',765,'Lusaka'),(8058,'Ndola','ZMB',342,'Copperbelt'),(8059,'Kitwe','ZMB',342,'Copperbelt'),(8060,'Kabwe','ZMB',284,'Central'),(8061,'Kabwe','ZMB',285,'Central'),(8062,'Kabwe','ZMB',286,'Central'),(8063,'Kabwe','ZMB',287,'Central'),(8064,'Kabwe','ZMB',288,'Central'),(8065,'Kabwe','ZMB',289,'Central'),(8066,'Kabwe','ZMB',290,'Central'),(8067,'Chingola','ZMB',342,'Copperbelt'),(8068,'Mufulira','ZMB',342,'Copperbelt'),(8069,'Luanshya','ZMB',342,'Copperbelt'),(8070,'Apia','WSM',1325,'Upolu'),(8071,'Serravalle','SMR',1150,'Serravalle/Dogano'),(8072,'San Marino','SMR',1114,'San Marino'),(8073,'SÃ£o TomÃ©','STP',97,'Aqua Grande'),(8074,'Riyadh','SAU',1082,'Riyadh'),(8075,'Jedda','SAU',826,'Mekka'),(8076,'Mekka','SAU',826,'Mekka'),(8077,'Medina','SAU',823,'Medina'),(8078,'al-Dammam','SAU',52,'al-Sharqiya'),(8079,'al-Dammam','SAU',53,'al-Sharqiya'),(8080,'al-Taif','SAU',826,'Mekka'),(8081,'Tabuk','SAU',1229,'Tabuk'),(8082,'Burayda','SAU',49,'al-Qasim'),(8083,'al-Hufuf','SAU',52,'al-Sharqiya'),(8084,'al-Hufuf','SAU',53,'al-Sharqiya'),(8085,'al-Mubarraz','SAU',52,'al-Sharqiya'),(8086,'al-Mubarraz','SAU',53,'al-Sharqiya'),(8087,'Khamis Mushayt','SAU',113,'Asir'),(8088,'Hail','SAU',501,'Hail'),(8089,'al-Kharj','SAU',1072,'Riad'),(8090,'al-Khubar','SAU',52,'al-Sharqiya'),(8091,'al-Khubar','SAU',53,'al-Sharqiya'),(8092,'Jubayl','SAU',52,'al-Sharqiya'),(8093,'Jubayl','SAU',53,'al-Sharqiya'),(8094,'Hafar al-Batin','SAU',52,'al-Sharqiya'),(8095,'Hafar al-Batin','SAU',53,'al-Sharqiya'),(8096,'al-Tuqba','SAU',52,'al-Sharqiya'),(8097,'al-Tuqba','SAU',53,'al-Sharqiya'),(8098,'Yanbu','SAU',823,'Medina'),(8099,'Abha','SAU',113,'Asir'),(8100,'AraÂ´ar','SAU',41,'al-Khudud al-Samaliy'),(8101,'al-Qatif','SAU',52,'al-Sharqiya'),(8102,'al-Qatif','SAU',53,'al-Sharqiya'),(8103,'al-Hawiya','SAU',826,'Mekka'),(8104,'Unayza','SAU',1044,'Qasim'),(8105,'Najran','SAU',873,'Najran'),(8106,'Pikine','SEN',265,'Cap-Vert'),(8107,'Dakar','SEN',265,'Cap-Vert'),(8108,'ThiÃ¨s','SEN',1269,'ThiÃ¨s'),(8109,'Kaolack','SEN',638,'Kaolack'),(8110,'Ziguinchor','SEN',1416,'Ziguinchor'),(8111,'Rufisque','SEN',265,'Cap-Vert'),(8112,'Saint-Louis','SEN',1098,'Saint-Louis'),(8113,'Mbour','SEN',1269,'ThiÃ¨s'),(8114,'Diourbel','SEN',370,'Diourbel'),(8115,'Victoria','SYC',781,'MahÃ©'),(8116,'Freetown','SLE',1381,'Western'),(8117,'Freetown','SLE',1382,'Western'),(8118,'Freetown','SLE',1383,'Western'),(8119,'Freetown','SLE',1384,'Western'),(8120,'Singapore','SGP',133,'â€“'),(8121,'Singapore','SGP',134,'â€“'),(8122,'Singapore','SGP',135,'â€“'),(8123,'Singapore','SGP',136,'â€“'),(8124,'Singapore','SGP',137,'â€“'),(8125,'Singapore','SGP',138,'â€“'),(8126,'Singapore','SGP',139,'â€“'),(8127,'Singapore','SGP',140,'â€“'),(8128,'Singapore','SGP',141,'â€“'),(8129,'Singapore','SGP',142,'â€“'),(8130,'Singapore','SGP',143,'â€“'),(8131,'Singapore','SGP',144,'â€“'),(8132,'Singapore','SGP',145,'â€“'),(8133,'Singapore','SGP',146,'â€“'),(8134,'Bratislava','SVK',231,'Bratislava'),(8135,'KoÅ¡ice','SVK',1344,'VÃ½chodnÃ© Slovensko'),(8136,'PreÅ¡ov','SVK',1344,'VÃ½chodnÃ© Slovensko'),(8137,'Ljubljana','SVN',973,'Osrednjeslovenska'),(8138,'Maribor','SVN',1014,'Podravska'),(8139,'Mogadishu','SOM',170,'Banaadir'),(8140,'Hargeysa','SOM',1392,'Woqooyi Galbeed'),(8141,'Kismaayo','SOM',610,'Jubbada Hoose'),(8142,'Colombo','LKA',1381,'Western'),(8143,'Colombo','LKA',1382,'Western'),(8144,'Colombo','LKA',1383,'Western'),(8145,'Colombo','LKA',1384,'Western'),(8146,'Dehiwala','LKA',1381,'Western'),(8147,'Dehiwala','LKA',1382,'Western'),(8148,'Dehiwala','LKA',1383,'Western'),(8149,'Dehiwala','LKA',1384,'Western'),(8150,'Moratuwa','LKA',1381,'Western'),(8151,'Moratuwa','LKA',1382,'Western'),(8152,'Moratuwa','LKA',1383,'Western'),(8153,'Moratuwa','LKA',1384,'Western'),(8154,'Jaffna','LKA',933,'Northern'),(8155,'Jaffna','LKA',934,'Northern'),(8156,'Kandy','LKA',284,'Central'),(8157,'Kandy','LKA',285,'Central'),(8158,'Kandy','LKA',286,'Central'),(8159,'Kandy','LKA',287,'Central'),(8160,'Kandy','LKA',288,'Central'),(8161,'Kandy','LKA',289,'Central'),(8162,'Kandy','LKA',290,'Central'),(8163,'Sri Jayawardenepura Kotte','LKA',1381,'Western'),(8164,'Sri Jayawardenepura Kotte','LKA',1382,'Western'),(8165,'Sri Jayawardenepura Kotte','LKA',1383,'Western'),(8166,'Sri Jayawardenepura Kotte','LKA',1384,'Western'),(8167,'Negombo','LKA',1381,'Western'),(8168,'Negombo','LKA',1382,'Western'),(8169,'Negombo','LKA',1383,'Western'),(8170,'Negombo','LKA',1384,'Western'),(8171,'Omdurman','SDN',667,'Khartum'),(8172,'Khartum','SDN',667,'Khartum'),(8173,'Sharq al-Nil','SDN',667,'Khartum'),(8174,'Port Sudan','SDN',33,'al-Bahr al-Ahmar'),(8175,'Kassala','SDN',648,'Kassala'),(8176,'Obeid','SDN',703,'Kurdufan al-Shamaliy'),(8177,'Nyala','SDN',359,'Darfur al-Janubiya'),(8178,'Wad Madani','SDN',40,'al-Jazira'),(8179,'al-Qadarif','SDN',46,'al-Qadarif'),(8180,'Kusti','SDN',32,'al-Bahr al-Abyad'),(8181,'al-Fashir','SDN',360,'Darfur al-Shamaliya'),(8182,'Juba','SDN',158,'Bahr al-Jabal'),(8183,'Helsinki [Helsingfors]','FIN',903,'Newmaa'),(8184,'Espoo','FIN',903,'Newmaa'),(8185,'Tampere','FIN',1006,'Pirkanmaa'),(8186,'Vantaa','FIN',903,'Newmaa'),(8187,'Turku [Ã…bo]','FIN',1338,'Varsinais-Suomi'),(8188,'Oulu','FIN',1015,'Pohjois-Pohjanmaa'),(8189,'Lahti','FIN',989,'PÃ¤ijÃ¤t-HÃ¤me'),(8190,'Paramaribo','SUR',984,'Paramaribo'),(8191,'Mbabane','SWZ',534,'Hhohho'),(8192,'ZÃ¼rich','CHE',1414,'ZÃ¼rich'),(8193,'Geneve','CHE',462,'Geneve'),(8194,'Basel','CHE',180,'Basel-Stadt'),(8195,'Bern','CHE',204,'Bern'),(8196,'Lausanne','CHE',1339,'Vaud'),(8197,'Damascus','SYR',356,'Damascus'),(8198,'Aleppo','SYR',63,'Aleppo'),(8199,'Hims','SYR',536,'Hims'),(8200,'Hama','SYR',507,'Hama'),(8201,'Latakia','SYR',730,'Latakia'),(8202,'al-Qamishliya','SYR',39,'al-Hasaka'),(8203,'Dayr al-Zawr','SYR',363,'Dayr al-Zawr'),(8204,'Jaramana','SYR',357,'Damaskos'),(8205,'Duma','SYR',357,'Damaskos'),(8206,'al-Raqqa','SYR',50,'al-Raqqa'),(8207,'Idlib','SYR',567,'Idlib'),(8208,'Dushanbe','TJK',646,'Karotegin'),(8209,'Khujand','TJK',672,'Khujand'),(8210,'Taipei','TWN',1237,'Taipei'),(8211,'Kaohsiung','TWN',637,'Kaohsiung'),(8212,'Taichung','TWN',1235,'Taichung'),(8213,'Tainan','TWN',1236,'Tainan'),(8214,'Panchiao','TWN',1237,'Taipei'),(8215,'Chungho','TWN',1237,'Taipei'),(8216,'Keelung (Chilung)','TWN',658,'Keelung'),(8217,'Sanchung','TWN',1237,'Taipei'),(8218,'Hsinchuang','TWN',1237,'Taipei'),(8219,'Hsinchu','TWN',551,'Hsinchu'),(8220,'Chungli','TWN',1247,'Taoyuan'),(8221,'Fengshan','TWN',637,'Kaohsiung'),(8222,'Taoyuan','TWN',1247,'Taoyuan'),(8223,'Chiayi','TWN',312,'Chiayi'),(8224,'Hsintien','TWN',1237,'Taipei'),(8225,'Changhwa','TWN',305,'Changhwa'),(8226,'Yungho','TWN',1237,'Taipei'),(8227,'Tucheng','TWN',1237,'Taipei'),(8228,'Pingtung','TWN',1005,'Pingtung'),(8229,'Yungkang','TWN',1236,'Tainan'),(8230,'Pingchen','TWN',1247,'Taoyuan'),(8231,'Tali','TWN',1235,'Taichung'),(8232,'Taiping','TWN',6,''),(8233,'Taiping','TWN',7,''),(8234,'Pate','TWN',1247,'Taoyuan'),(8235,'Fengyuan','TWN',1235,'Taichung'),(8236,'Luchou','TWN',1237,'Taipei'),(8237,'Hsichuh','TWN',1237,'Taipei'),(8238,'Shulin','TWN',1237,'Taipei'),(8239,'Yuanlin','TWN',305,'Changhwa'),(8240,'Yangmei','TWN',1247,'Taoyuan'),(8241,'Taliao','TWN',6,''),(8242,'Taliao','TWN',7,''),(8243,'Kueishan','TWN',6,''),(8244,'Kueishan','TWN',7,''),(8245,'Tanshui','TWN',1237,'Taipei'),(8246,'Taitung','TWN',1238,'Taitung'),(8247,'Hualien','TWN',552,'Hualien'),(8248,'Nantou','TWN',883,'Nantou'),(8249,'Lungtan','TWN',1237,'Taipei'),(8250,'Touliu','TWN',1402,'YÃ¼nlin'),(8251,'Tsaotun','TWN',883,'Nantou'),(8252,'Kangshan','TWN',637,'Kaohsiung'),(8253,'Ilan','TWN',569,'Ilan'),(8254,'Miaoli','TWN',830,'Miaoli'),(8255,'Dar es Salaam','TZA',358,'Dar es Salaam'),(8256,'Dodoma','TZA',384,'Dodoma'),(8257,'Mwanza','TZA',867,'Mwanza'),(8258,'Zanzibar','TZA',1411,'Zanzibar West'),(8259,'Tanga','TZA',1245,'Tanga'),(8260,'Mbeya','TZA',821,'Mbeya'),(8261,'Morogoro','TZA',858,'Morogoro'),(8262,'Arusha','TZA',111,'Arusha'),(8263,'Moshi','TZA',677,'Kilimanjaro'),(8264,'Tabora','TZA',1228,'Tabora'),(8265,'KÃ¸benhavn','DNK',655,'KÃ¸benhavn'),(8266,'Ã…rhus','DNK',147,'Ã…rhus'),(8267,'Odense','DNK',449,'Fyn'),(8268,'Aalborg','DNK',921,'Nordjylland'),(8269,'Frederiksberg','DNK',441,'Frederiksberg'),(8270,'Bangkok','THA',172,'Bangkok'),(8271,'Nonthaburi','THA',914,'Nonthaburi'),(8272,'Nakhon Ratchasima','THA',875,'Nakhon Ratchasima'),(8273,'Chiang Mai','THA',310,'Chiang Mai'),(8274,'Udon Thani','THA',1321,'Udon Thani'),(8275,'Hat Yai','THA',1184,'Songkhla'),(8276,'Khon Kaen','THA',669,'Khon Kaen'),(8277,'Pak Kret','THA',914,'Nonthaburi'),(8278,'Nakhon Sawan','THA',876,'Nakhon Sawan'),(8279,'Ubon Ratchathani','THA',1318,'Ubon Ratchathani'),(8280,'Songkhla','THA',1184,'Songkhla'),(8281,'Nakhon Pathom','THA',874,'Nakhon Pathom'),(8282,'LomÃ©','TGO',802,'Maritime'),(8283,'Fakaofo','TKL',426,'Fakaofo'),(8284,'NukuÂ´alofa','TON',1291,'Tongatapu'),(8285,'Chaguanas','TTO',273,'Caroni'),(8286,'Port-of-Spain','TTO',1022,'Port-of-Spain'),(8287,'NÂ´DjamÃ©na','TCD',307,'Chari-Baguirmi'),(8288,'Moundou','TCD',750,'Logone Occidental'),(8289,'Praha','CZE',538,'HlavnÃ­ mesto Praha'),(8290,'Brno','CZE',608,'JiznÃ­ Morava'),(8291,'Ostrava','CZE',1152,'SevernÃ­ Morava'),(8292,'Plzen','CZE',1412,'ZapadnÃ­ Cechy'),(8293,'Olomouc','CZE',1152,'SevernÃ­ Morava'),(8294,'Liberec','CZE',1151,'SevernÃ­ Cechy'),(8295,'CeskÃ© Budejovice','CZE',607,'JiznÃ­ Cechy'),(8296,'Hradec KrÃ¡lovÃ©','CZE',1345,'VÃ½chodnÃ­ Cechy'),(8297,'ÃšstÃ­ nad Labem','CZE',1151,'SevernÃ­ Cechy'),(8298,'Pardubice','CZE',1345,'VÃ½chodnÃ­ Cechy'),(8299,'Tunis','TUN',1307,'Tunis'),(8300,'Sfax','TUN',1153,'Sfax'),(8301,'Ariana','TUN',106,'Ariana'),(8302,'Ettadhamen','TUN',106,'Ariana'),(8303,'Sousse','TUN',1187,'Sousse'),(8304,'Kairouan','TUN',623,'Kairouan'),(8305,'Biserta','TUN',211,'Biserta'),(8306,'GabÃ¨s','TUN',450,'GabÃ¨s'),(8307,'Istanbul','TUR',590,'Istanbul'),(8308,'Ankara','TUR',84,'Ankara'),(8309,'Izmir','TUR',594,'Izmir'),(8310,'Adana','TUR',16,'Adana'),(8311,'Bursa','TUR',248,'Bursa'),(8312,'Gaziantep','TUR',458,'Gaziantep'),(8313,'Konya','TUR',690,'Konya'),(8314,'Mersin (IÃ§el)','TUR',562,'IÃ§el'),(8315,'Antalya','TUR',86,'Antalya'),(8316,'Diyarbakir','TUR',380,'Diyarbakir'),(8317,'Kayseri','TUR',653,'Kayseri'),(8318,'Eskisehir','TUR',420,'Eskisehir'),(8319,'Sanliurfa','TUR',1121,'Sanliurfa'),(8320,'Samsun','TUR',1108,'Samsun'),(8321,'Malatya','TUR',783,'Malatya'),(8322,'Gebze','TUR',686,'Kocaeli'),(8323,'Denizli','TUR',366,'Denizli'),(8324,'Sivas','TUR',1176,'Sivas'),(8325,'Erzurum','TUR',418,'Erzurum'),(8326,'Tarsus','TUR',16,'Adana'),(8327,'Kahramanmaras','TUR',621,'Kahramanmaras'),(8328,'ElÃ¢zig','TUR',412,'ElÃ¢zig'),(8329,'Van','TUR',1336,'Van'),(8330,'Sultanbeyli','TUR',590,'Istanbul'),(8331,'Izmit (Kocaeli)','TUR',686,'Kocaeli'),(8332,'Manisa','TUR',793,'Manisa'),(8333,'Batman','TUR',185,'Batman'),(8334,'Balikesir','TUR',165,'Balikesir'),(8335,'Sakarya (Adapazari)','TUR',1102,'Sakarya'),(8336,'Iskenderun','TUR',521,'Hatay'),(8337,'Osmaniye','TUR',972,'Osmaniye'),(8338,'Ã‡orum','TUR',148,'Ã‡orum'),(8339,'KÃ¼tahya','TUR',656,'KÃ¼tahya'),(8340,'Hatay (Antakya)','TUR',521,'Hatay'),(8341,'Kirikkale','TUR',681,'Kirikkale'),(8342,'Adiyaman','TUR',19,'Adiyaman'),(8343,'Trabzon','TUR',1298,'Trabzon'),(8344,'Ordu','TUR',960,'Ordu'),(8345,'Aydin','TUR',131,'Aydin'),(8346,'Usak','TUR',1327,'Usak'),(8347,'Edirne','TUR',407,'Edirne'),(8348,'Ã‡orlu','TUR',1259,'Tekirdag'),(8349,'Isparta','TUR',589,'Isparta'),(8350,'KarabÃ¼k','TUR',639,'KarabÃ¼k'),(8351,'Kilis','TUR',678,'Kilis'),(8352,'Alanya','TUR',86,'Antalya'),(8353,'Kiziltepe','TUR',800,'Mardin'),(8354,'Zonguldak','TUR',1418,'Zonguldak'),(8355,'Siirt','TUR',1170,'Siirt'),(8356,'Viransehir','TUR',1121,'Sanliurfa'),(8357,'Tekirdag','TUR',1259,'Tekirdag'),(8358,'Karaman','TUR',641,'Karaman'),(8359,'Afyon','TUR',22,'Afyon'),(8360,'Aksaray','TUR',29,'Aksaray'),(8361,'Ceyhan','TUR',16,'Adana'),(8362,'Erzincan','TUR',417,'Erzincan'),(8363,'Bismil','TUR',380,'Diyarbakir'),(8364,'Nazilli','TUR',131,'Aydin'),(8365,'Tokat','TUR',1286,'Tokat'),(8366,'Kars','TUR',647,'Kars'),(8367,'InegÃ¶l','TUR',248,'Bursa'),(8368,'Bandirma','TUR',165,'Balikesir'),(8369,'Ashgabat','TKM',24,'Ahal'),(8370,'ChÃ¤rjew','TKM',734,'Lebap'),(8371,'Dashhowuz','TKM',361,'Dashhowuz'),(8372,'Mary','TKM',805,'Mary'),(8373,'Cockburn Town','TCA',477,'Grand Turk'),(8374,'Funafuti','TUV',448,'Funafuti'),(8375,'Kampala','UGA',284,'Central'),(8376,'Kampala','UGA',285,'Central'),(8377,'Kampala','UGA',286,'Central'),(8378,'Kampala','UGA',287,'Central'),(8379,'Kampala','UGA',288,'Central'),(8380,'Kampala','UGA',289,'Central'),(8381,'Kampala','UGA',290,'Central'),(8382,'Kyiv','UKR',680,'Kiova'),(8383,'Harkova [Harkiv]','UKR',518,'Harkova'),(8384,'Dnipropetrovsk','UKR',382,'Dnipropetrovsk'),(8385,'Donetsk','UKR',388,'Donetsk'),(8386,'Odesa','UKR',948,'Odesa'),(8387,'Zaporizzja','UKR',1413,'Zaporizzja'),(8388,'Lviv','UKR',768,'Lviv'),(8389,'Kryvyi Rig','UKR',382,'Dnipropetrovsk'),(8390,'Mykolajiv','UKR',868,'Mykolajiv'),(8391,'Mariupol','UKR',388,'Donetsk'),(8392,'Lugansk','UKR',764,'Lugansk'),(8393,'Vinnytsja','UKR',1353,'Vinnytsja'),(8394,'Makijivka','UKR',388,'Donetsk'),(8395,'Herson','UKR',532,'Herson'),(8396,'Sevastopol','UKR',700,'Krim'),(8397,'Simferopol','UKR',700,'Krim'),(8398,'Pultava [Poltava]','UKR',1033,'Pultava'),(8399,'TÅ¡ernigiv','UKR',1313,'TÅ¡ernigiv'),(8400,'TÅ¡erkasy','UKR',1312,'TÅ¡erkasy'),(8401,'Gorlivka','UKR',388,'Donetsk'),(8402,'Zytomyr','UKR',1422,'Zytomyr'),(8403,'Sumy','UKR',1221,'Sumy'),(8404,'Dniprodzerzynsk','UKR',382,'Dnipropetrovsk'),(8405,'Kirovograd','UKR',683,'Kirovograd'),(8406,'Hmelnytskyi','UKR',539,'Hmelnytskyi'),(8407,'TÅ¡ernivtsi','UKR',1314,'TÅ¡ernivtsi'),(8408,'Rivne','UKR',1081,'Rivne'),(8409,'KrementÅ¡uk','UKR',1033,'Pultava'),(8410,'Ivano-Frankivsk','UKR',591,'Ivano-Frankivsk'),(8411,'Ternopil','UKR',1264,'Ternopil'),(8412,'Lutsk','UKR',1360,'Volynia'),(8413,'Bila Tserkva','UKR',680,'Kiova'),(8414,'Kramatorsk','UKR',388,'Donetsk'),(8415,'Melitopol','UKR',1413,'Zaporizzja'),(8416,'KertÅ¡','UKR',700,'Krim'),(8417,'Nikopol','UKR',382,'Dnipropetrovsk'),(8418,'Berdjansk','UKR',1413,'Zaporizzja'),(8419,'Pavlograd','UKR',382,'Dnipropetrovsk'),(8420,'Sjeverodonetsk','UKR',764,'Lugansk'),(8421,'Slovjansk','UKR',388,'Donetsk'),(8422,'Uzgorod','UKR',1240,'Taka-Karpatia'),(8423,'AltÅ¡evsk','UKR',764,'Lugansk'),(8424,'LysytÅ¡ansk','UKR',764,'Lugansk'),(8425,'Jevpatorija','UKR',700,'Krim'),(8426,'Kamjanets-Podilskyi','UKR',539,'Hmelnytskyi'),(8427,'Jenakijeve','UKR',388,'Donetsk'),(8428,'Krasnyi LutÅ¡','UKR',764,'Lugansk'),(8429,'Stahanov','UKR',764,'Lugansk'),(8430,'Oleksandrija','UKR',683,'Kirovograd'),(8431,'Konotop','UKR',1221,'Sumy'),(8432,'Kostjantynivka','UKR',388,'Donetsk'),(8433,'BerdytÅ¡iv','UKR',1422,'Zytomyr'),(8434,'Izmajil','UKR',948,'Odesa'),(8435,'Å ostka','UKR',1221,'Sumy'),(8436,'Uman','UKR',1312,'TÅ¡erkasy'),(8437,'Brovary','UKR',680,'Kiova'),(8438,'MukatÅ¡eve','UKR',1240,'Taka-Karpatia'),(8439,'Budapest','HUN',240,'Budapest'),(8440,'Debrecen','HUN',505,'HajdÃº-Bihar'),(8441,'Miskolc','HUN',221,'Borsod-AbaÃºj-ZemplÃ'),(8442,'Szeged','HUN',348,'CsongrÃ¡d'),(8443,'PÃ©cs','HUN',176,'Baranya'),(8444,'GyÃ¶r','HUN',495,'GyÃ¶r-Moson-Sopron'),(8445,'NyiregyhÃ¡za','HUN',1226,'Szabolcs-SzatmÃ¡r-Be'),(8446,'KecskemÃ©t','HUN',191,'BÃ¡cs-Kiskun'),(8447,'SzÃ©kesfehÃ©rvÃ¡r','HUN',433,'FejÃ©r'),(8448,'Montevideo','URY',854,'Montevideo'),(8449,'NoumÃ©a','NCL',133,'â€“'),(8450,'NoumÃ©a','NCL',134,'â€“'),(8451,'NoumÃ©a','NCL',135,'â€“'),(8452,'NoumÃ©a','NCL',136,'â€“'),(8453,'NoumÃ©a','NCL',137,'â€“'),(8454,'NoumÃ©a','NCL',138,'â€“'),(8455,'NoumÃ©a','NCL',139,'â€“'),(8456,'NoumÃ©a','NCL',140,'â€“'),(8457,'NoumÃ©a','NCL',141,'â€“'),(8458,'NoumÃ©a','NCL',142,'â€“'),(8459,'NoumÃ©a','NCL',143,'â€“'),(8460,'NoumÃ©a','NCL',144,'â€“'),(8461,'NoumÃ©a','NCL',145,'â€“'),(8462,'NoumÃ©a','NCL',146,'â€“'),(8463,'Auckland','NZL',128,'Auckland'),(8464,'Christchurch','NZL',264,'Canterbury'),(8465,'Manukau','NZL',128,'Auckland'),(8466,'North Shore','NZL',128,'Auckland'),(8467,'Waitakere','NZL',128,'Auckland'),(8468,'Wellington','NZL',1369,'Wellington'),(8469,'Dunedin','NZL',394,'Dunedin'),(8470,'Hamilton','NZL',512,'Hamilton'),(8471,'Hamilton','NZL',513,'Hamilton'),(8472,'Lower Hutt','NZL',1369,'Wellington'),(8473,'Toskent','UZB',1295,'Toskent Shahri'),(8474,'Namangan','UZB',878,'Namangan'),(8475,'Samarkand','UZB',1107,'Samarkand'),(8476,'Andijon','UZB',80,'Andijon'),(8477,'Buhoro','UZB',242,'Buhoro'),(8478,'Karsi','UZB',1043,'Qashqadaryo'),(8479,'Nukus','UZB',640,'Karakalpakistan'),(8480,'KÃ¼kon','UZB',428,'Fargona'),(8481,'Fargona','UZB',428,'Fargona'),(8482,'Circik','UZB',1294,'Toskent'),(8483,'Margilon','UZB',428,'Fargona'),(8484,'Ãœrgenc','UZB',671,'Khorazm'),(8485,'Angren','UZB',1294,'Toskent'),(8486,'Cizah','UZB',330,'Cizah'),(8487,'Navoi','UZB',889,'Navoi'),(8488,'Olmalik','UZB',1294,'Toskent'),(8489,'Termiz','UZB',1222,'Surkhondaryo'),(8490,'Minsk','BLR',547,'Horad Minsk'),(8491,'Gomel','BLR',472,'Gomel'),(8492,'Mogiljov','BLR',848,'Mogiljov'),(8493,'Vitebsk','BLR',1355,'Vitebsk'),(8494,'Grodno','BLR',481,'Grodno'),(8495,'Brest','BLR',234,'Brest'),(8496,'Bobruisk','BLR',848,'Mogiljov'),(8497,'BaranovitÅ¡i','BLR',234,'Brest'),(8498,'Borisov','BLR',839,'Minsk'),(8499,'Pinsk','BLR',234,'Brest'),(8500,'OrÅ¡a','BLR',1355,'Vitebsk'),(8501,'Mozyr','BLR',472,'Gomel'),(8502,'Novopolotsk','BLR',1355,'Vitebsk'),(8503,'Lida','BLR',481,'Grodno'),(8504,'Soligorsk','BLR',839,'Minsk'),(8505,'MolodetÅ¡no','BLR',839,'Minsk'),(8506,'Mata-Utu','WLF',1365,'Wallis'),(8507,'Port-Vila','VUT',1162,'Shefa'),(8508,'CittÃ  del Vaticano','VAT',133,'â€“'),(8509,'CittÃ  del Vaticano','VAT',134,'â€“'),(8510,'CittÃ  del Vaticano','VAT',135,'â€“'),(8511,'CittÃ  del Vaticano','VAT',136,'â€“'),(8512,'CittÃ  del Vaticano','VAT',137,'â€“'),(8513,'CittÃ  del Vaticano','VAT',138,'â€“'),(8514,'CittÃ  del Vaticano','VAT',139,'â€“'),(8515,'CittÃ  del Vaticano','VAT',140,'â€“'),(8516,'CittÃ  del Vaticano','VAT',141,'â€“'),(8517,'CittÃ  del Vaticano','VAT',142,'â€“'),(8518,'CittÃ  del Vaticano','VAT',143,'â€“'),(8519,'CittÃ  del Vaticano','VAT',144,'â€“'),(8520,'CittÃ  del Vaticano','VAT',145,'â€“'),(8521,'CittÃ  del Vaticano','VAT',146,'â€“'),(8522,'Caracas','VEN',374,'Distrito Federal'),(8523,'Caracas','VEN',375,'Distrito Federal'),(8524,'Caracas','VEN',376,'Distrito Federal'),(8525,'Caracas','VEN',377,'Distrito Federal'),(8526,'MaracaÃ­bo','VEN',1421,'Zulia'),(8527,'Barquisimeto','VEN',728,'Lara'),(8528,'Valencia','VEN',269,'Carabobo'),(8529,'Ciudad Guayana','VEN',217,'BolÃ­var'),(8530,'Ciudad Guayana','VEN',218,'BolÃ­var'),(8531,'Petare','VEN',840,'Miranda'),(8532,'Maracay','VEN',101,'Aragua'),(8533,'Barcelona','VEN',91,'AnzoÃ¡tegui\n'),(8534,'MaturÃ­n','VEN',851,'Monagas'),(8535,'San CristÃ³bal','VEN',1255,'TÃ¡chira'),(8536,'Ciudad BolÃ­var','VEN',217,'BolÃ­var'),(8537,'Ciudad BolÃ­var','VEN',218,'BolÃ­var'),(8538,'CumanÃ¡','VEN',1210,'Sucre'),(8539,'CumanÃ¡','VEN',1211,'Sucre'),(8540,'MÃ©rida','VEN',819,'MÃ©rida'),(8541,'Cabimas','VEN',1421,'Zulia'),(8542,'Barinas','VEN',177,'Barinas'),(8543,'Turmero','VEN',101,'Aragua'),(8544,'Baruta','VEN',840,'Miranda'),(8545,'Puerto Cabello','VEN',269,'Carabobo'),(8546,'Santa Ana de Coro','VEN',427,'FalcÃ³n'),(8547,'Los Teques','VEN',840,'Miranda'),(8548,'Punto Fijo','VEN',427,'FalcÃ³n'),(8549,'Guarenas','VEN',840,'Miranda'),(8550,'Acarigua','VEN',1024,'Portuguesa'),(8551,'Puerto La Cruz','VEN',92,'AnzoÃ¡tegui'),(8552,'Ciudad Losada','VEN',6,''),(8553,'Ciudad Losada','VEN',7,''),(8554,'Guacara','VEN',269,'Carabobo'),(8555,'Valera','VEN',1302,'Trujillo'),(8556,'Guanare','VEN',1024,'Portuguesa'),(8557,'CarÃºpano','VEN',1210,'Sucre'),(8558,'CarÃºpano','VEN',1211,'Sucre'),(8559,'Catia La Mar','VEN',374,'Distrito Federal'),(8560,'Catia La Mar','VEN',375,'Distrito Federal'),(8561,'Catia La Mar','VEN',376,'Distrito Federal'),(8562,'Catia La Mar','VEN',377,'Distrito Federal'),(8563,'El Tigre','VEN',92,'AnzoÃ¡tegui'),(8564,'Guatire','VEN',840,'Miranda'),(8565,'Calabozo','VEN',490,'GuÃ¡rico'),(8566,'Pozuelos','VEN',92,'AnzoÃ¡tegui'),(8567,'Ciudad Ojeda','VEN',1421,'Zulia'),(8568,'Ocumare del Tuy','VEN',840,'Miranda'),(8569,'Valle de la Pascua','VEN',490,'GuÃ¡rico'),(8570,'Araure','VEN',1024,'Portuguesa'),(8571,'San Fernando de Apure','VEN',95,'Apure'),(8572,'San Felipe','VEN',1400,'Yaracuy'),(8573,'El LimÃ³n','VEN',101,'Aragua'),(8574,'Moscow','RUS',859,'Moscow (City)'),(8575,'St Petersburg','RUS',1002,'Pietari'),(8576,'Novosibirsk','RUS',941,'Novosibirsk'),(8577,'Nizni Novgorod','RUS',912,'Nizni Novgorod'),(8578,'Jekaterinburg','RUS',1223,'Sverdlovsk'),(8579,'Samara','RUS',1106,'Samara'),(8580,'Omsk','RUS',955,'Omsk'),(8581,'Kazan','RUS',1253,'Tatarstan'),(8582,'Ufa','RUS',190,'BaÅ¡kortostan'),(8583,'TÅ¡eljabinsk','RUS',1311,'TÅ¡eljabinsk'),(8584,'Rostov-na-Donu','RUS',1087,'Rostov-na-Donu'),(8585,'Perm','RUS',995,'Perm'),(8586,'Volgograd','RUS',1358,'Volgograd'),(8587,'Voronez','RUS',1361,'Voronez'),(8588,'Krasnojarsk','RUS',699,'Krasnojarsk'),(8589,'Saratov','RUS',1132,'Saratov'),(8590,'Toljatti','RUS',1106,'Samara'),(8591,'Uljanovsk','RUS',1323,'Uljanovsk'),(8592,'Izevsk','RUS',1320,'Udmurtia'),(8593,'Krasnodar','RUS',698,'Krasnodar'),(8594,'Jaroslavl','RUS',599,'Jaroslavl'),(8595,'Habarovsk','RUS',498,'Habarovsk'),(8596,'Vladivostok','RUS',1027,'Primorje'),(8597,'Irkutsk','RUS',583,'Irkutsk'),(8598,'Barnaul','RUS',68,'Altai'),(8599,'Novokuznetsk','RUS',660,'Kemerovo'),(8600,'Penza','RUS',993,'Penza'),(8601,'Rjazan','RUS',1083,'Rjazan'),(8602,'Orenburg','RUS',962,'Orenburg'),(8603,'Lipetsk','RUS',745,'Lipetsk'),(8604,'Nabereznyje TÅ¡elny','RUS',1253,'Tatarstan'),(8605,'Tula','RUS',1304,'Tula'),(8606,'Tjumen','RUS',1280,'Tjumen'),(8607,'Kemerovo','RUS',660,'Kemerovo'),(8608,'Astrahan','RUS',117,'Astrahan'),(8609,'Tomsk','RUS',1290,'Tomsk'),(8610,'Kirov','RUS',682,'Kirov'),(8611,'Ivanovo','RUS',592,'Ivanovo'),(8612,'TÅ¡eboksary','RUS',1317,'TÅ¡uvassia'),(8613,'Brjansk','RUS',237,'Brjansk'),(8614,'Tver','RUS',1309,'Tver'),(8615,'Kursk','RUS',705,'Kursk'),(8616,'Magnitogorsk','RUS',1311,'TÅ¡eljabinsk'),(8617,'Kaliningrad','RUS',628,'Kaliningrad'),(8618,'Nizni Tagil','RUS',1223,'Sverdlovsk'),(8619,'Murmansk','RUS',866,'Murmansk'),(8620,'Ulan-Ude','RUS',247,'Burjatia'),(8621,'Kurgan','RUS',704,'Kurgan'),(8622,'Arkangeli','RUS',108,'Arkangeli'),(8623,'SotÅ¡i','RUS',698,'Krasnodar'),(8624,'Smolensk','RUS',1181,'Smolensk'),(8625,'Orjol','RUS',965,'Orjol'),(8626,'Stavropol','RUS',1206,'Stavropol'),(8627,'Belgorod','RUS',196,'Belgorod'),(8628,'Kaluga','RUS',630,'Kaluga'),(8629,'Vladimir','RUS',1356,'Vladimir'),(8630,'MahatÅ¡kala','RUS',353,'Dagestan'),(8631,'TÅ¡erepovets','RUS',1359,'Vologda'),(8632,'Saransk','RUS',856,'Mordva'),(8633,'Tambov','RUS',1242,'Tambov'),(8634,'Vladikavkaz','RUS',931,'North Ossetia-Alania'),(8635,'TÅ¡ita','RUS',1316,'TÅ¡ita'),(8636,'Vologda','RUS',1359,'Vologda'),(8637,'Veliki Novgorod','RUS',940,'Novgorod'),(8638,'Komsomolsk-na-Amure','RUS',498,'Habarovsk'),(8639,'Kostroma','RUS',695,'Kostroma'),(8640,'Volzski','RUS',1358,'Volgograd'),(8641,'Taganrog','RUS',1087,'Rostov-na-Donu'),(8642,'Petroskoi','RUS',644,'Karjala'),(8643,'Bratsk','RUS',583,'Irkutsk'),(8644,'Dzerzinsk','RUS',912,'Nizni Novgorod'),(8645,'Surgut','RUS',515,'Hanti-Mansia'),(8646,'Orsk','RUS',962,'Orenburg'),(8647,'Sterlitamak','RUS',190,'BaÅ¡kortostan'),(8648,'Angarsk','RUS',583,'Irkutsk'),(8649,'JoÅ¡kar-Ola','RUS',801,'Marinmaa'),(8650,'Rybinsk','RUS',599,'Jaroslavl'),(8651,'Prokopjevsk','RUS',660,'Kemerovo'),(8652,'Niznevartovsk','RUS',515,'Hanti-Mansia'),(8653,'NaltÅ¡ik','RUS',613,'Kabardi-Balkaria'),(8654,'Syktyvkar','RUS',689,'Komi'),(8655,'Severodvinsk','RUS',108,'Arkangeli'),(8656,'Bijsk','RUS',68,'Altai'),(8657,'Niznekamsk','RUS',1253,'Tatarstan'),(8658,'BlagoveÅ¡tÅ¡ensk','RUS',74,'Amur'),(8659,'Å ahty','RUS',1087,'Rostov-na-Donu'),(8660,'Staryi Oskol','RUS',196,'Belgorod'),(8661,'Zelenograd','RUS',859,'Moscow (City)'),(8662,'Balakovo','RUS',1132,'Saratov'),(8663,'Novorossijsk','RUS',698,'Krasnodar'),(8664,'Pihkova','RUS',1003,'Pihkova'),(8665,'Zlatoust','RUS',1311,'TÅ¡eljabinsk'),(8666,'Jakutsk','RUS',1093,'Saha (Jakutia)'),(8667,'Podolsk','RUS',860,'Moskova'),(8668,'Petropavlovsk-KamtÅ¡atski','RUS',631,'KamtÅ¡atka'),(8669,'Kamensk-Uralski','RUS',1223,'Sverdlovsk'),(8670,'Engels','RUS',1132,'Saratov'),(8671,'Syzran','RUS',1106,'Samara'),(8672,'Grozny','RUS',1315,'TÅ¡etÅ¡enia'),(8673,'NovotÅ¡erkassk','RUS',1087,'Rostov-na-Donu'),(8674,'Berezniki','RUS',995,'Perm'),(8675,'Juzno-Sahalinsk','RUS',1094,'Sahalin'),(8676,'Volgodonsk','RUS',1087,'Rostov-na-Donu'),(8677,'Abakan','RUS',506,'Hakassia'),(8678,'Maikop','RUS',20,'Adygea'),(8679,'Miass','RUS',1311,'TÅ¡eljabinsk'),(8680,'Armavir','RUS',698,'Krasnodar'),(8681,'Ljubertsy','RUS',860,'Moskova'),(8682,'Rubtsovsk','RUS',68,'Altai'),(8683,'Kovrov','RUS',1356,'Vladimir'),(8684,'Nahodka','RUS',1027,'Primorje'),(8685,'Ussurijsk','RUS',1027,'Primorje'),(8686,'Salavat','RUS',190,'BaÅ¡kortostan'),(8687,'MytiÅ¡tÅ¡i','RUS',860,'Moskova'),(8688,'Kolomna','RUS',860,'Moskova'),(8689,'Elektrostal','RUS',860,'Moskova'),(8690,'Murom','RUS',1356,'Vladimir'),(8691,'Kolpino','RUS',1002,'Pietari'),(8692,'Norilsk','RUS',699,'Krasnojarsk'),(8693,'Almetjevsk','RUS',1253,'Tatarstan'),(8694,'Novomoskovsk','RUS',1304,'Tula'),(8695,'Dimitrovgrad','RUS',1323,'Uljanovsk'),(8696,'Pervouralsk','RUS',1223,'Sverdlovsk'),(8697,'Himki','RUS',860,'Moskova'),(8698,'BalaÅ¡iha','RUS',860,'Moskova'),(8699,'Nevinnomyssk','RUS',1206,'Stavropol'),(8700,'Pjatigorsk','RUS',1206,'Stavropol'),(8701,'Korolev','RUS',860,'Moskova'),(8702,'Serpuhov','RUS',860,'Moskova'),(8703,'Odintsovo','RUS',860,'Moskova'),(8704,'Orehovo-Zujevo','RUS',860,'Moskova'),(8705,'KamyÅ¡in','RUS',1358,'Volgograd'),(8706,'NovotÅ¡eboksarsk','RUS',1317,'TÅ¡uvassia'),(8707,'TÅ¡erkessk','RUS',642,'KaratÅ¡ai-TÅ¡erkessi'),(8708,'AtÅ¡insk','RUS',699,'Krasnojarsk'),(8709,'Magadan','RUS',775,'Magadan'),(8710,'MitÅ¡urinsk','RUS',1242,'Tambov'),(8711,'Kislovodsk','RUS',1206,'Stavropol'),(8712,'Jelets','RUS',745,'Lipetsk'),(8713,'Seversk','RUS',1290,'Tomsk'),(8714,'Noginsk','RUS',860,'Moskova'),(8715,'Velikije Luki','RUS',1003,'Pihkova'),(8716,'NovokuibyÅ¡evsk','RUS',1106,'Samara'),(8717,'Neftekamsk','RUS',190,'BaÅ¡kortostan'),(8718,'Leninsk-Kuznetski','RUS',660,'Kemerovo'),(8719,'Oktjabrski','RUS',190,'BaÅ¡kortostan'),(8720,'Sergijev Posad','RUS',860,'Moskova'),(8721,'Arzamas','RUS',912,'Nizni Novgorod'),(8722,'Kiseljovsk','RUS',660,'Kemerovo'),(8723,'Novotroitsk','RUS',962,'Orenburg'),(8724,'Obninsk','RUS',630,'Kaluga'),(8725,'Kansk','RUS',699,'Krasnojarsk'),(8726,'Glazov','RUS',1320,'Udmurtia'),(8727,'Solikamsk','RUS',995,'Perm'),(8728,'Sarapul','RUS',1320,'Udmurtia'),(8729,'Ust-Ilimsk','RUS',583,'Irkutsk'),(8730,'Å tÅ¡olkovo','RUS',860,'Moskova'),(8731,'MezduretÅ¡ensk','RUS',660,'Kemerovo'),(8732,'Usolje-Sibirskoje','RUS',583,'Irkutsk'),(8733,'Elista','RUS',629,'Kalmykia'),(8734,'NovoÅ¡ahtinsk','RUS',1087,'Rostov-na-Donu'),(8735,'Votkinsk','RUS',1320,'Udmurtia'),(8736,'Kyzyl','RUS',1310,'Tyva'),(8737,'Serov','RUS',1223,'Sverdlovsk'),(8738,'Zelenodolsk','RUS',1253,'Tatarstan'),(8739,'Zeleznodoroznyi','RUS',860,'Moskova'),(8740,'KineÅ¡ma','RUS',592,'Ivanovo'),(8741,'Kuznetsk','RUS',993,'Penza'),(8742,'Uhta','RUS',689,'Komi'),(8743,'Jessentuki','RUS',1206,'Stavropol'),(8744,'Tobolsk','RUS',1280,'Tjumen'),(8745,'Neftejugansk','RUS',515,'Hanti-Mansia'),(8746,'Bataisk','RUS',1087,'Rostov-na-Donu'),(8747,'Nojabrsk','RUS',1396,'Yamalin Nenetsia'),(8748,'BalaÅ¡ov','RUS',1132,'Saratov'),(8749,'Zeleznogorsk','RUS',705,'Kursk'),(8750,'Zukovski','RUS',860,'Moskova'),(8751,'Anzero-Sudzensk','RUS',660,'Kemerovo'),(8752,'Bugulma','RUS',1253,'Tatarstan'),(8753,'Zeleznogorsk','RUS',699,'Krasnojarsk'),(8754,'Novouralsk','RUS',1223,'Sverdlovsk'),(8755,'PuÅ¡kin','RUS',1002,'Pietari'),(8756,'Vorkuta','RUS',689,'Komi'),(8757,'Derbent','RUS',353,'Dagestan'),(8758,'Kirovo-TÅ¡epetsk','RUS',682,'Kirov'),(8759,'Krasnogorsk','RUS',860,'Moskova'),(8760,'Klin','RUS',860,'Moskova'),(8761,'TÅ¡aikovski','RUS',995,'Perm'),(8762,'Novyi Urengoi','RUS',1396,'Yamalin Nenetsia'),(8763,'Ho Chi Minh City','VNM',540,'Ho Chi Minh City'),(8764,'Hanoi','VNM',514,'Hanoi'),(8765,'Haiphong','VNM',504,'Haiphong'),(8766,'Da Nang','VNM',1051,'Quang Nam-Da Nang'),(8767,'BiÃªn Hoa','VNM',389,'Dong Nai'),(8768,'Nha Trang','VNM',666,'Khanh Hoa'),(8769,'Hue','VNM',1271,'Thua Thien-Hue'),(8770,'Can Tho','VNM',261,'Can Tho'),(8771,'Cam Pha','VNM',1050,'Quang Binh'),(8772,'Nam Dinh','VNM',877,'Nam Ha'),(8773,'Quy Nhon','VNM',208,'Binh Dinh'),(8774,'Vung Tau','VNM',151,'Ba Ria-Vung Tau'),(8775,'Rach Gia','VNM',675,'Kien Giang'),(8776,'Long Xuyen','VNM',75,'An Giang'),(8777,'Thai Nguyen','VNM',153,'Bac Thai'),(8778,'Hong Gai','VNM',1052,'Quang Ninh'),(8779,'Phan ThiÃªt','VNM',209,'Binh Thuan'),(8780,'Cam Ranh','VNM',666,'Khanh Hoa'),(8781,'Vinh','VNM',904,'Nghe An'),(8782,'My Tho','VNM',1275,'Tien Giang'),(8783,'Da Lat','VNM',724,'Lam Dong'),(8784,'Buon Ma Thuot','VNM',352,'Dac Lac'),(8785,'Tallinn','EST',517,'Harjumaa'),(8786,'Tartu','EST',1251,'Tartumaa'),(8787,'New York','USA',901,'New York'),(8788,'Los Angeles','USA',256,'California'),(8789,'Chicago','USA',570,'Illinois'),(8790,'Houston','USA',1266,'Texas'),(8791,'Philadelphia','USA',992,'Pennsylvania'),(8792,'Phoenix','USA',107,'Arizona'),(8793,'San Diego','USA',256,'California'),(8794,'Dallas','USA',1266,'Texas'),(8795,'San Antonio','USA',1266,'Texas'),(8796,'Detroit','USA',831,'Michigan'),(8797,'San Jose','USA',256,'California'),(8798,'Indianapolis','USA',576,'Indiana'),(8799,'San Francisco','USA',256,'California'),(8800,'Jacksonville','USA',436,'Florida'),(8801,'Columbus','USA',950,'Ohio'),(8802,'Austin','USA',1266,'Texas'),(8803,'Baltimore','USA',806,'Maryland'),(8804,'Memphis','USA',1262,'Tennessee'),(8805,'Milwaukee','USA',1391,'Wisconsin'),(8806,'Boston','USA',810,'Massachusetts'),(8807,'Washington','USA',372,'District of Columbia'),(8808,'Nashville-Davidson','USA',1262,'Tennessee'),(8809,'El Paso','USA',1266,'Texas'),(8810,'Seattle','USA',1367,'Washington'),(8811,'Denver','USA',337,'Colorado'),(8812,'Charlotte','USA',924,'North\n Carolina'),(8813,'Fort Worth','USA',1266,'Texas'),(8814,'Portland','USA',961,'Oregon'),(8815,'Oklahoma City','USA',954,'Oklahoma'),(8816,'Tucson','USA',107,'Arizona'),(8817,'New Orleans','USA',759,'Louisiana'),(8818,'Las Vegas','USA',895,'Nevada'),(8819,'Cleveland','USA',950,'Ohio'),(8820,'Long Beach','USA',256,'California'),(8821,'Albuquerque','USA',898,'New Mexico'),(8822,'Kansas City','USA',844,'Missouri'),(8823,'Fresno','USA',256,'California'),(8824,'Virginia Beach','USA',1354,'Virginia'),(8825,'Atlanta','USA',464,'Georgia'),(8826,'Sacramento','USA',256,'California'),(8827,'Oakland','USA',256,'California'),(8828,'Mesa','USA',107,'Arizona'),(8829,'Tulsa','USA',954,'Oklahoma'),(8830,'Omaha','USA',892,'Nebraska'),(8831,'Minneapolis','USA',838,'Minnesota'),(8832,'Honolulu','USA',524,'Hawaii'),(8833,'Miami','USA',436,'Florida'),(8834,'Colorado Springs','USA',337,'Colorado'),(8835,'Saint Louis','USA',844,'Missouri'),(8836,'Wichita','USA',636,'Kansas'),(8837,'Santa Ana','USA',256,'California'),(8838,'Pittsburgh','USA',992,'Pennsylvania'),(8839,'Arlington','USA',1266,'Texas'),(8840,'Cincinnati','USA',950,'Ohio'),(8841,'Anaheim','USA',256,'California'),(8842,'Toledo','USA',950,'Ohio'),(8843,'Tampa','USA',436,'Florida'),(8844,'Buffalo','USA',901,'New York'),(8845,'Saint Paul','USA',838,'Minnesota'),(8846,'Corpus Christi','USA',1266,'Texas'),(8847,'Aurora','USA',337,'Colorado'),(8848,'Raleigh','USA',926,'North Carolina'),(8849,'Newark','USA',897,'New Jersey'),(8850,'Lexington-Fayette','USA',661,'Kentucky'),(8851,'Anchorage','USA',60,'Alaska'),(8852,'Louisville','USA',661,'Kentucky'),(8853,'Riverside','USA',256,'California'),(8854,'Saint Petersburg','USA',436,'Florida'),(8855,'Bakersfield','USA',256,'California'),(8856,'Stockton','USA',256,'California'),(8857,'Birmingham','USA',58,'Alabama'),(8858,'Jersey City','USA',897,'New Jersey'),(8859,'Norfolk','USA',1354,'Virginia'),(8860,'Baton Rouge','USA',759,'Louisiana'),(8861,'Hialeah','USA',436,'Florida'),(8862,'Lincoln','USA',892,'Nebraska'),(8863,'Greensboro','USA',926,'North Carolina'),(8864,'Plano','USA',1266,'Texas'),(8865,'Rochester','USA',901,'New York'),(8866,'Glendale','USA',107,'Arizona'),(8867,'Akron','USA',950,'Ohio'),(8868,'Garland','USA',1266,'Texas'),(8869,'Madison','USA',1391,'Wisconsin'),(8870,'Fort Wayne','USA',576,'Indiana'),(8871,'Fremont','USA',256,'California'),(8872,'Scottsdale','USA',107,'Arizona'),(8873,'Montgomery','USA',58,'Alabama'),(8874,'Shreveport','USA',759,'Louisiana'),(8875,'Augusta-Richmond County','USA',464,'Georgia'),(8876,'Lubbock','USA',1266,'Texas'),(8877,'Chesapeake','USA',1354,'Virginia'),(8878,'Mobile','USA',58,'Alabama'),(8879,'Des Moines','USA',580,'Iowa'),(8880,'Grand Rapids','USA',831,'Michigan'),(8881,'Richmond','USA',1354,'Virginia'),(8882,'Yonkers','USA',901,'New York'),(8883,'Spokane','USA',1367,'Washington'),(8884,'Glendale','USA',256,'California'),(8885,'Tacoma','USA',1367,'Washington'),(8886,'Irving','USA',1266,'Texas'),(8887,'Huntington Beach','USA',256,'California'),(8888,'Modesto','USA',256,'California'),(8889,'Durham','USA',926,'North Carolina'),(8890,'Columbus','USA',464,'Georgia'),(8891,'Orlando','USA',436,'Florida'),(8892,'Boise City','USA',566,'Idaho'),(8893,'Winston-Salem','USA',926,'North Carolina'),(8894,'San Bernardino','USA',256,'California'),(8895,'Jackson','USA',843,'Mississippi'),(8896,'Little Rock','USA',109,'Arkansas'),(8897,'Salt Lake City','USA',1328,'Utah'),(8898,'Reno','USA',895,'Nevada'),(8899,'Newport News','USA',1354,'Virginia'),(8900,'Chandler','USA',107,'Arizona'),(8901,'Laredo','USA',1266,'Texas'),(8902,'Henderson','USA',895,'Nevada'),(8903,'Arlington','USA',1354,'Virginia'),(8904,'Knoxville','USA',1262,'Tennessee'),(8905,'Amarillo','USA',1266,'Texas'),(8906,'Providence','USA',1071,'Rhode Island'),(8907,'Chula Vista','USA',256,'California'),(8908,'Worcester','USA',810,'Massachusetts'),(8909,'Oxnard','USA',256,'California'),(8910,'Dayton','USA',950,'Ohio'),(8911,'Garden Grove','USA',256,'California'),(8912,'Oceanside','USA',256,'California'),(8913,'Tempe','USA',107,'Arizona'),(8914,'Huntsville','USA',58,'Alabama'),(8915,'Ontario','USA',256,'California'),(8916,'Chattanooga','USA',1262,'Tennessee'),(8917,'Fort Lauderdale','USA',436,'Florida'),(8918,'Springfield','USA',810,'Massachusetts'),(8919,'Springfield','USA',844,'Missouri'),(8920,'Santa Clarita','USA',256,'California'),(8921,'Salinas','USA',256,'California'),(8922,'Tallahassee','USA',436,'Florida'),(8923,'Rockford','USA',570,'Illinois'),(8924,'Pomona','USA',256,'California'),(8925,'Metairie','USA',759,'Louisiana'),(8926,'Paterson','USA',897,'New Jersey'),(8927,'Overland Park','USA',636,'Kansas'),(8928,'Santa Rosa','USA',256,'California'),(8929,'Syracuse','USA',901,'New York'),(8930,'Kansas City','USA',636,'Kansas'),(8931,'Hampton','USA',1354,'Virginia'),(8932,'Lakewood','USA',337,'Colorado'),(8933,'Vancouver','USA',1367,'Washington'),(8934,'Irvine','USA',256,'California'),(8935,'Aurora','USA',570,'Illinois'),(8936,'Moreno Valley','USA',256,'California'),(8937,'Pasadena','USA',256,'California'),(8938,'Hayward','USA',256,'California'),(8939,'Brownsville','USA',1266,'Texas'),(8940,'Bridgeport','USA',339,'Connecticut'),(8941,'Hollywood','USA',436,'Florida'),(8942,'Warren','USA',831,'Michigan'),(8943,'Torrance','USA',256,'California'),(8944,'Eugene','USA',961,'Oregon'),(8945,'Pembroke Pines','USA',436,'Florida'),(8946,'Salem','USA',961,'Oregon'),(8947,'Pasadena','USA',1266,'Texas'),(8948,'Escondido','USA',256,'California'),(8949,'Sunnyvale','USA',256,'California'),(8950,'Savannah','USA',464,'Georgia'),(8951,'Fontana','USA',256,'California'),(8952,'Orange','USA',256,'California'),(8953,'Naperville','USA',570,'Illinois'),(8954,'Alexandria','USA',1354,'Virginia'),(8955,'Rancho Cucamonga','USA',256,'California'),(8956,'Grand Prairie','USA',1266,'Texas'),(8957,'East Los Angeles','USA',256,'California'),(8958,'Fullerton','USA',256,'California'),(8959,'Corona','USA',256,'California'),(8960,'Flint','USA',831,'Michigan'),(8961,'Paradise','USA',895,'Nevada'),(8962,'Mesquite','USA',1266,'Texas'),(8963,'Sterling Heights','USA',831,'Michigan'),(8964,'Sioux Falls','USA',1190,'South Dakota'),(8965,'New Haven','USA',339,'Connecticut'),(8966,'Topeka','USA',636,'Kansas'),(8967,'Concord','USA',256,'California'),(8968,'Evansville','USA',576,'Indiana'),(8969,'Hartford','USA',339,'Connecticut'),(8970,'Fayetteville','USA',926,'North Carolina'),(8971,'Cedar Rapids','USA',580,'Iowa'),(8972,'Elizabeth','USA',897,'New Jersey'),(8973,'Lansing','USA',831,'Michigan'),(8974,'Lancaster','USA',256,'California'),(8975,'Fort Collins','USA',337,'Colorado'),(8976,'Coral Springs','USA',436,'Florida'),(8977,'Stamford','USA',339,'Connecticut'),(8978,'Thousand Oaks','USA',256,'California'),(8979,'Vallejo','USA',256,'California'),(8980,'Palmdale','USA',256,'California'),(8981,'Columbia','USA',1189,'South Carolina'),(8982,'El Monte','USA',256,'California'),(8983,'Abilene','USA',1266,'Texas'),(8984,'North Las Vegas','USA',895,'Nevada'),(8985,'Ann Arbor','USA',831,'Michigan'),(8986,'Beaumont','USA',1266,'Texas'),(8987,'Waco','USA',1266,'Texas'),(8988,'Macon','USA',464,'Georgia'),(8989,'Independence','USA',844,'Missouri'),(8990,'Peoria','USA',570,'Illinois'),(8991,'Inglewood','USA',256,'California'),(8992,'Springfield','USA',570,'Illinois'),(8993,'Simi Valley','USA',256,'California'),(8994,'Lafayette','USA',759,'Louisiana'),(8995,'Gilbert','USA',107,'Arizona'),(8996,'Carrollton','USA',1266,'Texas'),(8997,'Bellevue','USA',1367,'Washington'),(8998,'West Valley City','USA',1328,'Utah'),(8999,'Clarksville','USA',1262,'Tennessee'),(9000,'Costa Mesa','USA',256,'California'),(9001,'Peoria','USA',107,'Arizona'),(9002,'South Bend','USA',576,'Indiana'),(9003,'Downey','USA',256,'California'),(9004,'Waterbury','USA',339,'Connecticut'),(9005,'Manchester','USA',896,'New Hampshire'),(9006,'Allentown','USA',992,'Pennsylvania'),(9007,'McAllen','USA',1266,'Texas'),(9008,'Joliet','USA',570,'Illinois'),(9009,'Lowell','USA',810,'Massachusetts'),(9010,'Provo','USA',1328,'Utah'),(9011,'West Covina','USA',256,'California'),(9012,'Wichita Falls','USA',1266,'Texas'),(9013,'Erie','USA',992,'Pennsylvania'),(9014,'Daly City','USA',256,'California'),(9015,'Citrus Heights','USA',256,'California'),(9016,'Norwalk','USA',256,'California'),(9017,'Gary','USA',576,'Indiana'),(9018,'Berkeley','USA',256,'California'),(9019,'Santa Clara','USA',256,'California'),(9020,'Green Bay','USA',1391,'Wisconsin'),(9021,'Cape Coral','USA',436,'Florida'),(9022,'Arvada','USA',337,'Colorado'),(9023,'Pueblo','USA',337,'Colorado'),(9024,'Sandy','USA',1328,'Utah'),(9025,'Athens-Clarke County','USA',464,'Georgia'),(9026,'Cambridge','USA',810,'Massachusetts'),(9027,'Westminster','USA',337,'Colorado'),(9028,'San Buenaventura','USA',256,'California'),(9029,'Portsmouth','USA',1354,'Virginia'),(9030,'Livonia','USA',831,'Michigan'),(9031,'Burbank','USA',256,'California'),(9032,'Clearwater','USA',436,'Florida'),(9033,'Midland','USA',1266,'Texas'),(9034,'Davenport','USA',580,'Iowa'),(9035,'Mission Viejo','USA',256,'California'),(9036,'Miami Beach','USA',436,'Florida'),(9037,'Sunrise Manor','USA',895,'Nevada'),(9038,'New Bedford','USA',810,'Massachusetts'),(9039,'El Cajon','USA',256,'California'),(9040,'Norman','USA',954,'Oklahoma'),(9041,'Richmond','USA',256,'California'),(9042,'Albany','USA',901,'New York'),(9043,'Brockton','USA',810,'Massachusetts'),(9044,'Roanoke','USA',1354,'Virginia'),(9045,'Billings','USA',852,'Montana'),(9046,'Compton','USA',256,'California'),(9047,'Gainesville','USA',436,'Florida'),(9048,'Fairfield','USA',256,'California'),(9049,'Arden-Arcade','USA',256,'California'),(9050,'San Mateo','USA',256,'California'),(9051,'Visalia','USA',256,'California'),(9052,'Boulder','USA',337,'Colorado'),(9053,'Cary','USA',926,'North Carolina'),(9054,'Santa Monica','USA',256,'California'),(9055,'Fall River','USA',810,'Massachusetts'),(9056,'Kenosha','USA',1391,'Wisconsin'),(9057,'Elgin','USA',570,'Illinois'),(9058,'Odessa','USA',1266,'Texas'),(9059,'Carson','USA',256,'California'),(9060,'Charleston','USA',1189,'South Carolina'),(9061,'Charlotte Amalie','VIR',1203,'St Thomas'),(9062,'Harare','ZWE',516,'Harare'),(9063,'Bulawayo','ZWE',245,'Bulawayo'),(9064,'Chitungwiza','ZWE',516,'Harare'),(9065,'Mount Darwin','ZWE',516,'Harare'),(9066,'Mutare','ZWE',791,'Manicaland'),(9067,'Gweru','ZWE',834,'Midlands'),(9068,'Gaza','PSE',456,'Gaza'),(9069,'Gaza','PSE',457,'Gaza'),(9070,'Khan Yunis','PSE',665,'Khan Yunis'),(9071,'Hebron','PSE',528,'Hebron'),(9072,'Jabaliya','PSE',927,'North Gaza'),(9073,'Nablus','PSE',869,'Nablus'),(9074,'Rafah','PSE',1062,'Rafah'),(9076,'Fusagasuga','COL',349,'Cundinamarca'),(9078,'Pasca','COL',349,'Cundinamarca'),(9079,'Soacha','COL',1,'Cundinamarca'),(9083,'N/A APLICA',NULL,NULL,NULL);
/*!40000 ALTER TABLE `City` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `City-2`
--

DROP TABLE IF EXISTS `City-2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `City-2` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` char(35) NOT NULL DEFAULT '',
  `CountryCode` char(3) NOT NULL DEFAULT '',
  `id_estate` int(11) DEFAULT NULL,
  `District` char(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4087 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `City-2`
--

LOCK TABLES `City-2` WRITE;
/*!40000 ALTER TABLE `City-2` DISABLE KEYS */;
INSERT INTO `City-2` VALUES (1,'Kabul','AFG',NULL,'Kabol'),(2,'Qandahar','AFG',NULL,'Qandahar'),(3,'Herat','AFG',NULL,'Herat'),(4,'Mazar-e-Sharif','AFG',NULL,'Balkh'),(5,'Amsterdam','NLD',NULL,'Noord-Holland'),(6,'Rotterdam','NLD',NULL,'Zuid-Holland'),(7,'Haag','NLD',NULL,'Zuid-Holland'),(8,'Utrecht','NLD',NULL,'Utrecht'),(9,'Eindhoven','NLD',NULL,'Noord-Brabant'),(10,'Tilburg','NLD',NULL,'Noord-Brabant'),(11,'Groningen','NLD',NULL,'Groningen'),(12,'Breda','NLD',NULL,'Noord-Brabant'),(13,'Apeldoorn','NLD',NULL,'Gelderland'),(14,'Nijmegen','NLD',NULL,'Gelderland'),(15,'Enschede','NLD',NULL,'Overijssel'),(16,'Haarlem','NLD',NULL,'Noord-Holland'),(17,'Almere','NLD',NULL,'Flevoland'),(18,'Arnhem','NLD',NULL,'Gelderland'),(19,'Zaanstad','NLD',NULL,'Noord-Holland'),(20,'Â´s-Hertogenbosch','NLD',NULL,'Noord-Brabant'),(21,'Amersfoort','NLD',NULL,'Utrecht'),(22,'Maastricht','NLD',NULL,'Limburg'),(23,'Dordrecht','NLD',NULL,'Zuid-Holland'),(24,'Leiden','NLD',NULL,'Zuid-Holland'),(25,'Haarlemmermeer','NLD',NULL,'Noord-Holland'),(26,'Zoetermeer','NLD',NULL,'Zuid-Holland'),(27,'Emmen','NLD',NULL,'Drenthe'),(28,'Zwolle','NLD',NULL,'Overijssel'),(29,'Ede','NLD',NULL,'Gelderland'),(30,'Delft','NLD',NULL,'Zuid-Holland'),(31,'Heerlen','NLD',NULL,'Limburg'),(32,'Alkmaar','NLD',NULL,'Noord-Holland'),(33,'Willemstad','ANT',NULL,'CuraÃ§ao'),(34,'Tirana','ALB',NULL,'Tirana'),(35,'Alger','DZA',NULL,'Alger'),(36,'Oran','DZA',NULL,'Oran'),(37,'Constantine','DZA',NULL,'Constantine'),(38,'Annaba','DZA',NULL,'Annaba'),(39,'Batna','DZA',NULL,'Batna'),(40,'SÃ©tif','DZA',NULL,'SÃ©tif'),(41,'Sidi Bel AbbÃ¨s','DZA',NULL,'Sidi Bel AbbÃ¨s'),(42,'Skikda','DZA',NULL,'Skikda'),(43,'Biskra','DZA',NULL,'Biskra'),(44,'Blida (el-Boulaida)','DZA',NULL,'Blida'),(45,'BÃ©jaÃ¯a','DZA',NULL,'BÃ©jaÃ¯a'),(46,'Mostaganem','DZA',NULL,'Mostaganem'),(47,'TÃ©bessa','DZA',NULL,'TÃ©bessa'),(48,'Tlemcen (Tilimsen)','DZA',NULL,'Tlemcen'),(49,'BÃ©char','DZA',NULL,'BÃ©char'),(50,'Tiaret','DZA',NULL,'Tiaret'),(51,'Ech-Chleff (el-Asnam)','DZA',NULL,'Chlef'),(52,'GhardaÃ¯a','DZA',NULL,'GhardaÃ¯a'),(53,'Tafuna','ASM',NULL,'Tutuila'),(54,'Fagatogo','ASM',NULL,'Tutuila'),(55,'Andorra la Vella','AND',NULL,'Andorra la Vella'),(56,'Luanda','AGO',NULL,'Luanda'),(57,'Huambo','AGO',NULL,'Huambo'),(58,'Lobito','AGO',NULL,'Benguela'),(59,'Benguela','AGO',NULL,'Benguela'),(60,'Namibe','AGO',NULL,'Namibe'),(61,'South Hill','AIA',NULL,'â€“'),(62,'The Valley','AIA',NULL,'â€“'),(63,'Saint JohnÂ´s','ATG',NULL,'St John'),(64,'Dubai','ARE',NULL,'Dubai'),(65,'Abu Dhabi','ARE',NULL,'Abu Dhabi'),(66,'Sharja','ARE',NULL,'Sharja'),(67,'al-Ayn','ARE',NULL,'Abu Dhabi'),(68,'Ajman','ARE',NULL,'Ajman'),(69,'Buenos Aires','ARG',NULL,'Distrito Federal'),(70,'La Matanza','ARG',NULL,'Buenos Aires'),(71,'CÃ³rdoba','ARG',NULL,'CÃ³rdoba'),(72,'Rosario','ARG',NULL,'Santa FÃ©'),(73,'Lomas de Zamora','ARG',NULL,'Buenos Aires'),(74,'Quilmes','ARG',NULL,'Buenos Aires'),(75,'Almirante Brown','ARG',NULL,'Buenos Aires'),(76,'La Plata','ARG',NULL,'Buenos Aires'),(77,'Mar del Plata','ARG',NULL,'Buenos Aires'),(78,'San Miguel de TucumÃ¡n','ARG',NULL,'TucumÃ¡n'),(79,'LanÃºs','ARG',NULL,'Buenos Aires'),(80,'Merlo','ARG',NULL,'Buenos Aires'),(81,'General San MartÃ­n','ARG',NULL,'Buenos Aires'),(82,'Salta','ARG',NULL,'Salta'),(83,'Moreno','ARG',NULL,'Buenos Aires'),(84,'Santa FÃ©','ARG',NULL,'Santa FÃ©'),(85,'Avellaneda','ARG',NULL,'Buenos Aires'),(86,'Tres de Febrero','ARG',NULL,'Buenos Aires'),(87,'MorÃ³n','ARG',NULL,'Buenos Aires'),(88,'Florencio Varela','ARG',NULL,'Buenos Aires'),(89,'San Isidro','ARG',NULL,'Buenos Aires'),(90,'Tigre','ARG',NULL,'Buenos Aires'),(91,'Malvinas Argentinas','ARG',NULL,'Buenos Aires'),(92,'Vicente LÃ³pez','ARG',NULL,'Buenos Aires'),(93,'Berazategui','ARG',NULL,'Buenos Aires'),(94,'Corrientes','ARG',NULL,'Corrientes'),(95,'San Miguel','ARG',NULL,'Buenos Aires'),(96,'BahÃ­a Blanca','ARG',NULL,'Buenos Aires'),(97,'Esteban EcheverrÃ­a','ARG',NULL,'Buenos Aires'),(98,'Resistencia','ARG',NULL,'Chaco'),(99,'JosÃ© C. Paz','ARG',NULL,'Buenos Aires'),(100,'ParanÃ¡','ARG',NULL,'Entre Rios'),(101,'Godoy Cruz','ARG',NULL,'Mendoza'),(102,'Posadas','ARG',NULL,'Misiones'),(103,'GuaymallÃ©n','ARG',NULL,'Mendoza'),(104,'Santiago del Estero','ARG',NULL,'Santiago del Estero'),(105,'San Salvador de Jujuy','ARG',NULL,'Jujuy'),(106,'Hurlingham','ARG',NULL,'Buenos Aires'),(107,'NeuquÃ©n','ARG',NULL,'NeuquÃ©n'),(108,'ItuzaingÃ³','ARG',NULL,'Buenos Aires'),(109,'San Fernando','ARG',NULL,'Buenos Aires'),(110,'Formosa','ARG',NULL,'Formosa'),(111,'Las Heras','ARG',NULL,'Mendoza'),(112,'La Rioja','ARG',NULL,'La Rioja'),(113,'San Fernando del Valle de Cata','ARG',NULL,'Catamarca'),(114,'RÃ­o Cuarto','ARG',NULL,'CÃ³rdoba'),(115,'Comodoro Rivadavia','ARG',NULL,'Chubut'),(116,'Mendoza','ARG',NULL,'Mendoza'),(117,'San NicolÃ¡s de los Arroyos','ARG',NULL,'Buenos Aires'),(118,'San Juan','ARG',NULL,'San Juan'),(119,'Escobar','ARG',NULL,'Buenos Aires'),(120,'Concordia','ARG',NULL,'Entre Rios'),(121,'Pilar','ARG',NULL,'Buenos Aires'),(122,'San Luis','ARG',NULL,'San Luis'),(123,'Ezeiza','ARG',NULL,'Buenos Aires'),(124,'San Rafael','ARG',NULL,'Mendoza'),(125,'Tandil','ARG',NULL,'Buenos Aires'),(126,'Yerevan','ARM',NULL,'Yerevan'),(127,'Gjumri','ARM',NULL,'Å irak'),(128,'Vanadzor','ARM',NULL,'Lori'),(129,'Oranjestad','ABW',NULL,'â€“'),(130,'Sydney','AUS',NULL,'New South Wales'),(131,'Melbourne','AUS',NULL,'Victoria'),(132,'Brisbane','AUS',NULL,'Queensland'),(133,'Perth','AUS',NULL,'West Australia'),(134,'Adelaide','AUS',NULL,'South Australia'),(135,'Canberra','AUS',NULL,'Capital Region'),(136,'Gold Coast','AUS',NULL,'Queensland'),(137,'Newcastle','AUS',NULL,'New South Wales'),(138,'Central Coast','AUS',NULL,'New South Wales'),(139,'Wollongong','AUS',NULL,'New South Wales'),(140,'Hobart','AUS',NULL,'Tasmania'),(141,'Geelong','AUS',NULL,'Victoria'),(142,'Townsville','AUS',NULL,'Queensland'),(143,'Cairns','AUS',NULL,'Queensland'),(144,'Baku','AZE',NULL,'Baki'),(145,'GÃ¤ncÃ¤','AZE',NULL,'GÃ¤ncÃ¤'),(146,'Sumqayit','AZE',NULL,'Sumqayit'),(147,'MingÃ¤Ã§evir','AZE',NULL,'MingÃ¤Ã§evir'),(148,'Nassau','BHS',NULL,'New Providence'),(149,'al-Manama','BHR',NULL,'al-Manama'),(150,'Dhaka','BGD',NULL,'Dhaka'),(151,'Chittagong','BGD',NULL,'Chittagong'),(152,'Khulna','BGD',NULL,'Khulna'),(153,'Rajshahi','BGD',NULL,'Rajshahi'),(154,'Narayanganj','BGD',NULL,'Dhaka'),(155,'Rangpur','BGD',NULL,'Rajshahi'),(156,'Mymensingh','BGD',NULL,'Dhaka'),(157,'Barisal','BGD',NULL,'Barisal'),(158,'Tungi','BGD',NULL,'Dhaka'),(159,'Jessore','BGD',NULL,'Khulna'),(160,'Comilla','BGD',NULL,'Chittagong'),(161,'Nawabganj','BGD',NULL,'Rajshahi'),(162,'Dinajpur','BGD',NULL,'Rajshahi'),(163,'Bogra','BGD',NULL,'Rajshahi'),(164,'Sylhet','BGD',NULL,'Sylhet'),(165,'Brahmanbaria','BGD',NULL,'Chittagong'),(166,'Tangail','BGD',NULL,'Dhaka'),(167,'Jamalpur','BGD',NULL,'Dhaka'),(168,'Pabna','BGD',NULL,'Rajshahi'),(169,'Naogaon','BGD',NULL,'Rajshahi'),(170,'Sirajganj','BGD',NULL,'Rajshahi'),(171,'Narsinghdi','BGD',NULL,'Dhaka'),(172,'Saidpur','BGD',NULL,'Rajshahi'),(173,'Gazipur','BGD',NULL,'Dhaka'),(174,'Bridgetown','BRB',NULL,'St Michael'),(175,'Antwerpen','BEL',NULL,'Antwerpen'),(176,'Gent','BEL',NULL,'East Flanderi'),(177,'Charleroi','BEL',NULL,'Hainaut'),(178,'LiÃ¨ge','BEL',NULL,'LiÃ¨ge'),(179,'Bruxelles [Brussel]','BEL',NULL,'Bryssel'),(180,'Brugge','BEL',NULL,'West Flanderi'),(181,'Schaerbeek','BEL',NULL,'Bryssel'),(182,'Namur','BEL',NULL,'Namur'),(183,'Mons','BEL',NULL,'Hainaut'),(184,'Belize City','BLZ',NULL,'Belize City'),(185,'Belmopan','BLZ',NULL,'Cayo'),(186,'Cotonou','BEN',NULL,'Atlantique'),(187,'Porto-Novo','BEN',NULL,'OuÃ©mÃ©'),(188,'Djougou','BEN',NULL,'Atacora'),(189,'Parakou','BEN',NULL,'Borgou'),(190,'Saint George','BMU',NULL,'Saint GeorgeÂ´s'),(191,'Hamilton','BMU',NULL,'Hamilton'),(192,'Thimphu','BTN',NULL,'Thimphu'),(193,'Santa Cruz de la Sierra','BOL',NULL,'Santa Cruz'),(194,'La Paz','BOL',NULL,'La Paz'),(195,'El Alto','BOL',NULL,'La Paz'),(196,'Cochabamba','BOL',NULL,'Cochabamba'),(197,'Oruro','BOL',NULL,'Oruro'),(198,'Sucre','BOL',NULL,'Chuquisaca'),(199,'PotosÃ­','BOL',NULL,'PotosÃ­'),(200,'Tarija','BOL',NULL,'Tarija'),(201,'Sarajevo','BIH',NULL,'Federaatio'),(202,'Banja Luka','BIH',NULL,'Republika Srpska'),(203,'Zenica','BIH',NULL,'Federaatio'),(204,'Gaborone','BWA',NULL,'Gaborone'),(205,'Francistown','BWA',NULL,'Francistown'),(206,'SÃ£o Paulo','BRA',NULL,'SÃ£o Paulo'),(207,'Rio de Janeiro','BRA',NULL,'Rio de Janeiro'),(208,'Salvador','BRA',NULL,'Bahia'),(209,'Belo Horizonte','BRA',NULL,'Minas Gerais'),(210,'Fortaleza','BRA',NULL,'CearÃ¡'),(211,'BrasÃ­lia','BRA',NULL,'Distrito Federal'),(212,'Curitiba','BRA',NULL,'ParanÃ¡'),(213,'Recife','BRA',NULL,'Pernambuco'),(214,'Porto Alegre','BRA',NULL,'Rio Grande do Sul'),(215,'Manaus','BRA',NULL,'Amazonas'),(216,'BelÃ©m','BRA',NULL,'ParÃ¡'),(217,'Guarulhos','BRA',NULL,'SÃ£o Paulo'),(218,'GoiÃ¢nia','BRA',NULL,'GoiÃ¡s'),(219,'Campinas','BRA',NULL,'SÃ£o Paulo'),(220,'SÃ£o GonÃ§alo','BRA',NULL,'Rio de Janeiro'),(221,'Nova IguaÃ§u','BRA',NULL,'Rio de Janeiro'),(222,'SÃ£o LuÃ­s','BRA',NULL,'MaranhÃ£o'),(223,'MaceiÃ³','BRA',NULL,'Alagoas'),(224,'Duque de Caxias','BRA',NULL,'Rio de Janeiro'),(225,'SÃ£o Bernardo do Campo','BRA',NULL,'SÃ£o Paulo'),(226,'Teresina','BRA',NULL,'PiauÃ­'),(227,'Natal','BRA',NULL,'Rio Grande do Norte'),(228,'Osasco','BRA',NULL,'SÃ£o Paulo'),(229,'Campo Grande','BRA',NULL,'Mato Grosso do Sul'),(230,'Santo AndrÃ©','BRA',NULL,'SÃ£o Paulo'),(231,'JoÃ£o Pessoa','BRA',NULL,'ParaÃ­ba'),(232,'JaboatÃ£o dos Guararapes','BRA',NULL,'Pernambuco'),(233,'Contagem','BRA',NULL,'Minas Gerais'),(234,'SÃ£o JosÃ© dos Campos','BRA',NULL,'SÃ£o Paulo'),(235,'UberlÃ¢ndia','BRA',NULL,'Minas Gerais'),(236,'Feira de Santana','BRA',NULL,'Bahia'),(237,'RibeirÃ£o Preto','BRA',NULL,'SÃ£o Paulo'),(238,'Sorocaba','BRA',NULL,'SÃ£o Paulo'),(239,'NiterÃ³i','BRA',NULL,'Rio de Janeiro'),(240,'CuiabÃ¡','BRA',NULL,'Mato Grosso'),(241,'Juiz de Fora','BRA',NULL,'Minas Gerais'),(242,'Aracaju','BRA',NULL,'Sergipe'),(243,'SÃ£o JoÃ£o de Meriti','BRA',NULL,'Rio de Janeiro'),(244,'Londrina','BRA',NULL,'ParanÃ¡'),(245,'Joinville','BRA',NULL,'Santa Catarina'),(246,'Belford Roxo','BRA',NULL,'Rio de Janeiro'),(247,'Santos','BRA',NULL,'SÃ£o Paulo'),(248,'Ananindeua','BRA',NULL,'ParÃ¡'),(249,'Campos dos Goytacazes','BRA',NULL,'Rio de Janeiro'),(250,'MauÃ¡','BRA',NULL,'SÃ£o Paulo'),(251,'CarapicuÃ­ba','BRA',NULL,'SÃ£o Paulo'),(252,'Olinda','BRA',NULL,'Pernambuco'),(253,'Campina Grande','BRA',NULL,'ParaÃ­ba'),(254,'SÃ£o JosÃ© do Rio Preto','BRA',NULL,'SÃ£o Paulo'),(255,'Caxias do Sul','BRA',NULL,'Rio Grande do Sul'),(256,'Moji das Cruzes','BRA',NULL,'SÃ£o Paulo'),(257,'Diadema','BRA',NULL,'SÃ£o Paulo'),(258,'Aparecida de GoiÃ¢nia','BRA',NULL,'GoiÃ¡s'),(259,'Piracicaba','BRA',NULL,'SÃ£o Paulo'),(260,'Cariacica','BRA',NULL,'EspÃ­rito Santo'),(261,'Vila Velha','BRA',NULL,'EspÃ­rito Santo'),(262,'Pelotas','BRA',NULL,'Rio Grande do Sul'),(263,'Bauru','BRA',NULL,'SÃ£o Paulo'),(264,'Porto Velho','BRA',NULL,'RondÃ´nia'),(265,'Serra','BRA',NULL,'EspÃ­rito Santo'),(266,'Betim','BRA',NULL,'Minas Gerais'),(267,'JundÃ­aÃ­','BRA',NULL,'SÃ£o Paulo'),(268,'Canoas','BRA',NULL,'Rio Grande do Sul'),(269,'Franca','BRA',NULL,'SÃ£o Paulo'),(270,'SÃ£o Vicente','BRA',NULL,'SÃ£o Paulo'),(271,'MaringÃ¡','BRA',NULL,'ParanÃ¡'),(272,'Montes\n Claros','BRA',NULL,'Minas Gerais'),(273,'AnÃ¡polis','BRA',NULL,'GoiÃ¡s'),(274,'FlorianÃ³polis','BRA',NULL,'Santa Catarina'),(275,'PetrÃ³polis','BRA',NULL,'Rio de Janeiro'),(276,'Itaquaquecetuba','BRA',NULL,'SÃ£o Paulo'),(277,'VitÃ³ria','BRA',NULL,'EspÃ­rito Santo'),(278,'Ponta Grossa','BRA',NULL,'ParanÃ¡'),(279,'Rio Branco','BRA',NULL,'Acre'),(280,'Foz do IguaÃ§u','BRA',NULL,'ParanÃ¡'),(281,'MacapÃ¡','BRA',NULL,'AmapÃ¡'),(282,'IlhÃ©us','BRA',NULL,'Bahia'),(283,'VitÃ³ria da Conquista','BRA',NULL,'Bahia'),(284,'Uberaba','BRA',NULL,'Minas Gerais'),(285,'Paulista','BRA',NULL,'Pernambuco'),(286,'Limeira','BRA',NULL,'SÃ£o Paulo'),(287,'Blumenau','BRA',NULL,'Santa Catarina'),(288,'Caruaru','BRA',NULL,'Pernambuco'),(289,'SantarÃ©m','BRA',NULL,'ParÃ¡'),(290,'Volta Redonda','BRA',NULL,'Rio de Janeiro'),(291,'Novo Hamburgo','BRA',NULL,'Rio Grande do Sul'),(292,'Caucaia','BRA',NULL,'CearÃ¡'),(293,'Santa Maria','BRA',NULL,'Rio Grande do Sul'),(294,'Cascavel','BRA',NULL,'ParanÃ¡'),(295,'GuarujÃ¡','BRA',NULL,'SÃ£o Paulo'),(296,'RibeirÃ£o das Neves','BRA',NULL,'Minas Gerais'),(297,'Governador Valadares','BRA',NULL,'Minas Gerais'),(298,'TaubatÃ©','BRA',NULL,'SÃ£o Paulo'),(299,'Imperatriz','BRA',NULL,'MaranhÃ£o'),(300,'GravataÃ­','BRA',NULL,'Rio Grande do Sul'),(301,'Embu','BRA',NULL,'SÃ£o Paulo'),(302,'MossorÃ³','BRA',NULL,'Rio Grande do Norte'),(303,'VÃ¡rzea Grande','BRA',NULL,'Mato Grosso'),(304,'Petrolina','BRA',NULL,'Pernambuco'),(305,'Barueri','BRA',NULL,'SÃ£o Paulo'),(306,'ViamÃ£o','BRA',NULL,'Rio Grande do Sul'),(307,'Ipatinga','BRA',NULL,'Minas Gerais'),(308,'Juazeiro','BRA',NULL,'Bahia'),(309,'Juazeiro do Norte','BRA',NULL,'CearÃ¡'),(310,'TaboÃ£o da Serra','BRA',NULL,'SÃ£o Paulo'),(311,'SÃ£o JosÃ© dos Pinhais','BRA',NULL,'ParanÃ¡'),(312,'MagÃ©','BRA',NULL,'Rio de Janeiro'),(313,'Suzano','BRA',NULL,'SÃ£o Paulo'),(314,'SÃ£o Leopoldo','BRA',NULL,'Rio Grande do Sul'),(315,'MarÃ­lia','BRA',NULL,'SÃ£o Paulo'),(316,'SÃ£o Carlos','BRA',NULL,'SÃ£o Paulo'),(317,'SumarÃ©','BRA',NULL,'SÃ£o Paulo'),(318,'Presidente Prudente','BRA',NULL,'SÃ£o Paulo'),(319,'DivinÃ³polis','BRA',NULL,'Minas Gerais'),(320,'Sete Lagoas','BRA',NULL,'Minas Gerais'),(321,'Rio Grande','BRA',NULL,'Rio Grande do Sul'),(322,'Itabuna','BRA',NULL,'Bahia'),(323,'JequiÃ©','BRA',NULL,'Bahia'),(324,'Arapiraca','BRA',NULL,'Alagoas'),(325,'Colombo','BRA',NULL,'ParanÃ¡'),(326,'Americana','BRA',NULL,'SÃ£o Paulo'),(327,'Alvorada','BRA',NULL,'Rio Grande do Sul'),(328,'Araraquara','BRA',NULL,'SÃ£o Paulo'),(329,'ItaboraÃ­','BRA',NULL,'Rio de Janeiro'),(330,'Santa BÃ¡rbara dÂ´Oeste','BRA',NULL,'SÃ£o Paulo'),(331,'Nova Friburgo','BRA',NULL,'Rio de Janeiro'),(332,'JacareÃ­','BRA',NULL,'SÃ£o Paulo'),(333,'AraÃ§atuba','BRA',NULL,'SÃ£o Paulo'),(334,'Barra Mansa','BRA',NULL,'Rio de Janeiro'),(335,'Praia Grande','BRA',NULL,'SÃ£o Paulo'),(336,'MarabÃ¡','BRA',NULL,'ParÃ¡'),(337,'CriciÃºma','BRA',NULL,'Santa Catarina'),(338,'Boa Vista','BRA',NULL,'Roraima'),(339,'Passo Fundo','BRA',NULL,'Rio Grande do Sul'),(340,'Dourados','BRA',NULL,'Mato Grosso do Sul'),(341,'Santa Luzia','BRA',NULL,'Minas Gerais'),(342,'Rio Claro','BRA',NULL,'SÃ£o Paulo'),(343,'MaracanaÃº','BRA',NULL,'CearÃ¡'),(344,'Guarapuava','BRA',NULL,'ParanÃ¡'),(345,'RondonÃ³polis','BRA',NULL,'Mato Grosso'),(346,'SÃ£o JosÃ©','BRA',NULL,'Santa Catarina'),(347,'Cachoeiro de Itapemirim','BRA',NULL,'EspÃ­rito Santo'),(348,'NilÃ³polis','BRA',NULL,'Rio de Janeiro'),(349,'Itapevi','BRA',NULL,'SÃ£o Paulo'),(350,'Cabo de Santo Agostinho','BRA',NULL,'Pernambuco'),(351,'CamaÃ§ari','BRA',NULL,'Bahia'),(352,'Sobral','BRA',NULL,'CearÃ¡'),(353,'ItajaÃ­','BRA',NULL,'Santa Catarina'),(354,'ChapecÃ³','BRA',NULL,'Santa Catarina'),(355,'Cotia','BRA',NULL,'SÃ£o Paulo'),(356,'Lages','BRA',NULL,'Santa Catarina'),(357,'Ferraz de Vasconcelos','BRA',NULL,'SÃ£o Paulo'),(358,'Indaiatuba','BRA',NULL,'SÃ£o Paulo'),(359,'HortolÃ¢ndia','BRA',NULL,'SÃ£o Paulo'),(360,'Caxias','BRA',NULL,'MaranhÃ£o'),(361,'SÃ£o Caetano do Sul','BRA',NULL,'SÃ£o Paulo'),(362,'Itu','BRA',NULL,'SÃ£o Paulo'),(363,'Nossa Senhora do Socorro','BRA',NULL,'Sergipe'),(364,'ParnaÃ­ba','BRA',NULL,'PiauÃ­'),(365,'PoÃ§os de Caldas','BRA',NULL,'Minas Gerais'),(366,'TeresÃ³polis','BRA',NULL,'Rio de Janeiro'),(367,'Barreiras','BRA',NULL,'Bahia'),(368,'Castanhal','BRA',NULL,'ParÃ¡'),(369,'Alagoinhas','BRA',NULL,'Bahia'),(370,'Itapecerica da Serra','BRA',NULL,'SÃ£o Paulo'),(371,'Uruguaiana','BRA',NULL,'Rio Grande do Sul'),(372,'ParanaguÃ¡','BRA',NULL,'ParanÃ¡'),(373,'IbiritÃ©','BRA',NULL,'Minas Gerais'),(374,'Timon','BRA',NULL,'MaranhÃ£o'),(375,'LuziÃ¢nia','BRA',NULL,'GoiÃ¡s'),(376,'MacaÃ©','BRA',NULL,'Rio de Janeiro'),(377,'TeÃ³filo Otoni','BRA',NULL,'Minas Gerais'),(378,'Moji-GuaÃ§u','BRA',NULL,'SÃ£o Paulo'),(379,'Palmas','BRA',NULL,'Tocantins'),(380,'Pindamonhangaba','BRA',NULL,'SÃ£o Paulo'),(381,'Francisco Morato','BRA',NULL,'SÃ£o Paulo'),(382,'BagÃ©','BRA',NULL,'Rio Grande do Sul'),(383,'Sapucaia do Sul','BRA',NULL,'Rio Grande do Sul'),(384,'Cabo Frio','BRA',NULL,'Rio de Janeiro'),(385,'Itapetininga','BRA',NULL,'SÃ£o Paulo'),(386,'Patos de Minas','BRA',NULL,'Minas Gerais'),(387,'Camaragibe','BRA',NULL,'Pernambuco'),(388,'BraganÃ§a Paulista','BRA',NULL,'SÃ£o Paulo'),(389,'Queimados','BRA',NULL,'Rio de Janeiro'),(390,'AraguaÃ­na','BRA',NULL,'Tocantins'),(391,'Garanhuns','BRA',NULL,'Pernambuco'),(392,'VitÃ³ria de Santo AntÃ£o','BRA',NULL,'Pernambuco'),(393,'Santa Rita','BRA',NULL,'ParaÃ­ba'),(394,'Barbacena','BRA',NULL,'Minas Gerais'),(395,'Abaetetuba','BRA',NULL,'ParÃ¡'),(396,'JaÃº','BRA',NULL,'SÃ£o Paulo'),(397,'Lauro de Freitas','BRA',NULL,'Bahia'),(398,'Franco da Rocha','BRA',NULL,'SÃ£o Paulo'),(399,'Teixeira de Freitas','BRA',NULL,'Bahia'),(400,'Varginha','BRA',NULL,'Minas Gerais'),(401,'RibeirÃ£o Pires','BRA',NULL,'SÃ£o Paulo'),(402,'SabarÃ¡','BRA',NULL,'Minas Gerais'),(403,'Catanduva','BRA',NULL,'SÃ£o Paulo'),(404,'Rio Verde','BRA',NULL,'GoiÃ¡s'),(405,'Botucatu','BRA',NULL,'SÃ£o Paulo'),(406,'Colatina','BRA',NULL,'EspÃ­rito Santo'),(407,'Santa Cruz do Sul','BRA',NULL,'Rio Grande do Sul'),(408,'Linhares','BRA',NULL,'EspÃ­rito Santo'),(409,'Apucarana','BRA',NULL,'ParanÃ¡'),(410,'Barretos','BRA',NULL,'SÃ£o Paulo'),(411,'GuaratinguetÃ¡','BRA',NULL,'SÃ£o Paulo'),(412,'Cachoeirinha','BRA',NULL,'Rio Grande do Sul'),(413,'CodÃ³','BRA',NULL,'MaranhÃ£o'),(414,'JaraguÃ¡ do Sul','BRA',NULL,'Santa Catarina'),(415,'CubatÃ£o','BRA',NULL,'SÃ£o Paulo'),(416,'Itabira','BRA',NULL,'Minas Gerais'),(417,'Itaituba','BRA',NULL,'ParÃ¡'),(418,'Araras','BRA',NULL,'SÃ£o Paulo'),(419,'Resende','BRA',NULL,'Rio de Janeiro'),(420,'Atibaia','BRA',NULL,'SÃ£o Paulo'),(421,'Pouso Alegre','BRA',NULL,'Minas Gerais'),(422,'Toledo','BRA',NULL,'ParanÃ¡'),(423,'Crato','BRA',NULL,'CearÃ¡'),(424,'Passos','BRA',NULL,'Minas Gerais'),(425,'Araguari','BRA',NULL,'Minas Gerais'),(426,'SÃ£o JosÃ© de Ribamar','BRA',NULL,'MaranhÃ£o'),(427,'Pinhais','BRA',NULL,'ParanÃ¡'),(428,'SertÃ£ozinho','BRA',NULL,'SÃ£o Paulo'),(429,'Conselheiro Lafaiete','BRA',NULL,'Minas Gerais'),(430,'Paulo Afonso','BRA',NULL,'Bahia'),(431,'Angra dos Reis','BRA',NULL,'Rio de Janeiro'),(432,'EunÃ¡polis','BRA',NULL,'Bahia'),(433,'Salto','BRA',NULL,'SÃ£o Paulo'),(434,'Ourinhos','BRA',NULL,'SÃ£o Paulo'),(435,'Parnamirim','BRA',NULL,'Rio Grande do Norte'),(436,'Jacobina','BRA',NULL,'Bahia'),(437,'Coronel Fabriciano','BRA',NULL,'Minas Gerais'),(438,'Birigui','BRA',NULL,'SÃ£o Paulo'),(439,'TatuÃ­','BRA',NULL,'SÃ£o Paulo'),(440,'Ji-ParanÃ¡','BRA',NULL,'RondÃ´nia'),(441,'Bacabal','BRA',NULL,'MaranhÃ£o'),(442,'CametÃ¡','BRA',NULL,'ParÃ¡'),(443,'GuaÃ­ba','BRA',NULL,'Rio Grande do Sul'),(444,'SÃ£o LourenÃ§o da Mata','BRA',NULL,'Pernambuco'),(445,'Santana do Livramento','BRA',NULL,'Rio Grande do Sul'),(446,'Votorantim','BRA',NULL,'SÃ£o Paulo'),(447,'Campo Largo','BRA',NULL,'ParanÃ¡'),(448,'Patos','BRA',NULL,'ParaÃ­ba'),(449,'Ituiutaba','BRA',NULL,'Minas Gerais'),(450,'CorumbÃ¡','BRA',NULL,'Mato Grosso do Sul'),(451,'PalhoÃ§a','BRA',NULL,'Santa Catarina'),(452,'Barra do PiraÃ­','BRA',NULL,'Rio de Janeiro'),(453,'Bento GonÃ§alves','BRA',NULL,'Rio Grande do Sul'),(454,'PoÃ¡','BRA',NULL,'SÃ£o Paulo'),(455,'Ãguas Lindas de GoiÃ¡s','BRA',NULL,'GoiÃ¡s'),(456,'London','GBR',NULL,'England'),(457,'Birmingham','GBR',NULL,'England'),(458,'Glasgow','GBR',NULL,'Scotland'),(459,'Liverpool','GBR',NULL,'England'),(460,'Edinburgh','GBR',NULL,'Scotland'),(461,'Sheffield','GBR',NULL,'England'),(462,'Manchester','GBR',NULL,'England'),(463,'Leeds','GBR',NULL,'England'),(464,'Bristol','GBR',NULL,'England'),(465,'Cardiff','GBR',NULL,'Wales'),(466,'Coventry','GBR',NULL,'England'),(467,'Leicester','GBR',NULL,'England'),(468,'Bradford','GBR',NULL,'England'),(469,'Belfast','GBR',NULL,'North Ireland'),(470,'Nottingham','GBR',NULL,'England'),(471,'Kingston upon Hull','GBR',NULL,'England'),(472,'Plymouth','GBR',NULL,'England'),(473,'Stoke-on-Trent','GBR',NULL,'England'),(474,'Wolverhampton','GBR',NULL,'England'),(475,'Derby','GBR',NULL,'England'),(476,'Swansea','GBR',NULL,'Wales'),(477,'Southampton','GBR',NULL,'England'),(478,'Aberdeen','GBR',NULL,'Scotland'),(479,'Northampton','GBR',NULL,'England'),(480,'Dudley','GBR',NULL,'England'),(481,'Portsmouth','GBR',NULL,'England'),(482,'Newcastle upon Tyne','GBR',NULL,'England'),(483,'Sunderland','GBR',NULL,'England'),(484,'Luton','GBR',NULL,'England'),(485,'Swindon','GBR',NULL,'England'),(486,'Southend-on-Sea','GBR',NULL,'England'),(487,'Walsall','GBR',NULL,'England'),(488,'Bournemouth','GBR',NULL,'England'),(489,'Peterborough','GBR',NULL,'England'),(490,'Brighton','GBR',NULL,'England'),(491,'Blackpool','GBR',NULL,'England'),(492,'Dundee','GBR',NULL,'Scotland'),(493,'West Bromwich','GBR',NULL,'England'),(494,'Reading','GBR',NULL,'England'),(495,'Oldbury/Smethwick (Warley)','GBR',NULL,'England'),(496,'Middlesbrough','GBR',NULL,'England'),(497,'Huddersfield','GBR',NULL,'England'),(498,'Oxford','GBR',NULL,'England'),(499,'Poole','GBR',NULL,'England'),(500,'Bolton','GBR',NULL,'England'),(501,'Blackburn','GBR',NULL,'England'),(502,'Newport','GBR',NULL,'Wales'),(503,'Preston','GBR',NULL,'England'),(504,'Stockport','GBR',NULL,'England'),(505,'Norwich','GBR',NULL,'England'),(506,'Rotherham','GBR',NULL,'England'),(507,'Cambridge','GBR',NULL,'England'),(508,'Watford','GBR',NULL,'England'),(509,'Ipswich','GBR',NULL,'England'),(510,'Slough','GBR',NULL,'England'),(511,'Exeter','GBR',NULL,'England'),(512,'Cheltenham','GBR',NULL,'England'),(513,'Gloucester','GBR',NULL,'England'),(514,'Saint Helens','GBR',NULL,'England'),(515,'Sutton Coldfield','GBR',NULL,'England'),(516,'York','GBR',NULL,'England'),(517,'Oldham','GBR',NULL,'England'),(518,'Basildon','GBR',NULL,'England'),(519,'Worthing','GBR',NULL,'England'),(520,'Chelmsford','GBR',NULL,'England'),(521,'Colchester','GBR',NULL,'England'),(522,'Crawley','GBR',NULL,'England'),(523,'Gillingham','GBR',NULL,'England'),(524,'Solihull','GBR',NULL,'England'),(525,'Rochdale','GBR',NULL,'England'),(526,'Birkenhead','GBR',NULL,'England'),(527,'Worcester','GBR',NULL,'England'),(528,'Hartlepool','GBR',NULL,'England'),(529,'Halifax','GBR',NULL,'England'),(530,'Woking/Byfleet','GBR',NULL,'England'),(531,'Southport','GBR',NULL,'England'),(532,'Maidstone','GBR',NULL,'England'),(533,'Eastbourne','GBR',NULL,'England'),(534,'Grimsby','GBR',NULL,'England'),(535,'Saint\n Helier','GBR',NULL,'Jersey'),(536,'Douglas','GBR',NULL,'â€“'),(537,'Road Town','VGB',NULL,'Tortola'),(538,'Bandar Seri Begawan','BRN',NULL,'Brunei and Muara'),(539,'Sofija','BGR',NULL,'Grad Sofija'),(540,'Plovdiv','BGR',NULL,'Plovdiv'),(541,'Varna','BGR',NULL,'Varna'),(542,'Burgas','BGR',NULL,'Burgas'),(543,'Ruse','BGR',NULL,'Ruse'),(544,'Stara Zagora','BGR',NULL,'Haskovo'),(545,'Pleven','BGR',NULL,'Lovec'),(546,'Sliven','BGR',NULL,'Burgas'),(547,'Dobric','BGR',NULL,'Varna'),(548,'Å umen','BGR',NULL,'Varna'),(549,'Ouagadougou','BFA',NULL,'Kadiogo'),(550,'Bobo-Dioulasso','BFA',NULL,'Houet'),(551,'Koudougou','BFA',NULL,'BoulkiemdÃ©'),(552,'Bujumbura','BDI',NULL,'Bujumbura'),(553,'George Town','CYM',NULL,'Grand Cayman'),(554,'Santiago de Chile','CHL',NULL,'Santiago'),(555,'Puente Alto','CHL',NULL,'Santiago'),(556,'ViÃ±a del Mar','CHL',NULL,'ValparaÃ­so'),(557,'ValparaÃ­so','CHL',NULL,'ValparaÃ­so'),(558,'Talcahuano','CHL',NULL,'BÃ­obÃ­o'),(559,'Antofagasta','CHL',NULL,'Antofagasta'),(560,'San Bernardo','CHL',NULL,'Santiago'),(561,'Temuco','CHL',NULL,'La AraucanÃ­a'),(562,'ConcepciÃ³n','CHL',NULL,'BÃ­obÃ­o'),(563,'Rancagua','CHL',NULL,'OÂ´Higgins'),(564,'Arica','CHL',NULL,'TarapacÃ¡'),(565,'Talca','CHL',NULL,'Maule'),(566,'ChillÃ¡n','CHL',NULL,'BÃ­obÃ­o'),(567,'Iquique','CHL',NULL,'TarapacÃ¡'),(568,'Los Angeles','CHL',NULL,'BÃ­obÃ­o'),(569,'Puerto Montt','CHL',NULL,'Los Lagos'),(570,'Coquimbo','CHL',NULL,'Coquimbo'),(571,'Osorno','CHL',NULL,'Los Lagos'),(572,'La Serena','CHL',NULL,'Coquimbo'),(573,'Calama','CHL',NULL,'Antofagasta'),(574,'Valdivia','CHL',NULL,'Los Lagos'),(575,'Punta Arenas','CHL',NULL,'Magallanes'),(576,'CopiapÃ³','CHL',NULL,'Atacama'),(577,'QuilpuÃ©','CHL',NULL,'ValparaÃ­so'),(578,'CuricÃ³','CHL',NULL,'Maule'),(579,'Ovalle','CHL',NULL,'Coquimbo'),(580,'Coronel','CHL',NULL,'BÃ­obÃ­o'),(581,'San Pedro de la Paz','CHL',NULL,'BÃ­obÃ­o'),(582,'Melipilla','CHL',NULL,'Santiago'),(583,'Avarua','COK',NULL,'Rarotonga'),(584,'San JosÃ©','CRI',NULL,'San JosÃ©'),(585,'Djibouti','DJI',NULL,'Djibouti'),(586,'Roseau','DMA',NULL,'St George'),(587,'Santo Domingo de GuzmÃ¡n','DOM',NULL,'Distrito Nacional'),(588,'Santiago de los Caballeros','DOM',NULL,'Santiago'),(589,'La Romana','DOM',NULL,'La Romana'),(590,'San Pedro de MacorÃ­s','DOM',NULL,'San Pedro de MacorÃ­'),(591,'San Francisco de MacorÃ­s','DOM',NULL,'Duarte'),(592,'San Felipe de Puerto Plata','DOM',NULL,'Puerto Plata'),(593,'Guayaquil','ECU',NULL,'Guayas'),(594,'Quito','ECU',NULL,'Pichincha'),(595,'Cuenca','ECU',NULL,'Azuay'),(596,'Machala','ECU',NULL,'El Oro'),(597,'Santo Domingo de los Colorados','ECU',NULL,'Pichincha'),(598,'Portoviejo','ECU',NULL,'ManabÃ­'),(599,'Ambato','ECU',NULL,'Tungurahua'),(600,'Manta','ECU',NULL,'ManabÃ­'),(601,'Duran [Eloy Alfaro]','ECU',NULL,'Guayas'),(602,'Ibarra','ECU',NULL,'Imbabura'),(603,'Quevedo','ECU',NULL,'Los RÃ­os'),(604,'Milagro','ECU',NULL,'Guayas'),(605,'Loja','ECU',NULL,'Loja'),(606,'RÃ­obamba','ECU',NULL,'Chimborazo'),(607,'Esmeraldas','ECU',NULL,'Esmeraldas'),(608,'Cairo','EGY',NULL,'Kairo'),(609,'Alexandria','EGY',NULL,'Aleksandria'),(610,'Giza','EGY',NULL,'Giza'),(611,'Shubra al-Khayma','EGY',NULL,'al-Qalyubiya'),(612,'Port Said','EGY',NULL,'Port Said'),(613,'Suez','EGY',NULL,'Suez'),(614,'al-Mahallat al-Kubra','EGY',NULL,'al-Gharbiya'),(615,'Tanta','EGY',NULL,'al-Gharbiya'),(616,'al-Mansura','EGY',NULL,'al-Daqahliya'),(617,'Luxor','EGY',NULL,'Luxor'),(618,'Asyut','EGY',NULL,'Asyut'),(619,'Bahtim','EGY',NULL,'al-Qalyubiya'),(620,'Zagazig','EGY',NULL,'al-Sharqiya'),(621,'al-Faiyum','EGY',NULL,'al-Faiyum'),(622,'Ismailia','EGY',NULL,'Ismailia'),(623,'Kafr al-Dawwar','EGY',NULL,'al-Buhayra'),(624,'Assuan','EGY',NULL,'Assuan'),(625,'Damanhur','EGY',NULL,'al-Buhayra'),(626,'al-Minya','EGY',NULL,'al-Minya'),(627,'Bani Suwayf','EGY',NULL,'Bani Suwayf'),(628,'Qina','EGY',NULL,'Qina'),(629,'Sawhaj','EGY',NULL,'Sawhaj'),(630,'Shibin al-Kawm','EGY',NULL,'al-Minufiya'),(631,'Bulaq al-Dakrur','EGY',NULL,'Giza'),(632,'Banha','EGY',NULL,'al-Qalyubiya'),(633,'Warraq al-Arab','EGY',NULL,'Giza'),(634,'Kafr al-Shaykh','EGY',NULL,'Kafr al-Shaykh'),(635,'Mallawi','EGY',NULL,'al-Minya'),(636,'Bilbays','EGY',NULL,'al-Sharqiya'),(637,'Mit Ghamr','EGY',NULL,'al-Daqahliya'),(638,'al-Arish','EGY',NULL,'Shamal Sina'),(639,'Talkha','EGY',NULL,'al-Daqahliya'),(640,'Qalyub','EGY',NULL,'al-Qalyubiya'),(641,'Jirja','EGY',NULL,'Sawhaj'),(642,'Idfu','EGY',NULL,'Qina'),(643,'al-Hawamidiya','EGY',NULL,'Giza'),(644,'Disuq','EGY',NULL,'Kafr al-Shaykh'),(645,'San Salvador','SLV',NULL,'San Salvador'),(646,'Santa Ana','SLV',NULL,'Santa Ana'),(647,'Mejicanos','SLV',NULL,'San Salvador'),(648,'Soyapango','SLV',NULL,'San Salvador'),(649,'San Miguel','SLV',NULL,'San Miguel'),(650,'Nueva San Salvador','SLV',NULL,'La Libertad'),(651,'Apopa','SLV',NULL,'San Salvador'),(652,'Asmara','ERI',NULL,'Maekel'),(653,'Madrid','ESP',NULL,'Madrid'),(654,'Barcelona','ESP',NULL,'Katalonia'),(655,'Valencia','ESP',NULL,'Valencia'),(656,'Sevilla','ESP',NULL,'Andalusia'),(657,'Zaragoza','ESP',NULL,'Aragonia'),(658,'MÃ¡laga','ESP',NULL,'Andalusia'),(659,'Bilbao','ESP',NULL,'Baskimaa'),(660,'Las Palmas de Gran Canaria','ESP',NULL,'Canary Islands'),(661,'Murcia','ESP',NULL,'Murcia'),(662,'Palma de Mallorca','ESP',NULL,'Balears'),(663,'Valladolid','ESP',NULL,'Castilla and LeÃ³n'),(664,'CÃ³rdoba','ESP',NULL,'Andalusia'),(665,'Vigo','ESP',NULL,'Galicia'),(666,'Alicante [Alacant]','ESP',NULL,'Valencia'),(667,'GijÃ³n','ESP',NULL,'Asturia'),(668,'LÂ´Hospitalet de Llobregat','ESP',NULL,'Katalonia'),(669,'Granada','ESP',NULL,'Andalusia'),(670,'A CoruÃ±a (La CoruÃ±a)','ESP',NULL,'Galicia'),(671,'Vitoria-Gasteiz','ESP',NULL,'Baskimaa'),(672,'Santa Cruz de Tenerife','ESP',NULL,'Canary Islands'),(673,'Badalona','ESP',NULL,'Katalonia'),(674,'Oviedo','ESP',NULL,'Asturia'),(675,'MÃ³stoles','ESP',NULL,'Madrid'),(676,'Elche [Elx]','ESP',NULL,'Valencia'),(677,'Sabadell','ESP',NULL,'Katalonia'),(678,'Santander','ESP',NULL,'Cantabria'),(679,'Jerez de la Frontera','ESP',NULL,'Andalusia'),(680,'Pamplona [IruÃ±a]','ESP',NULL,'Navarra'),(681,'Donostia-San SebastiÃ¡n','ESP',NULL,'Baskimaa'),(682,'Cartagena','ESP',NULL,'Murcia'),(683,'LeganÃ©s','ESP',NULL,'Madrid'),(684,'Fuenlabrada','ESP',NULL,'Madrid'),(685,'AlmerÃ­a','ESP',NULL,'Andalusia'),(686,'Terrassa','ESP',NULL,'Katalonia'),(687,'AlcalÃ¡ de Henares','ESP',NULL,'Madrid'),(688,'Burgos','ESP',NULL,'Castilla and LeÃ³n'),(689,'Salamanca','ESP',NULL,'Castilla and LeÃ³n'),(690,'Albacete','ESP',NULL,'Kastilia-La Mancha'),(691,'Getafe','ESP',NULL,'Madrid'),(692,'CÃ¡diz','ESP',NULL,'Andalusia'),(693,'AlcorcÃ³n','ESP',NULL,'Madrid'),(694,'Huelva','ESP',NULL,'Andalusia'),(695,'LeÃ³n','ESP',NULL,'Castilla and LeÃ³n'),(696,'CastellÃ³n de la Plana [Castell','ESP',NULL,'Valencia'),(697,'Badajoz','ESP',NULL,'Extremadura'),(698,'[San CristÃ³bal de] la Laguna','ESP',NULL,'Canary Islands'),(699,'LogroÃ±o','ESP',NULL,'La Rioja'),(700,'Santa Coloma de Gramenet','ESP',NULL,'Katalonia'),(701,'Tarragona','ESP',NULL,'Katalonia'),(702,'Lleida (LÃ©rida)','ESP',NULL,'Katalonia'),(703,'JaÃ©n','ESP',NULL,'Andalusia'),(704,'Ourense (Orense)','ESP',NULL,'Galicia'),(705,'MatarÃ³','ESP',NULL,'Katalonia'),(706,'Algeciras','ESP',NULL,'Andalusia'),(707,'Marbella','ESP',NULL,'Andalusia'),(708,'Barakaldo','ESP',NULL,'Baskimaa'),(709,'Dos Hermanas','ESP',NULL,'Andalusia'),(710,'Santiago de Compostela','ESP',NULL,'Galicia'),(711,'TorrejÃ³n de Ardoz','ESP',NULL,'Madrid'),(712,'Cape Town','ZAF',NULL,'Western Cape'),(713,'Soweto','ZAF',NULL,'Gauteng'),(714,'Johannesburg','ZAF',NULL,'Gauteng'),(715,'Port Elizabeth','ZAF',NULL,'Eastern Cape'),(716,'Pretoria','ZAF',NULL,'Gauteng'),(717,'Inanda','ZAF',NULL,'KwaZulu-Natal'),(718,'Durban','ZAF',NULL,'KwaZulu-Natal'),(719,'Vanderbijlpark','ZAF',NULL,'Gauteng'),(720,'Kempton Park','ZAF',NULL,'Gauteng'),(721,'Alberton','ZAF',NULL,'Gauteng'),(722,'Pinetown','ZAF',NULL,'KwaZulu-Natal'),(723,'Pietermaritzburg','ZAF',NULL,'KwaZulu-Natal'),(724,'Benoni','ZAF',NULL,'Gauteng'),(725,'Randburg','ZAF',NULL,'Gauteng'),(726,'Umlazi','ZAF',NULL,'KwaZulu-Natal'),(727,'Bloemfontein','ZAF',NULL,'Free State'),(728,'Vereeniging','ZAF',NULL,'Gauteng'),(729,'Wonderboom','ZAF',NULL,'Gauteng'),(730,'Roodepoort','ZAF',NULL,'Gauteng'),(731,'Boksburg','ZAF',NULL,'Gauteng'),(732,'Klerksdorp','ZAF',NULL,'North West'),(733,'Soshanguve','ZAF',NULL,'Gauteng'),(734,'Newcastle','ZAF',NULL,'KwaZulu-Natal'),(735,'East London','ZAF',NULL,'Eastern Cape'),(736,'Welkom','ZAF',NULL,'Free State'),(737,'Kimberley','ZAF',NULL,'Northern Cape'),(738,'Uitenhage','ZAF',NULL,'Eastern Cape'),(739,'Chatsworth','ZAF',NULL,'KwaZulu-Natal'),(740,'Mdantsane','ZAF',NULL,'Eastern Cape'),(741,'Krugersdorp','ZAF',NULL,'Gauteng'),(742,'Botshabelo','ZAF',NULL,'Free State'),(743,'Brakpan','ZAF',NULL,'Gauteng'),(744,'Witbank','ZAF',NULL,'Mpumalanga'),(745,'Oberholzer','ZAF',NULL,'Gauteng'),(746,'Germiston','ZAF',NULL,'Gauteng'),(747,'Springs','ZAF',NULL,'Gauteng'),(748,'Westonaria','ZAF',NULL,'Gauteng'),(749,'Randfontein','ZAF',NULL,'Gauteng'),(750,'Paarl','ZAF',NULL,'Western Cape'),(751,'Potchefstroom','ZAF',NULL,'North West'),(752,'Rustenburg','ZAF',NULL,'North West'),(753,'Nigel','ZAF',NULL,'Gauteng'),(754,'George','ZAF',NULL,'Western Cape'),(755,'Ladysmith','ZAF',NULL,'KwaZulu-Natal'),(756,'Addis Abeba','ETH',NULL,'Addis Abeba'),(757,'Dire Dawa','ETH',NULL,'Dire Dawa'),(758,'Nazret','ETH',NULL,'Oromia'),(759,'Gonder','ETH',NULL,'Amhara'),(760,'Dese','ETH',NULL,'Amhara'),(761,'Mekele','ETH',NULL,'Tigray'),(762,'Bahir Dar','ETH',NULL,'Amhara'),(763,'Stanley','FLK',NULL,'East Falkland'),(764,'Suva','FJI',NULL,'Central'),(765,'Quezon','PHL',NULL,'National Capital Reg'),(766,'Manila','PHL',NULL,'National Capital Reg'),(767,'Kalookan','PHL',NULL,'National Capital Reg'),(768,'Davao','PHL',NULL,'Southern Mindanao'),(769,'Cebu','PHL',NULL,'Central Visayas'),(770,'Zamboanga','PHL',NULL,'Western Mindanao'),(771,'Pasig','PHL',NULL,'National Capital Reg'),(772,'Valenzuela','PHL',NULL,'National Capital Reg'),(773,'Las PiÃ±as','PHL',NULL,'National Capital Reg'),(774,'Antipolo','PHL',NULL,'Southern Tagalog'),(775,'Taguig','PHL',NULL,'National Capital Reg'),(776,'Cagayan de Oro','PHL',NULL,'Northern Mindanao'),(777,'ParaÃ±aque','PHL',NULL,'National Capital Reg'),(778,'Makati','PHL',NULL,'National Capital Reg'),(779,'Bacolod','PHL',NULL,'Western Visayas'),(780,'General Santos','PHL',NULL,'Southern Mindanao'),(781,'Marikina','PHL',NULL,'National Capital Reg'),(782,'DasmariÃ±as','PHL',NULL,'Southern Tagalog'),(783,'Muntinlupa','PHL',NULL,'National Capital Reg'),(784,'Iloilo','PHL',NULL,'Western Visayas'),(785,'Pasay','PHL',NULL,'National Capital Reg'),(786,'Malabon','PHL',NULL,'National Capital Reg'),(787,'San JosÃ© del Monte','PHL',NULL,'Central Luzon'),(788,'Bacoor','PHL',NULL,'Southern Tagalog'),(789,'Iligan','PHL',NULL,'Central Mindanao'),(790,'Calamba','PHL',NULL,'Southern Tagalog'),(791,'Mandaluyong','PHL',NULL,'National Capital Reg'),(792,'Butuan','PHL',NULL,'Caraga'),(793,'Angeles','PHL',NULL,'Central Luzon'),(794,'Tarlac','PHL',NULL,'Central Luzon'),(795,'Mandaue','PHL',NULL,'Central Visayas'),(796,'Baguio','PHL',NULL,'CAR'),(797,'Batangas','PHL',NULL,'Southern Tagalog'),(798,'Cainta','PHL',NULL,'Southern Tagalog'),(799,'San\n Pedro','PHL',NULL,'Southern Tagalog'),(800,'Navotas','PHL',NULL,'National Capital Reg'),(801,'Cabanatuan','PHL',NULL,'Central Luzon'),(802,'San Fernando','PHL',NULL,'Central Luzon'),(803,'Lipa','PHL',NULL,'Southern Tagalog'),(804,'Lapu-Lapu','PHL',NULL,'Central Visayas'),(805,'San Pablo','PHL',NULL,'Southern Tagalog'),(806,'BiÃ±an','PHL',NULL,'Southern Tagalog'),(807,'Taytay','PHL',NULL,'Southern Tagalog'),(808,'Lucena','PHL',NULL,'Southern Tagalog'),(809,'Imus','PHL',NULL,'Southern Tagalog'),(810,'Olongapo','PHL',NULL,'Central Luzon'),(811,'Binangonan','PHL',NULL,'Southern Tagalog'),(812,'Santa Rosa','PHL',NULL,'Southern Tagalog'),(813,'Tagum','PHL',NULL,'Southern Mindanao'),(814,'Tacloban','PHL',NULL,'Eastern Visayas'),(815,'Malolos','PHL',NULL,'Central Luzon'),(816,'Mabalacat','PHL',NULL,'Central Luzon'),(817,'Cotabato','PHL',NULL,'Central Mindanao'),(818,'Meycauayan','PHL',NULL,'Central Luzon'),(819,'Puerto Princesa','PHL',NULL,'Southern Tagalog'),(820,'Legazpi','PHL',NULL,'Bicol'),(821,'Silang','PHL',NULL,'Southern Tagalog'),(822,'Ormoc','PHL',NULL,'Eastern Visayas'),(823,'San Carlos','PHL',NULL,'Ilocos'),(824,'Kabankalan','PHL',NULL,'Western Visayas'),(825,'Talisay','PHL',NULL,'Central Visayas'),(826,'Valencia','PHL',NULL,'Northern Mindanao'),(827,'Calbayog','PHL',NULL,'Eastern Visayas'),(828,'Santa Maria','PHL',NULL,'Central Luzon'),(829,'Pagadian','PHL',NULL,'Western Mindanao'),(830,'Cadiz','PHL',NULL,'Western Visayas'),(831,'Bago','PHL',NULL,'Western Visayas'),(832,'Toledo','PHL',NULL,'Central Visayas'),(833,'Naga','PHL',NULL,'Bicol'),(834,'San Mateo','PHL',NULL,'Southern Tagalog'),(835,'Panabo','PHL',NULL,'Southern Mindanao'),(836,'Koronadal','PHL',NULL,'Southern Mindanao'),(837,'Marawi','PHL',NULL,'Central Mindanao'),(838,'Dagupan','PHL',NULL,'Ilocos'),(839,'Sagay','PHL',NULL,'Western Visayas'),(840,'Roxas','PHL',NULL,'Western Visayas'),(841,'Lubao','PHL',NULL,'Central Luzon'),(842,'Digos','PHL',NULL,'Southern Mindanao'),(843,'San Miguel','PHL',NULL,'Central Luzon'),(844,'Malaybalay','PHL',NULL,'Northern Mindanao'),(845,'Tuguegarao','PHL',NULL,'Cagayan Valley'),(846,'Ilagan','PHL',NULL,'Cagayan Valley'),(847,'Baliuag','PHL',NULL,'Central Luzon'),(848,'Surigao','PHL',NULL,'Caraga'),(849,'San Carlos','PHL',NULL,'Western Visayas'),(850,'San Juan del Monte','PHL',NULL,'National Capital Reg'),(851,'Tanauan','PHL',NULL,'Southern Tagalog'),(852,'Concepcion','PHL',NULL,'Central Luzon'),(853,'Rodriguez (Montalban)','PHL',NULL,'Southern Tagalog'),(854,'Sariaya','PHL',NULL,'Southern Tagalog'),(855,'Malasiqui','PHL',NULL,'Ilocos'),(856,'General Mariano Alvarez','PHL',NULL,'Southern Tagalog'),(857,'Urdaneta','PHL',NULL,'Ilocos'),(858,'Hagonoy','PHL',NULL,'Central Luzon'),(859,'San Jose','PHL',NULL,'Southern Tagalog'),(860,'Polomolok','PHL',NULL,'Southern Mindanao'),(861,'Santiago','PHL',NULL,'Cagayan Valley'),(862,'Tanza','PHL',NULL,'Southern Tagalog'),(863,'Ozamis','PHL',NULL,'Northern Mindanao'),(864,'Mexico','PHL',NULL,'Central Luzon'),(865,'San Jose','PHL',NULL,'Central Luzon'),(866,'Silay','PHL',NULL,'Western Visayas'),(867,'General Trias','PHL',NULL,'Southern Tagalog'),(868,'Tabaco','PHL',NULL,'Bicol'),(869,'Cabuyao','PHL',NULL,'Southern Tagalog'),(870,'Calapan','PHL',NULL,'Southern Tagalog'),(871,'Mati','PHL',NULL,'Southern Mindanao'),(872,'Midsayap','PHL',NULL,'Central Mindanao'),(873,'Cauayan','PHL',NULL,'Cagayan Valley'),(874,'Gingoog','PHL',NULL,'Northern Mindanao'),(875,'Dumaguete','PHL',NULL,'Central Visayas'),(876,'San Fernando','PHL',NULL,'Ilocos'),(877,'Arayat','PHL',NULL,'Central Luzon'),(878,'Bayawan (Tulong)','PHL',NULL,'Central Visayas'),(879,'Kidapawan','PHL',NULL,'Central Mindanao'),(880,'Daraga (Locsin)','PHL',NULL,'Bicol'),(881,'Marilao','PHL',NULL,'Central Luzon'),(882,'Malita','PHL',NULL,'Southern Mindanao'),(883,'Dipolog','PHL',NULL,'Western Mindanao'),(884,'Cavite','PHL',NULL,'Southern Tagalog'),(885,'Danao','PHL',NULL,'Central Visayas'),(886,'Bislig','PHL',NULL,'Caraga'),(887,'Talavera','PHL',NULL,'Central Luzon'),(888,'Guagua','PHL',NULL,'Central Luzon'),(889,'Bayambang','PHL',NULL,'Ilocos'),(890,'Nasugbu','PHL',NULL,'Southern Tagalog'),(891,'Baybay','PHL',NULL,'Eastern Visayas'),(892,'Capas','PHL',NULL,'Central Luzon'),(893,'Sultan Kudarat','PHL',NULL,'ARMM'),(894,'Laoag','PHL',NULL,'Ilocos'),(895,'Bayugan','PHL',NULL,'Caraga'),(896,'Malungon','PHL',NULL,'Southern Mindanao'),(897,'Santa Cruz','PHL',NULL,'Southern Tagalog'),(898,'Sorsogon','PHL',NULL,'Bicol'),(899,'Candelaria','PHL',NULL,'Southern Tagalog'),(900,'Ligao','PHL',NULL,'Bicol'),(901,'TÃ³rshavn','FRO',NULL,'Streymoyar'),(902,'Libreville','GAB',NULL,'Estuaire'),(903,'Serekunda','GMB',NULL,'Kombo St Mary'),(904,'Banjul','GMB',NULL,'Banjul'),(905,'Tbilisi','GEO',NULL,'Tbilisi'),(906,'Kutaisi','GEO',NULL,'Imereti'),(907,'Rustavi','GEO',NULL,'Kvemo Kartli'),(908,'Batumi','GEO',NULL,'Adzaria [AtÅ¡ara]'),(909,'Sohumi','GEO',NULL,'Abhasia [Aphazeti]'),(910,'Accra','GHA',NULL,'Greater Accra'),(911,'Kumasi','GHA',NULL,'Ashanti'),(912,'Tamale','GHA',NULL,'Northern'),(913,'Tema','GHA',NULL,'Greater Accra'),(914,'Sekondi-Takoradi','GHA',NULL,'Western'),(915,'Gibraltar','GIB',NULL,'â€“'),(916,'Saint GeorgeÂ´s','GRD',NULL,'St George'),(917,'Nuuk','GRL',NULL,'Kitaa'),(918,'Les Abymes','GLP',NULL,'Grande-Terre'),(919,'Basse-Terre','GLP',NULL,'Basse-Terre'),(920,'Tamuning','GUM',NULL,'â€“'),(921,'AgaÃ±a','GUM',NULL,'â€“'),(922,'Ciudad de Guatemala','GTM',NULL,'Guatemala'),(923,'Mixco','GTM',NULL,'Guatemala'),(924,'Villa Nueva','GTM',NULL,'Guatemala'),(925,'Quetzaltenango','GTM',NULL,'Quetzaltenango'),(926,'Conakry','GIN',NULL,'Conakry'),(927,'Bissau','GNB',NULL,'Bissau'),(928,'Georgetown','GUY',NULL,'Georgetown'),(929,'Port-au-Prince','HTI',NULL,'Ouest'),(930,'Carrefour','HTI',NULL,'Ouest'),(931,'Delmas','HTI',NULL,'Ouest'),(932,'Le-Cap-HaÃ¯tien','HTI',NULL,'Nord'),(933,'Tegucigalpa','HND',NULL,'Distrito Central'),(934,'San Pedro Sula','HND',NULL,'CortÃ©s'),(935,'La Ceiba','HND',NULL,'AtlÃ¡ntida'),(936,'Kowloon and New Kowloon','HKG',NULL,'Kowloon and New Kowl'),(937,'Victoria','HKG',NULL,'Hongkong'),(938,'Longyearbyen','SJM',NULL,'LÃ¤nsimaa'),(939,'Jakarta','IDN',NULL,'Jakarta Raya'),(940,'Surabaya','IDN',NULL,'East Java'),(941,'Bandung','IDN',NULL,'West Java'),(942,'Medan','IDN',NULL,'Sumatera Utara'),(943,'Palembang','IDN',NULL,'Sumatera Selatan'),(944,'Tangerang','IDN',NULL,'West Java'),(945,'Semarang','IDN',NULL,'Central Java'),(946,'Ujung Pandang','IDN',NULL,'Sulawesi Selatan'),(947,'Malang','IDN',NULL,'East Java'),(948,'Bandar Lampung','IDN',NULL,'Lampung'),(949,'Bekasi','IDN',NULL,'West Java'),(950,'Padang','IDN',NULL,'Sumatera Barat'),(951,'Surakarta','IDN',NULL,'Central Java'),(952,'Banjarmasin','IDN',NULL,'Kalimantan Selatan'),(953,'Pekan Baru','IDN',NULL,'Riau'),(954,'Denpasar','IDN',NULL,'Bali'),(955,'Yogyakarta','IDN',NULL,'Yogyakarta'),(956,'Pontianak','IDN',NULL,'Kalimantan Barat'),(957,'Samarinda','IDN',NULL,'Kalimantan Timur'),(958,'Jambi','IDN',NULL,'Jambi'),(959,'Depok','IDN',NULL,'West Java'),(960,'Cimahi','IDN',NULL,'West Java'),(961,'Balikpapan','IDN',NULL,'Kalimantan Timur'),(962,'Manado','IDN',NULL,'Sulawesi Utara'),(963,'Mataram','IDN',NULL,'Nusa Tenggara Barat'),(964,'Pekalongan','IDN',NULL,'Central Java'),(965,'Tegal','IDN',NULL,'Central Java'),(966,'Bogor','IDN',NULL,'West Java'),(967,'Ciputat','IDN',NULL,'West Java'),(968,'Pondokgede','IDN',NULL,'West Java'),(969,'Cirebon','IDN',NULL,'West Java'),(970,'Kediri','IDN',NULL,'East Java'),(971,'Ambon','IDN',NULL,'Molukit'),(972,'Jember','IDN',NULL,'East Java'),(973,'Cilacap','IDN',NULL,'Central Java'),(974,'Cimanggis','IDN',NULL,'West Java'),(975,'Pematang Siantar','IDN',NULL,'Sumatera Utara'),(976,'Purwokerto','IDN',NULL,'Central Java'),(977,'Ciomas','IDN',NULL,'West Java'),(978,'Tasikmalaya','IDN',NULL,'West Java'),(979,'Madiun','IDN',NULL,'East Java'),(980,'Bengkulu','IDN',NULL,'Bengkulu'),(981,'Karawang','IDN',NULL,'West Java'),(982,'Banda Aceh','IDN',NULL,'Aceh'),(983,'Palu','IDN',NULL,'Sulawesi Tengah'),(984,'Pasuruan','IDN',NULL,'East Java'),(985,'Kupang','IDN',NULL,'Nusa Tenggara Timur'),(986,'Tebing Tinggi','IDN',NULL,'Sumatera Utara'),(987,'Percut Sei Tuan','IDN',NULL,'Sumatera Utara'),(988,'Binjai','IDN',NULL,'Sumatera Utara'),(989,'Sukabumi','IDN',NULL,'West Java'),(990,'Waru','IDN',NULL,'East Java'),(991,'Pangkal Pinang','IDN',NULL,'Sumatera Selatan'),(992,'Magelang','IDN',NULL,'Central Java'),(993,'Blitar','IDN',NULL,'East Java'),(994,'Serang','IDN',NULL,'West Java'),(995,'Probolinggo','IDN',NULL,'East Java'),(996,'Cilegon','IDN',NULL,'West Java'),(997,'Cianjur','IDN',NULL,'West Java'),(998,'Ciparay','IDN',NULL,'West Java'),(999,'Lhokseumawe','IDN',NULL,'Aceh'),(1000,'Taman','IDN',NULL,'East Java'),(1001,'Depok','IDN',NULL,'Yogyakarta'),(1002,'Citeureup','IDN',NULL,'West Java'),(1003,'Pemalang','IDN',NULL,'Central Java'),(1004,'Klaten','IDN',NULL,'Central Java'),(1005,'Salatiga','IDN',NULL,'Central Java'),(1006,'Cibinong','IDN',NULL,'West Java'),(1007,'Palangka Raya','IDN',NULL,'Kalimantan Tengah'),(1008,'Mojokerto','IDN',NULL,'East Java'),(1009,'Purwakarta','IDN',NULL,'West Java'),(1010,'Garut','IDN',NULL,'West Java'),(1011,'Kudus','IDN',NULL,'Central Java'),(1012,'Kendari','IDN',NULL,'Sulawesi Tenggara'),(1013,'Jaya Pura','IDN',NULL,'West Irian'),(1014,'Gorontalo','IDN',NULL,'Sulawesi Utara'),(1015,'Majalaya','IDN',NULL,'West Java'),(1016,'Pondok Aren','IDN',NULL,'West Java'),(1017,'Jombang','IDN',NULL,'East Java'),(1018,'Sunggal','IDN',NULL,'Sumatera Utara'),(1019,'Batam','IDN',NULL,'Riau'),(1020,'Padang Sidempuan','IDN',NULL,'Sumatera Utara'),(1021,'Sawangan','IDN',NULL,'West Java'),(1022,'Banyuwangi','IDN',NULL,'East Java'),(1023,'Tanjung Pinang','IDN',NULL,'Riau'),(1024,'Mumbai (Bombay)','IND',NULL,'Maharashtra'),(1025,'Delhi','IND',NULL,'Delhi'),(1026,'Calcutta [Kolkata]','IND',NULL,'West Bengali'),(1027,'Chennai (Madras)','IND',NULL,'Tamil Nadu'),(1028,'Hyderabad','IND',NULL,'Andhra Pradesh'),(1029,'Ahmedabad','IND',NULL,'Gujarat'),(1030,'Bangalore','IND',NULL,'Karnataka'),(1031,'Kanpur','IND',NULL,'Uttar Pradesh'),(1032,'Nagpur','IND',NULL,'Maharashtra'),(1033,'Lucknow','IND',NULL,'Uttar Pradesh'),(1034,'Pune','IND',NULL,'Maharashtra'),(1035,'Surat','IND',NULL,'Gujarat'),(1036,'Jaipur','IND',NULL,'Rajasthan'),(1037,'Indore','IND',NULL,'Madhya Pradesh'),(1038,'Bhopal','IND',NULL,'Madhya Pradesh'),(1039,'Ludhiana','IND',NULL,'Punjab'),(1040,'Vadodara (Baroda)','IND',NULL,'Gujarat'),(1041,'Kalyan','IND',NULL,'Maharashtra'),(1042,'Madurai','IND',NULL,'Tamil Nadu'),(1043,'Haora (Howrah)','IND',NULL,'West Bengali'),(1044,'Varanasi (Benares)','IND',NULL,'Uttar Pradesh'),(1045,'Patna','IND',NULL,'Bihar'),(1046,'Srinagar','IND',NULL,'Jammu and Kashmir'),(1047,'Agra','IND',NULL,'Uttar Pradesh'),(1048,'Coimbatore','IND',NULL,'Tamil Nadu'),(1049,'Thane (Thana)','IND',NULL,'Maharashtra'),(1050,'Allahabad','IND',NULL,'Uttar Pradesh'),(1051,'Meerut','IND',NULL,'Uttar Pradesh'),(1052,'Vishakhapatnam','IND',NULL,'Andhra Pradesh'),(1053,'Jabalpur','IND',NULL,'Madhya Pradesh'),(1054,'Amritsar','IND',NULL,'Punjab'),(1055,'Faridabad','IND',NULL,'Haryana'),(1056,'Vijayawada','IND',NULL,'Andhra Pradesh'),(1057,'Gwalior','IND',NULL,'Madhya\n Pradesh'),(1058,'Jodhpur','IND',NULL,'Rajasthan'),(1059,'Nashik (Nasik)','IND',NULL,'Maharashtra'),(1060,'Hubli-Dharwad','IND',NULL,'Karnataka'),(1061,'Solapur (Sholapur)','IND',NULL,'Maharashtra'),(1062,'Ranchi','IND',NULL,'Jharkhand'),(1063,'Bareilly','IND',NULL,'Uttar Pradesh'),(1064,'Guwahati (Gauhati)','IND',NULL,'Assam'),(1065,'Shambajinagar (Aurangabad)','IND',NULL,'Maharashtra'),(1066,'Cochin (Kochi)','IND',NULL,'Kerala'),(1067,'Rajkot','IND',NULL,'Gujarat'),(1068,'Kota','IND',NULL,'Rajasthan'),(1069,'Thiruvananthapuram (Trivandrum','IND',NULL,'Kerala'),(1070,'Pimpri-Chinchwad','IND',NULL,'Maharashtra'),(1071,'Jalandhar (Jullundur)','IND',NULL,'Punjab'),(1072,'Gorakhpur','IND',NULL,'Uttar Pradesh'),(1073,'Chandigarh','IND',NULL,'Chandigarh'),(1074,'Mysore','IND',NULL,'Karnataka'),(1075,'Aligarh','IND',NULL,'Uttar Pradesh'),(1076,'Guntur','IND',NULL,'Andhra Pradesh'),(1077,'Jamshedpur','IND',NULL,'Jharkhand'),(1078,'Ghaziabad','IND',NULL,'Uttar Pradesh'),(1079,'Warangal','IND',NULL,'Andhra Pradesh'),(1080,'Raipur','IND',NULL,'Chhatisgarh'),(1081,'Moradabad','IND',NULL,'Uttar Pradesh'),(1082,'Durgapur','IND',NULL,'West Bengali'),(1083,'Amravati','IND',NULL,'Maharashtra'),(1084,'Calicut (Kozhikode)','IND',NULL,'Kerala'),(1085,'Bikaner','IND',NULL,'Rajasthan'),(1086,'Bhubaneswar','IND',NULL,'Orissa'),(1087,'Kolhapur','IND',NULL,'Maharashtra'),(1088,'Kataka (Cuttack)','IND',NULL,'Orissa'),(1089,'Ajmer','IND',NULL,'Rajasthan'),(1090,'Bhavnagar','IND',NULL,'Gujarat'),(1091,'Tiruchirapalli','IND',NULL,'Tamil Nadu'),(1092,'Bhilai','IND',NULL,'Chhatisgarh'),(1093,'Bhiwandi','IND',NULL,'Maharashtra'),(1094,'Saharanpur','IND',NULL,'Uttar Pradesh'),(1095,'Ulhasnagar','IND',NULL,'Maharashtra'),(1096,'Salem','IND',NULL,'Tamil Nadu'),(1097,'Ujjain','IND',NULL,'Madhya Pradesh'),(1098,'Malegaon','IND',NULL,'Maharashtra'),(1099,'Jamnagar','IND',NULL,'Gujarat'),(1100,'Bokaro Steel City','IND',NULL,'Jharkhand'),(1101,'Akola','IND',NULL,'Maharashtra'),(1102,'Belgaum','IND',NULL,'Karnataka'),(1103,'Rajahmundry','IND',NULL,'Andhra Pradesh'),(1104,'Nellore','IND',NULL,'Andhra Pradesh'),(1105,'Udaipur','IND',NULL,'Rajasthan'),(1106,'New Bombay','IND',NULL,'Maharashtra'),(1107,'Bhatpara','IND',NULL,'West Bengali'),(1108,'Gulbarga','IND',NULL,'Karnataka'),(1109,'New Delhi','IND',NULL,'Delhi'),(1110,'Jhansi','IND',NULL,'Uttar Pradesh'),(1111,'Gaya','IND',NULL,'Bihar'),(1112,'Kakinada','IND',NULL,'Andhra Pradesh'),(1113,'Dhule (Dhulia)','IND',NULL,'Maharashtra'),(1114,'Panihati','IND',NULL,'West Bengali'),(1115,'Nanded (Nander)','IND',NULL,'Maharashtra'),(1116,'Mangalore','IND',NULL,'Karnataka'),(1117,'Dehra Dun','IND',NULL,'Uttaranchal'),(1118,'Kamarhati','IND',NULL,'West Bengali'),(1119,'Davangere','IND',NULL,'Karnataka'),(1120,'Asansol','IND',NULL,'West Bengali'),(1121,'Bhagalpur','IND',NULL,'Bihar'),(1122,'Bellary','IND',NULL,'Karnataka'),(1123,'Barddhaman (Burdwan)','IND',NULL,'West Bengali'),(1124,'Rampur','IND',NULL,'Uttar Pradesh'),(1125,'Jalgaon','IND',NULL,'Maharashtra'),(1126,'Muzaffarpur','IND',NULL,'Bihar'),(1127,'Nizamabad','IND',NULL,'Andhra Pradesh'),(1128,'Muzaffarnagar','IND',NULL,'Uttar Pradesh'),(1129,'Patiala','IND',NULL,'Punjab'),(1130,'Shahjahanpur','IND',NULL,'Uttar Pradesh'),(1131,'Kurnool','IND',NULL,'Andhra Pradesh'),(1132,'Tiruppur (Tirupper)','IND',NULL,'Tamil Nadu'),(1133,'Rohtak','IND',NULL,'Haryana'),(1134,'South Dum Dum','IND',NULL,'West Bengali'),(1135,'Mathura','IND',NULL,'Uttar Pradesh'),(1136,'Chandrapur','IND',NULL,'Maharashtra'),(1137,'Barahanagar (Baranagar)','IND',NULL,'West Bengali'),(1138,'Darbhanga','IND',NULL,'Bihar'),(1139,'Siliguri (Shiliguri)','IND',NULL,'West Bengali'),(1140,'Raurkela','IND',NULL,'Orissa'),(1141,'Ambattur','IND',NULL,'Tamil Nadu'),(1142,'Panipat','IND',NULL,'Haryana'),(1143,'Firozabad','IND',NULL,'Uttar Pradesh'),(1144,'Ichalkaranji','IND',NULL,'Maharashtra'),(1145,'Jammu','IND',NULL,'Jammu and Kashmir'),(1146,'Ramagundam','IND',NULL,'Andhra Pradesh'),(1147,'Eluru','IND',NULL,'Andhra Pradesh'),(1148,'Brahmapur','IND',NULL,'Orissa'),(1149,'Alwar','IND',NULL,'Rajasthan'),(1150,'Pondicherry','IND',NULL,'Pondicherry'),(1151,'Thanjavur','IND',NULL,'Tamil Nadu'),(1152,'Bihar Sharif','IND',NULL,'Bihar'),(1153,'Tuticorin','IND',NULL,'Tamil Nadu'),(1154,'Imphal','IND',NULL,'Manipur'),(1155,'Latur','IND',NULL,'Maharashtra'),(1156,'Sagar','IND',NULL,'Madhya Pradesh'),(1157,'Farrukhabad-cum-Fatehgarh','IND',NULL,'Uttar Pradesh'),(1158,'Sangli','IND',NULL,'Maharashtra'),(1159,'Parbhani','IND',NULL,'Maharashtra'),(1160,'Nagar Coil','IND',NULL,'Tamil Nadu'),(1161,'Bijapur','IND',NULL,'Karnataka'),(1162,'Kukatpalle','IND',NULL,'Andhra Pradesh'),(1163,'Bally','IND',NULL,'West Bengali'),(1164,'Bhilwara','IND',NULL,'Rajasthan'),(1165,'Ratlam','IND',NULL,'Madhya Pradesh'),(1166,'Avadi','IND',NULL,'Tamil Nadu'),(1167,'Dindigul','IND',NULL,'Tamil Nadu'),(1168,'Ahmadnagar','IND',NULL,'Maharashtra'),(1169,'Bilaspur','IND',NULL,'Chhatisgarh'),(1170,'Shimoga','IND',NULL,'Karnataka'),(1171,'Kharagpur','IND',NULL,'West Bengali'),(1172,'Mira Bhayandar','IND',NULL,'Maharashtra'),(1173,'Vellore','IND',NULL,'Tamil Nadu'),(1174,'Jalna','IND',NULL,'Maharashtra'),(1175,'Burnpur','IND',NULL,'West Bengali'),(1176,'Anantapur','IND',NULL,'Andhra Pradesh'),(1177,'Allappuzha (Alleppey)','IND',NULL,'Kerala'),(1178,'Tirupati','IND',NULL,'Andhra Pradesh'),(1179,'Karnal','IND',NULL,'Haryana'),(1180,'Burhanpur','IND',NULL,'Madhya Pradesh'),(1181,'Hisar (Hissar)','IND',NULL,'Haryana'),(1182,'Tiruvottiyur','IND',NULL,'Tamil Nadu'),(1183,'Mirzapur-cum-Vindhyachal','IND',NULL,'Uttar Pradesh'),(1184,'Secunderabad','IND',NULL,'Andhra Pradesh'),(1185,'Nadiad','IND',NULL,'Gujarat'),(1186,'Dewas','IND',NULL,'Madhya Pradesh'),(1187,'Murwara (Katni)','IND',NULL,'Madhya Pradesh'),(1188,'Ganganagar','IND',NULL,'Rajasthan'),(1189,'Vizianagaram','IND',NULL,'Andhra Pradesh'),(1190,'Erode','IND',NULL,'Tamil Nadu'),(1191,'Machilipatnam (Masulipatam)','IND',NULL,'Andhra Pradesh'),(1192,'Bhatinda (Bathinda)','IND',NULL,'Punjab'),(1193,'Raichur','IND',NULL,'Karnataka'),(1194,'Agartala','IND',NULL,'Tripura'),(1195,'Arrah (Ara)','IND',NULL,'Bihar'),(1196,'Satna','IND',NULL,'Madhya Pradesh'),(1197,'Lalbahadur Nagar','IND',NULL,'Andhra Pradesh'),(1198,'Aizawl','IND',NULL,'Mizoram'),(1199,'Uluberia','IND',NULL,'West Bengali'),(1200,'Katihar','IND',NULL,'Bihar'),(1201,'Cuddalore','IND',NULL,'Tamil Nadu'),(1202,'Hugli-Chinsurah','IND',NULL,'West Bengali'),(1203,'Dhanbad','IND',NULL,'Jharkhand'),(1204,'Raiganj','IND',NULL,'West Bengali'),(1205,'Sambhal','IND',NULL,'Uttar Pradesh'),(1206,'Durg','IND',NULL,'Chhatisgarh'),(1207,'Munger (Monghyr)','IND',NULL,'Bihar'),(1208,'Kanchipuram','IND',NULL,'Tamil Nadu'),(1209,'North Dum Dum','IND',NULL,'West Bengali'),(1210,'Karimnagar','IND',NULL,'Andhra Pradesh'),(1211,'Bharatpur','IND',NULL,'Rajasthan'),(1212,'Sikar','IND',NULL,'Rajasthan'),(1213,'Hardwar (Haridwar)','IND',NULL,'Uttaranchal'),(1214,'Dabgram','IND',NULL,'West Bengali'),(1215,'Morena','IND',NULL,'Madhya Pradesh'),(1216,'Noida','IND',NULL,'Uttar Pradesh'),(1217,'Hapur','IND',NULL,'Uttar Pradesh'),(1218,'Bhusawal','IND',NULL,'Maharashtra'),(1219,'Khandwa','IND',NULL,'Madhya Pradesh'),(1220,'Yamuna Nagar','IND',NULL,'Haryana'),(1221,'Sonipat (Sonepat)','IND',NULL,'Haryana'),(1222,'Tenali','IND',NULL,'Andhra Pradesh'),(1223,'Raurkela Civil Township','IND',NULL,'Orissa'),(1224,'Kollam (Quilon)','IND',NULL,'Kerala'),(1225,'Kumbakonam','IND',NULL,'Tamil Nadu'),(1226,'Ingraj Bazar (English Bazar)','IND',NULL,'West Bengali'),(1227,'Timkur','IND',NULL,'Karnataka'),(1228,'Amroha','IND',NULL,'Uttar Pradesh'),(1229,'Serampore','IND',NULL,'West Bengali'),(1230,'Chapra','IND',NULL,'Bihar'),(1231,'Pali','IND',NULL,'Rajasthan'),(1232,'Maunath Bhanjan','IND',NULL,'Uttar Pradesh'),(1233,'Adoni','IND',NULL,'Andhra Pradesh'),(1234,'Jaunpur','IND',NULL,'Uttar Pradesh'),(1235,'Tirunelveli','IND',NULL,'Tamil Nadu'),(1236,'Bahraich','IND',NULL,'Uttar Pradesh'),(1237,'Gadag Betigeri','IND',NULL,'Karnataka'),(1238,'Proddatur','IND',NULL,'Andhra Pradesh'),(1239,'Chittoor','IND',NULL,'Andhra Pradesh'),(1240,'Barrackpur','IND',NULL,'West Bengali'),(1241,'Bharuch (Broach)','IND',NULL,'Gujarat'),(1242,'Naihati','IND',NULL,'West Bengali'),(1243,'Shillong','IND',NULL,'Meghalaya'),(1244,'Sambalpur','IND',NULL,'Orissa'),(1245,'Junagadh','IND',NULL,'Gujarat'),(1246,'Rae Bareli','IND',NULL,'Uttar Pradesh'),(1247,'Rewa','IND',NULL,'Madhya Pradesh'),(1248,'Gurgaon','IND',NULL,'Haryana'),(1249,'Khammam','IND',NULL,'Andhra Pradesh'),(1250,'Bulandshahr','IND',NULL,'Uttar Pradesh'),(1251,'Navsari','IND',NULL,'Gujarat'),(1252,'Malkajgiri','IND',NULL,'Andhra Pradesh'),(1253,'Midnapore (Medinipur)','IND',NULL,'West Bengali'),(1254,'Miraj','IND',NULL,'Maharashtra'),(1255,'Raj Nandgaon','IND',NULL,'Chhatisgarh'),(1256,'Alandur','IND',NULL,'Tamil Nadu'),(1257,'Puri','IND',NULL,'Orissa'),(1258,'Navadwip','IND',NULL,'West Bengali'),(1259,'Sirsa','IND',NULL,'Haryana'),(1260,'Korba','IND',NULL,'Chhatisgarh'),(1261,'Faizabad','IND',NULL,'Uttar Pradesh'),(1262,'Etawah','IND',NULL,'Uttar Pradesh'),(1263,'Pathankot','IND',NULL,'Punjab'),(1264,'Gandhinagar','IND',NULL,'Gujarat'),(1265,'Palghat (Palakkad)','IND',NULL,'Kerala'),(1266,'Veraval','IND',NULL,'Gujarat'),(1267,'Hoshiarpur','IND',NULL,'Punjab'),(1268,'Ambala','IND',NULL,'Haryana'),(1269,'Sitapur','IND',NULL,'Uttar Pradesh'),(1270,'Bhiwani','IND',NULL,'Haryana'),(1271,'Cuddapah','IND',NULL,'Andhra Pradesh'),(1272,'Bhimavaram','IND',NULL,'Andhra Pradesh'),(1273,'Krishnanagar','IND',NULL,'West Bengali'),(1274,'Chandannagar','IND',NULL,'West Bengali'),(1275,'Mandya','IND',NULL,'Karnataka'),(1276,'Dibrugarh','IND',NULL,'Assam'),(1277,'Nandyal','IND',NULL,'Andhra Pradesh'),(1278,'Balurghat','IND',NULL,'West Bengali'),(1279,'Neyveli','IND',NULL,'Tamil Nadu'),(1280,'Fatehpur','IND',NULL,'Uttar Pradesh'),(1281,'Mahbubnagar','IND',NULL,'Andhra Pradesh'),(1282,'Budaun','IND',NULL,'Uttar Pradesh'),(1283,'Porbandar','IND',NULL,'Gujarat'),(1284,'Silchar','IND',NULL,'Assam'),(1285,'Berhampore (Baharampur)','IND',NULL,'West Bengali'),(1286,'Purnea (Purnia)','IND',NULL,'Jharkhand'),(1287,'Bankura','IND',NULL,'West Bengali'),(1288,'Rajapalaiyam','IND',NULL,'Tamil Nadu'),(1289,'Titagarh','IND',NULL,'West Bengali'),(1290,'Halisahar','IND',NULL,'West Bengali'),(1291,'Hathras','IND',NULL,'Uttar Pradesh'),(1292,'Bhir (Bid)','IND',NULL,'Maharashtra'),(1293,'Pallavaram','IND',NULL,'Tamil Nadu'),(1294,'Anand','IND',NULL,'Gujarat'),(1295,'Mango','IND',NULL,'Jharkhand'),(1296,'Santipur','IND',NULL,'West Bengali'),(1297,'Bhind','IND',NULL,'Madhya Pradesh'),(1298,'Gondiya','IND',NULL,'Maharashtra'),(1299,'Tiruvannamalai','IND',NULL,'Tamil Nadu'),(1300,'Yeotmal (Yavatmal)','IND',NULL,'Maharashtra'),(1301,'Kulti-Barakar','IND',NULL,'West Bengali'),(1302,'Moga','IND',NULL,'Punjab'),(1303,'Shivapuri','IND',NULL,'Madhya Pradesh'),(1304,'Bidar','IND',NULL,'Karnataka'),(1305,'Guntakal','IND',NULL,'Andhra Pradesh'),(1306,'Unnao','IND',NULL,'Uttar Pradesh'),(1307,'Barasat','IND',NULL,'West Bengali'),(1308,'Tambaram','IND',NULL,'Tamil Nadu'),(1309,'Abohar','IND',NULL,'Punjab'),(1310,'Pilibhit','IND',NULL,'Uttar Pradesh'),(1311,'Valparai','IND',NULL,'Tamil\n Nadu'),(1312,'Gonda','IND',NULL,'Uttar Pradesh'),(1313,'Surendranagar','IND',NULL,'Gujarat'),(1314,'Qutubullapur','IND',NULL,'Andhra Pradesh'),(1315,'Beawar','IND',NULL,'Rajasthan'),(1316,'Hindupur','IND',NULL,'Andhra Pradesh'),(1317,'Gandhidham','IND',NULL,'Gujarat'),(1318,'Haldwani-cum-Kathgodam','IND',NULL,'Uttaranchal'),(1319,'Tellicherry (Thalassery)','IND',NULL,'Kerala'),(1320,'Wardha','IND',NULL,'Maharashtra'),(1321,'Rishra','IND',NULL,'West Bengali'),(1322,'Bhuj','IND',NULL,'Gujarat'),(1323,'Modinagar','IND',NULL,'Uttar Pradesh'),(1324,'Gudivada','IND',NULL,'Andhra Pradesh'),(1325,'Basirhat','IND',NULL,'West Bengali'),(1326,'Uttarpara-Kotrung','IND',NULL,'West Bengali'),(1327,'Ongole','IND',NULL,'Andhra Pradesh'),(1328,'North Barrackpur','IND',NULL,'West Bengali'),(1329,'Guna','IND',NULL,'Madhya Pradesh'),(1330,'Haldia','IND',NULL,'West Bengali'),(1331,'Habra','IND',NULL,'West Bengali'),(1332,'Kanchrapara','IND',NULL,'West Bengali'),(1333,'Tonk','IND',NULL,'Rajasthan'),(1334,'Champdani','IND',NULL,'West Bengali'),(1335,'Orai','IND',NULL,'Uttar Pradesh'),(1336,'Pudukkottai','IND',NULL,'Tamil Nadu'),(1337,'Sasaram','IND',NULL,'Bihar'),(1338,'Hazaribag','IND',NULL,'Jharkhand'),(1339,'Palayankottai','IND',NULL,'Tamil Nadu'),(1340,'Banda','IND',NULL,'Uttar Pradesh'),(1341,'Godhra','IND',NULL,'Gujarat'),(1342,'Hospet','IND',NULL,'Karnataka'),(1343,'Ashoknagar-Kalyangarh','IND',NULL,'West Bengali'),(1344,'Achalpur','IND',NULL,'Maharashtra'),(1345,'Patan','IND',NULL,'Gujarat'),(1346,'Mandasor','IND',NULL,'Madhya Pradesh'),(1347,'Damoh','IND',NULL,'Madhya Pradesh'),(1348,'Satara','IND',NULL,'Maharashtra'),(1349,'Meerut Cantonment','IND',NULL,'Uttar Pradesh'),(1350,'Dehri','IND',NULL,'Bihar'),(1351,'Delhi Cantonment','IND',NULL,'Delhi'),(1352,'Chhindwara','IND',NULL,'Madhya Pradesh'),(1353,'Bansberia','IND',NULL,'West Bengali'),(1354,'Nagaon','IND',NULL,'Assam'),(1355,'Kanpur Cantonment','IND',NULL,'Uttar Pradesh'),(1356,'Vidisha','IND',NULL,'Madhya Pradesh'),(1357,'Bettiah','IND',NULL,'Bihar'),(1358,'Purulia','IND',NULL,'Jharkhand'),(1359,'Hassan','IND',NULL,'Karnataka'),(1360,'Ambala Sadar','IND',NULL,'Haryana'),(1361,'Baidyabati','IND',NULL,'West Bengali'),(1362,'Morvi','IND',NULL,'Gujarat'),(1363,'Raigarh','IND',NULL,'Chhatisgarh'),(1364,'Vejalpur','IND',NULL,'Gujarat'),(1365,'Baghdad','IRQ',NULL,'Baghdad'),(1366,'Mosul','IRQ',NULL,'Ninawa'),(1367,'Irbil','IRQ',NULL,'Irbil'),(1368,'Kirkuk','IRQ',NULL,'al-Tamim'),(1369,'Basra','IRQ',NULL,'Basra'),(1370,'al-Sulaymaniya','IRQ',NULL,'al-Sulaymaniya'),(1371,'al-Najaf','IRQ',NULL,'al-Najaf'),(1372,'Karbala','IRQ',NULL,'Karbala'),(1373,'al-Hilla','IRQ',NULL,'Babil'),(1374,'al-Nasiriya','IRQ',NULL,'DhiQar'),(1375,'al-Amara','IRQ',NULL,'Maysan'),(1376,'al-Diwaniya','IRQ',NULL,'al-Qadisiya'),(1377,'al-Ramadi','IRQ',NULL,'al-Anbar'),(1378,'al-Kut','IRQ',NULL,'Wasit'),(1379,'Baquba','IRQ',NULL,'Diyala'),(1380,'Teheran','IRN',NULL,'Teheran'),(1381,'Mashhad','IRN',NULL,'Khorasan'),(1382,'Esfahan','IRN',NULL,'Esfahan'),(1383,'Tabriz','IRN',NULL,'East Azerbaidzan'),(1384,'Shiraz','IRN',NULL,'Fars'),(1385,'Karaj','IRN',NULL,'Teheran'),(1386,'Ahvaz','IRN',NULL,'Khuzestan'),(1387,'Qom','IRN',NULL,'Qom'),(1388,'Kermanshah','IRN',NULL,'Kermanshah'),(1389,'Urmia','IRN',NULL,'West Azerbaidzan'),(1390,'Zahedan','IRN',NULL,'Sistan va Baluchesta'),(1391,'Rasht','IRN',NULL,'Gilan'),(1392,'Hamadan','IRN',NULL,'Hamadan'),(1393,'Kerman','IRN',NULL,'Kerman'),(1394,'Arak','IRN',NULL,'Markazi'),(1395,'Ardebil','IRN',NULL,'Ardebil'),(1396,'Yazd','IRN',NULL,'Yazd'),(1397,'Qazvin','IRN',NULL,'Qazvin'),(1398,'Zanjan','IRN',NULL,'Zanjan'),(1399,'Sanandaj','IRN',NULL,'Kordestan'),(1400,'Bandar-e-Abbas','IRN',NULL,'Hormozgan'),(1401,'Khorramabad','IRN',NULL,'Lorestan'),(1402,'Eslamshahr','IRN',NULL,'Teheran'),(1403,'Borujerd','IRN',NULL,'Lorestan'),(1404,'Abadan','IRN',NULL,'Khuzestan'),(1405,'Dezful','IRN',NULL,'Khuzestan'),(1406,'Kashan','IRN',NULL,'Esfahan'),(1407,'Sari','IRN',NULL,'Mazandaran'),(1408,'Gorgan','IRN',NULL,'Golestan'),(1409,'Najafabad','IRN',NULL,'Esfahan'),(1410,'Sabzevar','IRN',NULL,'Khorasan'),(1411,'Khomeynishahr','IRN',NULL,'Esfahan'),(1412,'Amol','IRN',NULL,'Mazandaran'),(1413,'Neyshabur','IRN',NULL,'Khorasan'),(1414,'Babol','IRN',NULL,'Mazandaran'),(1415,'Khoy','IRN',NULL,'West Azerbaidzan'),(1416,'Malayer','IRN',NULL,'Hamadan'),(1417,'Bushehr','IRN',NULL,'Bushehr'),(1418,'Qaemshahr','IRN',NULL,'Mazandaran'),(1419,'Qarchak','IRN',NULL,'Teheran'),(1420,'Qods','IRN',NULL,'Teheran'),(1421,'Sirjan','IRN',NULL,'Kerman'),(1422,'Bojnurd','IRN',NULL,'Khorasan'),(1423,'Maragheh','IRN',NULL,'East Azerbaidzan'),(1424,'Birjand','IRN',NULL,'Khorasan'),(1425,'Ilam','IRN',NULL,'Ilam'),(1426,'Bukan','IRN',NULL,'West Azerbaidzan'),(1427,'Masjed-e-Soleyman','IRN',NULL,'Khuzestan'),(1428,'Saqqez','IRN',NULL,'Kordestan'),(1429,'Gonbad-e Qabus','IRN',NULL,'Mazandaran'),(1430,'Saveh','IRN',NULL,'Qom'),(1431,'Mahabad','IRN',NULL,'West Azerbaidzan'),(1432,'Varamin','IRN',NULL,'Teheran'),(1433,'Andimeshk','IRN',NULL,'Khuzestan'),(1434,'Khorramshahr','IRN',NULL,'Khuzestan'),(1435,'Shahrud','IRN',NULL,'Semnan'),(1436,'Marv Dasht','IRN',NULL,'Fars'),(1437,'Zabol','IRN',NULL,'Sistan va Baluchesta'),(1438,'Shahr-e Kord','IRN',NULL,'Chaharmahal va Bakht'),(1439,'Bandar-e Anzali','IRN',NULL,'Gilan'),(1440,'Rafsanjan','IRN',NULL,'Kerman'),(1441,'Marand','IRN',NULL,'East Azerbaidzan'),(1442,'Torbat-e Heydariyeh','IRN',NULL,'Khorasan'),(1443,'Jahrom','IRN',NULL,'Fars'),(1444,'Semnan','IRN',NULL,'Semnan'),(1445,'Miandoab','IRN',NULL,'West Azerbaidzan'),(1446,'Qomsheh','IRN',NULL,'Esfahan'),(1447,'Dublin','IRL',NULL,'Leinster'),(1448,'Cork','IRL',NULL,'Munster'),(1449,'ReykjavÃ­k','ISL',NULL,'HÃ¶fuÃ°borgarsvÃ¦Ã°i'),(1450,'Jerusalem','ISR',NULL,'Jerusalem'),(1451,'Tel Aviv-Jaffa','ISR',NULL,'Tel Aviv'),(1452,'Haifa','ISR',NULL,'Haifa'),(1453,'Rishon Le Ziyyon','ISR',NULL,'Ha Merkaz'),(1454,'Beerseba','ISR',NULL,'Ha Darom'),(1455,'Holon','ISR',NULL,'Tel Aviv'),(1456,'Petah Tiqwa','ISR',NULL,'Ha Merkaz'),(1457,'Ashdod','ISR',NULL,'Ha Darom'),(1458,'Netanya','ISR',NULL,'Ha Merkaz'),(1459,'Bat Yam','ISR',NULL,'Tel Aviv'),(1460,'Bene Beraq','ISR',NULL,'Tel Aviv'),(1461,'Ramat Gan','ISR',NULL,'Tel Aviv'),(1462,'Ashqelon','ISR',NULL,'Ha Darom'),(1463,'Rehovot','ISR',NULL,'Ha Merkaz'),(1464,'Roma','ITA',NULL,'Latium'),(1465,'Milano','ITA',NULL,'Lombardia'),(1466,'Napoli','ITA',NULL,'Campania'),(1467,'Torino','ITA',NULL,'Piemonte'),(1468,'Palermo','ITA',NULL,'Sisilia'),(1469,'Genova','ITA',NULL,'Liguria'),(1470,'Bologna','ITA',NULL,'Emilia-Romagna'),(1471,'Firenze','ITA',NULL,'Toscana'),(1472,'Catania','ITA',NULL,'Sisilia'),(1473,'Bari','ITA',NULL,'Apulia'),(1474,'Venezia','ITA',NULL,'Veneto'),(1475,'Messina','ITA',NULL,'Sisilia'),(1476,'Verona','ITA',NULL,'Veneto'),(1477,'Trieste','ITA',NULL,'Friuli-Venezia Giuli'),(1478,'Padova','ITA',NULL,'Veneto'),(1479,'Taranto','ITA',NULL,'Apulia'),(1480,'Brescia','ITA',NULL,'Lombardia'),(1481,'Reggio di Calabria','ITA',NULL,'Calabria'),(1482,'Modena','ITA',NULL,'Emilia-Romagna'),(1483,'Prato','ITA',NULL,'Toscana'),(1484,'Parma','ITA',NULL,'Emilia-Romagna'),(1485,'Cagliari','ITA',NULL,'Sardinia'),(1486,'Livorno','ITA',NULL,'Toscana'),(1487,'Perugia','ITA',NULL,'Umbria'),(1488,'Foggia','ITA',NULL,'Apulia'),(1489,'Reggio nellÂ´ Emilia','ITA',NULL,'Emilia-Romagna'),(1490,'Salerno','ITA',NULL,'Campania'),(1491,'Ravenna','ITA',NULL,'Emilia-Romagna'),(1492,'Ferrara','ITA',NULL,'Emilia-Romagna'),(1493,'Rimini','ITA',NULL,'Emilia-Romagna'),(1494,'Syrakusa','ITA',NULL,'Sisilia'),(1495,'Sassari','ITA',NULL,'Sardinia'),(1496,'Monza','ITA',NULL,'Lombardia'),(1497,'Bergamo','ITA',NULL,'Lombardia'),(1498,'Pescara','ITA',NULL,'Abruzzit'),(1499,'Latina','ITA',NULL,'Latium'),(1500,'Vicenza','ITA',NULL,'Veneto'),(1501,'Terni','ITA',NULL,'Umbria'),(1502,'ForlÃ¬','ITA',NULL,'Emilia-Romagna'),(1503,'Trento','ITA',NULL,'Trentino-Alto Adige'),(1504,'Novara','ITA',NULL,'Piemonte'),(1505,'Piacenza','ITA',NULL,'Emilia-Romagna'),(1506,'Ancona','ITA',NULL,'Marche'),(1507,'Lecce','ITA',NULL,'Apulia'),(1508,'Bolzano','ITA',NULL,'Trentino-Alto Adige'),(1509,'Catanzaro','ITA',NULL,'Calabria'),(1510,'La Spezia','ITA',NULL,'Liguria'),(1511,'Udine','ITA',NULL,'Friuli-Venezia Giuli'),(1512,'Torre del Greco','ITA',NULL,'Campania'),(1513,'Andria','ITA',NULL,'Apulia'),(1514,'Brindisi','ITA',NULL,'Apulia'),(1515,'Giugliano in Campania','ITA',NULL,'Campania'),(1516,'Pisa','ITA',NULL,'Toscana'),(1517,'Barletta','ITA',NULL,'Apulia'),(1518,'Arezzo','ITA',NULL,'Toscana'),(1519,'Alessandria','ITA',NULL,'Piemonte'),(1520,'Cesena','ITA',NULL,'Emilia-Romagna'),(1521,'Pesaro','ITA',NULL,'Marche'),(1522,'Dili','TMP',NULL,'Dili'),(1523,'Wien','AUT',NULL,'Wien'),(1524,'Graz','AUT',NULL,'Steiermark'),(1525,'Linz','AUT',NULL,'North Austria'),(1526,'Salzburg','AUT',NULL,'Salzburg'),(1527,'Innsbruck','AUT',NULL,'Tiroli'),(1528,'Klagenfurt','AUT',NULL,'KÃ¤rnten'),(1529,'Spanish Town','JAM',NULL,'St. Catherine'),(1530,'Kingston','JAM',NULL,'St. Andrew'),(1531,'Portmore','JAM',NULL,'St. Andrew'),(1532,'Tokyo','JPN',NULL,'Tokyo-to'),(1533,'Jokohama [Yokohama]','JPN',NULL,'Kanagawa'),(1534,'Osaka','JPN',NULL,'Osaka'),(1535,'Nagoya','JPN',NULL,'Aichi'),(1536,'Sapporo','JPN',NULL,'Hokkaido'),(1537,'Kioto','JPN',NULL,'Kyoto'),(1538,'Kobe','JPN',NULL,'Hyogo'),(1539,'Fukuoka','JPN',NULL,'Fukuoka'),(1540,'Kawasaki','JPN',NULL,'Kanagawa'),(1541,'Hiroshima','JPN',NULL,'Hiroshima'),(1542,'Kitakyushu','JPN',NULL,'Fukuoka'),(1543,'Sendai','JPN',NULL,'Miyagi'),(1544,'Chiba','JPN',NULL,'Chiba'),(1545,'Sakai','JPN',NULL,'Osaka'),(1546,'Kumamoto','JPN',NULL,'Kumamoto'),(1547,'Okayama','JPN',NULL,'Okayama'),(1548,'Sagamihara','JPN',NULL,'Kanagawa'),(1549,'Hamamatsu','JPN',NULL,'Shizuoka'),(1550,'Kagoshima','JPN',NULL,'Kagoshima'),(1551,'Funabashi','JPN',NULL,'Chiba'),(1552,'Higashiosaka','JPN',NULL,'Osaka'),(1553,'Hachioji','JPN',NULL,'Tokyo-to'),(1554,'Niigata','JPN',NULL,'Niigata'),(1555,'Amagasaki','JPN',NULL,'Hyogo'),(1556,'Himeji','JPN',NULL,'Hyogo'),(1557,'Shizuoka','JPN',NULL,'Shizuoka'),(1558,'Urawa','JPN',NULL,'Saitama'),(1559,'Matsuyama','JPN',NULL,'Ehime'),(1560,'Matsudo','JPN',NULL,'Chiba'),(1561,'Kanazawa','JPN',NULL,'Ishikawa'),(1562,'Kawaguchi','JPN',NULL,'Saitama'),(1563,'Ichikawa','JPN',NULL,'Chiba'),(1564,'Omiya','JPN',NULL,'Saitama'),(1565,'Utsunomiya','JPN',NULL,'Tochigi'),(1566,'Oita','JPN',NULL,'Oita'),(1567,'Nagasaki','JPN',NULL,'Nagasaki'),(1568,'Yokosuka','JPN',NULL,'Kanagawa'),(1569,'Kurashiki','JPN',NULL,'Okayama'),(1570,'Gifu','JPN',NULL,'Gifu'),(1571,'Hirakata','JPN',NULL,'Osaka'),(1572,'Nishinomiya','JPN',NULL,'Hyogo'),(1573,'Toyonaka','JPN',NULL,'Osaka'),(1574,'Wakayama','JPN',NULL,'Wakayama'),(1575,'Fukuyama','JPN',NULL,'Hiroshima'),(1576,'Fujisawa','JPN',NULL,'Kanagawa'),(1577,'Asahikawa','JPN',NULL,'Hokkaido'),(1578,'Machida','JPN',NULL,'Tokyo-to'),(1579,'Nara','JPN',NULL,'Nara'),(1580,'Takatsuki','JPN',NULL,'Osaka'),(1581,'Iwaki','JPN',NULL,'Fukushima'),(1582,'Nagano','JPN',NULL,'Nagano'),(1583,'Toyohashi','JPN',NULL,'Aichi'),(1584,'Toyota','JPN',NULL,'Aichi'),(1585,'Suita','JPN',NULL,'Osaka'),(1586,'Takamatsu','JPN',NULL,'Kagawa'),(1587,'Koriyama','JPN',NULL,'Fukushima'),(1588,'Okazaki','JPN',NULL,'Aichi'),(1589,'Kawagoe','JPN',NULL,'Saitama'),(1590,'Tokorozawa','JPN',NULL,'Saitama'),(1591,'Toyama','JPN',NULL,'Toyama'),(1592,'Kochi','JPN',NULL,'Kochi'),(1593,'Kashiwa','JPN',NULL,'Chiba'),(1594,'Akita\n','JPN',NULL,'Akita'),(1595,'Miyazaki','JPN',NULL,'Miyazaki'),(1596,'Koshigaya','JPN',NULL,'Saitama'),(1597,'Naha','JPN',NULL,'Okinawa'),(1598,'Aomori','JPN',NULL,'Aomori'),(1599,'Hakodate','JPN',NULL,'Hokkaido'),(1600,'Akashi','JPN',NULL,'Hyogo'),(1601,'Yokkaichi','JPN',NULL,'Mie'),(1602,'Fukushima','JPN',NULL,'Fukushima'),(1603,'Morioka','JPN',NULL,'Iwate'),(1604,'Maebashi','JPN',NULL,'Gumma'),(1605,'Kasugai','JPN',NULL,'Aichi'),(1606,'Otsu','JPN',NULL,'Shiga'),(1607,'Ichihara','JPN',NULL,'Chiba'),(1608,'Yao','JPN',NULL,'Osaka'),(1609,'Ichinomiya','JPN',NULL,'Aichi'),(1610,'Tokushima','JPN',NULL,'Tokushima'),(1611,'Kakogawa','JPN',NULL,'Hyogo'),(1612,'Ibaraki','JPN',NULL,'Osaka'),(1613,'Neyagawa','JPN',NULL,'Osaka'),(1614,'Shimonoseki','JPN',NULL,'Yamaguchi'),(1615,'Yamagata','JPN',NULL,'Yamagata'),(1616,'Fukui','JPN',NULL,'Fukui'),(1617,'Hiratsuka','JPN',NULL,'Kanagawa'),(1618,'Mito','JPN',NULL,'Ibaragi'),(1619,'Sasebo','JPN',NULL,'Nagasaki'),(1620,'Hachinohe','JPN',NULL,'Aomori'),(1621,'Takasaki','JPN',NULL,'Gumma'),(1622,'Shimizu','JPN',NULL,'Shizuoka'),(1623,'Kurume','JPN',NULL,'Fukuoka'),(1624,'Fuji','JPN',NULL,'Shizuoka'),(1625,'Soka','JPN',NULL,'Saitama'),(1626,'Fuchu','JPN',NULL,'Tokyo-to'),(1627,'Chigasaki','JPN',NULL,'Kanagawa'),(1628,'Atsugi','JPN',NULL,'Kanagawa'),(1629,'Numazu','JPN',NULL,'Shizuoka'),(1630,'Ageo','JPN',NULL,'Saitama'),(1631,'Yamato','JPN',NULL,'Kanagawa'),(1632,'Matsumoto','JPN',NULL,'Nagano'),(1633,'Kure','JPN',NULL,'Hiroshima'),(1634,'Takarazuka','JPN',NULL,'Hyogo'),(1635,'Kasukabe','JPN',NULL,'Saitama'),(1636,'Chofu','JPN',NULL,'Tokyo-to'),(1637,'Odawara','JPN',NULL,'Kanagawa'),(1638,'Kofu','JPN',NULL,'Yamanashi'),(1639,'Kushiro','JPN',NULL,'Hokkaido'),(1640,'Kishiwada','JPN',NULL,'Osaka'),(1641,'Hitachi','JPN',NULL,'Ibaragi'),(1642,'Nagaoka','JPN',NULL,'Niigata'),(1643,'Itami','JPN',NULL,'Hyogo'),(1644,'Uji','JPN',NULL,'Kyoto'),(1645,'Suzuka','JPN',NULL,'Mie'),(1646,'Hirosaki','JPN',NULL,'Aomori'),(1647,'Ube','JPN',NULL,'Yamaguchi'),(1648,'Kodaira','JPN',NULL,'Tokyo-to'),(1649,'Takaoka','JPN',NULL,'Toyama'),(1650,'Obihiro','JPN',NULL,'Hokkaido'),(1651,'Tomakomai','JPN',NULL,'Hokkaido'),(1652,'Saga','JPN',NULL,'Saga'),(1653,'Sakura','JPN',NULL,'Chiba'),(1654,'Kamakura','JPN',NULL,'Kanagawa'),(1655,'Mitaka','JPN',NULL,'Tokyo-to'),(1656,'Izumi','JPN',NULL,'Osaka'),(1657,'Hino','JPN',NULL,'Tokyo-to'),(1658,'Hadano','JPN',NULL,'Kanagawa'),(1659,'Ashikaga','JPN',NULL,'Tochigi'),(1660,'Tsu','JPN',NULL,'Mie'),(1661,'Sayama','JPN',NULL,'Saitama'),(1662,'Yachiyo','JPN',NULL,'Chiba'),(1663,'Tsukuba','JPN',NULL,'Ibaragi'),(1664,'Tachikawa','JPN',NULL,'Tokyo-to'),(1665,'Kumagaya','JPN',NULL,'Saitama'),(1666,'Moriguchi','JPN',NULL,'Osaka'),(1667,'Otaru','JPN',NULL,'Hokkaido'),(1668,'Anjo','JPN',NULL,'Aichi'),(1669,'Narashino','JPN',NULL,'Chiba'),(1670,'Oyama','JPN',NULL,'Tochigi'),(1671,'Ogaki','JPN',NULL,'Gifu'),(1672,'Matsue','JPN',NULL,'Shimane'),(1673,'Kawanishi','JPN',NULL,'Hyogo'),(1674,'Hitachinaka','JPN',NULL,'Tokyo-to'),(1675,'Niiza','JPN',NULL,'Saitama'),(1676,'Nagareyama','JPN',NULL,'Chiba'),(1677,'Tottori','JPN',NULL,'Tottori'),(1678,'Tama','JPN',NULL,'Ibaragi'),(1679,'Iruma','JPN',NULL,'Saitama'),(1680,'Ota','JPN',NULL,'Gumma'),(1681,'Omuta','JPN',NULL,'Fukuoka'),(1682,'Komaki','JPN',NULL,'Aichi'),(1683,'Ome','JPN',NULL,'Tokyo-to'),(1684,'Kadoma','JPN',NULL,'Osaka'),(1685,'Yamaguchi','JPN',NULL,'Yamaguchi'),(1686,'Higashimurayama','JPN',NULL,'Tokyo-to'),(1687,'Yonago','JPN',NULL,'Tottori'),(1688,'Matsubara','JPN',NULL,'Osaka'),(1689,'Musashino','JPN',NULL,'Tokyo-to'),(1690,'Tsuchiura','JPN',NULL,'Ibaragi'),(1691,'Joetsu','JPN',NULL,'Niigata'),(1692,'Miyakonojo','JPN',NULL,'Miyazaki'),(1693,'Misato','JPN',NULL,'Saitama'),(1694,'Kakamigahara','JPN',NULL,'Gifu'),(1695,'Daito','JPN',NULL,'Osaka'),(1696,'Seto','JPN',NULL,'Aichi'),(1697,'Kariya','JPN',NULL,'Aichi'),(1698,'Urayasu','JPN',NULL,'Chiba'),(1699,'Beppu','JPN',NULL,'Oita'),(1700,'Niihama','JPN',NULL,'Ehime'),(1701,'Minoo','JPN',NULL,'Osaka'),(1702,'Fujieda','JPN',NULL,'Shizuoka'),(1703,'Abiko','JPN',NULL,'Chiba'),(1704,'Nobeoka','JPN',NULL,'Miyazaki'),(1705,'Tondabayashi','JPN',NULL,'Osaka'),(1706,'Ueda','JPN',NULL,'Nagano'),(1707,'Kashihara','JPN',NULL,'Nara'),(1708,'Matsusaka','JPN',NULL,'Mie'),(1709,'Isesaki','JPN',NULL,'Gumma'),(1710,'Zama','JPN',NULL,'Kanagawa'),(1711,'Kisarazu','JPN',NULL,'Chiba'),(1712,'Noda','JPN',NULL,'Chiba'),(1713,'Ishinomaki','JPN',NULL,'Miyagi'),(1714,'Fujinomiya','JPN',NULL,'Shizuoka'),(1715,'Kawachinagano','JPN',NULL,'Osaka'),(1716,'Imabari','JPN',NULL,'Ehime'),(1717,'Aizuwakamatsu','JPN',NULL,'Fukushima'),(1718,'Higashihiroshima','JPN',NULL,'Hiroshima'),(1719,'Habikino','JPN',NULL,'Osaka'),(1720,'Ebetsu','JPN',NULL,'Hokkaido'),(1721,'Hofu','JPN',NULL,'Yamaguchi'),(1722,'Kiryu','JPN',NULL,'Gumma'),(1723,'Okinawa','JPN',NULL,'Okinawa'),(1724,'Yaizu','JPN',NULL,'Shizuoka'),(1725,'Toyokawa','JPN',NULL,'Aichi'),(1726,'Ebina','JPN',NULL,'Kanagawa'),(1727,'Asaka','JPN',NULL,'Saitama'),(1728,'Higashikurume','JPN',NULL,'Tokyo-to'),(1729,'Ikoma','JPN',NULL,'Nara'),(1730,'Kitami','JPN',NULL,'Hokkaido'),(1731,'Koganei','JPN',NULL,'Tokyo-to'),(1732,'Iwatsuki','JPN',NULL,'Saitama'),(1733,'Mishima','JPN',NULL,'Shizuoka'),(1734,'Handa','JPN',NULL,'Aichi'),(1735,'Muroran','JPN',NULL,'Hokkaido'),(1736,'Komatsu','JPN',NULL,'Ishikawa'),(1737,'Yatsushiro','JPN',NULL,'Kumamoto'),(1738,'Iida','JPN',NULL,'Nagano'),(1739,'Tokuyama','JPN',NULL,'Yamaguchi'),(1740,'Kokubunji','JPN',NULL,'Tokyo-to'),(1741,'Akishima','JPN',NULL,'Tokyo-to'),(1742,'Iwakuni','JPN',NULL,'Yamaguchi'),(1743,'Kusatsu','JPN',NULL,'Shiga'),(1744,'Kuwana','JPN',NULL,'Mie'),(1745,'Sanda','JPN',NULL,'Hyogo'),(1746,'Hikone','JPN',NULL,'Shiga'),(1747,'Toda','JPN',NULL,'Saitama'),(1748,'Tajimi','JPN',NULL,'Gifu'),(1749,'Ikeda','JPN',NULL,'Osaka'),(1750,'Fukaya','JPN',NULL,'Saitama'),(1751,'Ise','JPN',NULL,'Mie'),(1752,'Sakata','JPN',NULL,'Yamagata'),(1753,'Kasuga','JPN',NULL,'Fukuoka'),(1754,'Kamagaya','JPN',NULL,'Chiba'),(1755,'Tsuruoka','JPN',NULL,'Yamagata'),(1756,'Hoya','JPN',NULL,'Tokyo-to'),(1757,'Nishio','JPN',NULL,'Chiba'),(1758,'Tokai','JPN',NULL,'Aichi'),(1759,'Inazawa','JPN',NULL,'Aichi'),(1760,'Sakado','JPN',NULL,'Saitama'),(1761,'Isehara','JPN',NULL,'Kanagawa'),(1762,'Takasago','JPN',NULL,'Hyogo'),(1763,'Fujimi','JPN',NULL,'Saitama'),(1764,'Urasoe','JPN',NULL,'Okinawa'),(1765,'Yonezawa','JPN',NULL,'Yamagata'),(1766,'Konan','JPN',NULL,'Aichi'),(1767,'Yamatokoriyama','JPN',NULL,'Nara'),(1768,'Maizuru','JPN',NULL,'Kyoto'),(1769,'Onomichi','JPN',NULL,'Hiroshima'),(1770,'Higashimatsuyama','JPN',NULL,'Saitama'),(1771,'Kimitsu','JPN',NULL,'Chiba'),(1772,'Isahaya','JPN',NULL,'Nagasaki'),(1773,'Kanuma','JPN',NULL,'Tochigi'),(1774,'Izumisano','JPN',NULL,'Osaka'),(1775,'Kameoka','JPN',NULL,'Kyoto'),(1776,'Mobara','JPN',NULL,'Chiba'),(1777,'Narita','JPN',NULL,'Chiba'),(1778,'Kashiwazaki','JPN',NULL,'Niigata'),(1779,'Tsuyama','JPN',NULL,'Okayama'),(1780,'Sanaa','YEM',NULL,'Sanaa'),(1781,'Aden','YEM',NULL,'Aden'),(1782,'Taizz','YEM',NULL,'Taizz'),(1783,'Hodeida','YEM',NULL,'Hodeida'),(1784,'al-Mukalla','YEM',NULL,'Hadramawt'),(1785,'Ibb','YEM',NULL,'Ibb'),(1786,'Amman','JOR',NULL,'Amman'),(1787,'al-Zarqa','JOR',NULL,'al-Zarqa'),(1788,'Irbid','JOR',NULL,'Irbid'),(1789,'al-Rusayfa','JOR',NULL,'al-Zarqa'),(1790,'Wadi al-Sir','JOR',NULL,'Amman'),(1791,'Flying Fish Cove','CXR',NULL,'â€“'),(1792,'Beograd','YUG',NULL,'Central Serbia'),(1793,'Novi Sad','YUG',NULL,'Vojvodina'),(1794,'NiÅ¡','YUG',NULL,'Central Serbia'),(1795,'PriÅ¡tina','YUG',NULL,'Kosovo and Metohija'),(1796,'Kragujevac','YUG',NULL,'Central Serbia'),(1797,'Podgorica','YUG',NULL,'Montenegro'),(1798,'Subotica','YUG',NULL,'Vojvodina'),(1799,'Prizren','YUG',NULL,'Kosovo and Metohija'),(1800,'Phnom Penh','KHM',NULL,'Phnom Penh'),(1801,'Battambang','KHM',NULL,'Battambang'),(1802,'Siem Reap','KHM',NULL,'Siem Reap'),(1803,'Douala','CMR',NULL,'Littoral'),(1804,'YaoundÃ©','CMR',NULL,'Centre'),(1805,'Garoua','CMR',NULL,'Nord'),(1806,'Maroua','CMR',NULL,'ExtrÃªme-Nord'),(1807,'Bamenda','CMR',NULL,'Nord-Ouest'),(1808,'Bafoussam','CMR',NULL,'Ouest'),(1809,'Nkongsamba','CMR',NULL,'Littoral'),(1810,'MontrÃ©al','CAN',NULL,'QuÃ©bec'),(1811,'Calgary','CAN',NULL,'Alberta'),(1812,'Toronto','CAN',NULL,'Ontario'),(1813,'North York','CAN',NULL,'Ontario'),(1814,'Winnipeg','CAN',NULL,'Manitoba'),(1815,'Edmonton','CAN',NULL,'Alberta'),(1816,'Mississauga','CAN',NULL,'Ontario'),(1817,'Scarborough','CAN',NULL,'Ontario'),(1818,'Vancouver','CAN',NULL,'British Colombia'),(1819,'Etobicoke','CAN',NULL,'Ontario'),(1820,'London','CAN',NULL,'Ontario'),(1821,'Hamilton','CAN',NULL,'Ontario'),(1822,'Ottawa','CAN',NULL,'Ontario'),(1823,'Laval','CAN',NULL,'QuÃ©bec'),(1824,'Surrey','CAN',NULL,'British Colombia'),(1825,'Brampton','CAN',NULL,'Ontario'),(1826,'Windsor','CAN',NULL,'Ontario'),(1827,'Saskatoon','CAN',NULL,'Saskatchewan'),(1828,'Kitchener','CAN',NULL,'Ontario'),(1829,'Markham','CAN',NULL,'Ontario'),(1830,'Regina','CAN',NULL,'Saskatchewan'),(1831,'Burnaby','CAN',NULL,'British Colombia'),(1832,'QuÃ©bec','CAN',NULL,'QuÃ©bec'),(1833,'York','CAN',NULL,'Ontario'),(1834,'Richmond','CAN',NULL,'British Colombia'),(1835,'Vaughan','CAN',NULL,'Ontario'),(1836,'Burlington','CAN',NULL,'Ontario'),(1837,'Oshawa','CAN',NULL,'Ontario'),(1838,'Oakville','CAN',NULL,'Ontario'),(1839,'Saint Catharines','CAN',NULL,'Ontario'),(1840,'Longueuil','CAN',NULL,'QuÃ©bec'),(1841,'Richmond Hill','CAN',NULL,'Ontario'),(1842,'Thunder Bay','CAN',NULL,'Ontario'),(1843,'Nepean','CAN',NULL,'Ontario'),(1844,'Cape Breton','CAN',NULL,'Nova Scotia'),(1845,'East York','CAN',NULL,'Ontario'),(1846,'Halifax','CAN',NULL,'Nova Scotia'),(1847,'Cambridge','CAN',NULL,'Ontario'),(1848,'Gloucester','CAN',NULL,'Ontario'),(1849,'Abbotsford','CAN',NULL,'British Colombia'),(1850,'Guelph','CAN',NULL,'Ontario'),(1851,'Saint JohnÂ´s','CAN',NULL,'Newfoundland'),(1852,'Coquitlam','CAN',NULL,'British Colombia'),(1853,'Saanich','CAN',NULL,'British Colombia'),(1854,'Gatineau','CAN',NULL,'QuÃ©bec'),(1855,'Delta','CAN',NULL,'British Colombia'),(1856,'Sudbury','CAN',NULL,'Ontario'),(1857,'Kelowna','CAN',NULL,'British Colombia'),(1858,'Barrie','CAN',NULL,'Ontario'),(1859,'Praia','CPV',NULL,'SÃ£o Tiago'),(1860,'Almaty','KAZ',NULL,'Almaty Qalasy'),(1861,'Qaraghandy','KAZ',NULL,'Qaraghandy'),(1862,'Shymkent','KAZ',NULL,'South Kazakstan'),(1863,'Taraz','KAZ',NULL,'Taraz'),(1864,'Astana','KAZ',NULL,'Astana'),(1865,'Ã–skemen','KAZ',NULL,'East Kazakstan'),(1866,'Pavlodar','KAZ',NULL,'Pavlodar'),(1867,'Semey','KAZ',NULL,'East Kazakstan'),(1868,'AqtÃ¶be','KAZ',NULL,'AqtÃ¶be'),(1869,'Qostanay','KAZ',NULL,'Qostanay'),(1870,'Petropavl','KAZ',NULL,'North Kazakstan'),(1871,'Oral','KAZ',NULL,'West Kazakstan'),(1872,'Temirtau','KAZ',NULL,'Qaraghandy'),(1873,'Qyzylorda','KAZ',NULL,'Qyzylorda'),(1874,'Aqtau','KAZ',NULL,'Mangghystau'),(1875,'Atyrau','KAZ',NULL,'Atyrau'),(1876,'Ekibastuz','KAZ',NULL,'Pavlodar'),(1877,'KÃ¶kshetau','KAZ',NULL,'North Kazakstan'),(1878,'Rudnyy','KAZ',NULL,'Qostanay'),(1879,'Taldyqorghan','KAZ',NULL,'Almaty'),(1880,'Zhezqazghan','KAZ',NULL,'Qaraghandy'),(1881,'Nairobi','KEN',NULL,'Nairobi'),(1882,'Mombasa','KEN',NULL,'Coast'),(1883,'Kisumu','KEN',NULL,'Nyanza'),(1884,'Nakuru','KEN',NULL,'Rift Valley'),(1885,'Machakos','KEN',NULL,'Eastern'),(1886,'Eldoret','KEN',NULL,'Rift Valley'),(1887,'Meru','KEN',NULL,'Eastern'),(1888,'Nyeri','KEN',NULL,'Central'),(1889,'Bangui','CAF',NULL,'Bangui'),(1890,'Shanghai','CHN',NULL,'Shanghai'),(1891,'Peking','CHN',NULL,'Peking'),(1892,'Chongqing','CHN',NULL,'Chongqing'),(1893,'Tianjin','CHN',NULL,'Tianjin'),(1894,'Wuhan','CHN',NULL,'Hubei'),(1895,'Harbin','CHN',NULL,'Heilongjiang'),(1896,'Shenyang','CHN',NULL,'Liaoning'),(1897,'Kanton [Guangzhou]','CHN',NULL,'Guangdong'),(1898,'Chengdu','CHN',NULL,'Sichuan'),(1899,'Nanking [Nanjing]','CHN',NULL,'Jiangsu'),(1900,'Changchun','CHN',NULL,'Jilin'),(1901,'XiÂ´an','CHN',NULL,'Shaanxi'),(1902,'Dalian','CHN',NULL,'Liaoning'),(1903,'Qingdao','CHN',NULL,'Shandong'),(1904,'Jinan','CHN',NULL,'Shandong'),(1905,'Hangzhou','CHN',NULL,'Zhejiang'),(1906,'Zhengzhou','CHN',NULL,'Henan'),(1907,'Shijiazhuang','CHN',NULL,'Hebei'),(1908,'Taiyuan','CHN',NULL,'Shanxi'),(1909,'Kunming','CHN',NULL,'Yunnan'),(1910,'Changsha','CHN',NULL,'Hunan'),(1911,'Nanchang','CHN',NULL,'Jiangxi'),(1912,'Fuzhou','CHN',NULL,'Fujian'),(1913,'Lanzhou','CHN',NULL,'Gansu'),(1914,'Guiyang','CHN',NULL,'Guizhou'),(1915,'Ningbo','CHN',NULL,'Zhejiang'),(1916,'Hefei','CHN',NULL,'Anhui'),(1917,'UrumtÅ¡i [ÃœrÃ¼mqi]','CHN',NULL,'Xinxiang'),(1918,'Anshan','CHN',NULL,'Liaoning'),(1919,'Fushun','CHN',NULL,'Liaoning'),(1920,'Nanning','CHN',NULL,'Guangxi'),(1921,'Zibo','CHN',NULL,'Shandong'),(1922,'Qiqihar','CHN',NULL,'Heilongjiang'),(1923,'Jilin','CHN',NULL,'Jilin'),(1924,'Tangshan','CHN',NULL,'Hebei'),(1925,'Baotou','CHN',NULL,'Inner Mongolia'),(1926,'Shenzhen','CHN',NULL,'Guangdong'),(1927,'Hohhot','CHN',NULL,'Inner Mongolia'),(1928,'Handan','CHN',NULL,'Hebei'),(1929,'Wuxi','CHN',NULL,'Jiangsu'),(1930,'Xuzhou','CHN',NULL,'Jiangsu'),(1931,'Datong','CHN',NULL,'Shanxi'),(1932,'Yichun','CHN',NULL,'Heilongjiang'),(1933,'Benxi','CHN',NULL,'Liaoning'),(1934,'Luoyang','CHN',NULL,'Henan'),(1935,'Suzhou','CHN',NULL,'Jiangsu'),(1936,'Xining','CHN',NULL,'Qinghai'),(1937,'Huainan','CHN',NULL,'Anhui'),(1938,'Jixi','CHN',NULL,'Heilongjiang'),(1939,'Daqing','CHN',NULL,'Heilongjiang'),(1940,'Fuxin','CHN',NULL,'Liaoning'),(1941,'Amoy [Xiamen]','CHN',NULL,'Fujian'),(1942,'Liuzhou','CHN',NULL,'Guangxi'),(1943,'Shantou','CHN',NULL,'Guangdong'),(1944,'Jinzhou','CHN',NULL,'Liaoning'),(1945,'Mudanjiang','CHN',NULL,'Heilongjiang'),(1946,'Yinchuan','CHN',NULL,'Ningxia'),(1947,'Changzhou','CHN',NULL,'Jiangsu'),(1948,'Zhangjiakou','CHN',NULL,'Hebei'),(1949,'Dandong','CHN',NULL,'Liaoning'),(1950,'Hegang','CHN',NULL,'Heilongjiang'),(1951,'Kaifeng','CHN',NULL,'Henan'),(1952,'Jiamusi','CHN',NULL,'Heilongjiang'),(1953,'Liaoyang','CHN',NULL,'Liaoning'),(1954,'Hengyang','CHN',NULL,'Hunan'),(1955,'Baoding','CHN',NULL,'Hebei'),(1956,'Hunjiang','CHN',NULL,'Jilin'),(1957,'Xinxiang','CHN',NULL,'Henan'),(1958,'Huangshi','CHN',NULL,'Hubei'),(1959,'Haikou','CHN',NULL,'Hainan'),(1960,'Yantai','CHN',NULL,'Shandong'),(1961,'Bengbu','CHN',NULL,'Anhui'),(1962,'Xiangtan','CHN',NULL,'Hunan'),(1963,'Weifang','CHN',NULL,'Shandong'),(1964,'Wuhu','CHN',NULL,'Anhui'),(1965,'Pingxiang','CHN',NULL,'Jiangxi'),(1966,'Yingkou','CHN',NULL,'Liaoning'),(1967,'Anyang','CHN',NULL,'Henan'),(1968,'Panzhihua','CHN',NULL,'Sichuan'),(1969,'Pingdingshan','CHN',NULL,'Henan'),(1970,'Xiangfan','CHN',NULL,'Hubei'),(1971,'Zhuzhou','CHN',NULL,'Hunan'),(1972,'Jiaozuo','CHN',NULL,'Henan'),(1973,'Wenzhou','CHN',NULL,'Zhejiang'),(1974,'Zhangjiang','CHN',NULL,'Guangdong'),(1975,'Zigong','CHN',NULL,'Sichuan'),(1976,'Shuangyashan','CHN',NULL,'Heilongjiang'),(1977,'Zaozhuang','CHN',NULL,'Shandong'),(1978,'Yakeshi','CHN',NULL,'Inner Mongolia'),(1979,'Yichang','CHN',NULL,'Hubei'),(1980,'Zhenjiang','CHN',NULL,'Jiangsu'),(1981,'Huaibei','CHN',NULL,'Anhui'),(1982,'Qinhuangdao','CHN',NULL,'Hebei'),(1983,'Guilin','CHN',NULL,'Guangxi'),(1984,'Liupanshui','CHN',NULL,'Guizhou'),(1985,'Panjin','CHN',NULL,'Liaoning'),(1986,'Yangquan','CHN',NULL,'Shanxi'),(1987,'Jinxi','CHN',NULL,'Liaoning'),(1988,'Liaoyuan','CHN',NULL,'Jilin'),(1989,'Lianyungang','CHN',NULL,'Jiangsu'),(1990,'Xianyang','CHN',NULL,'Shaanxi'),(1991,'TaiÂ´an','CHN',NULL,'Shandong'),(1992,'Chifeng','CHN',NULL,'Inner Mongolia'),(1993,'Shaoguan','CHN',NULL,'Guangdong'),(1994,'Nantong','CHN',NULL,'Jiangsu'),(1995,'Leshan','CHN',NULL,'Sichuan'),(1996,'Baoji','CHN',NULL,'Shaanxi'),(1997,'Linyi','CHN',NULL,'Shandong'),(1998,'Tonghua','CHN',NULL,'Jilin'),(1999,'Siping','CHN',NULL,'Jilin'),(2000,'Changzhi','CHN',NULL,'Shanxi'),(2001,'Tengzhou','CHN',NULL,'Shandong'),(2002,'Chaozhou','CHN',NULL,'Guangdong'),(2003,'Yangzhou','CHN',NULL,'Jiangsu'),(2004,'Dongwan','CHN',NULL,'Guangdong'),(2005,'MaÂ´anshan','CHN',NULL,'Anhui'),(2006,'Foshan','CHN',NULL,'Guangdong'),(2007,'Yueyang','CHN',NULL,'Hunan'),(2008,'Xingtai','CHN',NULL,'Hebei'),(2009,'Changde','CHN',NULL,'Hunan'),(2010,'Shihezi','CHN',NULL,'Xinxiang'),(2011,'Yancheng','CHN',NULL,'Jiangsu'),(2012,'Jiujiang','CHN',NULL,'Jiangxi'),(2013,'Dongying','CHN',NULL,'Shandong'),(2014,'Shashi','CHN',NULL,'Hubei'),(2015,'Xintai','CHN',NULL,'Shandong'),(2016,'Jingdezhen','CHN',NULL,'Jiangxi'),(2017,'Tongchuan','CHN',NULL,'Shaanxi'),(2018,'Zhongshan','CHN',NULL,'Guangdong'),(2019,'Shiyan','CHN',NULL,'Hubei'),(2020,'Tieli','CHN',NULL,'Heilongjiang'),(2021,'Jining','CHN',NULL,'Shandong'),(2022,'Wuhai','CHN',NULL,'Inner Mongolia'),(2023,'Mianyang','CHN',NULL,'Sichuan'),(2024,'Luzhou','CHN',NULL,'Sichuan'),(2025,'Zunyi','CHN',NULL,'Guizhou'),(2026,'Shizuishan','CHN',NULL,'Ningxia'),(2027,'Neijiang','CHN',NULL,'Sichuan'),(2028,'Tongliao','CHN',NULL,'Inner Mongolia'),(2029,'Tieling','CHN',NULL,'Liaoning'),(2030,'Wafangdian','CHN',NULL,'Liaoning'),(2031,'Anqing','CHN',NULL,'Anhui'),(2032,'Shaoyang','CHN',NULL,'Hunan'),(2033,'Laiwu','CHN',NULL,'Shandong'),(2034,'Chengde','CHN',NULL,'Hebei'),(2035,'Tianshui','CHN',NULL,'Gansu'),(2036,'Nanyang','CHN',NULL,'Henan'),(2037,'Cangzhou','CHN',NULL,'Hebei'),(2038,'Yibin','CHN',NULL,'Sichuan'),(2039,'Huaiyin','CHN',NULL,'Jiangsu'),(2040,'Dunhua','CHN',NULL,'Jilin'),(2041,'Yanji','CHN',NULL,'Jilin'),(2042,'Jiangmen','CHN',NULL,'Guangdong'),(2043,'Tongling','CHN',NULL,'Anhui'),(2044,'Suihua','CHN',NULL,'Heilongjiang'),(2045,'Gongziling','CHN',NULL,'Jilin'),(2046,'Xiantao','CHN',NULL,'Hubei'),(2047,'Chaoyang','CHN',NULL,'Liaoning'),(2048,'Ganzhou','CHN',NULL,'Jiangxi'),(2049,'Huzhou','CHN',NULL,'Zhejiang'),(2050,'Baicheng','CHN',NULL,'Jilin'),(2051,'Shangzi','CHN',NULL,'Heilongjiang'),(2052,'Yangjiang','CHN',NULL,'Guangdong'),(2053,'Qitaihe','CHN',NULL,'Heilongjiang'),(2054,'Gejiu','CHN',NULL,'Yunnan'),(2055,'Jiangyin','CHN',NULL,'Jiangsu'),(2056,'Hebi','CHN',NULL,'Henan'),(2057,'Jiaxing','CHN',NULL,'Zhejiang'),(2058,'Wuzhou','CHN',NULL,'Guangxi'),(2059,'Meihekou','CHN',NULL,'Jilin'),(2060,'Xuchang','CHN',NULL,'Henan'),(2061,'Liaocheng','CHN',NULL,'Shandong'),(2062,'Haicheng','CHN',NULL,'Liaoning'),(2063,'Qianjiang','CHN',NULL,'Hubei'),(2064,'Baiyin','CHN',NULL,'Gansu'),(2065,'BeiÂ´an','CHN',NULL,'Heilongjiang'),(2066,'Yixing','CHN',NULL,'Jiangsu'),(2067,'Laizhou','CHN',NULL,'Shandong'),(2068,'Qaramay','CHN',NULL,'Xinxiang'),(2069,'Acheng','CHN',NULL,'Heilongjiang'),(2070,'Dezhou','CHN',NULL,'Shandong'),(2071,'Nanping','CHN',NULL,'Fujian'),(2072,'Zhaoqing','CHN',NULL,'Guangdong'),(2073,'Beipiao','CHN',NULL,'Liaoning'),(2074,'Fengcheng','CHN',NULL,'Jiangxi'),(2075,'Fuyu','CHN',NULL,'Jilin'),(2076,'Xinyang','CHN',NULL,'Henan'),(2077,'Dongtai','CHN',NULL,'Jiangsu'),(2078,'Yuci','CHN',NULL,'Shanxi'),(2079,'Honghu','CHN',NULL,'Hubei'),(2080,'Ezhou','CHN',NULL,'Hubei'),(2081,'Heze','CHN',NULL,'Shandong'),(2082,'Daxian','CHN',NULL,'Sichuan'),(2083,'Linfen','CHN',NULL,'Shanxi'),(2084,'Tianmen','CHN',NULL,'Hubei'),(2085,'Yiyang','CHN',NULL,'Hunan'),(2086,'Quanzhou','CHN',NULL,'Fujian'),(2087,'Rizhao','CHN',NULL,'Shandong'),(2088,'Deyang','CHN',NULL,'Sichuan'),(2089,'Guangyuan','CHN',NULL,'Sichuan'),(2090,'Changshu','CHN',NULL,'Jiangsu'),(2091,'Zhangzhou','CHN',NULL,'Fujian'),(2092,'Hailar','CHN',NULL,'Inner Mongolia'),(2093,'Nanchong','CHN',NULL,'Sichuan'),(2094,'Jiutai','CHN',NULL,'Jilin'),(2095,'Zhaodong','CHN',NULL,'Heilongjiang'),(2096,'Shaoxing','CHN',NULL,'Zhejiang'),(2097,'Fuyang','CHN',NULL,'Anhui'),(2098,'Maoming','CHN',NULL,'Guangdong'),(2099,'Qujing','CHN',NULL,'Yunnan'),(2100,'Ghulja','CHN',NULL,'Xinxiang'),(2101,'Jiaohe','CHN',NULL,'Jilin'),(2102,'Puyang','CHN',NULL,'Henan'),(2103,'Huadian','CHN',NULL,'Jilin'),(2104,'Jiangyou','CHN',NULL,'Sichuan'),(2105,'Qashqar','CHN',NULL,'Xinxiang'),(2106,'Anshun','CHN',NULL,'Guizhou'),(2107,'Fuling','CHN',NULL,'Sichuan'),(2108,'Xinyu','CHN',NULL,'Jiangxi'),(2109,'Hanzhong','CHN',NULL,'Shaanxi'),(2110,'Danyang','CHN',NULL,'Jiangsu'),(2111,'Chenzhou','CHN',NULL,'Hunan'),(2112,'Xiaogan','CHN',NULL,'Hubei'),(2113,'Shangqiu','CHN',NULL,'Henan'),(2114,'Zhuhai','CHN',NULL,'Guangdong'),(2115,'Qingyuan','CHN',NULL,'Guangdong'),(2116,'Aqsu','CHN',NULL,'Xinxiang'),(2117,'Jining','CHN',NULL,'Inner Mongolia'),(2118,'Xiaoshan','CHN',NULL,'Zhejiang'),(2119,'Zaoyang','CHN',NULL,'Hubei'),(2120,'Xinghua','CHN',NULL,'Jiangsu'),(2121,'Hami','CHN',NULL,'Xinxiang'),(2122,'Huizhou','CHN',NULL,'Guangdong'),(2123,'Jinmen','CHN',NULL,'Hubei'),(2124,'Sanming','CHN',NULL,'Fujian'),(2125,'Ulanhot','CHN',NULL,'Inner Mongolia'),(2126,'Korla','CHN',NULL,'Xinxiang'),(2127,'Wanxian','CHN',NULL,'Sichuan'),(2128,'RuiÂ´an','CHN',NULL,'Zhejiang'),(2129,'Zhoushan','CHN',NULL,'Zhejiang'),(2130,'Liangcheng','CHN',NULL,'Shandong'),(2131,'Jiaozhou','CHN',NULL,'Shandong'),(2132,'Taizhou','CHN',NULL,'Jiangsu'),(2133,'Suzhou','CHN',NULL,'Anhui'),(2134,'Yichun','CHN',NULL,'Jiangxi'),(2135,'Taonan','CHN',NULL,'Jilin'),(2136,'Pingdu','CHN',NULL,'Shandong'),(2137,'JiÂ´an','CHN',NULL,'Jiangxi'),(2138,'Longkou','CHN',NULL,'Shandong'),(2139,'Langfang','CHN',NULL,'Hebei'),(2140,'Zhoukou','CHN',NULL,'Henan'),(2141,'Suining','CHN',NULL,'Sichuan'),(2142,'Yulin','CHN',NULL,'Guangxi'),(2143,'Jinhua','CHN',NULL,'Zhejiang'),(2144,'LiuÂ´an','CHN',NULL,'Anhui'),(2145,'Shuangcheng','CHN',NULL,'Heilongjiang'),(2146,'Suizhou','CHN',NULL,'Hubei'),(2147,'Ankang','CHN',NULL,'Shaanxi'),(2148,'Weinan','CHN',NULL,'Shaanxi'),(2149,'Longjing','CHN',NULL,'Jilin'),(2150,'DaÂ´an','CHN',NULL,'Jilin'),(2151,'Lengshuijiang','CHN',NULL,'Hunan'),(2152,'Laiyang','CHN',NULL,'Shandong'),(2153,'Xianning','CHN',NULL,'Hubei'),(2154,'Dali','CHN',NULL,'Yunnan'),(2155,'Anda','CHN',NULL,'Heilongjiang'),(2156,'Jincheng','CHN',NULL,'Shanxi'),(2157,'Longyan','CHN',NULL,'Fujian'),(2158,'Xichang','CHN',NULL,'Sichuan'),(2159,'Wendeng','CHN',NULL,'Shandong'),(2160,'Hailun','CHN',NULL,'Heilongjiang'),(2161,'Binzhou','CHN',NULL,'Shandong'),(2162,'Linhe','CHN',NULL,'Inner Mongolia'),(2163,'Wuwei','CHN',NULL,'Gansu'),(2164,'Duyun','CHN',NULL,'Guizhou'),(2165,'Mishan','CHN',NULL,'Heilongjiang'),(2166,'Shangrao','CHN',NULL,'Jiangxi'),(2167,'Changji','CHN',NULL,'Xinxiang'),(2168,'Meixian','CHN',NULL,'Guangdong'),(2169,'Yushu','CHN',NULL,'Jilin'),(2170,'Tiefa','CHN',NULL,'Liaoning'),(2171,'HuaiÂ´an','CHN',NULL,'Jiangsu'),(2172,'Leiyang','CHN',NULL,'Hunan'),(2173,'Zalantun','CHN',NULL,'Inner Mongolia'),(2174,'Weihai','CHN',NULL,'Shandong'),(2175,'Loudi','CHN',NULL,'Hunan'),(2176,'Qingzhou','CHN',NULL,'Shandong'),(2177,'Qidong','CHN',NULL,'Jiangsu'),(2178,'Huaihua','CHN',NULL,'Hunan'),(2179,'Luohe','CHN',NULL,'Henan'),(2180,'Chuzhou','CHN',NULL,'Anhui'),(2181,'Kaiyuan','CHN',NULL,'Liaoning'),(2182,'Linqing','CHN',NULL,'Shandong'),(2183,'Chaohu','CHN',NULL,'Anhui'),(2184,'Laohekou','CHN',NULL,'Hubei'),(2185,'Dujiangyan','CHN',NULL,'Sichuan'),(2186,'Zhumadian','CHN',NULL,'Henan'),(2187,'Linchuan','CHN',NULL,'Jiangxi'),(2188,'Jiaonan','CHN',NULL,'Shandong'),(2189,'Sanmenxia','CHN',NULL,'Henan'),(2190,'Heyuan','CHN',NULL,'Guangdong'),(2191,'Manzhouli','CHN',NULL,'Inner Mongolia'),(2192,'Lhasa','CHN',NULL,'Tibet'),(2193,'Lianyuan','CHN',NULL,'Hunan'),(2194,'Kuytun','CHN',NULL,'Xinxiang'),(2195,'Puqi','CHN',NULL,'Hubei'),(2196,'Hongjiang','CHN',NULL,'Hunan'),(2197,'Qinzhou','CHN',NULL,'Guangxi'),(2198,'Renqiu','CHN',NULL,'Hebei'),(2199,'Yuyao','CHN',NULL,'Zhejiang'),(2200,'Guigang','CHN',NULL,'Guangxi'),(2201,'Kaili','CHN',NULL,'Guizhou'),(2202,'YanÂ´an','CHN',NULL,'Shaanxi'),(2203,'Beihai','CHN',NULL,'Guangxi'),(2204,'Xuangzhou','CHN',NULL,'Anhui'),(2205,'Quzhou','CHN',NULL,'Zhejiang'),(2206,'YongÂ´an','CHN',NULL,'Fujian'),(2207,'Zixing','CHN',NULL,'Hunan'),(2208,'Liyang','CHN',NULL,'Jiangsu'),(2209,'Yizheng','CHN',NULL,'Jiangsu'),(2210,'Yumen','CHN',NULL,'Gansu'),(2211,'Liling','CHN',NULL,'Hunan'),(2212,'Yuncheng','CHN',NULL,'Shanxi'),(2213,'Shanwei','CHN',NULL,'Guangdong'),(2214,'Cixi','CHN',NULL,'Zhejiang'),(2215,'Yuanjiang','CHN',NULL,'Hunan'),(2216,'Bozhou','CHN',NULL,'Anhui'),(2217,'Jinchang','CHN',NULL,'Gansu'),(2218,'FuÂ´an','CHN',NULL,'Fujian'),(2219,'Suqian','CHN',NULL,'Jiangsu'),(2220,'Shishou','CHN',NULL,'Hubei'),(2221,'Hengshui','CHN',NULL,'Hebei'),(2222,'Danjiangkou','CHN',NULL,'Hubei'),(2223,'Fujin','CHN',NULL,'Heilongjiang'),(2224,'Sanya','CHN',NULL,'Hainan'),(2225,'Guangshui','CHN',NULL,'Hubei'),(2226,'Huangshan','CHN',NULL,'Anhui'),(2227,'Xingcheng','CHN',NULL,'Liaoning'),(2228,'Zhucheng','CHN',NULL,'Shandong'),(2229,'Kunshan','CHN',NULL,'Jiangsu'),(2230,'Haining','CHN',NULL,'Zhejiang'),(2231,'Pingliang','CHN',NULL,'Gansu'),(2232,'Fuqing','CHN',NULL,'Fujian'),(2233,'Xinzhou','CHN',NULL,'Shanxi'),(2234,'Jieyang','CHN',NULL,'Guangdong'),(2235,'Zhangjiagang','CHN',NULL,'Jiangsu'),(2236,'Tong Xian','CHN',NULL,'Peking'),(2237,'YaÂ´an','CHN',NULL,'Sichuan'),(2238,'Jinzhou','CHN',NULL,'Liaoning'),(2239,'Emeishan','CHN',NULL,'Sichuan'),(2240,'Enshi','CHN',NULL,'Hubei'),(2241,'Bose','CHN',NULL,'Guangxi'),(2242,'Yuzhou','CHN',NULL,'Henan'),(2243,'Kaiyuan','CHN',NULL,'Yunnan'),(2244,'Tumen','CHN',NULL,'Jilin'),(2245,'Putian','CHN',NULL,'Fujian'),(2246,'Linhai','CHN',NULL,'Zhejiang'),(2247,'Xilin Hot','CHN',NULL,'Inner Mongolia'),(2248,'Shaowu','CHN',NULL,'Fujian'),(2249,'Junan','CHN',NULL,'Shandong'),(2250,'Huaying','CHN',NULL,'Sichuan'),(2251,'Pingyi','CHN',NULL,'Shandong'),(2252,'Huangyan','CHN',NULL,'Zhejiang'),(2253,'Bishkek','KGZ',NULL,'Bishkek shaary'),(2254,'Osh','KGZ',NULL,'Osh'),(2255,'Bikenibeu','KIR',NULL,'South Tarawa'),(2256,'Bairiki','KIR',NULL,'South Tarawa'),(2257,'SantafÃ© de BogotÃ¡','COL',1,'SantafÃ© de BogotÃ¡'),(2258,'Cali','COL',NULL,'Valle'),(2259,'MedellÃ­n','COL',2,'Antioquia'),(2260,'Barranquilla','COL',3,'AtlÃ¡ntico'),(2261,'Cartagena','COL',NULL,'BolÃ­var'),(2262,'CÃºcuta','COL',NULL,'Norte de Santander'),(2263,'Bucaramanga','COL',NULL,'Santander'),(2264,'IbaguÃ©','COL',NULL,'Tolima'),(2265,'Pereira','COL',NULL,'Risaralda'),(2266,'Santa Marta','COL',NULL,'Magdalena'),(2267,'Manizales','COL',NULL,'Caldas'),(2268,'Bello','COL',2,'Antioquia'),(2269,'Pasto','COL',NULL,'NariÃ±o'),(2270,'Neiva','COL',NULL,'Huila'),(2271,'Soledad','COL',3,'AtlÃ¡ntico'),(2272,'Armenia','COL',NULL,'QuindÃ­o'),(2273,'Villavicencio','COL',NULL,'Meta'),(2274,'Soacha','COL',1,'Cundinamarca'),(2275,'Valledupar','COL',NULL,'Cesar'),(2276,'MonterÃ­a','COL',NULL,'CÃ³rdoba'),(2277,'ItagÃ¼Ã­','COL',2,'Antioquia'),(2278,'Palmira','COL',NULL,'Valle'),(2279,'Buenaventura','COL',NULL,'Valle'),(2280,'Floridablanca','COL',NULL,'Santander'),(2281,'Sincelejo','COL',NULL,'Sucre'),(2282,'PopayÃ¡n','COL',NULL,'Cauca'),(2283,'Barrancabermeja','COL',NULL,'Santander'),(2284,'Dos Quebradas','COL',NULL,'Risaralda'),(2285,'TuluÃ¡','COL',NULL,'Valle'),(2286,'Envigado','COL',2,'Antioquia'),(2287,'Cartago','COL',NULL,'Valle'),(2288,'Girardot','COL',1,'Cundinamarca'),(2289,'Buga','COL',NULL,'Valle'),(2290,'Tunja','COL',NULL,'BoyacÃ¡'),(2291,'Florencia','COL',NULL,'CaquetÃ¡'),(2292,'Maicao','COL',NULL,'La Guajira'),(2293,'Sogamoso','COL',NULL,'BoyacÃ¡'),(2294,'Giron','COL',NULL,'Santander'),(2295,'Moroni','COM',NULL,'Njazidja'),(2296,'Brazzaville','COG',NULL,'Brazzaville'),(2297,'Pointe-Noire','COG',NULL,'Kouilou'),(2298,'Kinshasa','COD',NULL,'Kinshasa'),(2299,'Lubumbashi','COD',NULL,'Shaba'),(2300,'Mbuji-Mayi','COD',NULL,'East Kasai'),(2301,'Kolwezi','COD',NULL,'Shaba'),(2302,'Kisangani','COD',NULL,'Haute-ZaÃ¯re'),(2303,'Kananga','COD',NULL,'West Kasai'),(2304,'Likasi','COD',NULL,'Shaba'),(2305,'Bukavu','COD',NULL,'South Kivu'),(2306,'Kikwit','COD',NULL,'Bandundu'),(2307,'Tshikapa','COD',NULL,'West Kasai'),(2308,'Matadi','COD',NULL,'Bas-ZaÃ¯re'),(2309,'Mbandaka','COD',NULL,'Equateur'),(2310,'Mwene-Ditu','COD',NULL,'East Kasai'),(2311,'Boma','COD',NULL,'Bas-ZaÃ¯re'),(2312,'Uvira','COD',NULL,'South Kivu'),(2313,'Butembo','COD',NULL,'North Kivu'),(2314,'Goma','COD',NULL,'North Kivu'),(2315,'Kalemie','COD',NULL,'Shaba'),(2316,'Bantam','CCK',NULL,'Home Island'),(2317,'West Island','CCK',NULL,'West Island'),(2318,'Pyongyang','PRK',NULL,'Pyongyang-si'),(2319,'Hamhung','PRK',NULL,'Hamgyong N'),(2320,'Chongjin','PRK',NULL,'Hamgyong P'),(2321,'Nampo','PRK',NULL,'Nampo-si'),(2322,'Sinuiju','PRK',NULL,'Pyongan P'),(2323,'Wonsan','PRK',NULL,'Kangwon'),(2324,'Phyongsong','PRK',NULL,'Pyongan N'),(2325,'Sariwon','PRK',NULL,'Hwanghae P'),(2326,'Haeju','PRK',NULL,'Hwanghae N'),(2327,'Kanggye','PRK',NULL,'Chagang'),(2328,'Kimchaek','PRK',NULL,'Hamgyong P'),(2329,'Hyesan','PRK',NULL,'Yanggang'),(2330,'Kaesong','PRK',NULL,'Kaesong-si'),(2331,'Seoul','KOR',NULL,'Seoul'),(2332,'Pusan','KOR',NULL,'Pusan'),(2333,'Inchon','KOR',NULL,'Inchon'),(2334,'Taegu','KOR',NULL,'Taegu'),(2335,'Taejon','KOR',NULL,'Taejon'),(2336,'Kwangju','KOR',NULL,'Kwangju'),(2337,'Ulsan','KOR',NULL,'Kyongsangnam'),(2338,'Songnam','KOR',NULL,'Kyonggi'),(2339,'Puchon','KOR',NULL,'Kyonggi'),(2340,'Suwon','KOR',NULL,'Kyonggi'),(2341,'Anyang','KOR',NULL,'Kyonggi'),(2342,'Chonju','KOR',NULL,'Chollabuk'),(2343,'Chongju','KOR',NULL,'Chungchongbuk'),(2344,'Koyang','KOR',NULL,'Kyonggi'),(2345,'Ansan','KOR',NULL,'Kyonggi'),(2346,'Pohang','KOR',NULL,'Kyongsangbuk'),(2347,'Chang-won','KOR',NULL,'Kyongsangnam'),(2348,'Masan','KOR',NULL,'Kyongsangnam'),(2349,'Kwangmyong','KOR',NULL,'Kyonggi'),(2350,'Chonan','KOR',NULL,'Chungchongnam'),(2351,'Chinju','KOR',NULL,'Kyongsangnam'),(2352,'Iksan','KOR',NULL,'Chollabuk'),(2353,'Pyongtaek','KOR',NULL,'Kyonggi'),(2354,'Kumi','KOR',NULL,'Kyongsangbuk'),(2355,'Uijongbu','KOR',NULL,'Kyonggi'),(2356,'Kyongju','KOR',NULL,'Kyongsangbuk'),(2357,'Kunsan','KOR',NULL,'Chollabuk'),(2358,'Cheju','KOR',NULL,'Cheju'),(2359,'Kimhae','KOR',NULL,'Kyongsangnam'),(2360,'Sunchon','KOR',NULL,'Chollanam'),(2361,'Mokpo','KOR',NULL,'Chollanam'),(2362,'Yong-in','KOR',NULL,'Kyonggi'),(2363,'Wonju','KOR',NULL,'Kang-won'),(2364,'Kunpo','KOR',NULL,'Kyonggi'),(2365,'Chunchon','KOR',NULL,'Kang-won'),(2366,'Namyangju','KOR',NULL,'Kyonggi'),(2367,'Kangnung','KOR',NULL,'Kang-won'),(2368,'Chungju','KOR',NULL,'Chungchongbuk'),(2369,'Andong','KOR',NULL,'Kyongsangbuk'),(2370,'Yosu','KOR',NULL,'Chollanam'),(2371,'Kyongsan','KOR',NULL,'Kyongsangbuk'),(2372,'Paju','KOR',NULL,'Kyonggi'),(2373,'Yangsan','KOR',NULL,'Kyongsangnam'),(2374,'Ichon','KOR',NULL,'Kyonggi'),(2375,'Asan','KOR',NULL,'Chungchongnam'),(2376,'Koje','KOR',NULL,'Kyongsangnam'),(2377,'Kimchon','KOR',NULL,'Kyongsangbuk'),(2378,'Nonsan','KOR',NULL,'Chungchongnam'),(2379,'Kuri','KOR',NULL,'Kyonggi'),(2380,'Chong-up','KOR',NULL,'Chollabuk'),(2381,'Chechon','KOR',NULL,'Chungchongbuk'),(2382,'Sosan','KOR',NULL,'Chungchongnam'),(2383,'Shihung','KOR',NULL,'Kyonggi'),(2384,'Tong-yong','KOR',NULL,'Kyongsangnam'),(2385,'Kongju','KOR',NULL,'Chungchongnam'),(2386,'Yongju','KOR',NULL,'Kyongsangbuk'),(2387,'Chinhae','KOR',NULL,'Kyongsangnam'),(2388,'Sangju','KOR',NULL,'Kyongsangbuk'),(2389,'Poryong','KOR',NULL,'Chungchongnam'),(2390,'Kwang-yang','KOR',NULL,'Chollanam'),(2391,'Miryang','KOR',NULL,'Kyongsangnam'),(2392,'Hanam','KOR',NULL,'Kyonggi'),(2393,'Kimje','KOR',NULL,'Chollabuk'),(2394,'Yongchon','KOR',NULL,'Kyongsangbuk'),(2395,'Sachon','KOR',NULL,'Kyongsangnam'),(2396,'Uiwang','KOR',NULL,'Kyonggi'),(2397,'Naju','KOR',NULL,'Chollanam'),(2398,'Namwon','KOR',NULL,'Chollabuk'),(2399,'Tonghae','KOR',NULL,'Kang-won'),(2400,'Mun-gyong','KOR',NULL,'Kyongsangbuk'),(2401,'Athenai','GRC',NULL,'Attika'),(2402,'Thessaloniki','GRC',NULL,'Central Macedonia'),(2403,'Pireus','GRC',NULL,'Attika'),(2404,'Patras','GRC',NULL,'West Greece'),(2405,'Peristerion','GRC',NULL,'Attika'),(2406,'Herakleion','GRC',NULL,'Crete'),(2407,'Kallithea','GRC',NULL,'Attika'),(2408,'Larisa','GRC',NULL,'Thessalia'),(2409,'Zagreb','HRV',NULL,'Grad Zagreb'),(2410,'Split','HRV',NULL,'Split-Dalmatia'),(2411,'Rijeka','HRV',NULL,'Primorje-Gorski Kota'),(2412,'Osijek','HRV',NULL,'Osijek-Baranja'),(2413,'La Habana','CUB',NULL,'La Habana'),(2414,'Santiago de Cuba','CUB',NULL,'Santiago de Cuba'),(2415,'CamagÃ¼ey','CUB',NULL,'CamagÃ¼ey'),(2416,'HolguÃ­n','CUB',NULL,'HolguÃ­n'),(2417,'Santa Clara','CUB',NULL,'Villa Clara'),(2418,'GuantÃ¡namo','CUB',NULL,'GuantÃ¡namo'),(2419,'Pinar del RÃ­o','CUB',NULL,'Pinar del RÃ­o'),(2420,'Bayamo','CUB',NULL,'Granma'),(2421,'Cienfuegos','CUB',NULL,'Cienfuegos'),(2422,'Victoria de las Tunas','CUB',NULL,'Las Tunas'),(2423,'Matanzas','CUB',NULL,'Matanzas'),(2424,'Manzanillo','CUB',NULL,'Granma'),(2425,'Sancti-SpÃ­ritus','CUB',NULL,'Sancti-SpÃ­ritus'),(2426,'Ciego de Ãvila','CUB',NULL,'Ciego de Ãvila'),(2427,'al-Salimiya','KWT',NULL,'Hawalli'),(2428,'Jalib al-Shuyukh','KWT',NULL,'Hawalli'),(2429,'Kuwait','KWT',NULL,'al-Asima'),(2430,'Nicosia','CYP',NULL,'Nicosia'),(2431,'Limassol','CYP',NULL,'Limassol'),(2432,'Vientiane','LAO',NULL,'Viangchan'),(2433,'Savannakhet','LAO',NULL,'Savannakhet'),(2434,'Riga','LVA',NULL,'Riika'),(2435,'Daugavpils','LVA',NULL,'Daugavpils'),(2436,'Liepaja','LVA',NULL,'Liepaja'),(2437,'Maseru','LSO',NULL,'Maseru'),(2438,'Beirut','LBN',NULL,'Beirut'),(2439,'Tripoli','LBN',NULL,'al-Shamal'),(2440,'Monrovia','LBR',NULL,'Montserrado'),(2441,'Tripoli','LBY',NULL,'Tripoli'),(2442,'Bengasi','LBY',NULL,'Bengasi'),(2443,'Misrata','LBY',NULL,'Misrata'),(2444,'al-Zawiya','LBY',NULL,'al-Zawiya'),(2445,'Schaan','LIE',NULL,'Schaan'),(2446,'Vaduz','LIE',NULL,'Vaduz'),(2447,'Vilnius','LTU',NULL,'Vilna'),(2448,'Kaunas','LTU',NULL,'Kaunas'),(2449,'Klaipeda','LTU',NULL,'Klaipeda'),(2450,'Å iauliai','LTU',NULL,'Å iauliai'),(2451,'Panevezys','LTU',NULL,'Panevezys'),(2452,'Luxembourg [Luxemburg/LÃ«tzebuerg]','LUX',NULL,'Luxembourg'),(2453,'El-AaiÃºn','ESH',NULL,'El-AaiÃºn'),(2454,'Macao','MAC',NULL,'Macau'),(2455,'Antananarivo','MDG',NULL,'Antananarivo'),(2456,'Toamasina','MDG',NULL,'Toamasina'),(2457,'AntsirabÃ©','MDG',NULL,'Antananarivo'),(2458,'Mahajanga','MDG',NULL,'Mahajanga'),(2459,'Fianarantsoa','MDG',NULL,'Fianarantsoa'),(2460,'Skopje','MKD',NULL,'Skopje'),(2461,'Blantyre','MWI',NULL,'Blantyre'),(2462,'Lilongwe','MWI',NULL,'Lilongwe'),(2463,'Male','MDV',NULL,'Maale'),(2464,'Kuala Lumpur','MYS',NULL,'Wilayah Persekutuan'),(2465,'Ipoh','MYS',NULL,'Perak'),(2466,'Johor Baharu','MYS',NULL,'Johor'),(2467,'Petaling Jaya','MYS',NULL,'Selangor'),(2468,'Kelang','MYS',NULL,'Selangor'),(2469,'Kuala Terengganu','MYS',NULL,'Terengganu'),(2470,'Pinang','MYS',NULL,'Pulau Pinang'),(2471,'Kota Bharu','MYS',NULL,'Kelantan'),(2472,'Kuantan','MYS',NULL,'Pahang'),(2473,'Taiping','MYS',NULL,'Perak'),(2474,'Seremban','MYS',NULL,'Negeri\n Sembilan'),(2475,'Kuching','MYS',NULL,'Sarawak'),(2476,'Sibu','MYS',NULL,'Sarawak'),(2477,'Sandakan','MYS',NULL,'Sabah'),(2478,'Alor Setar','MYS',NULL,'Kedah'),(2479,'Selayang Baru','MYS',NULL,'Selangor'),(2480,'Sungai Petani','MYS',NULL,'Kedah'),(2481,'Shah Alam','MYS',NULL,'Selangor'),(2482,'Bamako','MLI',NULL,'Bamako'),(2483,'Birkirkara','MLT',NULL,'Outer Harbour'),(2484,'Valletta','MLT',NULL,'Inner Harbour'),(2485,'Casablanca','MAR',NULL,'Casablanca'),(2486,'Rabat','MAR',NULL,'Rabat-SalÃ©-Zammour-'),(2487,'Marrakech','MAR',NULL,'Marrakech-Tensift-Al'),(2488,'FÃ¨s','MAR',NULL,'FÃ¨s-Boulemane'),(2489,'Tanger','MAR',NULL,'Tanger-TÃ©touan'),(2490,'SalÃ©','MAR',NULL,'Rabat-SalÃ©-Zammour-'),(2491,'MeknÃ¨s','MAR',NULL,'MeknÃ¨s-Tafilalet'),(2492,'Oujda','MAR',NULL,'Oriental'),(2493,'KÃ©nitra','MAR',NULL,'Gharb-Chrarda-BÃ©ni'),(2494,'TÃ©touan','MAR',NULL,'Tanger-TÃ©touan'),(2495,'Safi','MAR',NULL,'Doukkala-Abda'),(2496,'Agadir','MAR',NULL,'Souss Massa-DraÃ¢'),(2497,'Mohammedia','MAR',NULL,'Casablanca'),(2498,'Khouribga','MAR',NULL,'Chaouia-Ouardigha'),(2499,'Beni-Mellal','MAR',NULL,'Tadla-Azilal'),(2500,'TÃ©mara','MAR',NULL,'Rabat-SalÃ©-Zammour-'),(2501,'El Jadida','MAR',NULL,'Doukkala-Abda'),(2502,'Nador','MAR',NULL,'Oriental'),(2503,'Ksar el Kebir','MAR',NULL,'Tanger-TÃ©touan'),(2504,'Settat','MAR',NULL,'Chaouia-Ouardigha'),(2505,'Taza','MAR',NULL,'Taza-Al Hoceima-Taou'),(2506,'El Araich','MAR',NULL,'Tanger-TÃ©touan'),(2507,'Dalap-Uliga-Darrit','MHL',NULL,'Majuro'),(2508,'Fort-de-France','MTQ',NULL,'Fort-de-France'),(2509,'Nouakchott','MRT',NULL,'Nouakchott'),(2510,'NouÃ¢dhibou','MRT',NULL,'Dakhlet NouÃ¢dhibou'),(2511,'Port-Louis','MUS',NULL,'Port-Louis'),(2512,'Beau Bassin-Rose Hill','MUS',NULL,'Plaines Wilhelms'),(2513,'Vacoas-Phoenix','MUS',NULL,'Plaines Wilhelms'),(2514,'Mamoutzou','MYT',NULL,'Mamoutzou'),(2515,'Ciudad de MÃ©xico','MEX',NULL,'Distrito Federal'),(2516,'Guadalajara','MEX',NULL,'Jalisco'),(2517,'Ecatepec de Morelos','MEX',NULL,'MÃ©xico'),(2518,'Puebla','MEX',NULL,'Puebla'),(2519,'NezahualcÃ³yotl','MEX',NULL,'MÃ©xico'),(2520,'JuÃ¡rez','MEX',NULL,'Chihuahua'),(2521,'Tijuana','MEX',NULL,'Baja California'),(2522,'LeÃ³n','MEX',NULL,'Guanajuato'),(2523,'Monterrey','MEX',NULL,'Nuevo LeÃ³n'),(2524,'Zapopan','MEX',NULL,'Jalisco'),(2525,'Naucalpan de JuÃ¡rez','MEX',NULL,'MÃ©xico'),(2526,'Mexicali','MEX',NULL,'Baja California'),(2527,'CuliacÃ¡n','MEX',NULL,'Sinaloa'),(2528,'Acapulco de JuÃ¡rez','MEX',NULL,'Guerrero'),(2529,'Tlalnepantla de Baz','MEX',NULL,'MÃ©xico'),(2530,'MÃ©rida','MEX',NULL,'YucatÃ¡n'),(2531,'Chihuahua','MEX',NULL,'Chihuahua'),(2532,'San Luis PotosÃ­','MEX',NULL,'San Luis PotosÃ­'),(2533,'Guadalupe','MEX',NULL,'Nuevo LeÃ³n'),(2534,'Toluca','MEX',NULL,'MÃ©xico'),(2535,'Aguascalientes','MEX',NULL,'Aguascalientes'),(2536,'QuerÃ©taro','MEX',NULL,'QuerÃ©taro de Arteag'),(2537,'Morelia','MEX',NULL,'MichoacÃ¡n de Ocampo'),(2538,'Hermosillo','MEX',NULL,'Sonora'),(2539,'Saltillo','MEX',NULL,'Coahuila de Zaragoza'),(2540,'TorreÃ³n','MEX',NULL,'Coahuila de Zaragoza'),(2541,'Centro (Villahermosa)','MEX',NULL,'Tabasco'),(2542,'San NicolÃ¡s de los Garza','MEX',NULL,'Nuevo LeÃ³n'),(2543,'Durango','MEX',NULL,'Durango'),(2544,'ChimalhuacÃ¡n','MEX',NULL,'MÃ©xico'),(2545,'Tlaquepaque','MEX',NULL,'Jalisco'),(2546,'AtizapÃ¡n de Zaragoza','MEX',NULL,'MÃ©xico'),(2547,'Veracruz','MEX',NULL,'Veracruz'),(2548,'CuautitlÃ¡n Izcalli','MEX',NULL,'MÃ©xico'),(2549,'Irapuato','MEX',NULL,'Guanajuato'),(2550,'Tuxtla GutiÃ©rrez','MEX',NULL,'Chiapas'),(2551,'TultitlÃ¡n','MEX',NULL,'MÃ©xico'),(2552,'Reynosa','MEX',NULL,'Tamaulipas'),(2553,'Benito JuÃ¡rez','MEX',NULL,'Quintana Roo'),(2554,'Matamoros','MEX',NULL,'Tamaulipas'),(2555,'Xalapa','MEX',NULL,'Veracruz'),(2556,'Celaya','MEX',NULL,'Guanajuato'),(2557,'MazatlÃ¡n','MEX',NULL,'Sinaloa'),(2558,'Ensenada','MEX',NULL,'Baja California'),(2559,'Ahome','MEX',NULL,'Sinaloa'),(2560,'Cajeme','MEX',NULL,'Sonora'),(2561,'Cuernavaca','MEX',NULL,'Morelos'),(2562,'TonalÃ¡','MEX',NULL,'Jalisco'),(2563,'Valle de Chalco Solidaridad','MEX',NULL,'MÃ©xico'),(2564,'Nuevo Laredo','MEX',NULL,'Tamaulipas'),(2565,'Tepic','MEX',NULL,'Nayarit'),(2566,'Tampico','MEX',NULL,'Tamaulipas'),(2567,'Ixtapaluca','MEX',NULL,'MÃ©xico'),(2568,'Apodaca','MEX',NULL,'Nuevo LeÃ³n'),(2569,'Guasave','MEX',NULL,'Sinaloa'),(2570,'GÃ³mez Palacio','MEX',NULL,'Durango'),(2571,'Tapachula','MEX',NULL,'Chiapas'),(2572,'NicolÃ¡s Romero','MEX',NULL,'MÃ©xico'),(2573,'Coatzacoalcos','MEX',NULL,'Veracruz'),(2574,'Uruapan','MEX',NULL,'MichoacÃ¡n de Ocampo'),(2575,'Victoria','MEX',NULL,'Tamaulipas'),(2576,'Oaxaca de JuÃ¡rez','MEX',NULL,'Oaxaca'),(2577,'Coacalco de BerriozÃ¡bal','MEX',NULL,'MÃ©xico'),(2578,'Pachuca de Soto','MEX',NULL,'Hidalgo'),(2579,'General Escobedo','MEX',NULL,'Nuevo LeÃ³n'),(2580,'Salamanca','MEX',NULL,'Guanajuato'),(2581,'Santa Catarina','MEX',NULL,'Nuevo LeÃ³n'),(2582,'TehuacÃ¡n','MEX',NULL,'Puebla'),(2583,'Chalco','MEX',NULL,'MÃ©xico'),(2584,'CÃ¡rdenas','MEX',NULL,'Tabasco'),(2585,'Campeche','MEX',NULL,'Campeche'),(2586,'La Paz','MEX',NULL,'MÃ©xico'),(2587,'OthÃ³n P. Blanco (Chetumal)','MEX',NULL,'Quintana Roo'),(2588,'Texcoco','MEX',NULL,'MÃ©xico'),(2589,'La Paz','MEX',NULL,'Baja California Sur'),(2590,'Metepec','MEX',NULL,'MÃ©xico'),(2591,'Monclova','MEX',NULL,'Coahuila de Zaragoza'),(2592,'Huixquilucan','MEX',NULL,'MÃ©xico'),(2593,'Chilpancingo de los Bravo','MEX',NULL,'Guerrero'),(2594,'Puerto Vallarta','MEX',NULL,'Jalisco'),(2595,'Fresnillo','MEX',NULL,'Zacatecas'),(2596,'Ciudad Madero','MEX',NULL,'Tamaulipas'),(2597,'Soledad de Graciano SÃ¡nchez','MEX',NULL,'San Luis PotosÃ­'),(2598,'San Juan del RÃ­o','MEX',NULL,'QuerÃ©taro'),(2599,'San Felipe del Progreso','MEX',NULL,'MÃ©xico'),(2600,'CÃ³rdoba','MEX',NULL,'Veracruz'),(2601,'TecÃ¡mac','MEX',NULL,'MÃ©xico'),(2602,'Ocosingo','MEX',NULL,'Chiapas'),(2603,'Carmen','MEX',NULL,'Campeche'),(2604,'LÃ¡zaro CÃ¡rdenas','MEX',NULL,'MichoacÃ¡n de Ocampo'),(2605,'Jiutepec','MEX',NULL,'Morelos'),(2606,'Papantla','MEX',NULL,'Veracruz'),(2607,'Comalcalco','MEX',NULL,'Tabasco'),(2608,'Zamora','MEX',NULL,'MichoacÃ¡n de Ocampo'),(2609,'Nogales','MEX',NULL,'Sonora'),(2610,'Huimanguillo','MEX',NULL,'Tabasco'),(2611,'Cuautla','MEX',NULL,'Morelos'),(2612,'MinatitlÃ¡n','MEX',NULL,'Veracruz'),(2613,'Poza Rica de Hidalgo','MEX',NULL,'Veracruz'),(2614,'Ciudad Valles','MEX',NULL,'San Luis PotosÃ­'),(2615,'Navolato','MEX',NULL,'Sinaloa'),(2616,'San Luis RÃ­o Colorado','MEX',NULL,'Sonora'),(2617,'PÃ©njamo','MEX',NULL,'Guanajuato'),(2618,'San AndrÃ©s Tuxtla','MEX',NULL,'Veracruz'),(2619,'Guanajuato','MEX',NULL,'Guanajuato'),(2620,'Navojoa','MEX',NULL,'Sonora'),(2621,'ZitÃ¡cuaro','MEX',NULL,'MichoacÃ¡n de Ocampo'),(2622,'Boca del RÃ­o','MEX',NULL,'Veracruz-Llave'),(2623,'Allende','MEX',NULL,'Guanajuato'),(2624,'Silao','MEX',NULL,'Guanajuato'),(2625,'Macuspana','MEX',NULL,'Tabasco'),(2626,'San Juan Bautista Tuxtepec','MEX',NULL,'Oaxaca'),(2627,'San CristÃ³bal de las Casas','MEX',NULL,'Chiapas'),(2628,'Valle de Santiago','MEX',NULL,'Guanajuato'),(2629,'Guaymas','MEX',NULL,'Sonora'),(2630,'Colima','MEX',NULL,'Colima'),(2631,'Dolores Hidalgo','MEX',NULL,'Guanajuato'),(2632,'Lagos de Moreno','MEX',NULL,'Jalisco'),(2633,'Piedras Negras','MEX',NULL,'Coahuila de Zaragoza'),(2634,'Altamira','MEX',NULL,'Tamaulipas'),(2635,'TÃºxpam','MEX',NULL,'Veracruz'),(2636,'San Pedro Garza GarcÃ­a','MEX',NULL,'Nuevo LeÃ³n'),(2637,'CuauhtÃ©moc','MEX',NULL,'Chihuahua'),(2638,'Manzanillo','MEX',NULL,'Colima'),(2639,'Iguala de la Independencia','MEX',NULL,'Guerrero'),(2640,'Zacatecas','MEX',NULL,'Zacatecas'),(2641,'Tlajomulco de ZÃºÃ±iga','MEX',NULL,'Jalisco'),(2642,'Tulancingo de Bravo','MEX',NULL,'Hidalgo'),(2643,'Zinacantepec','MEX',NULL,'MÃ©xico'),(2644,'San MartÃ­n Texmelucan','MEX',NULL,'Puebla'),(2645,'TepatitlÃ¡n de Morelos','MEX',NULL,'Jalisco'),(2646,'MartÃ­nez de la Torre','MEX',NULL,'Veracruz'),(2647,'Orizaba','MEX',NULL,'Veracruz'),(2648,'ApatzingÃ¡n','MEX',NULL,'MichoacÃ¡n de Ocampo'),(2649,'Atlixco','MEX',NULL,'Puebla'),(2650,'Delicias','MEX',NULL,'Chihuahua'),(2651,'Ixtlahuaca','MEX',NULL,'MÃ©xico'),(2652,'El Mante','MEX',NULL,'Tamaulipas'),(2653,'Lerdo','MEX',NULL,'Durango'),(2654,'Almoloya de JuÃ¡rez','MEX',NULL,'MÃ©xico'),(2655,'AcÃ¡mbaro','MEX',NULL,'Guanajuato'),(2656,'AcuÃ±a','MEX',NULL,'Coahuila de Zaragoza'),(2657,'Guadalupe','MEX',NULL,'Zacatecas'),(2658,'Huejutla de Reyes','MEX',NULL,'Hidalgo'),(2659,'Hidalgo','MEX',NULL,'MichoacÃ¡n de Ocampo'),(2660,'Los Cabos','MEX',NULL,'Baja California Sur'),(2661,'ComitÃ¡n de DomÃ­nguez','MEX',NULL,'Chiapas'),(2662,'CunduacÃ¡n','MEX',NULL,'Tabasco'),(2663,'RÃ­o Bravo','MEX',NULL,'Tamaulipas'),(2664,'Temapache','MEX',NULL,'Veracruz'),(2665,'Chilapa de Alvarez','MEX',NULL,'Guerrero'),(2666,'Hidalgo del Parral','MEX',NULL,'Chihuahua'),(2667,'San Francisco del RincÃ³n','MEX',NULL,'Guanajuato'),(2668,'Taxco de AlarcÃ³n','MEX',NULL,'Guerrero'),(2669,'Zumpango','MEX',NULL,'MÃ©xico'),(2670,'San Pedro Cholula','MEX',NULL,'Puebla'),(2671,'Lerma','MEX',NULL,'MÃ©xico'),(2672,'TecomÃ¡n','MEX',NULL,'Colima'),(2673,'Las Margaritas','MEX',NULL,'Chiapas'),(2674,'Cosoleacaque','MEX',NULL,'Veracruz'),(2675,'San Luis de la Paz','MEX',NULL,'Guanajuato'),(2676,'JosÃ© Azueta','MEX',NULL,'Guerrero'),(2677,'Santiago Ixcuintla','MEX',NULL,'Nayarit'),(2678,'San Felipe','MEX',NULL,'Guanajuato'),(2679,'Tejupilco','MEX',NULL,'MÃ©xico'),(2680,'Tantoyuca','MEX',NULL,'Veracruz'),(2681,'Salvatierra','MEX',NULL,'Guanajuato'),(2682,'Tultepec','MEX',NULL,'MÃ©xico'),(2683,'Temixco','MEX',NULL,'Morelos'),(2684,'Matamoros','MEX',NULL,'Coahuila de Zaragoza'),(2685,'PÃ¡nuco','MEX',NULL,'Veracruz'),(2686,'El Fuerte','MEX',NULL,'Sinaloa'),(2687,'Tierra Blanca','MEX',NULL,'Veracruz'),(2688,'Weno','FSM',NULL,'Chuuk'),(2689,'Palikir','FSM',NULL,'Pohnpei'),(2690,'Chisinau','MDA',NULL,'Chisinau'),(2691,'Tiraspol','MDA',NULL,'Dnjestria'),(2692,'Balti','MDA',NULL,'Balti'),(2693,'Bender (TÃ®ghina)','MDA',NULL,'Bender (TÃ®ghina)'),(2694,'Monte-Carlo','MCO',NULL,'â€“'),(2695,'Monaco-Ville','MCO',NULL,'â€“'),(2696,'Ulan Bator','MNG',NULL,'Ulaanbaatar'),(2697,'Plymouth','MSR',NULL,'Plymouth'),(2698,'Maputo','MOZ',NULL,'Maputo'),(2699,'Matola','MOZ',NULL,'Maputo'),(2700,'Beira','MOZ',NULL,'Sofala'),(2701,'Nampula','MOZ',NULL,'Nampula'),(2702,'Chimoio','MOZ',NULL,'Manica'),(2703,'NaÃ§ala-Porto','MOZ',NULL,'Nampula'),(2704,'Quelimane','MOZ',NULL,'ZambÃ©zia'),(2705,'Mocuba','MOZ',NULL,'ZambÃ©zia'),(2706,'Tete','MOZ',NULL,'Tete'),(2707,'Xai-Xai','MOZ',NULL,'Gaza'),(2708,'Gurue','MOZ',NULL,'ZambÃ©zia'),(2709,'Maxixe','MOZ',NULL,'Inhambane'),(2710,'Rangoon (Yangon)','MMR',NULL,'Rangoon [Yangon]'),(2711,'Mandalay','MMR',NULL,'Mandalay'),(2712,'Moulmein (Mawlamyine)','MMR',NULL,'Mon'),(2713,'Pegu (Bago)','MMR',NULL,'Pegu [Bago]'),(2714,'Bassein (Pathein)','MMR',NULL,'Irrawaddy [Ayeyarwad'),(2715,'Monywa','MMR',NULL,'Sagaing'),(2716,'Sittwe (Akyab)','MMR',NULL,'Rakhine'),(2717,'Taunggyi (Taunggye)','MMR',NULL,'Shan'),(2718,'Meikhtila','MMR',NULL,'Mandalay'),(2719,'Mergui (Myeik)','MMR',NULL,'Tenasserim [Tanintha'),(2720,'Lashio (Lasho)','MMR',NULL,'Shan'),(2721,'Prome (Pyay)','MMR',NULL,'Pegu [Bago]'),(2722,'Henzada (Hinthada)','MMR',NULL,'Irrawaddy\n [Ayeyarwa'),(2723,'Myingyan','MMR',NULL,'Mandalay'),(2724,'Tavoy (Dawei)','MMR',NULL,'Tenasserim [Tanintha'),(2725,'Pagakku (Pakokku)','MMR',NULL,'Magwe [Magway]'),(2726,'Windhoek','NAM',NULL,'Khomas'),(2727,'Yangor','NRU',NULL,'â€“'),(2728,'Yaren','NRU',NULL,'â€“'),(2729,'Kathmandu','NPL',NULL,'Central'),(2730,'Biratnagar','NPL',NULL,'Eastern'),(2731,'Pokhara','NPL',NULL,'Western'),(2732,'Lalitapur','NPL',NULL,'Central'),(2733,'Birgunj','NPL',NULL,'Central'),(2734,'Managua','NIC',NULL,'Managua'),(2735,'LeÃ³n','NIC',NULL,'LeÃ³n'),(2736,'Chinandega','NIC',NULL,'Chinandega'),(2737,'Masaya','NIC',NULL,'Masaya'),(2738,'Niamey','NER',NULL,'Niamey'),(2739,'Zinder','NER',NULL,'Zinder'),(2740,'Maradi','NER',NULL,'Maradi'),(2741,'Lagos','NGA',NULL,'Lagos'),(2742,'Ibadan','NGA',NULL,'Oyo & Osun'),(2743,'Ogbomosho','NGA',NULL,'Oyo & Osun'),(2744,'Kano','NGA',NULL,'Kano & Jigawa'),(2745,'Oshogbo','NGA',NULL,'Oyo & Osun'),(2746,'Ilorin','NGA',NULL,'Kwara & Kogi'),(2747,'Abeokuta','NGA',NULL,'Ogun'),(2748,'Port Harcourt','NGA',NULL,'Rivers & Bayelsa'),(2749,'Zaria','NGA',NULL,'Kaduna'),(2750,'Ilesha','NGA',NULL,'Oyo & Osun'),(2751,'Onitsha','NGA',NULL,'Anambra & Enugu & Eb'),(2752,'Iwo','NGA',NULL,'Oyo & Osun'),(2753,'Ado-Ekiti','NGA',NULL,'Ondo & Ekiti'),(2754,'Abuja','NGA',NULL,'Federal Capital Dist'),(2755,'Kaduna','NGA',NULL,'Kaduna'),(2756,'Mushin','NGA',NULL,'Lagos'),(2757,'Maiduguri','NGA',NULL,'Borno & Yobe'),(2758,'Enugu','NGA',NULL,'Anambra & Enugu & Eb'),(2759,'Ede','NGA',NULL,'Oyo & Osun'),(2760,'Aba','NGA',NULL,'Imo & Abia'),(2761,'Ife','NGA',NULL,'Oyo & Osun'),(2762,'Ila','NGA',NULL,'Oyo & Osun'),(2763,'Oyo','NGA',NULL,'Oyo & Osun'),(2764,'Ikerre','NGA',NULL,'Ondo & Ekiti'),(2765,'Benin City','NGA',NULL,'Edo & Delta'),(2766,'Iseyin','NGA',NULL,'Oyo & Osun'),(2767,'Katsina','NGA',NULL,'Katsina'),(2768,'Jos','NGA',NULL,'Plateau & Nassarawa'),(2769,'Sokoto','NGA',NULL,'Sokoto & Kebbi & Zam'),(2770,'Ilobu','NGA',NULL,'Oyo & Osun'),(2771,'Offa','NGA',NULL,'Kwara & Kogi'),(2772,'Ikorodu','NGA',NULL,'Lagos'),(2773,'Ilawe-Ekiti','NGA',NULL,'Ondo & Ekiti'),(2774,'Owo','NGA',NULL,'Ondo & Ekiti'),(2775,'Ikirun','NGA',NULL,'Oyo & Osun'),(2776,'Shaki','NGA',NULL,'Oyo & Osun'),(2777,'Calabar','NGA',NULL,'Cross River'),(2778,'Ondo','NGA',NULL,'Ondo & Ekiti'),(2779,'Akure','NGA',NULL,'Ondo & Ekiti'),(2780,'Gusau','NGA',NULL,'Sokoto & Kebbi & Zam'),(2781,'Ijebu-Ode','NGA',NULL,'Ogun'),(2782,'Effon-Alaiye','NGA',NULL,'Oyo & Osun'),(2783,'Kumo','NGA',NULL,'Bauchi & Gombe'),(2784,'Shomolu','NGA',NULL,'Lagos'),(2785,'Oka-Akoko','NGA',NULL,'Ondo & Ekiti'),(2786,'Ikare','NGA',NULL,'Ondo & Ekiti'),(2787,'Sapele','NGA',NULL,'Edo & Delta'),(2788,'Deba Habe','NGA',NULL,'Bauchi & Gombe'),(2789,'Minna','NGA',NULL,'Niger'),(2790,'Warri','NGA',NULL,'Edo & Delta'),(2791,'Bida','NGA',NULL,'Niger'),(2792,'Ikire','NGA',NULL,'Oyo & Osun'),(2793,'Makurdi','NGA',NULL,'Benue'),(2794,'Lafia','NGA',NULL,'Plateau & Nassarawa'),(2795,'Inisa','NGA',NULL,'Oyo & Osun'),(2796,'Shagamu','NGA',NULL,'Ogun'),(2797,'Awka','NGA',NULL,'Anambra & Enugu & Eb'),(2798,'Gombe','NGA',NULL,'Bauchi & Gombe'),(2799,'Igboho','NGA',NULL,'Oyo & Osun'),(2800,'Ejigbo','NGA',NULL,'Oyo & Osun'),(2801,'Agege','NGA',NULL,'Lagos'),(2802,'Ise-Ekiti','NGA',NULL,'Ondo & Ekiti'),(2803,'Ugep','NGA',NULL,'Cross River'),(2804,'Epe','NGA',NULL,'Lagos'),(2805,'Alofi','NIU',NULL,'â€“'),(2806,'Kingston','NFK',NULL,'â€“'),(2807,'Oslo','NOR',NULL,'Oslo'),(2808,'Bergen','NOR',NULL,'Hordaland'),(2809,'Trondheim','NOR',NULL,'SÃ¸r-TrÃ¸ndelag'),(2810,'Stavanger','NOR',NULL,'Rogaland'),(2811,'BÃ¦rum','NOR',NULL,'Akershus'),(2812,'Abidjan','CIV',NULL,'Abidjan'),(2813,'BouakÃ©','CIV',NULL,'BouakÃ©'),(2814,'Yamoussoukro','CIV',NULL,'Yamoussoukro'),(2815,'Daloa','CIV',NULL,'Daloa'),(2816,'Korhogo','CIV',NULL,'Korhogo'),(2817,'al-Sib','OMN',NULL,'Masqat'),(2818,'Salala','OMN',NULL,'Zufar'),(2819,'Bawshar','OMN',NULL,'Masqat'),(2820,'Suhar','OMN',NULL,'al-Batina'),(2821,'Masqat','OMN',NULL,'Masqat'),(2822,'Karachi','PAK',NULL,'Sindh'),(2823,'Lahore','PAK',NULL,'Punjab'),(2824,'Faisalabad','PAK',NULL,'Punjab'),(2825,'Rawalpindi','PAK',NULL,'Punjab'),(2826,'Multan','PAK',NULL,'Punjab'),(2827,'Hyderabad','PAK',NULL,'Sindh'),(2828,'Gujranwala','PAK',NULL,'Punjab'),(2829,'Peshawar','PAK',NULL,'Nothwest Border Prov'),(2830,'Quetta','PAK',NULL,'Baluchistan'),(2831,'Islamabad','PAK',NULL,'Islamabad'),(2832,'Sargodha','PAK',NULL,'Punjab'),(2833,'Sialkot','PAK',NULL,'Punjab'),(2834,'Bahawalpur','PAK',NULL,'Punjab'),(2835,'Sukkur','PAK',NULL,'Sindh'),(2836,'Jhang','PAK',NULL,'Punjab'),(2837,'Sheikhupura','PAK',NULL,'Punjab'),(2838,'Larkana','PAK',NULL,'Sindh'),(2839,'Gujrat','PAK',NULL,'Punjab'),(2840,'Mardan','PAK',NULL,'Nothwest Border Prov'),(2841,'Kasur','PAK',NULL,'Punjab'),(2842,'Rahim Yar Khan','PAK',NULL,'Punjab'),(2843,'Sahiwal','PAK',NULL,'Punjab'),(2844,'Okara','PAK',NULL,'Punjab'),(2845,'Wah','PAK',NULL,'Punjab'),(2846,'Dera Ghazi Khan','PAK',NULL,'Punjab'),(2847,'Mirpur Khas','PAK',NULL,'Sind'),(2848,'Nawabshah','PAK',NULL,'Sind'),(2849,'Mingora','PAK',NULL,'Nothwest Border Prov'),(2850,'Chiniot','PAK',NULL,'Punjab'),(2851,'Kamoke','PAK',NULL,'Punjab'),(2852,'Mandi Burewala','PAK',NULL,'Punjab'),(2853,'Jhelum','PAK',NULL,'Punjab'),(2854,'Sadiqabad','PAK',NULL,'Punjab'),(2855,'Jacobabad','PAK',NULL,'Sind'),(2856,'Shikarpur','PAK',NULL,'Sind'),(2857,'Khanewal','PAK',NULL,'Punjab'),(2858,'Hafizabad','PAK',NULL,'Punjab'),(2859,'Kohat','PAK',NULL,'Nothwest Border Prov'),(2860,'Muzaffargarh','PAK',NULL,'Punjab'),(2861,'Khanpur','PAK',NULL,'Punjab'),(2862,'Gojra','PAK',NULL,'Punjab'),(2863,'Bahawalnagar','PAK',NULL,'Punjab'),(2864,'Muridke','PAK',NULL,'Punjab'),(2865,'Pak Pattan','PAK',NULL,'Punjab'),(2866,'Abottabad','PAK',NULL,'Nothwest Border Prov'),(2867,'Tando Adam','PAK',NULL,'Sind'),(2868,'Jaranwala','PAK',NULL,'Punjab'),(2869,'Khairpur','PAK',NULL,'Sind'),(2870,'Chishtian Mandi','PAK',NULL,'Punjab'),(2871,'Daska','PAK',NULL,'Punjab'),(2872,'Dadu','PAK',NULL,'Sind'),(2873,'Mandi Bahauddin','PAK',NULL,'Punjab'),(2874,'Ahmadpur East','PAK',NULL,'Punjab'),(2875,'Kamalia','PAK',NULL,'Punjab'),(2876,'Khuzdar','PAK',NULL,'Baluchistan'),(2877,'Vihari','PAK',NULL,'Punjab'),(2878,'Dera Ismail Khan','PAK',NULL,'Nothwest Border Prov'),(2879,'Wazirabad','PAK',NULL,'Punjab'),(2880,'Nowshera','PAK',NULL,'Nothwest Border Prov'),(2881,'Koror','PLW',NULL,'Koror'),(2882,'Ciudad de PanamÃ¡','PAN',NULL,'PanamÃ¡'),(2883,'San Miguelito','PAN',NULL,'San Miguelito'),(2884,'Port Moresby','PNG',NULL,'National Capital Dis'),(2885,'AsunciÃ³n','PRY',NULL,'AsunciÃ³n'),(2886,'Ciudad del Este','PRY',NULL,'Alto ParanÃ¡'),(2887,'San Lorenzo','PRY',NULL,'Central'),(2888,'LambarÃ©','PRY',NULL,'Central'),(2889,'Fernando de la Mora','PRY',NULL,'Central'),(2890,'Lima','PER',NULL,'Lima'),(2891,'Arequipa','PER',NULL,'Arequipa'),(2892,'Trujillo','PER',NULL,'La Libertad'),(2893,'Chiclayo','PER',NULL,'Lambayeque'),(2894,'Callao','PER',NULL,'Callao'),(2895,'Iquitos','PER',NULL,'Loreto'),(2896,'Chimbote','PER',NULL,'Ancash'),(2897,'Huancayo','PER',NULL,'JunÃ­n'),(2898,'Piura','PER',NULL,'Piura'),(2899,'Cusco','PER',NULL,'Cusco'),(2900,'Pucallpa','PER',NULL,'Ucayali'),(2901,'Tacna','PER',NULL,'Tacna'),(2902,'Ica','PER',NULL,'Ica'),(2903,'Sullana','PER',NULL,'Piura'),(2904,'Juliaca','PER',NULL,'Puno'),(2905,'HuÃ¡nuco','PER',NULL,'Huanuco'),(2906,'Ayacucho','PER',NULL,'Ayacucho'),(2907,'Chincha Alta','PER',NULL,'Ica'),(2908,'Cajamarca','PER',NULL,'Cajamarca'),(2909,'Puno','PER',NULL,'Puno'),(2910,'Ventanilla','PER',NULL,'Callao'),(2911,'Castilla','PER',NULL,'Piura'),(2912,'Adamstown','PCN',NULL,'â€“'),(2913,'Garapan','MNP',NULL,'Saipan'),(2914,'Lisboa','PRT',NULL,'Lisboa'),(2915,'Porto','PRT',NULL,'Porto'),(2916,'Amadora','PRT',NULL,'Lisboa'),(2917,'CoÃ­mbra','PRT',NULL,'CoÃ­mbra'),(2918,'Braga','PRT',NULL,'Braga'),(2919,'San Juan','PRI',NULL,'San Juan'),(2920,'BayamÃ³n','PRI',NULL,'BayamÃ³n'),(2921,'Ponce','PRI',NULL,'Ponce'),(2922,'Carolina','PRI',NULL,'Carolina'),(2923,'Caguas','PRI',NULL,'Caguas'),(2924,'Arecibo','PRI',NULL,'Arecibo'),(2925,'Guaynabo','PRI',NULL,'Guaynabo'),(2926,'MayagÃ¼ez','PRI',NULL,'MayagÃ¼ez'),(2927,'Toa Baja','PRI',NULL,'Toa Baja'),(2928,'Warszawa','POL',NULL,'Mazowieckie'),(2929,'LÃ³dz','POL',NULL,'Lodzkie'),(2930,'KrakÃ³w','POL',NULL,'Malopolskie'),(2931,'Wroclaw','POL',NULL,'Dolnoslaskie'),(2932,'Poznan','POL',NULL,'Wielkopolskie'),(2933,'Gdansk','POL',NULL,'Pomorskie'),(2934,'Szczecin','POL',NULL,'Zachodnio-Pomorskie'),(2935,'Bydgoszcz','POL',NULL,'Kujawsko-Pomorskie'),(2936,'Lublin','POL',NULL,'Lubelskie'),(2937,'Katowice','POL',NULL,'Slaskie'),(2938,'Bialystok','POL',NULL,'Podlaskie'),(2939,'Czestochowa','POL',NULL,'Slaskie'),(2940,'Gdynia','POL',NULL,'Pomorskie'),(2941,'Sosnowiec','POL',NULL,'Slaskie'),(2942,'Radom','POL',NULL,'Mazowieckie'),(2943,'Kielce','POL',NULL,'Swietokrzyskie'),(2944,'Gliwice','POL',NULL,'Slaskie'),(2945,'Torun','POL',NULL,'Kujawsko-Pomorskie'),(2946,'Bytom','POL',NULL,'Slaskie'),(2947,'Zabrze','POL',NULL,'Slaskie'),(2948,'Bielsko-Biala','POL',NULL,'Slaskie'),(2949,'Olsztyn','POL',NULL,'Warminsko-Mazurskie'),(2950,'RzeszÃ³w','POL',NULL,'Podkarpackie'),(2951,'Ruda Slaska','POL',NULL,'Slaskie'),(2952,'Rybnik','POL',NULL,'Slaskie'),(2953,'Walbrzych','POL',NULL,'Dolnoslaskie'),(2954,'Tychy','POL',NULL,'Slaskie'),(2955,'Dabrowa GÃ³rnicza','POL',NULL,'Slaskie'),(2956,'Plock','POL',NULL,'Mazowieckie'),(2957,'Elblag','POL',NULL,'Warminsko-Mazurskie'),(2958,'Opole','POL',NULL,'Opolskie'),(2959,'GorzÃ³w Wielkopolski','POL',NULL,'Lubuskie'),(2960,'Wloclawek','POL',NULL,'Kujawsko-Pomorskie'),(2961,'ChorzÃ³w','POL',NULL,'Slaskie'),(2962,'TarnÃ³w','POL',NULL,'Malopolskie'),(2963,'Zielona GÃ³ra','POL',NULL,'Lubuskie'),(2964,'Koszalin','POL',NULL,'Zachodnio-Pomorskie'),(2965,'Legnica','POL',NULL,'Dolnoslaskie'),(2966,'Kalisz','POL',NULL,'Wielkopolskie'),(2967,'Grudziadz','POL',NULL,'Kujawsko-Pomorskie'),(2968,'Slupsk','POL',NULL,'Pomorskie'),(2969,'Jastrzebie-ZdrÃ³j','POL',NULL,'Slaskie'),(2970,'Jaworzno','POL',NULL,'Slaskie'),(2971,'Jelenia GÃ³ra','POL',NULL,'Dolnoslaskie'),(2972,'Malabo','GNQ',NULL,'Bioko'),(2973,'Doha','QAT',NULL,'Doha'),(2974,'Paris','FRA',NULL,'ÃŽle-de-France'),(2975,'Marseille','FRA',NULL,'Provence-Alpes-CÃ´te'),(2976,'Lyon','FRA',NULL,'RhÃ´ne-Alpes'),(2977,'Toulouse','FRA',NULL,'Midi-PyrÃ©nÃ©es'),(2978,'Nice','FRA',NULL,'Provence-Alpes-CÃ´te'),(2979,'Nantes','FRA',NULL,'Pays de la Loire'),(2980,'Strasbourg','FRA',NULL,'Alsace'),(2981,'Montpellier','FRA',NULL,'Languedoc-Roussillon'),(2982,'Bordeaux','FRA',NULL,'Aquitaine'),(2983,'Rennes','FRA',NULL,'Haute-Normandie'),(2984,'Le Havre','FRA',NULL,'Champagne-Ardenne'),(2985,'Reims','FRA',NULL,'Nord-Pas-de-Calais'),(2986,'Lille','FRA',NULL,'RhÃ´ne-Alpes'),(2987,'St-Ã‰tienne','FRA',NULL,'Bretagne'),(2988,'Toulon','FRA',NULL,'Provence-Alpes-CÃ´te'),(2989,'Grenoble','FRA',NULL,'RhÃ´ne-Alpes'),(2990,'Angers','FRA',NULL,'Pays de la Loire'),(2991,'Dijon','FRA',NULL,'Bourgogne'),(2992,'Brest','FRA',NULL,'Bretagne'),(2993,'Le Mans','FRA',NULL,'Pays de la Loire'),(2994,'Clermont-Ferrand','FRA',NULL,'Auvergne'),(2995,'Amiens','FRA',NULL,'Picardie'),(2996,'Aix-en-Provence','FRA',NULL,'Provence-Alpes-CÃ´te'),(2997,'Limoges','FRA',NULL,'Limousin'),(2998,'NÃ®mes','FRA',NULL,'Languedoc-Roussillon'),(2999,'Tours','FRA',NULL,'Centre'),(3000,'Villeurbanne','FRA',NULL,'RhÃ´ne-Alpes'),(3001,'Metz','FRA',NULL,'Lorraine'),(3002,'BesanÃ§on','FRA',NULL,'Franche-ComtÃ©'),(3003,'Caen','FRA',NULL,'Basse-Normandie'),(3004,'OrlÃ©ans','FRA',NULL,'Centre'),(3005,'Mulhouse','FRA',NULL,'Alsace'),(3006,'Rouen','FRA',NULL,'Haute-Normandie'),(3007,'Boulogne-Billancourt','FRA',NULL,'ÃŽle-de-France'),(3008,'Perpignan','FRA',NULL,'Languedoc-Roussillon'),(3009,'Nancy','FRA',NULL,'Lorraine'),(3010,'Roubaix','FRA',NULL,'Nord-Pas-de-Calais'),(3011,'Argenteuil','FRA',NULL,'ÃŽle-de-France'),(3012,'Tourcoing','FRA',NULL,'Nord-Pas-de-Calais'),(3013,'Montreuil','FRA',NULL,'ÃŽle-de-France'),(3014,'Cayenne','GUF',NULL,'Cayenne'),(3015,'Faaa','PYF',NULL,'Tahiti'),(3016,'Papeete','PYF',NULL,'Tahiti'),(3017,'Saint-Denis','REU',NULL,'Saint-Denis'),(3018,'Bucuresti','ROM',NULL,'Bukarest'),(3019,'Iasi','ROM',NULL,'Iasi'),(3020,'Constanta','ROM',NULL,'Constanta'),(3021,'Cluj-Napoca','ROM',NULL,'Cluj'),(3022,'Galati','ROM',NULL,'Galati'),(3023,'Timisoara','ROM',NULL,'Timis'),(3024,'Brasov','ROM',NULL,'Brasov'),(3025,'Craiova','ROM',NULL,'Dolj'),(3026,'Ploiesti','ROM',NULL,'Prahova'),(3027,'Braila','ROM',NULL,'Braila'),(3028,'Oradea','ROM',NULL,'Bihor'),(3029,'Bacau','ROM',NULL,'Bacau'),(3030,'Pitesti','ROM',NULL,'Arges'),(3031,'Arad','ROM',NULL,'Arad'),(3032,'Sibiu','ROM',NULL,'Sibiu'),(3033,'TÃ¢rgu Mures','ROM',NULL,'Mures'),(3034,'Baia Mare','ROM',NULL,'Maramures'),(3035,'Buzau','ROM',NULL,'Buzau'),(3036,'Satu Mare','ROM',NULL,'Satu Mare'),(3037,'Botosani','ROM',NULL,'Botosani'),(3038,'Piatra Neamt','ROM',NULL,'Neamt'),(3039,'RÃ¢mnicu VÃ¢lcea','ROM',NULL,'VÃ¢lcea'),(3040,'Suceava','ROM',NULL,'Suceava'),(3041,'Drobeta-Turnu Severin','ROM',NULL,'Mehedinti'),(3042,'TÃ¢rgoviste','ROM',NULL,'DÃ¢mbovita'),(3043,'Focsani','ROM',NULL,'Vrancea'),(3044,'TÃ¢rgu Jiu','ROM',NULL,'Gorj'),(3045,'Tulcea','ROM',NULL,'Tulcea'),(3046,'Resita','ROM',NULL,'Caras-Severin'),(3047,'Kigali','RWA',NULL,'Kigali'),(3048,'Stockholm','SWE',NULL,'Lisboa'),(3049,'Gothenburg [GÃ¶teborg]','SWE',NULL,'West GÃ¶tanmaan lÃ¤n'),(3050,'MalmÃ¶','SWE',NULL,'SkÃ¥ne lÃ¤n'),(3051,'Uppsala','SWE',NULL,'Uppsala lÃ¤n'),(3052,'LinkÃ¶ping','SWE',NULL,'East GÃ¶tanmaan lÃ¤n'),(3053,'VÃ¤sterÃ¥s','SWE',NULL,'VÃ¤stmanlands lÃ¤n'),(3054,'Ã–rebro','SWE',NULL,'Ã–rebros lÃ¤n'),(3055,'NorrkÃ¶ping','SWE',NULL,'East GÃ¶tanmaan lÃ¤n'),(3056,'Helsingborg','SWE',NULL,'SkÃ¥ne lÃ¤n'),(3057,'JÃ¶nkÃ¶ping','SWE',NULL,'JÃ¶nkÃ¶pings lÃ¤n'),(3058,'UmeÃ¥','SWE',NULL,'VÃ¤sterbottens lÃ¤n'),(3059,'Lund','SWE',NULL,'SkÃ¥ne lÃ¤n'),(3060,'BorÃ¥s','SWE',NULL,'West GÃ¶tanmaan lÃ¤n'),(3061,'Sundsvall','SWE',NULL,'VÃ¤sternorrlands lÃ¤'),(3062,'GÃ¤vle','SWE',NULL,'GÃ¤vleborgs lÃ¤n'),(3063,'Jamestown','SHN',NULL,'Saint Helena'),(3064,'Basseterre','KNA',NULL,'St George Basseterre'),(3065,'Castries','LCA',NULL,'Castries'),(3066,'Kingstown','VCT',NULL,'St George'),(3067,'Saint-Pierre','SPM',NULL,'Saint-Pierre'),(3068,'Berlin','DEU',NULL,'Berliini'),(3069,'Hamburg','DEU',NULL,'Hamburg'),(3070,'Munich [MÃ¼nchen]','DEU',NULL,'Baijeri'),(3071,'KÃ¶ln','DEU',NULL,'Nordrhein-Westfalen'),(3072,'Frankfurt am Main','DEU',NULL,'Hessen'),(3073,'Essen','DEU',NULL,'Nordrhein-Westfalen'),(3074,'Dortmund','DEU',NULL,'Nordrhein-Westfalen'),(3075,'Stuttgart','DEU',NULL,'Baden-WÃ¼rttemberg'),(3076,'DÃ¼sseldorf','DEU',NULL,'Nordrhein-Westfalen'),(3077,'Bremen','DEU',NULL,'Bremen'),(3078,'Duisburg','DEU',NULL,'Nordrhein-Westfalen'),(3079,'Hannover','DEU',NULL,'Niedersachsen'),(3080,'Leipzig','DEU',NULL,'Saksi'),(3081,'NÃ¼rnberg','DEU',NULL,'Baijeri'),(3082,'Dresden','DEU',NULL,'Saksi'),(3083,'Bochum','DEU',NULL,'Nordrhein-Westfalen'),(3084,'Wuppertal','DEU',NULL,'Nordrhein-Westfalen'),(3085,'Bielefeld','DEU',NULL,'Nordrhein-Westfalen'),(3086,'Mannheim','DEU',NULL,'Baden-WÃ¼rttemberg'),(3087,'Bonn','DEU',NULL,'Nordrhein-Westfalen'),(3088,'Gelsenkirchen','DEU',NULL,'Nordrhein-Westfalen'),(3089,'Karlsruhe','DEU',NULL,'Baden-WÃ¼rttemberg'),(3090,'Wiesbaden','DEU',NULL,'Hessen'),(3091,'MÃ¼nster','DEU',NULL,'Nordrhein-Westfalen'),(3092,'MÃ¶nchengladbach','DEU',NULL,'Nordrhein-Westfalen'),(3093,'Chemnitz','DEU',NULL,'Saksi'),(3094,'Augsburg','DEU',NULL,'Baijeri'),(3095,'Halle/Saale','DEU',NULL,'Anhalt Sachsen'),(3096,'Braunschweig','DEU',NULL,'Niedersachsen'),(3097,'Aachen','DEU',NULL,'Nordrhein-Westfalen'),(3098,'Krefeld','DEU',NULL,'Nordrhein-Westfalen'),(3099,'Magdeburg','DEU',NULL,'Anhalt Sachsen'),(3100,'Kiel','DEU',NULL,'Schleswig-Holstein'),(3101,'Oberhausen','DEU',NULL,'Nordrhein-Westfalen'),(3102,'LÃ¼beck','DEU',NULL,'Schleswig-Holstein'),(3103,'Hagen','DEU',NULL,'Nordrhein-Westfalen'),(3104,'Rostock','DEU',NULL,'Mecklenburg-Vorpomme'),(3105,'Freiburg im Breisgau','DEU',NULL,'Baden-WÃ¼rttemberg'),(3106,'Erfurt','DEU',NULL,'ThÃ¼ringen'),(3107,'Kassel','DEU',NULL,'Hessen'),(3108,'SaarbrÃ¼cken','DEU',NULL,'Saarland'),(3109,'Mainz','DEU',NULL,'Rheinland-Pfalz'),(3110,'Hamm','DEU',NULL,'Nordrhein-Westfalen'),(3111,'Herne','DEU',NULL,'Nordrhein-Westfalen'),(3112,'MÃ¼lheim an der Ruhr','DEU',NULL,'Nordrhein-Westfalen'),(3113,'Solingen','DEU',NULL,'Nordrhein-Westfalen'),(3114,'OsnabrÃ¼ck','DEU',NULL,'Niedersachsen'),(3115,'Ludwigshafen am Rhein','DEU',NULL,'Rheinland-Pfalz'),(3116,'Leverkusen','DEU',NULL,'Nordrhein-Westfalen'),(3117,'Oldenburg','DEU',NULL,'Niedersachsen'),(3118,'Neuss','DEU',NULL,'Nordrhein-Westfalen'),(3119,'Heidelberg','DEU',NULL,'Baden-WÃ¼rttemberg'),(3120,'Darmstadt','DEU',NULL,'Hessen'),(3121,'Paderborn','DEU',NULL,'Nordrhein-Westfalen'),(3122,'Potsdam','DEU',NULL,'Brandenburg'),(3123,'WÃ¼rzburg','DEU',NULL,'Baijeri'),(3124,'Regensburg','DEU',NULL,'Baijeri'),(3125,'Recklinghausen','DEU',NULL,'Nordrhein-Westfalen'),(3126,'GÃ¶ttingen','DEU',NULL,'Niedersachsen'),(3127,'Bremerhaven','DEU',NULL,'Bremen'),(3128,'Wolfsburg','DEU',NULL,'Niedersachsen'),(3129,'Bottrop','DEU',NULL,'Nordrhein-Westfalen'),(3130,'Remscheid','DEU',NULL,'Nordrhein-Westfalen'),(3131,'Heilbronn','DEU',NULL,'Baden-WÃ¼rttemberg'),(3132,'Pforzheim','DEU',NULL,'Baden-WÃ¼rttemberg'),(3133,'Offenbach am Main','DEU',NULL,'Hessen'),(3134,'Ulm','DEU',NULL,'Baden-WÃ¼rttemberg'),(3135,'Ingolstadt','DEU',NULL,'Baijeri'),(3136,'Gera','DEU',NULL,'ThÃ¼ringen'),(3137,'Salzgitter','DEU',NULL,'Niedersachsen'),(3138,'Cottbus','DEU',NULL,'Brandenburg'),(3139,'Reutlingen','DEU',NULL,'Baden-WÃ¼rttemberg'),(3140,'FÃ¼rth','DEU',NULL,'Baijeri'),(3141,'Siegen','DEU',NULL,'Nordrhein-Westfalen'),(3142,'Koblenz','DEU',NULL,'Rheinland-Pfalz'),(3143,'Moers','DEU',NULL,'Nordrhein-Westfalen'),(3144,'Bergisch Gladbach','DEU',NULL,'Nordrhein-Westfalen'),(3145,'Zwickau','DEU',NULL,'Saksi'),(3146,'Hildesheim','DEU',NULL,'Niedersachsen'),(3147,'Witten','DEU',NULL,'Nordrhein-Westfalen'),(3148,'Schwerin','DEU',NULL,'Mecklenburg-Vorpomme'),(3149,'Erlangen','DEU',NULL,'Baijeri'),(3150,'Kaiserslautern','DEU',NULL,'Rheinland-Pfalz'),(3151,'Trier','DEU',NULL,'Rheinland-Pfalz'),(3152,'Jena','DEU',NULL,'ThÃ¼ringen'),(3153,'Iserlohn','DEU',NULL,'Nordrhein-Westfalen'),(3154,'GÃ¼tersloh','DEU',NULL,'Nordrhein-Westfalen'),(3155,'Marl','DEU',NULL,'Nordrhein-Westfalen'),(3156,'LÃ¼nen','DEU',NULL,'Nordrhein-Westfalen'),(3157,'DÃ¼ren','DEU',NULL,'Nordrhein-Westfalen'),(3158,'Ratingen','DEU',NULL,'Nordrhein-Westfalen'),(3159,'Velbert','DEU',NULL,'Nordrhein-Westfalen'),(3160,'Esslingen am Neckar','DEU',NULL,'Baden-WÃ¼rttemberg'),(3161,'Honiara','SLB',NULL,'Honiara'),(3162,'Lusaka','ZMB',NULL,'Lusaka'),(3163,'Ndola','ZMB',NULL,'Copperbelt'),(3164,'Kitwe','ZMB',NULL,'Copperbelt'),(3165,'Kabwe','ZMB',NULL,'Central'),(3166,'Chingola','ZMB',NULL,'Copperbelt'),(3167,'Mufulira','ZMB',NULL,'Copperbelt'),(3168,'Luanshya','ZMB',NULL,'Copperbelt'),(3169,'Apia','WSM',NULL,'Upolu'),(3170,'Serravalle','SMR',NULL,'Serravalle/Dogano'),(3171,'San Marino','SMR',NULL,'San Marino'),(3172,'SÃ£o TomÃ©','STP',NULL,'Aqua Grande'),(3173,'Riyadh','SAU',NULL,'Riyadh'),(3174,'Jedda','SAU',NULL,'Mekka'),(3175,'Mekka','SAU',NULL,'Mekka'),(3176,'Medina','SAU',NULL,'Medina'),(3177,'al-Dammam','SAU',NULL,'al-Sharqiya'),(3178,'al-Taif','SAU',NULL,'Mekka'),(3179,'Tabuk','SAU',NULL,'Tabuk'),(3180,'Burayda','SAU',NULL,'al-Qasim'),(3181,'al-Hufuf','SAU',NULL,'al-Sharqiya'),(3182,'al-Mubarraz','SAU',NULL,'al-Sharqiya'),(3183,'Khamis Mushayt','SAU',NULL,'Asir'),(3184,'Hail','SAU',NULL,'Hail'),(3185,'al-Kharj','SAU',NULL,'Riad'),(3186,'al-Khubar','SAU',NULL,'al-Sharqiya'),(3187,'Jubayl','SAU',NULL,'al-Sharqiya'),(3188,'Hafar al-Batin','SAU',NULL,'al-Sharqiya'),(3189,'al-Tuqba','SAU',NULL,'al-Sharqiya'),(3190,'Yanbu','SAU',NULL,'Medina'),(3191,'Abha','SAU',NULL,'Asir'),(3192,'AraÂ´ar','SAU',NULL,'al-Khudud al-Samaliy'),(3193,'al-Qatif','SAU',NULL,'al-Sharqiya'),(3194,'al-Hawiya','SAU',NULL,'Mekka'),(3195,'Unayza','SAU',NULL,'Qasim'),(3196,'Najran','SAU',NULL,'Najran'),(3197,'Pikine','SEN',NULL,'Cap-Vert'),(3198,'Dakar','SEN',NULL,'Cap-Vert'),(3199,'ThiÃ¨s','SEN',NULL,'ThiÃ¨s'),(3200,'Kaolack','SEN',NULL,'Kaolack'),(3201,'Ziguinchor','SEN',NULL,'Ziguinchor'),(3202,'Rufisque','SEN',NULL,'Cap-Vert'),(3203,'Saint-Louis','SEN',NULL,'Saint-Louis'),(3204,'Mbour','SEN',NULL,'ThiÃ¨s'),(3205,'Diourbel','SEN',NULL,'Diourbel'),(3206,'Victoria','SYC',NULL,'MahÃ©'),(3207,'Freetown','SLE',NULL,'Western'),(3208,'Singapore','SGP',NULL,'â€“'),(3209,'Bratislava','SVK',NULL,'Bratislava'),(3210,'KoÅ¡ice','SVK',NULL,'VÃ½chodnÃ© Slovensko'),(3211,'PreÅ¡ov','SVK',NULL,'VÃ½chodnÃ© Slovensko'),(3212,'Ljubljana','SVN',NULL,'Osrednjeslovenska'),(3213,'Maribor','SVN',NULL,'Podravska'),(3214,'Mogadishu','SOM',NULL,'Banaadir'),(3215,'Hargeysa','SOM',NULL,'Woqooyi Galbeed'),(3216,'Kismaayo','SOM',NULL,'Jubbada Hoose'),(3217,'Colombo','LKA',NULL,'Western'),(3218,'Dehiwala','LKA',NULL,'Western'),(3219,'Moratuwa','LKA',NULL,'Western'),(3220,'Jaffna','LKA',NULL,'Northern'),(3221,'Kandy','LKA',NULL,'Central'),(3222,'Sri Jayawardenepura Kotte','LKA',NULL,'Western'),(3223,'Negombo','LKA',NULL,'Western'),(3224,'Omdurman','SDN',NULL,'Khartum'),(3225,'Khartum','SDN',NULL,'Khartum'),(3226,'Sharq al-Nil','SDN',NULL,'Khartum'),(3227,'Port Sudan','SDN',NULL,'al-Bahr al-Ahmar'),(3228,'Kassala','SDN',NULL,'Kassala'),(3229,'Obeid','SDN',NULL,'Kurdufan al-Shamaliy'),(3230,'Nyala','SDN',NULL,'Darfur al-Janubiya'),(3231,'Wad Madani','SDN',NULL,'al-Jazira'),(3232,'al-Qadarif','SDN',NULL,'al-Qadarif'),(3233,'Kusti','SDN',NULL,'al-Bahr al-Abyad'),(3234,'al-Fashir','SDN',NULL,'Darfur al-Shamaliya'),(3235,'Juba','SDN',NULL,'Bahr al-Jabal'),(3236,'Helsinki [Helsingfors]','FIN',NULL,'Newmaa'),(3237,'Espoo','FIN',NULL,'Newmaa'),(3238,'Tampere','FIN',NULL,'Pirkanmaa'),(3239,'Vantaa','FIN',NULL,'Newmaa'),(3240,'Turku [Ã…bo]','FIN',NULL,'Varsinais-Suomi'),(3241,'Oulu','FIN',NULL,'Pohjois-Pohjanmaa'),(3242,'Lahti','FIN',NULL,'PÃ¤ijÃ¤t-HÃ¤me'),(3243,'Paramaribo','SUR',NULL,'Paramaribo'),(3244,'Mbabane','SWZ',NULL,'Hhohho'),(3245,'ZÃ¼rich','CHE',NULL,'ZÃ¼rich'),(3246,'Geneve','CHE',NULL,'Geneve'),(3247,'Basel','CHE',NULL,'Basel-Stadt'),(3248,'Bern','CHE',NULL,'Bern'),(3249,'Lausanne','CHE',NULL,'Vaud'),(3250,'Damascus','SYR',NULL,'Damascus'),(3251,'Aleppo','SYR',NULL,'Aleppo'),(3252,'Hims','SYR',NULL,'Hims'),(3253,'Hama','SYR',NULL,'Hama'),(3254,'Latakia','SYR',NULL,'Latakia'),(3255,'al-Qamishliya','SYR',NULL,'al-Hasaka'),(3256,'Dayr al-Zawr','SYR',NULL,'Dayr al-Zawr'),(3257,'Jaramana','SYR',NULL,'Damaskos'),(3258,'Duma','SYR',NULL,'Damaskos'),(3259,'al-Raqqa','SYR',NULL,'al-Raqqa'),(3260,'Idlib','SYR',NULL,'Idlib'),(3261,'Dushanbe','TJK',NULL,'Karotegin'),(3262,'Khujand','TJK',NULL,'Khujand'),(3263,'Taipei','TWN',NULL,'Taipei'),(3264,'Kaohsiung','TWN',NULL,'Kaohsiung'),(3265,'Taichung','TWN',NULL,'Taichung'),(3266,'Tainan','TWN',NULL,'Tainan'),(3267,'Panchiao','TWN',NULL,'Taipei'),(3268,'Chungho','TWN',NULL,'Taipei'),(3269,'Keelung (Chilung)','TWN',NULL,'Keelung'),(3270,'Sanchung','TWN',NULL,'Taipei'),(3271,'Hsinchuang','TWN',NULL,'Taipei'),(3272,'Hsinchu','TWN',NULL,'Hsinchu'),(3273,'Chungli','TWN',NULL,'Taoyuan'),(3274,'Fengshan','TWN',NULL,'Kaohsiung'),(3275,'Taoyuan','TWN',NULL,'Taoyuan'),(3276,'Chiayi','TWN',NULL,'Chiayi'),(3277,'Hsintien','TWN',NULL,'Taipei'),(3278,'Changhwa','TWN',NULL,'Changhwa'),(3279,'Yungho','TWN',NULL,'Taipei'),(3280,'Tucheng','TWN',NULL,'Taipei'),(3281,'Pingtung','TWN',NULL,'Pingtung'),(3282,'Yungkang','TWN',NULL,'Tainan'),(3283,'Pingchen','TWN',NULL,'Taoyuan'),(3284,'Tali','TWN',NULL,'Taichung'),(3285,'Taiping','TWN',NULL,''),(3286,'Pate','TWN',NULL,'Taoyuan'),(3287,'Fengyuan','TWN',NULL,'Taichung'),(3288,'Luchou','TWN',NULL,'Taipei'),(3289,'Hsichuh','TWN',NULL,'Taipei'),(3290,'Shulin','TWN',NULL,'Taipei'),(3291,'Yuanlin','TWN',NULL,'Changhwa'),(3292,'Yangmei','TWN',NULL,'Taoyuan'),(3293,'Taliao','TWN',NULL,''),(3294,'Kueishan','TWN',NULL,''),(3295,'Tanshui','TWN',NULL,'Taipei'),(3296,'Taitung','TWN',NULL,'Taitung'),(3297,'Hualien','TWN',NULL,'Hualien'),(3298,'Nantou','TWN',NULL,'Nantou'),(3299,'Lungtan','TWN',NULL,'Taipei'),(3300,'Touliu','TWN',NULL,'YÃ¼nlin'),(3301,'Tsaotun','TWN',NULL,'Nantou'),(3302,'Kangshan','TWN',NULL,'Kaohsiung'),(3303,'Ilan','TWN',NULL,'Ilan'),(3304,'Miaoli','TWN',NULL,'Miaoli'),(3305,'Dar es Salaam','TZA',NULL,'Dar es Salaam'),(3306,'Dodoma','TZA',NULL,'Dodoma'),(3307,'Mwanza','TZA',NULL,'Mwanza'),(3308,'Zanzibar','TZA',NULL,'Zanzibar West'),(3309,'Tanga','TZA',NULL,'Tanga'),(3310,'Mbeya','TZA',NULL,'Mbeya'),(3311,'Morogoro','TZA',NULL,'Morogoro'),(3312,'Arusha','TZA',NULL,'Arusha'),(3313,'Moshi','TZA',NULL,'Kilimanjaro'),(3314,'Tabora','TZA',NULL,'Tabora'),(3315,'KÃ¸benhavn','DNK',NULL,'KÃ¸benhavn'),(3316,'Ã…rhus','DNK',NULL,'Ã…rhus'),(3317,'Odense','DNK',NULL,'Fyn'),(3318,'Aalborg','DNK',NULL,'Nordjylland'),(3319,'Frederiksberg','DNK',NULL,'Frederiksberg'),(3320,'Bangkok','THA',NULL,'Bangkok'),(3321,'Nonthaburi','THA',NULL,'Nonthaburi'),(3322,'Nakhon Ratchasima','THA',NULL,'Nakhon Ratchasima'),(3323,'Chiang Mai','THA',NULL,'Chiang Mai'),(3324,'Udon Thani','THA',NULL,'Udon Thani'),(3325,'Hat Yai','THA',NULL,'Songkhla'),(3326,'Khon Kaen','THA',NULL,'Khon Kaen'),(3327,'Pak Kret','THA',NULL,'Nonthaburi'),(3328,'Nakhon Sawan','THA',NULL,'Nakhon Sawan'),(3329,'Ubon Ratchathani','THA',NULL,'Ubon Ratchathani'),(3330,'Songkhla','THA',NULL,'Songkhla'),(3331,'Nakhon Pathom','THA',NULL,'Nakhon Pathom'),(3332,'LomÃ©','TGO',NULL,'Maritime'),(3333,'Fakaofo','TKL',NULL,'Fakaofo'),(3334,'NukuÂ´alofa','TON',NULL,'Tongatapu'),(3335,'Chaguanas','TTO',NULL,'Caroni'),(3336,'Port-of-Spain','TTO',NULL,'Port-of-Spain'),(3337,'NÂ´DjamÃ©na','TCD',NULL,'Chari-Baguirmi'),(3338,'Moundou','TCD',NULL,'Logone Occidental'),(3339,'Praha','CZE',NULL,'HlavnÃ­ mesto Praha'),(3340,'Brno','CZE',NULL,'JiznÃ­ Morava'),(3341,'Ostrava','CZE',NULL,'SevernÃ­ Morava'),(3342,'Plzen','CZE',NULL,'ZapadnÃ­ Cechy'),(3343,'Olomouc','CZE',NULL,'SevernÃ­ Morava'),(3344,'Liberec','CZE',NULL,'SevernÃ­ Cechy'),(3345,'CeskÃ© Budejovice','CZE',NULL,'JiznÃ­ Cechy'),(3346,'Hradec KrÃ¡lovÃ©','CZE',NULL,'VÃ½chodnÃ­ Cechy'),(3347,'ÃšstÃ­ nad Labem','CZE',NULL,'SevernÃ­ Cechy'),(3348,'Pardubice','CZE',NULL,'VÃ½chodnÃ­ Cechy'),(3349,'Tunis','TUN',NULL,'Tunis'),(3350,'Sfax','TUN',NULL,'Sfax'),(3351,'Ariana','TUN',NULL,'Ariana'),(3352,'Ettadhamen','TUN',NULL,'Ariana'),(3353,'Sousse','TUN',NULL,'Sousse'),(3354,'Kairouan','TUN',NULL,'Kairouan'),(3355,'Biserta','TUN',NULL,'Biserta'),(3356,'GabÃ¨s','TUN',NULL,'GabÃ¨s'),(3357,'Istanbul','TUR',NULL,'Istanbul'),(3358,'Ankara','TUR',NULL,'Ankara'),(3359,'Izmir','TUR',NULL,'Izmir'),(3360,'Adana','TUR',NULL,'Adana'),(3361,'Bursa','TUR',NULL,'Bursa'),(3362,'Gaziantep','TUR',NULL,'Gaziantep'),(3363,'Konya','TUR',NULL,'Konya'),(3364,'Mersin (IÃ§el)','TUR',NULL,'IÃ§el'),(3365,'Antalya','TUR',NULL,'Antalya'),(3366,'Diyarbakir','TUR',NULL,'Diyarbakir'),(3367,'Kayseri','TUR',NULL,'Kayseri'),(3368,'Eskisehir','TUR',NULL,'Eskisehir'),(3369,'Sanliurfa','TUR',NULL,'Sanliurfa'),(3370,'Samsun','TUR',NULL,'Samsun'),(3371,'Malatya','TUR',NULL,'Malatya'),(3372,'Gebze','TUR',NULL,'Kocaeli'),(3373,'Denizli','TUR',NULL,'Denizli'),(3374,'Sivas','TUR',NULL,'Sivas'),(3375,'Erzurum','TUR',NULL,'Erzurum'),(3376,'Tarsus','TUR',NULL,'Adana'),(3377,'Kahramanmaras','TUR',NULL,'Kahramanmaras'),(3378,'ElÃ¢zig','TUR',NULL,'ElÃ¢zig'),(3379,'Van','TUR',NULL,'Van'),(3380,'Sultanbeyli','TUR',NULL,'Istanbul'),(3381,'Izmit (Kocaeli)','TUR',NULL,'Kocaeli'),(3382,'Manisa','TUR',NULL,'Manisa'),(3383,'Batman','TUR',NULL,'Batman'),(3384,'Balikesir','TUR',NULL,'Balikesir'),(3385,'Sakarya (Adapazari)','TUR',NULL,'Sakarya'),(3386,'Iskenderun','TUR',NULL,'Hatay'),(3387,'Osmaniye','TUR',NULL,'Osmaniye'),(3388,'Ã‡orum','TUR',NULL,'Ã‡orum'),(3389,'KÃ¼tahya','TUR',NULL,'KÃ¼tahya'),(3390,'Hatay (Antakya)','TUR',NULL,'Hatay'),(3391,'Kirikkale','TUR',NULL,'Kirikkale'),(3392,'Adiyaman','TUR',NULL,'Adiyaman'),(3393,'Trabzon','TUR',NULL,'Trabzon'),(3394,'Ordu','TUR',NULL,'Ordu'),(3395,'Aydin','TUR',NULL,'Aydin'),(3396,'Usak','TUR',NULL,'Usak'),(3397,'Edirne','TUR',NULL,'Edirne'),(3398,'Ã‡orlu','TUR',NULL,'Tekirdag'),(3399,'Isparta','TUR',NULL,'Isparta'),(3400,'KarabÃ¼k','TUR',NULL,'KarabÃ¼k'),(3401,'Kilis','TUR',NULL,'Kilis'),(3402,'Alanya','TUR',NULL,'Antalya'),(3403,'Kiziltepe','TUR',NULL,'Mardin'),(3404,'Zonguldak','TUR',NULL,'Zonguldak'),(3405,'Siirt','TUR',NULL,'Siirt'),(3406,'Viransehir','TUR',NULL,'Sanliurfa'),(3407,'Tekirdag','TUR',NULL,'Tekirdag'),(3408,'Karaman','TUR',NULL,'Karaman'),(3409,'Afyon','TUR',NULL,'Afyon'),(3410,'Aksaray','TUR',NULL,'Aksaray'),(3411,'Ceyhan','TUR',NULL,'Adana'),(3412,'Erzincan','TUR',NULL,'Erzincan'),(3413,'Bismil','TUR',NULL,'Diyarbakir'),(3414,'Nazilli','TUR',NULL,'Aydin'),(3415,'Tokat','TUR',NULL,'Tokat'),(3416,'Kars','TUR',NULL,'Kars'),(3417,'InegÃ¶l','TUR',NULL,'Bursa'),(3418,'Bandirma','TUR',NULL,'Balikesir'),(3419,'Ashgabat','TKM',NULL,'Ahal'),(3420,'ChÃ¤rjew','TKM',NULL,'Lebap'),(3421,'Dashhowuz','TKM',NULL,'Dashhowuz'),(3422,'Mary','TKM',NULL,'Mary'),(3423,'Cockburn Town','TCA',NULL,'Grand Turk'),(3424,'Funafuti','TUV',NULL,'Funafuti'),(3425,'Kampala','UGA',NULL,'Central'),(3426,'Kyiv','UKR',NULL,'Kiova'),(3427,'Harkova [Harkiv]','UKR',NULL,'Harkova'),(3428,'Dnipropetrovsk','UKR',NULL,'Dnipropetrovsk'),(3429,'Donetsk','UKR',NULL,'Donetsk'),(3430,'Odesa','UKR',NULL,'Odesa'),(3431,'Zaporizzja','UKR',NULL,'Zaporizzja'),(3432,'Lviv','UKR',NULL,'Lviv'),(3433,'Kryvyi Rig','UKR',NULL,'Dnipropetrovsk'),(3434,'Mykolajiv','UKR',NULL,'Mykolajiv'),(3435,'Mariupol','UKR',NULL,'Donetsk'),(3436,'Lugansk','UKR',NULL,'Lugansk'),(3437,'Vinnytsja','UKR',NULL,'Vinnytsja'),(3438,'Makijivka','UKR',NULL,'Donetsk'),(3439,'Herson','UKR',NULL,'Herson'),(3440,'Sevastopol','UKR',NULL,'Krim'),(3441,'Simferopol','UKR',NULL,'Krim'),(3442,'Pultava [Poltava]','UKR',NULL,'Pultava'),(3443,'TÅ¡ernigiv','UKR',NULL,'TÅ¡ernigiv'),(3444,'TÅ¡erkasy','UKR',NULL,'TÅ¡erkasy'),(3445,'Gorlivka','UKR',NULL,'Donetsk'),(3446,'Zytomyr','UKR',NULL,'Zytomyr'),(3447,'Sumy','UKR',NULL,'Sumy'),(3448,'Dniprodzerzynsk','UKR',NULL,'Dnipropetrovsk'),(3449,'Kirovograd','UKR',NULL,'Kirovograd'),(3450,'Hmelnytskyi','UKR',NULL,'Hmelnytskyi'),(3451,'TÅ¡ernivtsi','UKR',NULL,'TÅ¡ernivtsi'),(3452,'Rivne','UKR',NULL,'Rivne'),(3453,'KrementÅ¡uk','UKR',NULL,'Pultava'),(3454,'Ivano-Frankivsk','UKR',NULL,'Ivano-Frankivsk'),(3455,'Ternopil','UKR',NULL,'Ternopil'),(3456,'Lutsk','UKR',NULL,'Volynia'),(3457,'Bila Tserkva','UKR',NULL,'Kiova'),(3458,'Kramatorsk','UKR',NULL,'Donetsk'),(3459,'Melitopol','UKR',NULL,'Zaporizzja'),(3460,'KertÅ¡','UKR',NULL,'Krim'),(3461,'Nikopol','UKR',NULL,'Dnipropetrovsk'),(3462,'Berdjansk','UKR',NULL,'Zaporizzja'),(3463,'Pavlograd','UKR',NULL,'Dnipropetrovsk'),(3464,'Sjeverodonetsk','UKR',NULL,'Lugansk'),(3465,'Slovjansk','UKR',NULL,'Donetsk'),(3466,'Uzgorod','UKR',NULL,'Taka-Karpatia'),(3467,'AltÅ¡evsk','UKR',NULL,'Lugansk'),(3468,'LysytÅ¡ansk','UKR',NULL,'Lugansk'),(3469,'Jevpatorija','UKR',NULL,'Krim'),(3470,'Kamjanets-Podilskyi','UKR',NULL,'Hmelnytskyi'),(3471,'Jenakijeve','UKR',NULL,'Donetsk'),(3472,'Krasnyi LutÅ¡','UKR',NULL,'Lugansk'),(3473,'Stahanov','UKR',NULL,'Lugansk'),(3474,'Oleksandrija','UKR',NULL,'Kirovograd'),(3475,'Konotop','UKR',NULL,'Sumy'),(3476,'Kostjantynivka','UKR',NULL,'Donetsk'),(3477,'BerdytÅ¡iv','UKR',NULL,'Zytomyr'),(3478,'Izmajil','UKR',NULL,'Odesa'),(3479,'Å ostka','UKR',NULL,'Sumy'),(3480,'Uman','UKR',NULL,'TÅ¡erkasy'),(3481,'Brovary','UKR',NULL,'Kiova'),(3482,'MukatÅ¡eve','UKR',NULL,'Taka-Karpatia'),(3483,'Budapest','HUN',NULL,'Budapest'),(3484,'Debrecen','HUN',NULL,'HajdÃº-Bihar'),(3485,'Miskolc','HUN',NULL,'Borsod-AbaÃºj-ZemplÃ'),(3486,'Szeged','HUN',NULL,'CsongrÃ¡d'),(3487,'PÃ©cs','HUN',NULL,'Baranya'),(3488,'GyÃ¶r','HUN',NULL,'GyÃ¶r-Moson-Sopron'),(3489,'NyiregyhÃ¡za','HUN',NULL,'Szabolcs-SzatmÃ¡r-Be'),(3490,'KecskemÃ©t','HUN',NULL,'BÃ¡cs-Kiskun'),(3491,'SzÃ©kesfehÃ©rvÃ¡r','HUN',NULL,'FejÃ©r'),(3492,'Montevideo','URY',NULL,'Montevideo'),(3493,'NoumÃ©a','NCL',NULL,'â€“'),(3494,'Auckland','NZL',NULL,'Auckland'),(3495,'Christchurch','NZL',NULL,'Canterbury'),(3496,'Manukau','NZL',NULL,'Auckland'),(3497,'North Shore','NZL',NULL,'Auckland'),(3498,'Waitakere','NZL',NULL,'Auckland'),(3499,'Wellington','NZL',NULL,'Wellington'),(3500,'Dunedin','NZL',NULL,'Dunedin'),(3501,'Hamilton','NZL',NULL,'Hamilton'),(3502,'Lower Hutt','NZL',NULL,'Wellington'),(3503,'Toskent','UZB',NULL,'Toskent Shahri'),(3504,'Namangan','UZB',NULL,'Namangan'),(3505,'Samarkand','UZB',NULL,'Samarkand'),(3506,'Andijon','UZB',NULL,'Andijon'),(3507,'Buhoro','UZB',NULL,'Buhoro'),(3508,'Karsi','UZB',NULL,'Qashqadaryo'),(3509,'Nukus','UZB',NULL,'Karakalpakistan'),(3510,'KÃ¼kon','UZB',NULL,'Fargona'),(3511,'Fargona','UZB',NULL,'Fargona'),(3512,'Circik','UZB',NULL,'Toskent'),(3513,'Margilon','UZB',NULL,'Fargona'),(3514,'Ãœrgenc','UZB',NULL,'Khorazm'),(3515,'Angren','UZB',NULL,'Toskent'),(3516,'Cizah','UZB',NULL,'Cizah'),(3517,'Navoi','UZB',NULL,'Navoi'),(3518,'Olmalik','UZB',NULL,'Toskent'),(3519,'Termiz','UZB',NULL,'Surkhondaryo'),(3520,'Minsk','BLR',NULL,'Horad Minsk'),(3521,'Gomel','BLR',NULL,'Gomel'),(3522,'Mogiljov','BLR',NULL,'Mogiljov'),(3523,'Vitebsk','BLR',NULL,'Vitebsk'),(3524,'Grodno','BLR',NULL,'Grodno'),(3525,'Brest','BLR',NULL,'Brest'),(3526,'Bobruisk','BLR',NULL,'Mogiljov'),(3527,'BaranovitÅ¡i','BLR',NULL,'Brest'),(3528,'Borisov','BLR',NULL,'Minsk'),(3529,'Pinsk','BLR',NULL,'Brest'),(3530,'OrÅ¡a','BLR',NULL,'Vitebsk'),(3531,'Mozyr','BLR',NULL,'Gomel'),(3532,'Novopolotsk','BLR',NULL,'Vitebsk'),(3533,'Lida','BLR',NULL,'Grodno'),(3534,'Soligorsk','BLR',NULL,'Minsk'),(3535,'MolodetÅ¡no','BLR',NULL,'Minsk'),(3536,'Mata-Utu','WLF',NULL,'Wallis'),(3537,'Port-Vila','VUT',NULL,'Shefa'),(3538,'CittÃ  del Vaticano','VAT',NULL,'â€“'),(3539,'Caracas','VEN',NULL,'Distrito Federal'),(3540,'MaracaÃ­bo','VEN',NULL,'Zulia'),(3541,'Barquisimeto','VEN',NULL,'Lara'),(3542,'Valencia','VEN',NULL,'Carabobo'),(3543,'Ciudad Guayana','VEN',NULL,'BolÃ­var'),(3544,'Petare','VEN',NULL,'Miranda'),(3545,'Maracay','VEN',NULL,'Aragua'),(3546,'Barcelona','VEN',NULL,'AnzoÃ¡tegui\n'),(3547,'MaturÃ­n','VEN',NULL,'Monagas'),(3548,'San CristÃ³bal','VEN',NULL,'TÃ¡chira'),(3549,'Ciudad BolÃ­var','VEN',NULL,'BolÃ­var'),(3550,'CumanÃ¡','VEN',NULL,'Sucre'),(3551,'MÃ©rida','VEN',NULL,'MÃ©rida'),(3552,'Cabimas','VEN',NULL,'Zulia'),(3553,'Barinas','VEN',NULL,'Barinas'),(3554,'Turmero','VEN',NULL,'Aragua'),(3555,'Baruta','VEN',NULL,'Miranda'),(3556,'Puerto Cabello','VEN',NULL,'Carabobo'),(3557,'Santa Ana de Coro','VEN',NULL,'FalcÃ³n'),(3558,'Los Teques','VEN',NULL,'Miranda'),(3559,'Punto Fijo','VEN',NULL,'FalcÃ³n'),(3560,'Guarenas','VEN',NULL,'Miranda'),(3561,'Acarigua','VEN',NULL,'Portuguesa'),(3562,'Puerto La Cruz','VEN',NULL,'AnzoÃ¡tegui'),(3563,'Ciudad Losada','VEN',NULL,''),(3564,'Guacara','VEN',NULL,'Carabobo'),(3565,'Valera','VEN',NULL,'Trujillo'),(3566,'Guanare','VEN',NULL,'Portuguesa'),(3567,'CarÃºpano','VEN',NULL,'Sucre'),(3568,'Catia La Mar','VEN',NULL,'Distrito Federal'),(3569,'El Tigre','VEN',NULL,'AnzoÃ¡tegui'),(3570,'Guatire','VEN',NULL,'Miranda'),(3571,'Calabozo','VEN',NULL,'GuÃ¡rico'),(3572,'Pozuelos','VEN',NULL,'AnzoÃ¡tegui'),(3573,'Ciudad Ojeda','VEN',NULL,'Zulia'),(3574,'Ocumare del Tuy','VEN',NULL,'Miranda'),(3575,'Valle de la Pascua','VEN',NULL,'GuÃ¡rico'),(3576,'Araure','VEN',NULL,'Portuguesa'),(3577,'San Fernando de Apure','VEN',NULL,'Apure'),(3578,'San Felipe','VEN',NULL,'Yaracuy'),(3579,'El LimÃ³n','VEN',NULL,'Aragua'),(3580,'Moscow','RUS',NULL,'Moscow (City)'),(3581,'St Petersburg','RUS',NULL,'Pietari'),(3582,'Novosibirsk','RUS',NULL,'Novosibirsk'),(3583,'Nizni Novgorod','RUS',NULL,'Nizni Novgorod'),(3584,'Jekaterinburg','RUS',NULL,'Sverdlovsk'),(3585,'Samara','RUS',NULL,'Samara'),(3586,'Omsk','RUS',NULL,'Omsk'),(3587,'Kazan','RUS',NULL,'Tatarstan'),(3588,'Ufa','RUS',NULL,'BaÅ¡kortostan'),(3589,'TÅ¡eljabinsk','RUS',NULL,'TÅ¡eljabinsk'),(3590,'Rostov-na-Donu','RUS',NULL,'Rostov-na-Donu'),(3591,'Perm','RUS',NULL,'Perm'),(3592,'Volgograd','RUS',NULL,'Volgograd'),(3593,'Voronez','RUS',NULL,'Voronez'),(3594,'Krasnojarsk','RUS',NULL,'Krasnojarsk'),(3595,'Saratov','RUS',NULL,'Saratov'),(3596,'Toljatti','RUS',NULL,'Samara'),(3597,'Uljanovsk','RUS',NULL,'Uljanovsk'),(3598,'Izevsk','RUS',NULL,'Udmurtia'),(3599,'Krasnodar','RUS',NULL,'Krasnodar'),(3600,'Jaroslavl','RUS',NULL,'Jaroslavl'),(3601,'Habarovsk','RUS',NULL,'Habarovsk'),(3602,'Vladivostok','RUS',NULL,'Primorje'),(3603,'Irkutsk','RUS',NULL,'Irkutsk'),(3604,'Barnaul','RUS',NULL,'Altai'),(3605,'Novokuznetsk','RUS',NULL,'Kemerovo'),(3606,'Penza','RUS',NULL,'Penza'),(3607,'Rjazan','RUS',NULL,'Rjazan'),(3608,'Orenburg','RUS',NULL,'Orenburg'),(3609,'Lipetsk','RUS',NULL,'Lipetsk'),(3610,'Nabereznyje TÅ¡elny','RUS',NULL,'Tatarstan'),(3611,'Tula','RUS',NULL,'Tula'),(3612,'Tjumen','RUS',NULL,'Tjumen'),(3613,'Kemerovo','RUS',NULL,'Kemerovo'),(3614,'Astrahan','RUS',NULL,'Astrahan'),(3615,'Tomsk','RUS',NULL,'Tomsk'),(3616,'Kirov','RUS',NULL,'Kirov'),(3617,'Ivanovo','RUS',NULL,'Ivanovo'),(3618,'TÅ¡eboksary','RUS',NULL,'TÅ¡uvassia'),(3619,'Brjansk','RUS',NULL,'Brjansk'),(3620,'Tver','RUS',NULL,'Tver'),(3621,'Kursk','RUS',NULL,'Kursk'),(3622,'Magnitogorsk','RUS',NULL,'TÅ¡eljabinsk'),(3623,'Kaliningrad','RUS',NULL,'Kaliningrad'),(3624,'Nizni Tagil','RUS',NULL,'Sverdlovsk'),(3625,'Murmansk','RUS',NULL,'Murmansk'),(3626,'Ulan-Ude','RUS',NULL,'Burjatia'),(3627,'Kurgan','RUS',NULL,'Kurgan'),(3628,'Arkangeli','RUS',NULL,'Arkangeli'),(3629,'SotÅ¡i','RUS',NULL,'Krasnodar'),(3630,'Smolensk','RUS',NULL,'Smolensk'),(3631,'Orjol','RUS',NULL,'Orjol'),(3632,'Stavropol','RUS',NULL,'Stavropol'),(3633,'Belgorod','RUS',NULL,'Belgorod'),(3634,'Kaluga','RUS',NULL,'Kaluga'),(3635,'Vladimir','RUS',NULL,'Vladimir'),(3636,'MahatÅ¡kala','RUS',NULL,'Dagestan'),(3637,'TÅ¡erepovets','RUS',NULL,'Vologda'),(3638,'Saransk','RUS',NULL,'Mordva'),(3639,'Tambov','RUS',NULL,'Tambov'),(3640,'Vladikavkaz','RUS',NULL,'North Ossetia-Alania'),(3641,'TÅ¡ita','RUS',NULL,'TÅ¡ita'),(3642,'Vologda','RUS',NULL,'Vologda'),(3643,'Veliki Novgorod','RUS',NULL,'Novgorod'),(3644,'Komsomolsk-na-Amure','RUS',NULL,'Habarovsk'),(3645,'Kostroma','RUS',NULL,'Kostroma'),(3646,'Volzski','RUS',NULL,'Volgograd'),(3647,'Taganrog','RUS',NULL,'Rostov-na-Donu'),(3648,'Petroskoi','RUS',NULL,'Karjala'),(3649,'Bratsk','RUS',NULL,'Irkutsk'),(3650,'Dzerzinsk','RUS',NULL,'Nizni Novgorod'),(3651,'Surgut','RUS',NULL,'Hanti-Mansia'),(3652,'Orsk','RUS',NULL,'Orenburg'),(3653,'Sterlitamak','RUS',NULL,'BaÅ¡kortostan'),(3654,'Angarsk','RUS',NULL,'Irkutsk'),(3655,'JoÅ¡kar-Ola','RUS',NULL,'Marinmaa'),(3656,'Rybinsk','RUS',NULL,'Jaroslavl'),(3657,'Prokopjevsk','RUS',NULL,'Kemerovo'),(3658,'Niznevartovsk','RUS',NULL,'Hanti-Mansia'),(3659,'NaltÅ¡ik','RUS',NULL,'Kabardi-Balkaria'),(3660,'Syktyvkar','RUS',NULL,'Komi'),(3661,'Severodvinsk','RUS',NULL,'Arkangeli'),(3662,'Bijsk','RUS',NULL,'Altai'),(3663,'Niznekamsk','RUS',NULL,'Tatarstan'),(3664,'BlagoveÅ¡tÅ¡ensk','RUS',NULL,'Amur'),(3665,'Å ahty','RUS',NULL,'Rostov-na-Donu'),(3666,'Staryi Oskol','RUS',NULL,'Belgorod'),(3667,'Zelenograd','RUS',NULL,'Moscow (City)'),(3668,'Balakovo','RUS',NULL,'Saratov'),(3669,'Novorossijsk','RUS',NULL,'Krasnodar'),(3670,'Pihkova','RUS',NULL,'Pihkova'),(3671,'Zlatoust','RUS',NULL,'TÅ¡eljabinsk'),(3672,'Jakutsk','RUS',NULL,'Saha (Jakutia)'),(3673,'Podolsk','RUS',NULL,'Moskova'),(3674,'Petropavlovsk-KamtÅ¡atski','RUS',NULL,'KamtÅ¡atka'),(3675,'Kamensk-Uralski','RUS',NULL,'Sverdlovsk'),(3676,'Engels','RUS',NULL,'Saratov'),(3677,'Syzran','RUS',NULL,'Samara'),(3678,'Grozny','RUS',NULL,'TÅ¡etÅ¡enia'),(3679,'NovotÅ¡erkassk','RUS',NULL,'Rostov-na-Donu'),(3680,'Berezniki','RUS',NULL,'Perm'),(3681,'Juzno-Sahalinsk','RUS',NULL,'Sahalin'),(3682,'Volgodonsk','RUS',NULL,'Rostov-na-Donu'),(3683,'Abakan','RUS',NULL,'Hakassia'),(3684,'Maikop','RUS',NULL,'Adygea'),(3685,'Miass','RUS',NULL,'TÅ¡eljabinsk'),(3686,'Armavir','RUS',NULL,'Krasnodar'),(3687,'Ljubertsy','RUS',NULL,'Moskova'),(3688,'Rubtsovsk','RUS',NULL,'Altai'),(3689,'Kovrov','RUS',NULL,'Vladimir'),(3690,'Nahodka','RUS',NULL,'Primorje'),(3691,'Ussurijsk','RUS',NULL,'Primorje'),(3692,'Salavat','RUS',NULL,'BaÅ¡kortostan'),(3693,'MytiÅ¡tÅ¡i','RUS',NULL,'Moskova'),(3694,'Kolomna','RUS',NULL,'Moskova'),(3695,'Elektrostal','RUS',NULL,'Moskova'),(3696,'Murom','RUS',NULL,'Vladimir'),(3697,'Kolpino','RUS',NULL,'Pietari'),(3698,'Norilsk','RUS',NULL,'Krasnojarsk'),(3699,'Almetjevsk','RUS',NULL,'Tatarstan'),(3700,'Novomoskovsk','RUS',NULL,'Tula'),(3701,'Dimitrovgrad','RUS',NULL,'Uljanovsk'),(3702,'Pervouralsk','RUS',NULL,'Sverdlovsk'),(3703,'Himki','RUS',NULL,'Moskova'),(3704,'BalaÅ¡iha','RUS',NULL,'Moskova'),(3705,'Nevinnomyssk','RUS',NULL,'Stavropol'),(3706,'Pjatigorsk','RUS',NULL,'Stavropol'),(3707,'Korolev','RUS',NULL,'Moskova'),(3708,'Serpuhov','RUS',NULL,'Moskova'),(3709,'Odintsovo','RUS',NULL,'Moskova'),(3710,'Orehovo-Zujevo','RUS',NULL,'Moskova'),(3711,'KamyÅ¡in','RUS',NULL,'Volgograd'),(3712,'NovotÅ¡eboksarsk','RUS',NULL,'TÅ¡uvassia'),(3713,'TÅ¡erkessk','RUS',NULL,'KaratÅ¡ai-TÅ¡erkessi'),(3714,'AtÅ¡insk','RUS',NULL,'Krasnojarsk'),(3715,'Magadan','RUS',NULL,'Magadan'),(3716,'MitÅ¡urinsk','RUS',NULL,'Tambov'),(3717,'Kislovodsk','RUS',NULL,'Stavropol'),(3718,'Jelets','RUS',NULL,'Lipetsk'),(3719,'Seversk','RUS',NULL,'Tomsk'),(3720,'Noginsk','RUS',NULL,'Moskova'),(3721,'Velikije Luki','RUS',NULL,'Pihkova'),(3722,'NovokuibyÅ¡evsk','RUS',NULL,'Samara'),(3723,'Neftekamsk','RUS',NULL,'BaÅ¡kortostan'),(3724,'Leninsk-Kuznetski','RUS',NULL,'Kemerovo'),(3725,'Oktjabrski','RUS',NULL,'BaÅ¡kortostan'),(3726,'Sergijev Posad','RUS',NULL,'Moskova'),(3727,'Arzamas','RUS',NULL,'Nizni Novgorod'),(3728,'Kiseljovsk','RUS',NULL,'Kemerovo'),(3729,'Novotroitsk','RUS',NULL,'Orenburg'),(3730,'Obninsk','RUS',NULL,'Kaluga'),(3731,'Kansk','RUS',NULL,'Krasnojarsk'),(3732,'Glazov','RUS',NULL,'Udmurtia'),(3733,'Solikamsk','RUS',NULL,'Perm'),(3734,'Sarapul','RUS',NULL,'Udmurtia'),(3735,'Ust-Ilimsk','RUS',NULL,'Irkutsk'),(3736,'Å tÅ¡olkovo','RUS',NULL,'Moskova'),(3737,'MezduretÅ¡ensk','RUS',NULL,'Kemerovo'),(3738,'Usolje-Sibirskoje','RUS',NULL,'Irkutsk'),(3739,'Elista','RUS',NULL,'Kalmykia'),(3740,'NovoÅ¡ahtinsk','RUS',NULL,'Rostov-na-Donu'),(3741,'Votkinsk','RUS',NULL,'Udmurtia'),(3742,'Kyzyl','RUS',NULL,'Tyva'),(3743,'Serov','RUS',NULL,'Sverdlovsk'),(3744,'Zelenodolsk','RUS',NULL,'Tatarstan'),(3745,'Zeleznodoroznyi','RUS',NULL,'Moskova'),(3746,'KineÅ¡ma','RUS',NULL,'Ivanovo'),(3747,'Kuznetsk','RUS',NULL,'Penza'),(3748,'Uhta','RUS',NULL,'Komi'),(3749,'Jessentuki','RUS',NULL,'Stavropol'),(3750,'Tobolsk','RUS',NULL,'Tjumen'),(3751,'Neftejugansk','RUS',NULL,'Hanti-Mansia'),(3752,'Bataisk','RUS',NULL,'Rostov-na-Donu'),(3753,'Nojabrsk','RUS',NULL,'Yamalin Nenetsia'),(3754,'BalaÅ¡ov','RUS',NULL,'Saratov'),(3755,'Zeleznogorsk','RUS',NULL,'Kursk'),(3756,'Zukovski','RUS',NULL,'Moskova'),(3757,'Anzero-Sudzensk','RUS',NULL,'Kemerovo'),(3758,'Bugulma','RUS',NULL,'Tatarstan'),(3759,'Zeleznogorsk','RUS',NULL,'Krasnojarsk'),(3760,'Novouralsk','RUS',NULL,'Sverdlovsk'),(3761,'PuÅ¡kin','RUS',NULL,'Pietari'),(3762,'Vorkuta','RUS',NULL,'Komi'),(3763,'Derbent','RUS',NULL,'Dagestan'),(3764,'Kirovo-TÅ¡epetsk','RUS',NULL,'Kirov'),(3765,'Krasnogorsk','RUS',NULL,'Moskova'),(3766,'Klin','RUS',NULL,'Moskova'),(3767,'TÅ¡aikovski','RUS',NULL,'Perm'),(3768,'Novyi Urengoi','RUS',NULL,'Yamalin Nenetsia'),(3769,'Ho Chi Minh City','VNM',NULL,'Ho Chi Minh City'),(3770,'Hanoi','VNM',NULL,'Hanoi'),(3771,'Haiphong','VNM',NULL,'Haiphong'),(3772,'Da Nang','VNM',NULL,'Quang Nam-Da Nang'),(3773,'BiÃªn Hoa','VNM',NULL,'Dong Nai'),(3774,'Nha Trang','VNM',NULL,'Khanh Hoa'),(3775,'Hue','VNM',NULL,'Thua Thien-Hue'),(3776,'Can Tho','VNM',NULL,'Can Tho'),(3777,'Cam Pha','VNM',NULL,'Quang Binh'),(3778,'Nam Dinh','VNM',NULL,'Nam Ha'),(3779,'Quy Nhon','VNM',NULL,'Binh Dinh'),(3780,'Vung Tau','VNM',NULL,'Ba Ria-Vung Tau'),(3781,'Rach Gia','VNM',NULL,'Kien Giang'),(3782,'Long Xuyen','VNM',NULL,'An Giang'),(3783,'Thai Nguyen','VNM',NULL,'Bac Thai'),(3784,'Hong Gai','VNM',NULL,'Quang Ninh'),(3785,'Phan ThiÃªt','VNM',NULL,'Binh Thuan'),(3786,'Cam Ranh','VNM',NULL,'Khanh Hoa'),(3787,'Vinh','VNM',NULL,'Nghe An'),(3788,'My Tho','VNM',NULL,'Tien Giang'),(3789,'Da Lat','VNM',NULL,'Lam Dong'),(3790,'Buon Ma Thuot','VNM',NULL,'Dac Lac'),(3791,'Tallinn','EST',NULL,'Harjumaa'),(3792,'Tartu','EST',NULL,'Tartumaa'),(3793,'New York','USA',NULL,'New York'),(3794,'Los Angeles','USA',NULL,'California'),(3795,'Chicago','USA',NULL,'Illinois'),(3796,'Houston','USA',NULL,'Texas'),(3797,'Philadelphia','USA',NULL,'Pennsylvania'),(3798,'Phoenix','USA',NULL,'Arizona'),(3799,'San Diego','USA',NULL,'California'),(3800,'Dallas','USA',NULL,'Texas'),(3801,'San Antonio','USA',NULL,'Texas'),(3802,'Detroit','USA',NULL,'Michigan'),(3803,'San Jose','USA',NULL,'California'),(3804,'Indianapolis','USA',NULL,'Indiana'),(3805,'San Francisco','USA',NULL,'California'),(3806,'Jacksonville','USA',NULL,'Florida'),(3807,'Columbus','USA',NULL,'Ohio'),(3808,'Austin','USA',NULL,'Texas'),(3809,'Baltimore','USA',NULL,'Maryland'),(3810,'Memphis','USA',NULL,'Tennessee'),(3811,'Milwaukee','USA',NULL,'Wisconsin'),(3812,'Boston','USA',NULL,'Massachusetts'),(3813,'Washington','USA',NULL,'District of Columbia'),(3814,'Nashville-Davidson','USA',NULL,'Tennessee'),(3815,'El Paso','USA',NULL,'Texas'),(3816,'Seattle','USA',NULL,'Washington'),(3817,'Denver','USA',NULL,'Colorado'),(3818,'Charlotte','USA',NULL,'North\n Carolina'),(3819,'Fort Worth','USA',NULL,'Texas'),(3820,'Portland','USA',NULL,'Oregon'),(3821,'Oklahoma City','USA',NULL,'Oklahoma'),(3822,'Tucson','USA',NULL,'Arizona'),(3823,'New Orleans','USA',NULL,'Louisiana'),(3824,'Las Vegas','USA',NULL,'Nevada'),(3825,'Cleveland','USA',NULL,'Ohio'),(3826,'Long Beach','USA',NULL,'California'),(3827,'Albuquerque','USA',NULL,'New Mexico'),(3828,'Kansas City','USA',NULL,'Missouri'),(3829,'Fresno','USA',NULL,'California'),(3830,'Virginia Beach','USA',NULL,'Virginia'),(3831,'Atlanta','USA',NULL,'Georgia'),(3832,'Sacramento','USA',NULL,'California'),(3833,'Oakland','USA',NULL,'California'),(3834,'Mesa','USA',NULL,'Arizona'),(3835,'Tulsa','USA',NULL,'Oklahoma'),(3836,'Omaha','USA',NULL,'Nebraska'),(3837,'Minneapolis','USA',NULL,'Minnesota'),(3838,'Honolulu','USA',NULL,'Hawaii'),(3839,'Miami','USA',NULL,'Florida'),(3840,'Colorado Springs','USA',NULL,'Colorado'),(3841,'Saint Louis','USA',NULL,'Missouri'),(3842,'Wichita','USA',NULL,'Kansas'),(3843,'Santa Ana','USA',NULL,'California'),(3844,'Pittsburgh','USA',NULL,'Pennsylvania'),(3845,'Arlington','USA',NULL,'Texas'),(3846,'Cincinnati','USA',NULL,'Ohio'),(3847,'Anaheim','USA',NULL,'California'),(3848,'Toledo','USA',NULL,'Ohio'),(3849,'Tampa','USA',NULL,'Florida'),(3850,'Buffalo','USA',NULL,'New York'),(3851,'Saint Paul','USA',NULL,'Minnesota'),(3852,'Corpus Christi','USA',NULL,'Texas'),(3853,'Aurora','USA',NULL,'Colorado'),(3854,'Raleigh','USA',NULL,'North Carolina'),(3855,'Newark','USA',NULL,'New Jersey'),(3856,'Lexington-Fayette','USA',NULL,'Kentucky'),(3857,'Anchorage','USA',NULL,'Alaska'),(3858,'Louisville','USA',NULL,'Kentucky'),(3859,'Riverside','USA',NULL,'California'),(3860,'Saint Petersburg','USA',NULL,'Florida'),(3861,'Bakersfield','USA',NULL,'California'),(3862,'Stockton','USA',NULL,'California'),(3863,'Birmingham','USA',NULL,'Alabama'),(3864,'Jersey City','USA',NULL,'New Jersey'),(3865,'Norfolk','USA',NULL,'Virginia'),(3866,'Baton Rouge','USA',NULL,'Louisiana'),(3867,'Hialeah','USA',NULL,'Florida'),(3868,'Lincoln','USA',NULL,'Nebraska'),(3869,'Greensboro','USA',NULL,'North Carolina'),(3870,'Plano','USA',NULL,'Texas'),(3871,'Rochester','USA',NULL,'New York'),(3872,'Glendale','USA',NULL,'Arizona'),(3873,'Akron','USA',NULL,'Ohio'),(3874,'Garland','USA',NULL,'Texas'),(3875,'Madison','USA',NULL,'Wisconsin'),(3876,'Fort Wayne','USA',NULL,'Indiana'),(3877,'Fremont','USA',NULL,'California'),(3878,'Scottsdale','USA',NULL,'Arizona'),(3879,'Montgomery','USA',NULL,'Alabama'),(3880,'Shreveport','USA',NULL,'Louisiana'),(3881,'Augusta-Richmond County','USA',NULL,'Georgia'),(3882,'Lubbock','USA',NULL,'Texas'),(3883,'Chesapeake','USA',NULL,'Virginia'),(3884,'Mobile','USA',NULL,'Alabama'),(3885,'Des Moines','USA',NULL,'Iowa'),(3886,'Grand Rapids','USA',NULL,'Michigan'),(3887,'Richmond','USA',NULL,'Virginia'),(3888,'Yonkers','USA',NULL,'New York'),(3889,'Spokane','USA',NULL,'Washington'),(3890,'Glendale','USA',NULL,'California'),(3891,'Tacoma','USA',NULL,'Washington'),(3892,'Irving','USA',NULL,'Texas'),(3893,'Huntington Beach','USA',NULL,'California'),(3894,'Modesto','USA',NULL,'California'),(3895,'Durham','USA',NULL,'North Carolina'),(3896,'Columbus','USA',NULL,'Georgia'),(3897,'Orlando','USA',NULL,'Florida'),(3898,'Boise City','USA',NULL,'Idaho'),(3899,'Winston-Salem','USA',NULL,'North Carolina'),(3900,'San Bernardino','USA',NULL,'California'),(3901,'Jackson','USA',NULL,'Mississippi'),(3902,'Little Rock','USA',NULL,'Arkansas'),(3903,'Salt Lake City','USA',NULL,'Utah'),(3904,'Reno','USA',NULL,'Nevada'),(3905,'Newport News','USA',NULL,'Virginia'),(3906,'Chandler','USA',NULL,'Arizona'),(3907,'Laredo','USA',NULL,'Texas'),(3908,'Henderson','USA',NULL,'Nevada'),(3909,'Arlington','USA',NULL,'Virginia'),(3910,'Knoxville','USA',NULL,'Tennessee'),(3911,'Amarillo','USA',NULL,'Texas'),(3912,'Providence','USA',NULL,'Rhode Island'),(3913,'Chula Vista','USA',NULL,'California'),(3914,'Worcester','USA',NULL,'Massachusetts'),(3915,'Oxnard','USA',NULL,'California'),(3916,'Dayton','USA',NULL,'Ohio'),(3917,'Garden Grove','USA',NULL,'California'),(3918,'Oceanside','USA',NULL,'California'),(3919,'Tempe','USA',NULL,'Arizona'),(3920,'Huntsville','USA',NULL,'Alabama'),(3921,'Ontario','USA',NULL,'California'),(3922,'Chattanooga','USA',NULL,'Tennessee'),(3923,'Fort Lauderdale','USA',NULL,'Florida'),(3924,'Springfield','USA',NULL,'Massachusetts'),(3925,'Springfield','USA',NULL,'Missouri'),(3926,'Santa Clarita','USA',NULL,'California'),(3927,'Salinas','USA',NULL,'California'),(3928,'Tallahassee','USA',NULL,'Florida'),(3929,'Rockford','USA',NULL,'Illinois'),(3930,'Pomona','USA',NULL,'California'),(3931,'Metairie','USA',NULL,'Louisiana'),(3932,'Paterson','USA',NULL,'New Jersey'),(3933,'Overland Park','USA',NULL,'Kansas'),(3934,'Santa Rosa','USA',NULL,'California'),(3935,'Syracuse','USA',NULL,'New York'),(3936,'Kansas City','USA',NULL,'Kansas'),(3937,'Hampton','USA',NULL,'Virginia'),(3938,'Lakewood','USA',NULL,'Colorado'),(3939,'Vancouver','USA',NULL,'Washington'),(3940,'Irvine','USA',NULL,'California'),(3941,'Aurora','USA',NULL,'Illinois'),(3942,'Moreno Valley','USA',NULL,'California'),(3943,'Pasadena','USA',NULL,'California'),(3944,'Hayward','USA',NULL,'California'),(3945,'Brownsville','USA',NULL,'Texas'),(3946,'Bridgeport','USA',NULL,'Connecticut'),(3947,'Hollywood','USA',NULL,'Florida'),(3948,'Warren','USA',NULL,'Michigan'),(3949,'Torrance','USA',NULL,'California'),(3950,'Eugene','USA',NULL,'Oregon'),(3951,'Pembroke Pines','USA',NULL,'Florida'),(3952,'Salem','USA',NULL,'Oregon'),(3953,'Pasadena','USA',NULL,'Texas'),(3954,'Escondido','USA',NULL,'California'),(3955,'Sunnyvale','USA',NULL,'California'),(3956,'Savannah','USA',NULL,'Georgia'),(3957,'Fontana','USA',NULL,'California'),(3958,'Orange','USA',NULL,'California'),(3959,'Naperville','USA',NULL,'Illinois'),(3960,'Alexandria','USA',NULL,'Virginia'),(3961,'Rancho Cucamonga','USA',NULL,'California'),(3962,'Grand Prairie','USA',NULL,'Texas'),(3963,'East Los Angeles','USA',NULL,'California'),(3964,'Fullerton','USA',NULL,'California'),(3965,'Corona','USA',NULL,'California'),(3966,'Flint','USA',NULL,'Michigan'),(3967,'Paradise','USA',NULL,'Nevada'),(3968,'Mesquite','USA',NULL,'Texas'),(3969,'Sterling Heights','USA',NULL,'Michigan'),(3970,'Sioux Falls','USA',NULL,'South Dakota'),(3971,'New Haven','USA',NULL,'Connecticut'),(3972,'Topeka','USA',NULL,'Kansas'),(3973,'Concord','USA',NULL,'California'),(3974,'Evansville','USA',NULL,'Indiana'),(3975,'Hartford','USA',NULL,'Connecticut'),(3976,'Fayetteville','USA',NULL,'North Carolina'),(3977,'Cedar Rapids','USA',NULL,'Iowa'),(3978,'Elizabeth','USA',NULL,'New Jersey'),(3979,'Lansing','USA',NULL,'Michigan'),(3980,'Lancaster','USA',NULL,'California'),(3981,'Fort Collins','USA',NULL,'Colorado'),(3982,'Coral Springs','USA',NULL,'Florida'),(3983,'Stamford','USA',NULL,'Connecticut'),(3984,'Thousand Oaks','USA',NULL,'California'),(3985,'Vallejo','USA',NULL,'California'),(3986,'Palmdale','USA',NULL,'California'),(3987,'Columbia','USA',NULL,'South Carolina'),(3988,'El Monte','USA',NULL,'California'),(3989,'Abilene','USA',NULL,'Texas'),(3990,'North Las Vegas','USA',NULL,'Nevada'),(3991,'Ann Arbor','USA',NULL,'Michigan'),(3992,'Beaumont','USA',NULL,'Texas'),(3993,'Waco','USA',NULL,'Texas'),(3994,'Macon','USA',NULL,'Georgia'),(3995,'Independence','USA',NULL,'Missouri'),(3996,'Peoria','USA',NULL,'Illinois'),(3997,'Inglewood','USA',NULL,'California'),(3998,'Springfield','USA',NULL,'Illinois'),(3999,'Simi Valley','USA',NULL,'California'),(4000,'Lafayette','USA',NULL,'Louisiana'),(4001,'Gilbert','USA',NULL,'Arizona'),(4002,'Carrollton','USA',NULL,'Texas'),(4003,'Bellevue','USA',NULL,'Washington'),(4004,'West Valley City','USA',NULL,'Utah'),(4005,'Clarksville','USA',NULL,'Tennessee'),(4006,'Costa Mesa','USA',NULL,'California'),(4007,'Peoria','USA',NULL,'Arizona'),(4008,'South Bend','USA',NULL,'Indiana'),(4009,'Downey','USA',NULL,'California'),(4010,'Waterbury','USA',NULL,'Connecticut'),(4011,'Manchester','USA',NULL,'New Hampshire'),(4012,'Allentown','USA',NULL,'Pennsylvania'),(4013,'McAllen','USA',NULL,'Texas'),(4014,'Joliet','USA',NULL,'Illinois'),(4015,'Lowell','USA',NULL,'Massachusetts'),(4016,'Provo','USA',NULL,'Utah'),(4017,'West Covina','USA',NULL,'California'),(4018,'Wichita Falls','USA',NULL,'Texas'),(4019,'Erie','USA',NULL,'Pennsylvania'),(4020,'Daly City','USA',NULL,'California'),(4021,'Citrus Heights','USA',NULL,'California'),(4022,'Norwalk','USA',NULL,'California'),(4023,'Gary','USA',NULL,'Indiana'),(4024,'Berkeley','USA',NULL,'California'),(4025,'Santa Clara','USA',NULL,'California'),(4026,'Green Bay','USA',NULL,'Wisconsin'),(4027,'Cape Coral','USA',NULL,'Florida'),(4028,'Arvada','USA',NULL,'Colorado'),(4029,'Pueblo','USA',NULL,'Colorado'),(4030,'Sandy','USA',NULL,'Utah'),(4031,'Athens-Clarke County','USA',NULL,'Georgia'),(4032,'Cambridge','USA',NULL,'Massachusetts'),(4033,'Westminster','USA',NULL,'Colorado'),(4034,'San Buenaventura','USA',NULL,'California'),(4035,'Portsmouth','USA',NULL,'Virginia'),(4036,'Livonia','USA',NULL,'Michigan'),(4037,'Burbank','USA',NULL,'California'),(4038,'Clearwater','USA',NULL,'Florida'),(4039,'Midland','USA',NULL,'Texas'),(4040,'Davenport','USA',NULL,'Iowa'),(4041,'Mission Viejo','USA',NULL,'California'),(4042,'Miami Beach','USA',NULL,'Florida'),(4043,'Sunrise Manor','USA',NULL,'Nevada'),(4044,'New Bedford','USA',NULL,'Massachusetts'),(4045,'El Cajon','USA',NULL,'California'),(4046,'Norman','USA',NULL,'Oklahoma'),(4047,'Richmond','USA',NULL,'California'),(4048,'Albany','USA',NULL,'New York'),(4049,'Brockton','USA',NULL,'Massachusetts'),(4050,'Roanoke','USA',NULL,'Virginia'),(4051,'Billings','USA',NULL,'Montana'),(4052,'Compton','USA',NULL,'California'),(4053,'Gainesville','USA',NULL,'Florida'),(4054,'Fairfield','USA',NULL,'California'),(4055,'Arden-Arcade','USA',NULL,'California'),(4056,'San Mateo','USA',NULL,'California'),(4057,'Visalia','USA',NULL,'California'),(4058,'Boulder','USA',NULL,'Colorado'),(4059,'Cary','USA',NULL,'North Carolina'),(4060,'Santa Monica','USA',NULL,'California'),(4061,'Fall River','USA',NULL,'Massachusetts'),(4062,'Kenosha','USA',NULL,'Wisconsin'),(4063,'Elgin','USA',NULL,'Illinois'),(4064,'Odessa','USA',NULL,'Texas'),(4065,'Carson','USA',NULL,'California'),(4066,'Charleston','USA',NULL,'South Carolina'),(4067,'Charlotte Amalie','VIR',NULL,'St Thomas'),(4068,'Harare','ZWE',NULL,'Harare'),(4069,'Bulawayo','ZWE',NULL,'Bulawayo'),(4070,'Chitungwiza','ZWE',NULL,'Harare'),(4071,'Mount Darwin','ZWE',NULL,'Harare'),(4072,'Mutare','ZWE',NULL,'Manicaland'),(4073,'Gweru','ZWE',NULL,'Midlands'),(4074,'Gaza','PSE',NULL,'Gaza'),(4075,'Khan Yunis','PSE',NULL,'Khan Yunis'),(4076,'Hebron','PSE',NULL,'Hebron'),(4077,'Jabaliya','PSE',NULL,'North Gaza'),(4078,'Nablus','PSE',NULL,'Nablus'),(4079,'Rafah','PSE',NULL,'Rafah'),(4080,'Fusagasuga','COL',1,'Cundinamarca'),(4084,'Pasca','COL',1,'Cundinamarca'),(4083,'Soacha','COL',1,'Cundinamarca'),(4085,'Cartajena','COL',3,'3'),(4086,'Melgar','COL',4,'4');
/*!40000 ALTER TABLE `City-2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Country`
--

DROP TABLE IF EXISTS `Country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Country` (
  `Code` char(3) NOT NULL DEFAULT '',
  `Name` char(52) NOT NULL DEFAULT '',
  `Continent` enum('Asia','Europe','North America','Africa','Oceania','Antarctica','South America') NOT NULL DEFAULT 'Asia',
  `LocalName` char(45) NOT NULL DEFAULT '',
  `Capital` int(11) DEFAULT NULL,
  `Code2` char(2) NOT NULL DEFAULT '',
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`Code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Country`
--

LOCK TABLES `Country` WRITE;
/*!40000 ALTER TABLE `Country` DISABLE KEYS */;
INSERT INTO `Country` VALUES ('ABW','Aruba','North America','Aruba',129,'AW','DES'),('AFG','Afghanistan','Asia','Afganistan/Afqanestan',1,'AF','DES'),('AGO','Angola','Africa','Angola',56,'AO','DES'),('AIA','Anguilla','North America','Anguilla',62,'AI','DES'),('ALB','Albania','Europe','ShqipÃ«ria',34,'AL','DES'),('AND','Andorra','Europe','Andorra',55,'AD','DES'),('ANT','Netherlands Antilles','North America','Nederlandse Antillen',33,'AN','DES'),('ARE','United Arab Emirates','Asia','Al-Imarat al-Â´Arabiya al-Muttahida',65,'AE','DES'),('ARG','Argentina','South America','Argentina',69,'AR','DES'),('ARM','Armenia','Asia','Hajastan',126,'AM','DES'),('ASM','American Samoa','Oceania','Amerika Samoa',54,'AS','DES'),('ATG','Antigua and Barbuda','North America','Antigua and Barbuda',63,'AG','DES'),('AUS','Australia','Oceania','Australia',135,'AU','DES'),('AUT','Austria','Europe','Ã–sterreich',1523,'AT','DES'),('AZE','Azerbaijan','Asia','AzÃ¤rbaycan',144,'AZ','DES'),('BDI','Burundi','Africa','Burundi/Uburundi',552,'BI','DES'),('BEL','Belgium','Europe','BelgiÃ«/Belgique',179,'BE','DES'),('BEN','Benin','Africa','BÃ©nin',187,'BJ','DES'),('BFA','Burkina Faso','Africa','Burkina Faso',549,'BF','DES'),('BGD','Bangladesh','Asia','Bangladesh',150,'BD','DES'),('BGR','Bulgaria','Europe','Balgarija',539,'BG','DES'),('BHR','Bahrain','Asia','Al-Bahrayn',149,'BH','DES'),('BHS','Bahamas','North America','The Bahamas',148,'BS','DES'),('BIH','Bosnia and Herzegovina','Europe','Bosna i Hercegovina',201,'BA','DES'),('BLR','Belarus','Europe','Belarus',3520,'BY','DES'),('BLZ','Belize','North America','Belize',185,'BZ','DES'),('BMU','Bermuda','North America','Bermuda',191,'BM','DES'),('BOL','Bolivia','South America','Bolivia',194,'BO','DES'),('BRA','Brazil','South America','Brasil',211,'BR','DES'),('BRB','Barbados','North America','Barbados',174,'BB','DES'),('BRN','Brunei','Asia','Brunei Darussalam',538,'BN','DES'),('BTN','Bhutan','Asia','Druk-Yul',192,'BT','DES'),('BWA','Botswana','Africa','Botswana',204,'BW','DES'),('CAF','Central African Republic','Africa','Centrafrique/BÃª-AfrÃ®ka',1889,'CF','DES'),('CAN','Canada','North America','Canada',1822,'CA','DES'),('CHE','Switzerland','Europe','Schweiz/Suisse/Svizzera/Svizra',3248,'CH','DES'),('CHL','Chile','South America','Chile',554,'CL','DES'),('CHN','China','Asia','Zhongquo',1891,'CN','DES'),('AAA','Todos los paises','','Todos los paises',NULL,'AA','ACT'),('CMR','Cameroon','Africa','Cameroun/Cameroon',1804,'CM','DES'),('COD','Congo, The Democratic Republic of the','Africa','RÃ©publique DÃ©mocratique du Congo',2298,'CD','DES'),('COG','Congo','Africa','Congo',2296,'CG','DES'),('COK','Cook Islands','Oceania','The Cook Islands',583,'CK','DES'),('COL','Colombia','South America','Colombia',2257,'CO','ACT'),('COM','Comoros','Africa','Komori/Comores',2295,'KM','DES'),('CPV','Cape Verde','Africa','Cabo Verde',1859,'CV','DES'),('CRI','Costa Rica','North America','Costa Rica',584,'CR','DES'),('CUB','Cuba','North America','Cuba',2413,'CU','DES'),('CXR','Christmas Island','Oceania','Christmas Island',1791,'CX','DES'),('CYM','Cayman Islands','North America','Cayman Islands',553,'KY','DES'),('CYP','Cyprus','Asia','KÃ½pros/Kibris',2430,'CY','DES'),('CZE','Czech Republic','Europe','Â¸esko',3339,'CZ','DES'),('DEU','Germany','Europe','Deutschland',3068,'DE','DES'),('DJI','Djibouti','Africa','Djibouti/Jibuti',585,'DJ','DES'),('DMA','Dominica','North America','Dominica',586,'DM','DES'),('DNK','Denmark','Europe','Danmark',3315,'DK','DES'),('DOM','Dominican Republic','North America','RepÃºblica Dominicana',587,'DO','DES'),('DZA','Algeria','Africa','Al-Jazaâ€™ir/AlgÃ©rie',35,'DZ','DES'),('ECU','Ecuador','South America','Ecuador',594,'EC','DES'),('EGY','Egypt','Africa','Misr',608,'EG','DES'),('ERI','Eritrea','Africa','Ertra',652,'ER','DES'),('ESH','Western Sahara','Africa','As-Sahrawiya',2453,'EH','DES'),('ESP','Spain','Europe','EspaÃ±a',653,'ES','DES'),('EST','Estonia','Europe','Eesti',3791,'EE','DES'),('ETH','Ethiopia','Africa','YeItyopÂ´iya',756,'ET','DES'),('FIN','Finland','Europe','Suomi',3236,'FI','DES'),('FJI','Fiji Islands','Oceania','Fiji Islands',764,'FJ','DES'),('FLK','Falkland Islands','South America','Falkland Islands',763,'FK','DES'),('FRA','France','Europe','France',2974,'FR','DES'),('FRO','Faroe Islands','Europe','FÃ¸royar',901,'FO','DES'),('FSM','Micronesia, Federated States of','Oceania','Micronesia',2689,'FM','DES'),('GAB','Gabon','Africa','Le Gabon',902,'GA','DES'),('GBR','United Kingdom','Europe','United Kingdom',456,'GB','DES'),('GEO','Georgia','Asia','Sakartvelo',905,'GE','DES'),('GHA','Ghana','Africa','Ghana',910,'GH','DES'),('GIB','Gibraltar','Europe','Gibraltar',915,'GI','DES'),('GIN','Guinea','Africa','GuinÃ©e',926,'GN','DES'),('GLP','Guadeloupe','North America','Guadeloupe',919,'GP','DES'),('GMB','Gambia','Africa','The Gambia',904,'GM','DES'),('GNB','Guinea-Bissau','Africa','GuinÃ©-Bissau',927,'GW','DES'),('GNQ','Equatorial Guinea','Africa','Guinea Ecuatorial',2972,'GQ','DES'),('GRC','Greece','Europe','EllÃ¡da',2401,'GR','DES'),('GRD','Grenada','North America','Grenada',916,'GD','DES'),('GRL','Greenland','North America','Kalaallit Nunaat/GrÃ¸nland',917,'GL','DES'),('GTM','Guatemala','North America','Guatemala',922,'GT','DES'),('GUF','French Guiana','South America','Guyane franÃ§aise',3014,'GF','DES'),('GUM','Guam','Oceania','Guam',921,'GU','DES'),('GUY','Guyana','South America','Guyana',928,'GY','DES'),('HKG','Hong Kong','Asia','Xianggang/Hong Kong',937,'HK','DES'),('HND','Honduras','North America','Honduras',933,'HN','DES'),('HRV','Croatia','Europe','Hrvatska',2409,'HR','DES'),('HTI','Haiti','North America','HaÃ¯ti/Dayti',929,'HT','DES'),('HUN','Hungary','Europe','MagyarorszÃ¡g',3483,'HU','DES'),('IDN','Indonesia','Asia','Indonesia',939,'ID','DES'),('IND','India','Asia','Bharat/India',1109,'IN','DES'),('IOT','British Indian Ocean Territory','Africa','British Indian Ocean Territory',NULL,'IO','DES'),('IRL','Ireland','Europe','Ireland/Ã‰ire',1447,'IE','DES'),('IRN','Iran','Asia','Iran',1380,'IR','DES'),('IRQ','Iraq','Asia','Al-Â´Iraq',1365,'IQ','DES'),('ISL','Iceland','Europe','Ãsland',1449,'IS','DES'),('ISR','Israel','Asia','Yisraâ€™el/Israâ€™il',1450,'IL','DES'),('ITA','Italy','Europe','Italia',1464,'IT','DES'),('JAM','Jamaica','North America','Jamaica',1530,'JM','DES'),('JOR','Jordan','Asia','Al-Urdunn',1786,'JO','DES'),('JPN','Japan','Asia','Nihon/Nippon',1532,'JP','DES'),('KAZ','Kazakstan','Asia','Qazaqstan',1864,'KZ','DES'),('KEN','Kenya','Africa','Kenya',1881,'KE','DES'),('KGZ','Kyrgyzstan','Asia','Kyrgyzstan',2253,'KG','DES'),('KHM','Cambodia','Asia','KÃ¢mpuchÃ©a',1800,'KH','DES'),('KIR','Kiribati','Oceania','Kiribati',2256,'KI','DES'),('KNA','Saint Kitts and Nevis','North America','Saint Kitts and Nevis',3064,'KN','DES'),('KOR','South Korea','Asia','Taehan Minâ€™guk (Namhan)',2331,'KR','DES'),('KWT','Kuwait','Asia','Al-Kuwayt',2429,'KW','DES'),('LAO','Laos','Asia','Lao',2432,'LA','DES'),('LBN','Lebanon','Asia','Lubnan',2438,'LB','DES'),('LBR','Liberia','Africa','Liberia',2440,'LR','DES'),('LBY','Libyan Arab Jamahiriya','Africa','Libiya',2441,'LY','DES'),('LCA','Saint Lucia','North America','Saint Lucia',3065,'LC','DES'),('LIE','Liechtenstein','Europe','Liechtenstein',2446,'LI','DES'),('LKA','Sri Lanka','Asia','Sri Lanka/Ilankai',3217,'LK','DES'),('LSO','Lesotho','Africa','Lesotho',2437,'LS','DES'),('LTU','Lithuania','Europe','Lietuva',2447,'LT','DES'),('LUX','Luxembourg','Europe','Luxembourg/LÃ«tzebuerg',2452,'LU','DES'),('LVA','Latvia','Europe','Latvija',2434,'LV','DES'),('MAC','Macao','Asia','Macau/Aomen',2454,'MO','DES'),('MAR','Morocco','Africa','Al-Maghrib',2486,'MA','DES'),('MCO','Monaco','Europe','Monaco',2695,'MC','DES'),('MDA','Moldova','Europe','Moldova',2690,'MD','DES'),('MDG','Madagascar','Africa','Madagasikara/Madagascar',2455,'MG','DES'),('MDV','Maldives','Asia','Dhivehi Raajje/Maldives',2463,'MV','DES'),('MEX','Mexico','North America','MÃ©xico',2515,'MX','DES'),('MHL','Marshall Islands','Oceania','Marshall Islands/Majol',2507,'MH','DES'),('MKD','Macedonia','Europe','Makedonija',2460,'MK','DES'),('MLI','Mali','Africa','Mali',2482,'ML','DES'),('MLT','Malta','Europe','Malta',2484,'MT','DES'),('MMR','Myanmar','Asia','Myanma Pye',2710,'MM','DES'),('MNG','Mongolia','Asia','Mongol Uls',2696,'MN','DES'),('MNP','Northern Mariana Islands','Oceania','Northern Mariana Islands',2913,'MP','DES'),('MOZ','Mozambique','Africa','MoÃ§ambique',2698,'MZ','DES'),('MRT','Mauritania','Africa','Muritaniya/Mauritanie',2509,'MR','DES'),('MSR','Montserrat','North America','Montserrat',2697,'MS','DES'),('MTQ','Martinique','North America','Martinique',2508,'MQ','DES'),('MUS','Mauritius','Africa','Mauritius',2511,'MU','DES'),('MWI','Malawi','Africa','Malawi',2462,'MW','DES'),('MYS','Malaysia','Asia','Malaysia',2464,'MY','DES'),('MYT','Mayotte','Africa','Mayotte',2514,'YT','DES'),('NAM','Namibia','Africa','Namibia',2726,'NA','DES'),('NCL','New Caledonia','Oceania','Nouvelle-CalÃ©donie',3493,'NC','DES'),('NER','Niger','Africa','Niger',2738,'NE','DES'),('NFK','Norfolk Island','Oceania','Norfolk Island',2806,'NF','DES'),('NGA','Nigeria','Africa','Nigeria',2754,'NG','DES'),('NIC','Nicaragua','North America','Nicaragua',2734,'NI','DES'),('NIU','Niue','Oceania','Niue',2805,'NU','DES'),('NLD','Netherlands','Europe','Nederland',5,'NL','DES'),('NOR','Norway','Europe','Norge',2807,'NO','DES'),('NPL','Nepal','Asia','Nepal',2729,'NP','DES'),('NRU','Nauru','Oceania','Naoero/Nauru',2728,'NR','DES'),('NZL','New Zealand','Oceania','New Zealand/Aotearoa',3499,'NZ','DES'),('OMN','Oman','Asia','Â´Uman',2821,'OM','DES'),('PAK','Pakistan','Asia','Pakistan',2831,'PK','DES'),('PAN','Panama','North America','PanamÃ¡',2882,'PA','DES'),('PCN','Pitcairn','Oceania','Pitcairn',2912,'PN','DES'),('PER','Peru','South America','PerÃº/Piruw',2890,'PE','DES'),('PHL','Philippines','Asia','Pilipinas',766,'PH','DES'),('PLW','Palau','Oceania','Bel\nau/Palau',2881,'PW','DES'),('PNG','Papua New Guinea','Oceania','Papua New Guinea/Papua Niugini',2884,'PG','DES'),('POL','Poland','Europe','Polska',2928,'PL','DES'),('PRI','Puerto Rico','North America','Puerto Rico',2919,'PR','DES'),('PRK','North Korea','Asia','Choson Minjujuui InÂ´min Konghwaguk (Bukhan)',2318,'KP','DES'),('PRT','Portugal','Europe','Portugal',2914,'PT','DES'),('PRY','Paraguay','South America','Paraguay',2885,'PY','DES'),('PSE','Palestine','Asia','Filastin',4074,'PS','DES'),('PYF','French Polynesia','Oceania','PolynÃ©sie franÃ§aise',3016,'PF','DES'),('QAT','Qatar','Asia','Qatar',2973,'QA','DES'),('REU','RÃ©union','Africa','RÃ©union',3017,'RE','DES'),('ROM','Romania','Europe','RomÃ¢nia',3018,'RO','DES'),('RUS','Russian Federation','Europe','Rossija',3580,'RU','DES'),('RWA','Rwanda','Africa','Rwanda/Urwanda',3047,'RW','DES'),('SAU','Saudi Arabia','Asia','Al-Â´Arabiya as-SaÂ´udiya',3173,'SA','DES'),('SDN','Sudan','Africa','As-Sudan',3225,'SD','DES'),('SEN','Senegal','Africa','SÃ©nÃ©gal/Sounougal',3198,'SN','DES'),('SGP','Singapore','Asia','Singapore/Singapura/Xinjiapo/Singapur',3208,'SG','DES'),('SHN','Saint Helena','Africa','Saint Helena',3063,'SH','DES'),('SJM','Svalbard and Jan Mayen','Europe','Svalbard og Jan Mayen',938,'SJ','DES'),('SLB','Solomon Islands','Oceania','Solomon Islands',3161,'SB','DES'),('SLE','Sierra Leone','Africa','Sierra Leone',3207,'SL','DES'),('SLV','El Salvador','North America','El Salvador',645,'SV','DES'),('SMR','San Marino','Europe','San Marino',3171,'SM','DES'),('SOM','Somalia','Africa','Soomaaliya',3214,'SO','DES'),('SPM','Saint Pierre and Miquelon','North America','Saint-Pierre-et-Miquelon',3067,'PM','DES'),('STP','Sao Tome and Principe','Africa','SÃ£o TomÃ© e PrÃ­ncipe',3172,'ST','DES'),('SUR','Suriname','South America','Suriname',3243,'SR','DES'),('SVK','Slovakia','Europe','Slovensko',3209,'SK','DES'),('SVN','Slovenia','Europe','Slovenija',3212,'SI','DES'),('SWE','Sweden','Europe','Sverige',3048,'SE','DES'),('SWZ','Swaziland','Africa','kaNgwane',3244,'SZ','DES'),('SYC','Seychelles','Africa','Sesel/Seychelles',3206,'SC','DES'),('SYR','Syria','Asia','Suriya',3250,'SY','DES'),('TCA','Turks and Caicos Islands','North America','The Turks and Caicos Islands',3423,'TC','DES'),('TCD','Chad','Africa','Tchad/Tshad',3337,'TD','DES'),('TGO','Togo','Africa','Togo',3332,'TG','DES'),('THA','Thailand','Asia','Prathet Thai',3320,'TH','DES'),('TJK','Tajikistan','Asia','ToÃ§ikiston',3261,'TJ','DES'),('TKL','Tokelau','Oceania','Tokelau',3333,'TK','DES'),('TKM','Turkmenistan','Asia','TÃ¼rkmenostan',3419,'TM','DES'),('TMP','East Timor','Asia','Timor Timur',1522,'TP','DES'),('TON','Tonga','Oceania','Tonga',3334,'TO','DES'),('TTO','Trinidad and Tobago','North America','Trinidad and Tobago',3336,'TT','DES'),('TUN','Tunisia','Africa','Tunis/Tunisie',3349,'TN','DES'),('TUR','Turkey','Asia','TÃ¼rkiye',3358,'TR','DES'),('TUV','Tuvalu','Oceania','Tuvalu',3424,'TV','DES'),('TWN','Taiwan','Asia','Tâ€™ai-wan',3263,'TW','DES'),('TZA','Tanzania','Africa','Tanzania',3306,'TZ','DES'),('UGA','Uganda','Africa','Uganda',3425,'UG','DES'),('UKR','Ukraine','Europe','Ukrajina',3426,'UA','DES'),('UMI','United States Minor Outlying Islands','Oceania','United States Minor Outlying Islands',NULL,'UM','DES'),('URY','Uruguay','South America','Uruguay',3492,'UY','DES'),('USA','United States','North America','United States',3813,'US','DES'),('UZB','Uzbekistan','Asia','Uzbekiston',3503,'UZ','DES'),('VAT','Holy See (Vatican City State)','Europe','Santa Sede/CittÃ  del Vaticano',3538,'VA','DES'),('VCT','Saint Vincent and the Grenadines','North America','Saint Vincent and the Grenadines',3066,'VC','DES'),('VEN','Venezuela','South America','Venezuela',3539,'VE','DES'),('VGB','Virgin Islands, British','North America','British Virgin Islands',537,'VG','DES'),('VIR','Virgin Islands, U.S.','North America','Virgin Islands of the United States',4067,'VI','DES'),('VNM','Vietnam','Asia','ViÃªt Nam',3770,'VN','DES'),('VUT','Vanuatu','Oceania','Vanuatu',3537,'VU','DES'),('WLF','Wallis and Futuna','Oceania','Wallis-et-Futuna',3536,'WF','DES'),('WSM','Samoa','Oceania','Samoa',3169,'WS','DES'),('YEM','Yemen','Asia','Al-Yaman',1780,'YE','DES'),('ZAF','South Africa','Africa','South Africa',716,'ZA','DES'),('ZMB','Zambia','Africa','Zambia',3162,'ZM','DES'),('ZWE','Zimbabwe','Africa','Zimbabwe',4068,'ZW','DES');
/*!40000 ALTER TABLE `Country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CountryLanguage`
--

DROP TABLE IF EXISTS `CountryLanguage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CountryLanguage` (
  `CountryCode` char(3) NOT NULL DEFAULT '',
  `Language` char(30) NOT NULL DEFAULT '',
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`CountryCode`,`Language`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CountryLanguage`
--

LOCK TABLES `CountryLanguage` WRITE;
/*!40000 ALTER TABLE `CountryLanguage` DISABLE KEYS */;
INSERT INTO `CountryLanguage` VALUES ('ABW','Dutch','ACT'),('ABW','English','ACT'),('ABW','Papiamento','ACT'),('ABW','Spanish','ACT'),('AFG','Balochi','ACT'),('AFG','Dari','ACT'),('AFG','Pashto','ACT'),('AFG','Turkmenian','ACT'),('AFG','Uzbek','ACT'),('AGO','Ambo','ACT'),('AGO','Chokwe','ACT'),('AGO','Kongo','ACT'),('AGO','Luchazi','ACT'),('AGO','Luimbe-nganguela','ACT'),('AGO','Luvale','ACT'),('AGO','Mbundu','ACT'),('AGO','Nyaneka-nkhumbi','ACT'),('AGO','Ovimbundu','ACT'),('AIA','English','ACT'),('ALB','Albaniana','ACT'),('ALB','Greek','ACT'),('ALB','Macedonian','ACT'),('AND','Catalan','ACT'),('AND','French','ACT'),('AND','Portuguese','ACT'),('AND','Spanish','ACT'),('ANT','Dutch','ACT'),('ANT','English','ACT'),('ANT','Papiamento','ACT'),('ARE','Arabic','ACT'),('ARE','Hindi','ACT'),('ARG','Indian Languages','ACT'),('ARG','Italian','ACT'),('ARG','Spanish','ACT'),('ARM','Armenian','ACT'),('ARM','Azerbaijani','ACT'),('ASM','English','ACT'),('ASM','Samoan','ACT'),('ASM','Tongan','ACT'),('ATG','Creole English','ACT'),('ATG','English','ACT'),('AUS','Arabic','ACT'),('AUS','Canton Chinese','ACT'),('AUS','English','ACT'),('AUS','German','ACT'),('AUS','Greek','ACT'),('AUS','Italian','ACT'),('AUS','Serbo-Croatian','ACT'),('AUS','Vietnamese','ACT'),('AUT','Czech','ACT'),('AUT','German','ACT'),('AUT','Hungarian','ACT'),('AUT','Polish','ACT'),('AUT','Romanian','ACT'),('AUT','Serbo-Croatian','ACT'),('AUT','Slovene','ACT'),('AUT','Turkish','ACT'),('AZE','Armenian','ACT'),('AZE','Azerbaijani','ACT'),('AZE','Lezgian','ACT'),('AZE','Russian','ACT'),('BDI','French','ACT'),('BDI','Kirundi','ACT'),('BDI','Swahili','ACT'),('BEL','Arabic','ACT'),('BEL','Dutch','ACT'),('BEL','French','ACT'),('BEL','German','ACT'),('BEL','Italian','ACT'),('BEL','Turkish','ACT'),('BEN','Adja','ACT'),('BEN','Aizo','ACT'),('BEN','Bariba','ACT'),('BEN','Fon','ACT'),('BEN','Ful','ACT'),('BEN','Joruba','ACT'),('BEN','Somba','ACT'),('BFA','Busansi','ACT'),('BFA','Dagara','ACT'),('BFA','Dyula','ACT'),('BFA','Ful','ACT'),('BFA','Gurma','ACT'),('BFA','Mossi','ACT'),('BGD','Bengali','ACT'),('BGD','Chakma','ACT'),('BGD','Garo','ACT'),('BGD','Khasi','ACT'),('BGD','Marma','ACT'),('BGD','Santhali','ACT'),('BGD','Tripuri','ACT'),('BGR','Bulgariana','ACT'),('BGR','Macedonian','ACT'),('BGR','Romani','ACT'),('BGR','Turkish','ACT'),('BHR','Arabic','ACT'),('BHR','English','ACT'),('BHS','Creole English','ACT'),('BHS','Creole French','ACT'),('BIH','Serbo-Croatian','ACT'),('BLR','Belorussian','ACT'),('BLR','Polish','ACT'),('BLR','Russian','ACT'),('BLR','Ukrainian','ACT'),('BLZ','English','ACT'),('BLZ','Garifuna','ACT'),('BLZ','Maya Languages','ACT'),('BLZ','Spanish','ACT'),('BMU','English','ACT'),('BOL','AimarÃ¡','ACT'),('BOL','GuaranÃ­','ACT'),('BOL','KetÅ¡ua','ACT'),('BOL','Spanish','ACT'),('BRA','German','ACT'),('BRA','Indian Languages','ACT'),('BRA','Italian','ACT'),('BRA','Japanese','ACT'),('BRA','Portuguese','ACT'),('BRB','Bajan','ACT'),('BRB','English','ACT'),('BRN','Chinese','ACT'),('BRN','English','ACT'),('BRN','Malay','ACT'),('BRN','Malay-English','ACT'),('BTN','Asami','ACT'),('BTN','Dzongkha','ACT'),('BTN','Nepali','ACT'),('BWA','Khoekhoe','ACT'),('BWA','Ndebele','ACT'),('BWA','San','ACT'),('BWA','Shona','ACT'),('BWA','Tswana','ACT'),('CAF','Banda','ACT'),('CAF','Gbaya','ACT'),('CAF','Mandjia','ACT'),('CAF','Mbum','ACT'),('CAF','Ngbaka','ACT'),('CAF','Sara','ACT'),('CAN','Chinese','ACT'),('CAN','Dutch','ACT'),('CAN','English','ACT'),('CAN','Eskimo Languages','ACT'),('CAN','French','ACT'),('CAN','German','ACT'),('CAN','Italian','ACT'),('CAN','Polish','ACT'),('CAN','Portuguese','ACT'),('CAN','Punjabi','ACT'),('CAN','Spanish','ACT'),('CAN','Ukrainian','ACT'),('CCK','English','ACT'),('CCK','Malay','ACT'),('CHE','French','ACT'),('CHE','German','ACT'),('CHE','Italian','ACT'),('CHE','Romansh','ACT'),('CHL','AimarÃ¡','ACT'),('CHL','Araucan','ACT'),('CHL','Rapa nui','ACT'),('CHL','Spanish','ACT'),('CHN','Chinese','ACT'),('CHN','Dong','ACT'),('CHN','Hui','ACT'),('CHN','MantÅ¡u','ACT'),('CHN','Miao','ACT'),('CHN','Mongolian','ACT'),('CHN','Puyi','ACT'),('CHN','Tibetan','ACT'),('CHN','Tujia','ACT'),('CHN','Uighur','ACT'),('CHN','Yi','ACT'),('CHN','Zhuang','ACT'),('CIV','Akan','ACT'),('CIV','Gur','ACT'),('CIV','Kru','ACT'),('CIV','Malinke','ACT'),('CIV','[South]Mande','ACT'),('CMR','Bamileke-bamum','ACT'),('CMR','Duala','ACT'),('CMR','Fang','ACT'),('CMR','Ful','ACT'),('CMR','Maka','ACT'),('CMR','Mandara','ACT'),('CMR','Masana','ACT'),('CMR','Tikar','ACT'),('COD','Boa','ACT'),('COD','Chokwe','ACT'),('COD','Kongo','ACT'),('COD','Luba','ACT'),('COD','Mongo','ACT'),('COD','Ngala and Bangi','ACT'),('COD','Rundi','ACT'),('COD','Rwanda','ACT'),('COD','Teke','ACT'),('COD','Zande','ACT'),('COG','Kongo','ACT'),('COG','Mbete','ACT'),('COG','Mboshi','ACT'),('COG','Punu','ACT'),('COG','Sango','ACT'),('COG','Teke','ACT'),('COK','English','ACT'),('COK','Maori','ACT'),('COL','Arawakan','ACT'),('COL','Caribbean','ACT'),('COL','Chibcha','ACT'),('COL','Creole English','ACT'),('COL','Spanish','ACT'),('COM','Comorian','ACT'),('COM','Comorian-Arabic','ACT'),('COM','Comorian-French','ACT'),('COM','Comorian-madagassi','ACT'),('COM','Comorian-Swahili','ACT'),('CPV','Crioulo','ACT'),('CPV','Portuguese','ACT'),('CRI','Chibcha','ACT'),('CRI','Chinese','ACT'),('CRI','Creole English','ACT'),('CRI','Spanish','ACT'),('CUB','Spanish','ACT'),('CXR','Chinese','ACT'),('CXR','English','ACT'),('CYM','English','ACT'),('CYP','Greek','ACT'),('CYP','Turkish','ACT'),('CZE','Czech','ACT'),('CZE','German','ACT'),('CZE','Hungarian','ACT'),('CZE','Moravian','ACT'),('CZE','Polish','ACT'),('CZE','Romani','ACT'),('CZE','Silesiana','ACT'),('CZE','Slovak','ACT'),('DEU','German','ACT'),('DEU','Greek','ACT'),('DEU','Italian','ACT'),('DEU','Polish','ACT'),('DEU','Southern Slavic Languages','ACT'),('DEU','Turkish','ACT'),('DJI','Afar','ACT'),('DJI','Arabic','ACT'),('DJI','Somali','ACT'),('DMA','Creole English','ACT'),('DMA','Creole French','ACT'),('DNK','Arabic','ACT'),('DNK','Danish','ACT'),('DNK','English','ACT'),('DNK','German','ACT'),('DNK','Norwegian','ACT'),('DNK','Swedish','ACT'),('DNK','Turkish','ACT'),('DOM','Creole French','ACT'),('DOM','Spanish','ACT'),('DZA','Arabic','ACT'),('DZA','Berberi','ACT'),('ECU','KetÅ¡ua','ACT'),('ECU','Spanish','ACT'),('EGY','Arabic','ACT'),('EGY','Sinaberberi','ACT'),('ERI','Afar','ACT'),('ERI','Bilin','ACT'),('ERI','Hadareb','ACT'),('ERI','Saho','ACT'),('ERI','Tigre','ACT'),('ERI','Tigrinja','ACT'),('ESH','Arabic','ACT'),('ESP','Basque','ACT'),('ESP','Catalan','ACT'),('ESP','Galecian','ACT'),('ESP','Spanish','ACT'),('EST','Belorussian','ACT'),('EST','Estonian','ACT'),('EST','Finnish','ACT'),('EST','Russian','ACT'),('EST','Ukrainian','ACT'),('ETH','Amhara','ACT'),('ETH','Gurage','ACT'),('ETH','Oromo','ACT'),('ETH','Sidamo','ACT'),('ETH','Somali','ACT'),('ETH','Tigrinja','ACT'),('ETH','Walaita','ACT'),('FIN','Estonian','ACT'),('FIN','Finnish','ACT'),('FIN','Russian','ACT'),('FIN','Saame','ACT'),('FIN','Swedish','ACT'),('FJI','Fijian','ACT'),('FJI','Hindi','ACT'),('FLK','English','ACT'),('FRA','Arabic','ACT'),('FRA','French','ACT'),('FRA','Italian','ACT'),('FRA','Portuguese','ACT'),('FRA','Spanish','ACT'),('FRA','Turkish','ACT'),('FRO','Danish','ACT'),('FRO','Faroese','ACT'),('FSM','Kosrean','ACT'),('FSM','Mortlock','ACT'),('FSM','Pohnpei','ACT'),('FSM','Trukese','ACT'),('FSM','Wolea','ACT'),('FSM','Yap','ACT'),('GAB','Fang','ACT'),('GAB','Mbete','ACT'),('GAB','Mpongwe','ACT'),('GAB','Punu-sira-nzebi','ACT'),('GBR','English','ACT'),('GBR','Gaeli','ACT'),('GBR','Kymri','ACT'),('GEO','Abhyasi','ACT'),('GEO','Armenian','ACT'),('GEO','Azerbaijani','ACT'),('GEO','Georgiana','ACT'),('GEO','Osseetti','ACT'),('GEO','Russian','ACT'),('GHA','Akan','ACT'),('GHA','Ewe','ACT'),('GHA','Ga-adangme','ACT'),('GHA','Gurma','ACT'),('GHA','Joruba','ACT'),('GHA','Mossi','ACT'),('GIB','Arabic','ACT'),('GIB','English','ACT'),('GIN','Ful','ACT'),('GIN','Kissi','ACT'),('GIN','Kpelle','ACT'),('GIN','Loma','ACT'),('GIN','Malinke','ACT'),('GIN','Susu','ACT'),('GIN','Yalunka','ACT'),('GLP','Creole French','ACT'),('GLP','French','ACT'),('GMB','Diola','ACT'),('GMB','Ful','ACT'),('GMB','Malinke','ACT'),('GMB','Soninke','ACT'),('GMB','Wolof','ACT'),('GNB','Balante','ACT'),('GNB','Crioulo','ACT'),('GNB','Ful','ACT'),('GNB','Malinke','ACT'),('GNB','Mandyako','ACT'),('GNB','Portuguese','ACT'),('GNQ','Bubi','ACT'),('GNQ','Fang','ACT'),('GRC','Greek','ACT'),('GRC','Turkish','ACT'),('GRD','Creole English','ACT'),('GRL','Danish','ACT'),('GRL','Greenlandic','ACT'),('GTM','Cakchiquel','ACT'),('GTM','KekchÃ­','ACT'),('GTM','Mam','ACT'),('GTM','QuichÃ©','ACT'),('GTM','Spanish','ACT'),('GUF','Creole French','ACT'),('GUF','Indian Languages','ACT'),('GUM','Chamorro','ACT'),('GUM','English','ACT'),('GUM','Japanese','ACT'),('GUM','Korean','ACT'),('GUM','Philippene Languages','ACT'),('GUY','Arawakan','ACT'),('GUY','Caribbean','ACT'),('GUY','Creole English','ACT'),('HKG','Canton Chinese','ACT'),('HKG','Chiu chau','ACT'),('HKG','English','ACT'),('HKG','Fukien','ACT'),('HKG','Hakka','ACT'),('HND','Creole English','ACT'),('HND','Garifuna','ACT'),('HND','Miskito','ACT'),('HND','Spanish','ACT'),('HRV','Serbo-Croatian','ACT'),('HRV','Slovene','ACT'),('HTI','French','ACT'),('HTI','Haiti Creole','ACT'),('HUN','German','ACT'),('HUN','Hungarian','ACT'),('HUN','Romani','ACT'),('HUN','Romanian','ACT'),('HUN','Serbo-Croatian','ACT'),('HUN','Slovak','ACT'),('IDN','Bali','ACT'),('IDN','Banja','ACT'),('IDN','Batakki','ACT'),('IDN','Bugi','ACT'),('IDN','Javanese','ACT'),('IDN','Madura','ACT'),('IDN','Malay','ACT'),('IDN','Minangkabau','ACT'),('IDN','Sunda','ACT'),('IND','Asami','ACT'),('IND','Bengali','ACT'),('IND','Gujarati','ACT'),('IND','Hindi','ACT'),('IND','Kannada','ACT'),('IND','Malajalam','ACT'),('IND','Marathi','ACT'),('IND','Orija','ACT'),('IND','Punjabi','ACT'),('IND','Tamil','ACT'),('IND','Telugu','ACT'),('IND','Urdu','ACT'),('IRL','English','ACT'),('IRL','Irish','ACT'),('IRN','Arabic','ACT'),('IRN','Azerbaijani','ACT'),('IRN','Bakhtyari','ACT'),('\nIR','Balochi','ACT'),('IRN','Gilaki','ACT'),('IRN','Kurdish','ACT'),('IRN','Luri','ACT'),('IRN','Mazandarani','ACT'),('IRN','Persian','ACT'),('IRN','Turkmenian','ACT'),('IRQ','Arabic','ACT'),('IRQ','Assyrian','ACT'),('IRQ','Azerbaijani','ACT'),('IRQ','Kurdish','ACT'),('IRQ','Persian','ACT'),('ISL','English','ACT'),('ISL','Icelandic','ACT'),('ISR','Arabic','ACT'),('ISR','Hebrew','ACT'),('ISR','Russian','ACT'),('ITA','Albaniana','ACT'),('ITA','French','ACT'),('ITA','Friuli','ACT'),('ITA','German','ACT'),('ITA','Italian','ACT'),('ITA','Romani','ACT'),('ITA','Sardinian','ACT'),('ITA','Slovene','ACT'),('JAM','Creole English','ACT'),('JAM','Hindi','ACT'),('JOR','Arabic','ACT'),('JOR','Armenian','ACT'),('JOR','Circassian','ACT'),('JPN','Ainu','ACT'),('JPN','Chinese','ACT'),('JPN','English','ACT'),('JPN','Japanese','ACT'),('JPN','Korean','ACT'),('JPN','Philippene Languages','ACT'),('KAZ','German','ACT'),('KAZ','Kazakh','ACT'),('KAZ','Russian','ACT'),('KAZ','Tatar','ACT'),('KAZ','Ukrainian','ACT'),('KAZ','Uzbek','ACT'),('KEN','Gusii','ACT'),('KEN','Kalenjin','ACT'),('KEN','Kamba','ACT'),('KEN','Kikuyu','ACT'),('KEN','Luhya','ACT'),('KEN','Luo','ACT'),('KEN','Masai','ACT'),('KEN','Meru','ACT'),('KEN','Nyika','ACT'),('KEN','Turkana','ACT'),('KGZ','Kazakh','ACT'),('KGZ','Kirgiz','ACT'),('KGZ','Russian','ACT'),('KGZ','Tadzhik','ACT'),('KGZ','Tatar','ACT'),('KGZ','Ukrainian','ACT'),('KGZ','Uzbek','ACT'),('KHM','Chinese','ACT'),('KHM','Khmer','ACT'),('KHM','TÅ¡am','ACT'),('KHM','Vietnamese','ACT'),('KIR','Kiribati','ACT'),('KIR','Tuvalu','ACT'),('KNA','Creole English','ACT'),('KNA','English','ACT'),('KOR','Chinese','ACT'),('KOR','Korean','ACT'),('KWT','Arabic','ACT'),('KWT','English','ACT'),('LAO','Lao','ACT'),('LAO','Lao-Soung','ACT'),('LAO','Mon-khmer','ACT'),('LAO','Thai','ACT'),('LBN','Arabic','ACT'),('LBN','Armenian','ACT'),('LBN','French','ACT'),('LBR','Bassa','ACT'),('LBR','Gio','ACT'),('LBR','Grebo','ACT'),('LBR','Kpelle','ACT'),('LBR','Kru','ACT'),('LBR','Loma','ACT'),('LBR','Malinke','ACT'),('LBR','Mano','ACT'),('LBY','Arabic','ACT'),('LBY','Berberi','ACT'),('LCA','Creole French','ACT'),('LCA','English','ACT'),('LIE','German','ACT'),('LIE','Italian','ACT'),('LIE','Turkish','ACT'),('LKA','Mixed Languages','ACT'),('LKA','Singali','ACT'),('LKA','Tamil','ACT'),('LSO','English','ACT'),('LSO','Sotho','ACT'),('LSO','Zulu','ACT'),('LTU','Belorussian','ACT'),('LTU','Lithuanian','ACT'),('LTU','Polish','ACT'),('LTU','Russian','ACT'),('LTU','Ukrainian','ACT'),('LUX','French','ACT'),('LUX','German','ACT'),('LUX','Italian','ACT'),('LUX','Luxembourgish','ACT'),('LUX','Portuguese','ACT'),('LVA','Belorussian','ACT'),('LVA','Latvian','ACT'),('LVA','Lithuanian','ACT'),('LVA','Polish','ACT'),('LVA','Russian','ACT'),('LVA','Ukrainian','ACT'),('MAC','Canton Chinese','ACT'),('MAC','English','ACT'),('MAC','Mandarin Chinese','ACT'),('MAC','Portuguese','ACT'),('MAR','Arabic','ACT'),('MAR','Berberi','ACT'),('MCO','English','ACT'),('MCO','French','ACT'),('MCO','Italian','ACT'),('MCO','Monegasque','ACT'),('MDA','Bulgariana','ACT'),('MDA','Gagauzi','ACT'),('MDA','Romanian','ACT'),('MDA','Russian','ACT'),('MDA','Ukrainian','ACT'),('MDG','French','ACT'),('MDG','Malagasy','ACT'),('MDV','Dhivehi','ACT'),('MDV','English','ACT'),('MEX','Mixtec','ACT'),('MEX','NÃ¡huatl','ACT'),('MEX','OtomÃ­','ACT'),('MEX','Spanish','DES'),('MEX','Yucatec','ACT'),('MEX','Zapotec','ACT'),('MHL','English','ACT'),('MHL','Marshallese','ACT'),('MKD','Albaniana','ACT'),('MKD','Macedonian','ACT'),('MKD','Romani','ACT'),('MKD','Serbo-Croatian','ACT'),('MKD','Turkish','ACT'),('MLI','Bambara','ACT'),('MLI','Ful','ACT'),('MLI','Senufo and Minianka','ACT'),('MLI','Songhai','ACT'),('MLI','Soninke','ACT'),('MLI','Tamashek','ACT'),('MLT','English','ACT'),('MLT','Maltese','ACT'),('MMR','Burmese','ACT'),('MMR','Chin','ACT'),('MMR','Kachin','ACT'),('MMR','Karen','ACT'),('MMR','Kayah','ACT'),('MMR','Mon','ACT'),('MMR','Rakhine','ACT'),('MMR','Shan','ACT'),('MNG','Bajad','ACT'),('MNG','Buryat','ACT'),('MNG','Dariganga','ACT'),('MNG','Dorbet','ACT'),('MNG','Kazakh','ACT'),('MNG','Mongolian','ACT'),('MNP','Carolinian','ACT'),('MNP','Chamorro','ACT'),('MNP','Chinese','ACT'),('MNP','English','ACT'),('MNP','Korean','ACT'),('MNP','Philippene Languages','ACT'),('MOZ','Chuabo','ACT'),('MOZ','Lomwe','ACT'),('MOZ','Makua','ACT'),('MOZ','Marendje','ACT'),('MOZ','Nyanja','ACT'),('MOZ','Ronga','ACT'),('MOZ','Sena','ACT'),('MOZ','Shona','ACT'),('MOZ','Tsonga','ACT'),('MOZ','Tswa','ACT'),('MRT','Ful','ACT'),('MRT','Hassaniya','ACT'),('MRT','Soninke','ACT'),('MRT','Tukulor','ACT'),('MRT','Wolof','ACT'),('MRT','Zenaga','ACT'),('MSR','English','ACT'),('MTQ','Creole French','ACT'),('MTQ','French','ACT'),('MUS','Bhojpuri','ACT'),('MUS','Creole French','ACT'),('MUS','French','ACT'),('MUS','Hindi','ACT'),('MUS','Marathi','ACT'),('MUS','Tamil','ACT'),('MWI','Chichewa','ACT'),('MWI','Lomwe','ACT'),('MWI','Ngoni','ACT'),('MWI','Yao','ACT'),('MYS','Chinese','ACT'),('MYS','Dusun','ACT'),('MYS','English','ACT'),('MYS','Iban','ACT'),('MYS','Malay','ACT'),('MYS','Tamil','ACT'),('MYT','French','ACT'),('MYT','MahorÃ©','ACT'),('MYT','Malagasy','ACT'),('NAM','Afrikaans','ACT'),('NAM','Caprivi','ACT'),('NAM','German','ACT'),('NAM','Herero','ACT'),('NAM','Kavango','ACT'),('NAM','Nama','ACT'),('NAM','Ovambo','ACT'),('NAM','San','ACT'),('NCL','French','ACT'),('NCL','Malenasian Languages','ACT'),('NCL','Polynesian Languages','ACT'),('NER','Ful','ACT'),('NER','Hausa','ACT'),('NER','Kanuri','ACT'),('NER','Songhai-zerma','ACT'),('NER','Tamashek','ACT'),('NFK','English','ACT'),('NGA','Bura','ACT'),('NGA','Edo','ACT'),('NGA','Ful','ACT'),('NGA','Hausa','ACT'),('NGA','Ibibio','ACT'),('NGA','Ibo','ACT'),('NGA','Ijo','ACT'),('NGA','Joruba','ACT'),('NGA','Kanuri','ACT'),('NGA','Tiv','ACT'),('NIC','Creole English','ACT'),('NIC','Miskito','ACT'),('NIC','Spanish','ACT'),('NIC','Sumo','ACT'),('NIU','English','ACT'),('NIU','Niue','ACT'),('NLD','Arabic','ACT'),('NLD','Dutch','ACT'),('NLD','Fries','ACT'),('NLD','Turkish','ACT'),('NOR','Danish','ACT'),('NOR','English','ACT'),('NOR','Norwegian','ACT'),('NOR','Saame','ACT'),('NOR','Swedish','ACT'),('NPL','Bhojpuri','ACT'),('NPL','Hindi','ACT'),('NPL','Maithili','ACT'),('NPL','Nepali','ACT'),('NPL','Newari','ACT'),('NPL','Tamang','ACT'),('NPL','Tharu','ACT'),('NRU','Chinese','ACT'),('NRU','English','ACT'),('NRU','Kiribati','ACT'),('NRU','Nauru','ACT'),('NRU','Tuvalu','ACT'),('NZL','English','ACT'),('NZL','Maori','ACT'),('OMN','Arabic','ACT'),('OMN','Balochi','ACT'),('PAK','Balochi','ACT'),('PAK','Brahui','ACT'),('PAK','Hindko','ACT'),('PAK','Pashto','ACT'),('PAK','Punjabi','ACT'),('PAK','Saraiki','ACT'),('PAK','Sindhi','ACT'),('PAK','Urdu','ACT'),('PAN','Arabic','ACT'),('PAN','Creole English','ACT'),('PAN','Cuna','ACT'),('PAN','Embera','ACT'),('PAN','GuaymÃ­','ACT'),('PAN','Spanish','ACT'),('PCN','Pitcairnese','ACT'),('PER','AimarÃ¡','ACT'),('PER','KetÅ¡ua','ACT'),('PER','Spanish','ACT'),('PHL','Bicol','ACT'),('PHL','Cebuano','ACT'),('PHL','Hiligaynon','ACT'),('PHL','Ilocano','ACT'),('PHL','Maguindanao','ACT'),('PHL','Maranao','ACT'),('PHL','Pampango','ACT'),('PHL','Pangasinan','ACT'),('PHL','Pilipino','ACT'),('PHL','Waray-waray','ACT'),('PLW','Chinese','ACT'),('PLW','English','ACT'),('PLW','Palau','ACT'),('PLW','Philippene Languages','ACT'),('PNG','Malenasian Languages','ACT'),('PNG','Papuan Languages','ACT'),('POL','Belorussian','ACT'),('POL','German','ACT'),('POL','Polish','ACT'),('POL','Ukrainian','ACT'),('PRI','English','ACT'),('PRI','Spanish','ACT'),('PRK','Chinese','ACT'),('PRK','Korean','ACT'),('PRT','Portuguese','ACT'),('PRY','German','ACT'),('PRY','GuaranÃ­','ACT'),('PRY','Portuguese','ACT'),('PRY','Spanish','ACT'),('PSE','Arabic','ACT'),('PSE','Hebrew','ACT'),('PYF','Chinese','ACT'),('PYF','French','ACT'),('PYF','Tahitian','ACT'),('QAT','Arabic','ACT'),('QAT','Urdu','ACT'),('REU','Chinese','ACT'),('REU','Comorian','ACT'),('REU','Creole French','ACT'),('REU','Malagasy','ACT'),('REU','Tamil','ACT'),('ROM','German','ACT'),('ROM','Hungarian','ACT'),('ROM','Romani','ACT'),('ROM','Romanian','ACT'),('ROM','Serbo-Croatian','ACT'),('ROM','Ukrainian','ACT'),('RUS','Avarian','ACT'),('RUS','Bashkir','ACT'),('RUS','Belorussian','ACT'),('RUS','Chechen','ACT'),('RUS','Chuvash','ACT'),('RUS','Kazakh','ACT'),('RUS','Mari','ACT'),('RUS','Mordva','ACT'),('RUS','Russian','ACT'),('RUS','Tatar','ACT'),('RUS','Udmur','ACT'),('RUS','Ukrainian','ACT'),('RWA','French','ACT'),('RWA','Rwanda','ACT'),('SAU','Arabic','ACT'),('SDN','Arabic','ACT'),('SDN','Bari','ACT'),('SDN','Beja','ACT'),('SDN','Chilluk','ACT'),('SDN','Dinka','ACT'),('SDN','Fur','ACT'),('SDN','Lotuko','ACT'),('SDN','Nubian Languages','ACT'),('SDN','Nuer','ACT'),('SDN','Zande','ACT'),('SEN','Diola','ACT'),('SEN','Ful','ACT'),('SEN','Malinke','ACT'),('SEN','Serer','ACT'),('SEN','Soninke','ACT'),('SEN','Wolof','ACT'),('SGP','Chinese','ACT'),('SGP','Malay','ACT'),('SGP','Tamil','ACT'),('SHN','English','ACT'),('SJM','Norwegian','ACT'),('SJM','Russian','ACT'),('SLB','Malenasian Languages','ACT'),('SLB','Papuan Languages','ACT'),('SLB','Polynesian Languages','ACT'),('SLE','Bullom-sherbro','ACT'),('SLE','Ful','ACT'),('SLE','Kono-vai','ACT'),('SLE','Kuranko','ACT'),('SLE','Limba','ACT'),('SLE','Mende','ACT'),('SLE','Temne','ACT'),('SLE','Yalunka','ACT'),('SLV','Nahua','ACT'),('SLV','Spanish','ACT'),('SMR','Italian','ACT'),('SOM','Arabic','ACT'),('SOM','Somali','ACT'),('SPM','French','ACT'),('STP','Crioulo','ACT'),('STP','French','ACT'),('SUR','Hindi','ACT'),('SUR','Sranantonga','ACT'),('SVK','Czech and Moravian','ACT'),('SVK','Hungarian','ACT'),('SVK','Romani','ACT'),('SVK','Slovak','ACT'),('SVK','Ukrainian and Russian','ACT'),('SVN','Hungarian','ACT'),('SVN','Serbo-Croatian','ACT'),('SVN','Slovene','ACT'),('SWE','Arabic','ACT'),('SWE','Finnish','ACT'),('SWE','Norwegian','ACT'),('SWE','Southern Slavic Languages','ACT'),('SWE','Spanish','ACT'),('SWE','Swedish','ACT'),('SWZ','Swazi','ACT'),('SWZ','Zulu','ACT'),('SYC','English','ACT'),('SYC','French','ACT'),('SYC','Seselwa','ACT'),('SYR','Arabic','ACT'),('SYR','Kurdish','ACT'),('TCA','English','ACT'),('TCD','Arabic','ACT'),('TCD','Gorane','ACT'),('TCD','Hadjarai','ACT'),('TCD','Kanem-bornu','ACT'),('TCD','Mayo-kebbi','ACT'),('TCD','Ouaddai','ACT'),('TCD','Sara','ACT'),('TCD','Tandjile','ACT'),('TGO','Ane','ACT'),('TGO','Ewe','ACT'),('TGO','Gurma','ACT'),('TGO','KabyÃ©','ACT'),('TGO','Kotokoli','ACT'),('TGO','Moba','ACT'),('TGO','Naudemba','ACT'),('TGO','Watyi','ACT'),('THA','Chinese','ACT'),('THA','Khmer','ACT'),('THA','Kuy','ACT'),('THA','Lao','ACT'),('THA','Malay','ACT'),('THA','Thai','ACT'),('TJK','Russian','ACT'),('TJK','Tadzhik','ACT'),('TJK','Uzbek','ACT'),('TKL','English','ACT'),('TKL','Tokelau','ACT'),('TKM','Kazakh','ACT'),('TKM','Russian','ACT'),('TKM','Turkmenian','ACT'),('TKM','Uzbek','ACT'),('TMP','Portuguese','ACT'),('TMP','Sunda','ACT'),('TON','English','ACT'),('TON','Tongan','ACT'),('TTO','Creole English','ACT'),('TTO','English','ACT'),('TTO','Hindi','ACT'),('TUN','Arabic','ACT'),('TUN','Arabic-French','ACT'),('TUN','Arabic-French-English','ACT'),('TUR','Arabic','ACT'),('TUR','Kurdish','ACT'),('TUR','Turkish','ACT'),('TUV','English','ACT'),('TUV','Kiribati','ACT'),('TUV','Tuvalu','ACT'),('TWN','Ami','ACT'),('TWN','Atayal','ACT'),('TWN','Hakka','ACT'),('TWN','Mandarin Chinese','ACT'),('TWN','Min','ACT'),('TWN','Paiwan','ACT'),('TZA','Chaga and Pare','ACT'),('TZA','Gogo','ACT'),('TZA','Ha','ACT'),('TZA','Haya','ACT'),('TZA','Hehet','ACT'),('TZA','Luguru','ACT'),('TZA','Makonde','ACT'),('TZA','Nyakusa','ACT'),('TZA','Nyamwesi','ACT'),('TZA','Shambala','ACT'),('TZA','Swahili','ACT'),('UGA','Acholi','ACT'),('UGA','Ganda','ACT'),('UGA','Gisu','ACT'),('UGA','Kiga','ACT'),('UGA','Lango','ACT'),('UGA','Lugbara','ACT'),('UGA','Nkole','ACT'),('UGA','Rwanda','ACT'),('UGA','Soga','ACT'),('UGA','Teso','ACT'),('UKR','Belorussian','ACT'),('UKR','Bulgariana','ACT'),('UKR','Hungarian','ACT'),('UKR','Polish','ACT'),('UKR','Romanian','ACT'),('UKR','Russian','ACT'),('UKR','Ukrainian','ACT'),('UMI','English','ACT'),('URY','Spanish','ACT'),('USA','Chinese','ACT'),('USA','English','ACT'),('USA','French','ACT'),('USA','German','ACT'),('USA','Italian','ACT'),('USA','Japanese','ACT'),('USA','Korean','ACT'),('USA','Polish','ACT'),('USA','Portuguese','ACT'),('USA','Spanish','ACT'),('USA','Tagalog','ACT'),('USA','Vietnamese','ACT'),('UZB','Karakalpak','ACT'),('UZB','Kazakh','ACT'),('UZB','Russian','ACT'),('UZB','Tadzhik','ACT'),('UZB','Tatar','ACT'),('UZB','Uzbek','ACT'),('VAT','Italian','ACT'),('VCT','Creole English','ACT'),('VCT','English','ACT'),('VEN','Goajiro','ACT'),('VEN','Spanish','ACT'),('VEN','Warrau','ACT'),('VGB','English','ACT'),('VIR','English','ACT'),('VIR','French','ACT'),('VIR','Spanish','ACT'),('VNM','Chinese','ACT'),('VNM','Khmer','ACT'),('VNM','Man','ACT'),('VNM','Miao','ACT'),('VNM','Muong','ACT'),('VNM','Nung','ACT'),('VNM','Thai','ACT'),('VNM','Tho','ACT'),('VNM','Vietnamese','ACT'),('VUT','Bislama','ACT'),('VUT','English','ACT'),('VUT','French','ACT'),('WLF','Futuna','ACT'),('WLF','Wallis','ACT'),('WSM','English','ACT'),('WSM','Samoan','ACT'),('WSM','Samoan-English','ACT'),('YEM','Arabic','ACT'),('YEM','Soqutri','ACT'),('YUG','Albaniana','ACT'),('YUG','Hungarian','ACT'),('YUG','Macedonian','ACT'),('YUG','Romani','ACT'),('YUG','Serbo-Croatian','ACT'),('YUG','Slovak','ACT'),('ZAF','Afrikaans','ACT'),('ZAF','English','ACT'),('ZAF','Ndebele','ACT'),('ZAF','Northsotho','ACT'),('ZAF','Southsotho','ACT'),('ZAF','Swazi','ACT'),('ZAF','Tsonga','ACT'),('ZAF','Tswana','ACT'),('ZAF','Venda','ACT'),('ZAF','Xhosa','ACT'),('ZAF','Zulu','ACT'),('ZMB','Bemba','ACT'),('ZMB','Chewa','ACT'),('ZMB','Lozi','ACT'),('ZMB','Nsenga','ACT'),('ZMB','Nyanja','ACT'),('ZMB','Tongan','ACT'),('ZWE','English','ACT'),('ZWE','Ndebele','ACT'),('ZWE','Nyanja','ACT'),('ZWE','Shona','ACT');
/*!40000 ALTER TABLE `CountryLanguage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `afiliar`
--

DROP TABLE IF EXISTS `afiliar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `afiliar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_red` int(11) NOT NULL,
  `id_afiliado` int(11) NOT NULL,
  `debajo_de` int(11) NOT NULL,
  `directo` int(11) NOT NULL,
  `lado` varchar(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `afiliar`
--

LOCK TABLES `afiliar` WRITE;
/*!40000 ALTER TABLE `afiliar` DISABLE KEYS */;
INSERT INTO `afiliar` VALUES (2,1,2,1,1,'0');
/*!40000 ALTER TABLE `afiliar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `almacen`
--

DROP TABLE IF EXISTS `almacen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `almacen` (
  `id_almacen` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text,
  `ciudad` varchar(255) NOT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `web` tinyint(4) NOT NULL DEFAULT '0',
  `creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estatus` varchar(3) NOT NULL DEFAULT 'ACT',
  PRIMARY KEY (`id_almacen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `almacen`
--

LOCK TABLES `almacen` WRITE;
/*!40000 ALTER TABLE `almacen` DISABLE KEYS */;
/*!40000 ALTER TABLE `almacen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `archivero`
--

DROP TABLE IF EXISTS `archivero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archivero` (
  `id_archivero` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `extencion` varchar(10) NOT NULL,
  `nombre_completo` varchar(255) NOT NULL,
  `tamano` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_archivero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archivero`
--

LOCK TABLES `archivero` WRITE;
/*!40000 ALTER TABLE `archivero` DISABLE KEYS */;
/*!40000 ALTER TABLE `archivero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `archivero_cedi`
--

DROP TABLE IF EXISTS `archivero_cedi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archivero_cedi` (
  `id_archivero` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `extension` varchar(5) NOT NULL,
  `nombre_completo` varchar(105) NOT NULL,
  `tamano` varchar(10) NOT NULL,
  `url` varchar(150) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_archivero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archivero_cedi`
--

LOCK TABLES `archivero_cedi` WRITE;
/*!40000 ALTER TABLE `archivero_cedi` DISABLE KEYS */;
/*!40000 ALTER TABLE `archivero_cedi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `archivo`
--

DROP TABLE IF EXISTS `archivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archivo` (
  `id_archivo` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `descripcion` text NOT NULL,
  `ruta` varchar(200) NOT NULL,
  `status` varchar(3) NOT NULL,
  `nombre_publico` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_archivo`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archivo`
--

LOCK TABLES `archivo` WRITE;
/*!40000 ALTER TABLE `archivo` DISABLE KEYS */;
INSERT INTO `archivo` VALUES (7,1,7,1,'2015-10-12 22:38:35','Biografía Steve Jobs','/media/ebooks/Biografia_Steve_jobs_Walter_Isaacson1.pdf','ACT','Biografía Steve Jobs'),(8,1,7,1,'2015-10-12 22:39:48','Como superar el fracaso y obtener el exito','/media/ebooks/Como_superar_el_fracaso_y_obtener_el_exito_-_Aut_Napolion_Hill.pdf','ACT','Como superar el fracaso y obtener el exito'),(9,1,7,1,'2015-10-12 22:41:31','El cuadrante del flujo del dinero','/media/ebooks/El_Cuadrante_Del_Flujo_De_Dinero_-_Aut_Robert_Kiyosaki.pdf','ACT','El cuadrante del flujo del dinero'),(10,1,7,1,'2015-10-12 22:42:53','El negocio del siglo 21','/media/ebooks/El_negocio_del_siglo_21_-_Aut_Robert_Kiyosaki1.pdf','ACT','El negocio del siglo 21'),(11,1,7,1,'2015-10-12 22:44:19','La presentación de 45 segundos que cambiara su vida','/media/ebooks/La_presentacion_de_45_segundos_que_cambiara_su_vida_-_Aut_Don_Falia.pdf','ACT',' La presentación de 45 segundos que cambiara su vida'),(12,1,7,1,'2015-10-12 22:45:41','Marketing multinivel y directo de red','/media/ebooks/Marketing_Multinivel_y_Directo_de_Red_-_Aut_Allen_Carmichael.pdf','ACT','Marketing multinivel y directo de red'),(13,1,7,1,'2015-10-12 22:48:58','Robert T Kiyosaki','/media/ebooks/Padre_Rico,_Padre_Pobre_-_Robert_T_Kiyosaki_(El_bueno).pdf','ACT',' Padre rico, padre pobre'),(14,1,7,1,'2015-10-12 22:51:41','Como ganar amigos e influir sobre las personas. Carnegie Dale','/media/ebooks/CarnegieDale-CmoGanarAmigoseInfluirsobrelasPersonas.pdf','ACT','Como ganar amigos e influir'),(15,1,7,1,'2015-10-12 22:52:41','Robert Kiyosaki','/media/ebooks/El_Network_Marketing_como_activo_-_Aut_Robert_Kiyosaki1.pdf','ACT','El network marketing como activo'),(16,1,7,1,'2015-10-12 22:53:39','Napoleon Hill','/media/ebooks/Piense_y_hagase_rico_-_Aut_Napoleon_Hill.pdf','ACT','Piense y hagase rico'),(17,1,7,1,'2015-10-12 22:57:20','Robert Kiyosaki','/media/ebooks/Escuela_de_Negocios_-_Aut._Robert_Kiyosaki_(1)_.pdf','ACT','Escuela de Negocios'),(18,1,7,1,'2015-10-12 22:58:09','T harv Eker','/media/ebooks/Los_secretos_de_la_mente_millonaria_-_Aut_T._Harv_Eker_2_.pdf','ACT','Los secretos de la mente millonaria'),(19,1,7,1,'2015-10-12 22:59:21','Entrevista por Mike Dillard','/media/ebooks/Mike_Dillard_entrevista_a_Robert_Kiyosaki_-_Entrevista_de_Mike_Dillard._1_.pdf','ACT','Entrevista a Robert Kiyosaki'),(20,1,7,1,'2015-10-12 23:00:13','Despertando al Giagante Interior','/media/ebooks/Despertandoalgiganteinterior_Anthony_Robbins.pdf','ACT','Despertando al Giagante Interior'),(21,1,2,21,'2015-10-12 23:01:33','Libertad Financiera - Apalancamiento','https://www.youtube.com/watch?v=0P9GbFfTafQ','ACT','Libertad Financiera - Apalancamiento'),(22,1,7,1,'2015-10-12 23:01:46','Despertando al Giagante Interior','/media/ebooks/El_Monje_que_vendio_su_Ferrari.pdf','ACT','El Monje Que Vendio su Ferrari'),(23,1,7,1,'2015-10-12 23:02:42','La actitud mental positiva','/media/ebooks/La_actitud_mental_positiva.pdf','ACT','La Actitud Mental Positiva'),(24,1,7,1,'2015-10-12 23:03:44','Los 4 Acuerdos, Miguel Ruiz','/media/ebooks/Los_4_Acuerdos_Miguel_Ruiz.pdf','ACT','Los 4 Acuerdos'),(25,1,2,21,'2015-10-12 23:04:15','El Negocio que esta haciendo Mas Millonarios en el Mundo','https://www.youtube.com/watch?t=2&v=Ill05TVFABg','ACT','El Negocio que esta haciendo Mas Millona'),(26,1,7,1,'2015-10-12 23:04:36','Los 7 habitos de la gente altamente efectiva','/media/ebooks/los-7-habitos-de-la-gente-altamente-efectiva.pdf','ACT','Los 7 habitos de la gente altamente efectiva'),(27,1,7,1,'2015-10-12 23:05:19','Pasos de gigante, Anthony Robbins','/media/ebooks/Pasos_de_Gigante_-_Anthony_Robbins.pdf','ACT','Pasos de Gigante'),(28,1,2,21,'2015-10-12 23:05:25','Explicación que es el Network Marketing o Multinivel','https://www.youtube.com/watch?v=t7o9vIbooLo','ACT','Network Marketing o Multinivel'),(29,1,7,1,'2015-10-12 23:06:10','Poder sin limites, Anthony Robbins','/media/ebooks/Poder-sin-Limites.pdf-Anthony-Robbins__.pdf','ACT','Poder Sin Limites'),(30,1,7,1,'2015-10-12 23:06:59','Tus Zonas Erroneas','/media/ebooks/Tus_zonas_erroneas.pdf','ACT','Tus Zonas Erroneas'),(31,1,4,21,'2015-10-12 23:07:38','Randy Pausch – Su historia de vida y gran mensaje','https://www.youtube.com/watch?v=e0ZwxhFUAOo','ACT','Randy Pausch – Su historia de vida y gra'),(32,1,4,21,'2015-10-12 23:08:39','Steve Jobs Discurso en Stanford','https://www.youtube.com/watch?v=HHkJEz_HdTg','ACT','Steve Jobs Discurso en Stanford'),(33,1,4,21,'2015-10-12 23:10:16','1997 (narrado por Steve Jobs)','https://www.youtube.com/watch?v=H8D7PjA3S7E','ACT','Comercial Piensa Diferente de Apple'),(39,1,5,21,'2015-10-12 23:21:29','Las 7 leyes espiritualies del exito. Deepak Chopra','https://www.youtube.com/watch?v=uHQSioACws0','ACT','Las 7 leyes espiritualies del exito.'),(40,1,5,21,'2015-10-12 23:22:16','El Vendedor Mas Grande del Mundo','https://www.youtube.com/watch?v=I1KjYstLfYw','ACT','El Vendedor Mas Grande del Mundo'),(41,1,3,21,'2015-10-12 23:23:58','Sesenta Minutos Para Volverse Rico Robert Kiyosaki','https://www.youtube.com/watch?v=IhK6NB7l4gw','ACT','Sesenta Minutos Para Volverse Rico Robert Kiyosaki'),(42,1,3,21,'2015-10-12 23:25:01','Importancia de la EDUCACIÓN FINANCIERA R en Lima – Perú','https://www.youtube.com/watch?v=xvZkTkGzrWc','ACT','Importancia de la EDUCACIÓN FINANCIERA R'),(43,1,3,21,'2015-10-12 23:31:12','EL NEGOCIO PERFECTO','https://www.youtube.com/watch?v=oaMDj4w-ERI','ACT','EL NEGOCIO PERFECTO'),(44,1,3,21,'2015-10-12 23:27:01','Robert kiyosaki y Donald trump hablan de las redes de mercadeo','https://www.youtube.com/watch?t=7&v=bOMzX6KX2gw','ACT','Robert kiyosaki y Donald trump hablan de');
/*!40000 ALTER TABLE `archivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `archivo_soporte_tecnico`
--

DROP TABLE IF EXISTS `archivo_soporte_tecnico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archivo_soporte_tecnico` (
  `id_archivo` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `descripcion` varchar(45) NOT NULL,
  `ruta` text NOT NULL,
  `status` varchar(45) NOT NULL,
  `nombre_publico` text,
  `id_red` int(11) NOT NULL,
  PRIMARY KEY (`id_archivo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archivo_soporte_tecnico`
--

LOCK TABLES `archivo_soporte_tecnico` WRITE;
/*!40000 ALTER TABLE `archivo_soporte_tecnico` DISABLE KEYS */;
/*!40000 ALTER TABLE `archivo_soporte_tecnico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `autocompra`
--

DROP TABLE IF EXISTS `autocompra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `autocompra` (
  `id_autocompra` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_autocompra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autocompra`
--

LOCK TABLES `autocompra` WRITE;
/*!40000 ALTER TABLE `autocompra` DISABLE KEYS */;
/*!40000 ALTER TABLE `autocompra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banner` (
  `id` int(11) NOT NULL DEFAULT '1',
  `titulo` varchar(200) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `nombre_banner` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banner`
--

LOCK TABLES `banner` WRITE;
/*!40000 ALTER TABLE `banner` DISABLE KEYS */;
INSERT INTO `banner` VALUES (1,'Mi Empresa multinivel','La mejor empresa multinivel, lo acompañamos a que sea un comerciante exitoso.','empresa.png');
/*!40000 ALTER TABLE `banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `billetera`
--

DROP TABLE IF EXISTS `billetera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `billetera` (
  `id_user` int(11) NOT NULL,
  `pswd` varchar(250) DEFAULT NULL,
  `estatus` varchar(3) NOT NULL,
  `activo` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `billetera`
--

LOCK TABLES `billetera` WRITE;
/*!40000 ALTER TABLE `billetera` DISABLE KEYS */;
INSERT INTO `billetera` VALUES (2,'0','ACT','si');
/*!40000 ALTER TABLE `billetera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bono`
--

DROP TABLE IF EXISTS `bono`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bono` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` text NOT NULL,
  `inicio` varchar(45) NOT NULL,
  `fin` varchar(45) NOT NULL,
  `mes_desde_afiliacion` int(11) NOT NULL DEFAULT '0',
  `mes_desde_activacion` int(11) NOT NULL DEFAULT '0',
  `frecuencia` varchar(3) NOT NULL,
  `plan` varchar(2) NOT NULL DEFAULT 'NO',
  `estatus` varchar(3) NOT NULL DEFAULT 'ACT',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bono`
--

LOCK TABLES `bono` WRITE;
/*!40000 ALTER TABLE `bono` DISABLE KEYS */;
/*!40000 ALTER TABLE `bono` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `canal`
--

DROP TABLE IF EXISTS `canal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `canal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(15) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `estatus` varchar(3) DEFAULT 'ACT',
  `gastos` float DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `canal`
--

LOCK TABLES `canal` WRITE;
/*!40000 ALTER TABLE `canal` DISABLE KEYS */;
INSERT INTO `canal` VALUES (1,'carrito','Carrito de Compras','ACT',30),(2,'cedi','CEDI','ACT',0),(3,'vip','Web Personal','DES',0);
/*!40000 ALTER TABLE `canal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrito_temporal`
--

DROP TABLE IF EXISTS `carrito_temporal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrito_temporal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_venta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito_temporal`
--

LOCK TABLES `carrito_temporal` WRITE;
/*!40000 ALTER TABLE `carrito_temporal` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrito_temporal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_banco`
--

DROP TABLE IF EXISTS `cat_banco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_banco` (
  `id_banco` int(11) NOT NULL AUTO_INCREMENT,
  `id_pais` varchar(3) NOT NULL DEFAULT 'COl',
  `cuenta` varchar(100) DEFAULT NULL,
  `descripcion` varchar(50) NOT NULL,
  `clave` varchar(20) NOT NULL,
  `swift` varchar(45) DEFAULT NULL,
  `otro` varchar(45) DEFAULT NULL,
  `dir_postal` varchar(100) DEFAULT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_banco`,`id_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_banco`
--

LOCK TABLES `cat_banco` WRITE;
/*!40000 ALTER TABLE `cat_banco` DISABLE KEYS */;
INSERT INTO `cat_banco` VALUES (1,'COL','326342648','BBVA','','','NetworkSoft','','ACT');
/*!40000 ALTER TABLE `cat_banco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_bono_condicion`
--

DROP TABLE IF EXISTS `cat_bono_condicion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_bono_condicion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bono` int(11) NOT NULL,
  `id_rango` int(11) NOT NULL,
  `id_tipo_rango` int(11) NOT NULL,
  `condicion_rango` int(11) NOT NULL,
  `id_red` int(11) NOT NULL,
  `condicion1` int(11) NOT NULL DEFAULT '0',
  `condicion2` int(11) NOT NULL DEFAULT '0',
  `calificado` varchar(3) NOT NULL DEFAULT 'DOS',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_bono_condicion`
--

LOCK TABLES `cat_bono_condicion` WRITE;
/*!40000 ALTER TABLE `cat_bono_condicion` DISABLE KEYS */;
/*!40000 ALTER TABLE `cat_bono_condicion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_bono_valor_nivel`
--

DROP TABLE IF EXISTS `cat_bono_valor_nivel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_bono_valor_nivel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bono` int(11) NOT NULL,
  `nivel` int(11) NOT NULL,
  `valor` float NOT NULL,
  `condicion_red` varchar(8) NOT NULL DEFAULT 'DIRECTOS',
  `verticalidad` varchar(4) DEFAULT 'ASC',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_bono_valor_nivel`
--

LOCK TABLES `cat_bono_valor_nivel` WRITE;
/*!40000 ALTER TABLE `cat_bono_valor_nivel` DISABLE KEYS */;
/*!40000 ALTER TABLE `cat_bono_valor_nivel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_color_evento`
--

DROP TABLE IF EXISTS `cat_color_evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_color_evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_color_evento`
--

LOCK TABLES `cat_color_evento` WRITE;
/*!40000 ALTER TABLE `cat_color_evento` DISABLE KEYS */;
INSERT INTO `cat_color_evento` VALUES (1,'negro'),(2,'azul'),(3,'amarillo'),(4,'rojo'),(5,'verde'),(6,'gris');
/*!40000 ALTER TABLE `cat_color_evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_cuenta`
--

DROP TABLE IF EXISTS `cat_cuenta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_cuenta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `cuenta` varchar(15) DEFAULT NULL,
  `banco` varchar(100) DEFAULT NULL,
  `estatus` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_cuenta`
--

LOCK TABLES `cat_cuenta` WRITE;
/*!40000 ALTER TABLE `cat_cuenta` DISABLE KEYS */;
INSERT INTO `cat_cuenta` VALUES (1,1,'4353222444500','1','ACT');
/*!40000 ALTER TABLE `cat_cuenta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_distribuidor`
--

DROP TABLE IF EXISTS `cat_distribuidor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_distribuidor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `costo` decimal(10,2) NOT NULL,
  `comision` decimal(7,4) NOT NULL,
  `impuesto` decimal(7,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_distribuidor`
--

LOCK TABLES `cat_distribuidor` WRITE;
/*!40000 ALTER TABLE `cat_distribuidor` DISABLE KEYS */;
/*!40000 ALTER TABLE `cat_distribuidor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_edo_civil`
--

DROP TABLE IF EXISTS `cat_edo_civil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_edo_civil` (
  `id_edo_civil` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(80) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_edo_civil`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_edo_civil`
--

LOCK TABLES `cat_edo_civil` WRITE;
/*!40000 ALTER TABLE `cat_edo_civil` DISABLE KEYS */;
INSERT INTO `cat_edo_civil` VALUES (1,'Soltero/a','ACT'),(2,'Casado/a','ACT'),(3,'Divorciado/a','ACT'),(4,'Viudo/a','ACT'),(5,'Union libre','ACT');
/*!40000 ALTER TABLE `cat_edo_civil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_estado`
--

DROP TABLE IF EXISTS `cat_estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_estado`
--

LOCK TABLES `cat_estado` WRITE;
/*!40000 ALTER TABLE `cat_estado` DISABLE KEYS */;
INSERT INTO `cat_estado` VALUES (1,'Aguascalientes','ACT'),(2,'Baja California','ACT'),(3,'Baja California Sur','ACT'),(4,'Campeche','ACT'),(5,'Coahuila de Zaragoza','ACT'),(6,'Colima','ACT'),(7,'Chiapas','ACT'),(8,'Chihuahua','ACT'),(9,'Distrito Federal','ACT'),(10,'Durango','ACT'),(11,'Guanajuato','ACT'),(12,'Guerrero','ACT'),(13,'Hidalgo','ACT'),(14,'Jalisco','ACT'),(15,'México','ACT'),(16,'Michoacán de Ocampo','ACT'),(17,'Morelos','ACT'),(18,'Nayarit','ACT'),(19,'Nuevo León','ACT'),(20,'Oaxaca','ACT'),(21,'Puebla','ACT'),(22,'Querétaro','ACT'),(23,'Quintana Roo','ACT'),(24,'San Luis Potosí','ACT'),(25,'Sinaloa','ACT'),(26,'Sonora','ACT'),(27,'Tabasco','ACT'),(28,'Tamaulipas','ACT'),(29,'Tlaxcala','ACT'),(30,'Veracruz de Ignacio de la Llave','ACT'),(31,'Yucatán','ACT'),(32,'Zacatecas','ACT');
/*!40000 ALTER TABLE `cat_estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_estatus`
--

DROP TABLE IF EXISTS `cat_estatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_estatus` (
  `id_estatus` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_estatus`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_estatus`
--

LOCK TABLES `cat_estatus` WRITE;
/*!40000 ALTER TABLE `cat_estatus` DISABLE KEYS */;
INSERT INTO `cat_estatus` VALUES (1,'Correcto','ACT'),(2,'Pagado','ACT'),(3,'Pendiente','ACT'),(4,'Activo','ACT'),(5,'Modificado','ACT'),(6,'Cancelado','ACT');
/*!40000 ALTER TABLE `cat_estatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_estatus_afiliado`
--

DROP TABLE IF EXISTS `cat_estatus_afiliado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_estatus_afiliado` (
  `id_estatus` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_estatus`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_estatus_afiliado`
--

LOCK TABLES `cat_estatus_afiliado` WRITE;
/*!40000 ALTER TABLE `cat_estatus_afiliado` DISABLE KEYS */;
INSERT INTO `cat_estatus_afiliado` VALUES (1,'Activado','ACT'),(2,'Desactivado','ACT'),(3,'Pago pendiente','ACT'),(4,'Sin compra mínima','ACT');
/*!40000 ALTER TABLE `cat_estatus_afiliado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_estatus_embarque`
--

DROP TABLE IF EXISTS `cat_estatus_embarque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_estatus_embarque` (
  `id_estatus` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_estatus`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_estatus_embarque`
--

LOCK TABLES `cat_estatus_embarque` WRITE;
/*!40000 ALTER TABLE `cat_estatus_embarque` DISABLE KEYS */;
INSERT INTO `cat_estatus_embarque` VALUES (1,'Por embarcar','ACT'),(2,'Embarcado','ACT');
/*!40000 ALTER TABLE `cat_estatus_embarque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_estatus_movimiento`
--

DROP TABLE IF EXISTS `cat_estatus_movimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_estatus_movimiento` (
  `id_estatus` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_estatus`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_estatus_movimiento`
--

LOCK TABLES `cat_estatus_movimiento` WRITE;
/*!40000 ALTER TABLE `cat_estatus_movimiento` DISABLE KEYS */;
INSERT INTO `cat_estatus_movimiento` VALUES (1,'Pendiente','ACT'),(2,'En proceso','ACT');
/*!40000 ALTER TABLE `cat_estatus_movimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_estatus_msg`
--

DROP TABLE IF EXISTS `cat_estatus_msg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_estatus_msg` (
  `id_estatus` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_estatus`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_estatus_msg`
--

LOCK TABLES `cat_estatus_msg` WRITE;
/*!40000 ALTER TABLE `cat_estatus_msg` DISABLE KEYS */;
INSERT INTO `cat_estatus_msg` VALUES (1,'Leído','ACT'),(2,'No leído',''),(3,'Borrado','ACT'),(4,'Inadecuado','ACT'),(5,'Spam','ACT');
/*!40000 ALTER TABLE `cat_estatus_msg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_estatus_surtido`
--

DROP TABLE IF EXISTS `cat_estatus_surtido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_estatus_surtido` (
  `id_estatus` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_estatus`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_estatus_surtido`
--

LOCK TABLES `cat_estatus_surtido` WRITE;
/*!40000 ALTER TABLE `cat_estatus_surtido` DISABLE KEYS */;
INSERT INTO `cat_estatus_surtido` VALUES (1,'Pendiente','ACT'),(2,'Surtido','ACT');
/*!40000 ALTER TABLE `cat_estatus_surtido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_estudios`
--

DROP TABLE IF EXISTS `cat_estudios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_estudios` (
  `id_estudio` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_estudio`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_estudios`
--

LOCK TABLES `cat_estudios` WRITE;
/*!40000 ALTER TABLE `cat_estudios` DISABLE KEYS */;
INSERT INTO `cat_estudios` VALUES (1,'Primaria','ACT'),(2,'Secundaria','ACT'),(3,'Preparatoria','ACT'),(4,'Carrera trunca','ACT'),(5,'Licenciatura','ACT'),(6,'Maestría','ACT');
/*!40000 ALTER TABLE `cat_estudios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_grupo`
--

DROP TABLE IF EXISTS `cat_grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) NOT NULL,
  `estatus` varchar(3) NOT NULL DEFAULT 'ACT',
  `tipo` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_grupo`
--

LOCK TABLES `cat_grupo` WRITE;
/*!40000 ALTER TABLE `cat_grupo` DISABLE KEYS */;
INSERT INTO `cat_grupo` VALUES (2,'Multinivel','ACT','VID'),(3,'Robert Kiyosaki','ACT','VID'),(4,'Motivacionales','ACT','VID'),(5,'Audio Libros','ACT','VID'),(6,'Motivacion','ACT','PRE'),(7,'Inspiración','ACT','EBO'),(9,'Vídeos de interes','ACT','VID'),(10,'Descarga activas','ACT','DES');
/*!40000 ALTER TABLE `cat_grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_grupo_perfil`
--

DROP TABLE IF EXISTS `cat_grupo_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_grupo_perfil` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_grupo_perfil`
--

LOCK TABLES `cat_grupo_perfil` WRITE;
/*!40000 ALTER TABLE `cat_grupo_perfil` DISABLE KEYS */;
INSERT INTO `cat_grupo_perfil` VALUES (1,'Backoffice','ACT'),(2,'Oficina virtual','ACT');
/*!40000 ALTER TABLE `cat_grupo_perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_grupo_producto`
--

DROP TABLE IF EXISTS `cat_grupo_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_grupo_producto` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  `id_red` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_grupo_producto`
--

LOCK TABLES `cat_grupo_producto` WRITE;
/*!40000 ALTER TABLE `cat_grupo_producto` DISABLE KEYS */;
INSERT INTO `cat_grupo_producto` VALUES (1,'publicidad','ACT',1);
/*!40000 ALTER TABLE `cat_grupo_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_grupo_soporte_tecnico`
--

DROP TABLE IF EXISTS `cat_grupo_soporte_tecnico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_grupo_soporte_tecnico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  `estatus` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `id_red` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_grupo_soporte_tecnico`
--

LOCK TABLES `cat_grupo_soporte_tecnico` WRITE;
/*!40000 ALTER TABLE `cat_grupo_soporte_tecnico` DISABLE KEYS */;
/*!40000 ALTER TABLE `cat_grupo_soporte_tecnico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_img`
--

DROP TABLE IF EXISTS `cat_img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_img` (
  `id_img` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(250) NOT NULL,
  `nombre_completo` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `extencion` varchar(6) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_img`)
) ENGINE=InnoDB AUTO_INCREMENT=647 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_img`
--

LOCK TABLES `cat_img` WRITE;
/*!40000 ALTER TABLE `cat_img` DISABLE KEYS */;
INSERT INTO `cat_img` VALUES (3,'/media/2/user.jpg','user.jpg','user','jpg','ACT'),(645,'/media/carrito/Membrete1.png','Membrete1.png','Membrete1','png','ACT'),(646,'/media/carrito/m3.jpg','m3.jpg','m3','jpg','ACT');
/*!40000 ALTER TABLE `cat_img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_impuesto`
--

DROP TABLE IF EXISTS `cat_impuesto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_impuesto` (
  `id_impuesto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `porcentaje` int(11) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  `id_pais` varchar(5) NOT NULL,
  PRIMARY KEY (`id_impuesto`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_impuesto`
--

LOCK TABLES `cat_impuesto` WRITE;
/*!40000 ALTER TABLE `cat_impuesto` DISABLE KEYS */;
INSERT INTO `cat_impuesto` VALUES (1,'IVA',0,'ACT','AAA'),(2,'IVA',16,'ACT','COL'),(3,'IVA',21,'ACT','ESP'),(4,'IVA',21,'ACT','ARG'),(5,'IVA',19,'ACT','CHL'),(6,'IVA',18,'ACT','PER'),(7,'IVA',18,'ACT','DOM'),(8,'IVA',17,'ACT','BRA'),(9,'IVA',16,'ACT','MEX'),(10,'IVA',15,'ACT','HND'),(11,'IVA',15,'ACT','NIC'),(12,'IVA',13,'ACT','BOL'),(13,'IVA',13,'ACT','CRI'),(14,'IVA',13,'ACT','SLV'),(15,'IVA',12,'ACT','ECU'),(16,'IVA',12,'ACT','GTM'),(17,'IVA',12,'ACT','VEN'),(18,'IVA',11,'ACT','PRI'),(19,'IVA',10,'ACT','PRY'),(20,'IVA',7,'ACT','PAN');
/*!40000 ALTER TABLE `cat_impuesto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_metodo_cobro`
--

DROP TABLE IF EXISTS `cat_metodo_cobro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_metodo_cobro` (
  `id_metodo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_metodo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_metodo_cobro`
--

LOCK TABLES `cat_metodo_cobro` WRITE;
/*!40000 ALTER TABLE `cat_metodo_cobro` DISABLE KEYS */;
INSERT INTO `cat_metodo_cobro` VALUES (1,'Deposito','ACT'),(2,'Transferencia','ACT'),(3,'Cheque','ACT'),(4,'Paypal','ACT');
/*!40000 ALTER TABLE `cat_metodo_cobro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_metodo_pago`
--

DROP TABLE IF EXISTS `cat_metodo_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_metodo_pago` (
  `id_metodo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_metodo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_metodo_pago`
--

LOCK TABLES `cat_metodo_pago` WRITE;
/*!40000 ALTER TABLE `cat_metodo_pago` DISABLE KEYS */;
INSERT INTO `cat_metodo_pago` VALUES (2,'Tarjetas de Crédito','ACT'),(4,'pse-Transferencias bancarias','ACT'),(5,'Débitos ACH','ACT'),(6,'Tarjetas débito','ACT'),(7,'Pago en efectivo','ACT'),(8,'Pago Referenciado','ACT'),(10,'Pago en bancos','ACT'),(11,'Consignacion','ACT');
/*!40000 ALTER TABLE `cat_metodo_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_moneda`
--

DROP TABLE IF EXISTS `cat_moneda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_moneda` (
  `codigo_pais` varchar(2) NOT NULL,
  `codigo_moneda` varchar(3) NOT NULL,
  `moneda` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_moneda`
--

LOCK TABLES `cat_moneda` WRITE;
/*!40000 ALTER TABLE `cat_moneda` DISABLE KEYS */;
INSERT INTO `cat_moneda` VALUES ('AD','EUR','euro','ACT'),('AE','AED','Emiratí dirham','ACT'),('AF','USD','Afgani','ACT'),('AG','XCD','Dólar del Caribe Oriental','ACT'),('AI','XCD','Dólar del Caribe Oriental','ACT'),('AL','EUR','euro','ACT'),('AM','AMD','Dram armenio','ACT'),('AN','ANG','Dólar de Antillas Neerlandesas','ACT'),('AN','ANG','Florín de Antillas Neerlandesas','ACT'),('AN','ANG','Florín de Antillas Neerlandesas','ACT'),('AN','ANG','Florín de Antillas Neerlandesas','ACT'),('AN','ANG','Florín de Antillas Neerlandesas','ACT'),('AN','ANG','Florín de Antillas Neerlandesas','ACT'),('AO','AOA','Kwanza angoleño','ACT'),('AR','SRA','Peso argentino','DES'),('AS','USD','Dólar estadounidense','ACT'),('AT','EUR','euro','ACT'),('AU','AUD','Dólar australiano','ACT'),('AW','AWG','Florín de Aruba','ACT'),('AZ','AZM','Manat azerí','ACT'),('BA','BAM','Marco bosnio convertible','ACT'),('BB','BBD','Dólar de Barbados','ACT'),('BD','BDT','Taka de Bangladesh','ACT'),('BE','EUR','euro','ACT'),('BF','XOF','Franco CFA, BCEAO','ACT'),('BG','EUR','euro','ACT'),('BH','BHD','Dinar bahriní','ACT'),('BI','BIF','Franco de Burundi','ACT'),('BJ','XOF','Franco CFA, BCEAO','ACT'),('BM','BMD','Dólar de Bermudas','ACT'),('BN','BND','Dólar de Brunei','ACT'),('BO','BOB','Boliviano de Bolivia','DES'),('BR','BRL','Real brasileño','DES'),('BS','BSD','Dólar de las Bahamas','ACT'),('BT','BTN','Ngultrum butanés','ACT'),('BW','BWP','Pula botsuanés','ACT'),('BY','BYR','Rublo bielorruso','ACT'),('BZ','BZD','Dólar de Belice','ACT'),('CA','CAD','Dólar canadiense','ACT'),('CD','CDF','Franco congoleño','ACT'),('CF','XAF','Franco CFA, BEAC','ACT'),('CG','XAF','Franco CFA, BEAC','ACT'),('CH','CHF','Franco suizo','ACT'),('CI','XOF','Franco CFA, BCEAO','ACT'),('CK','NZD','Dólar neozelandés','ACT'),('CL','CLP','Peso chileno','DES'),('CM','XAF','Franco CFA, BEAC','ACT'),('CN','RMB','Yuan renminbi','ACT'),('CO','COP','Peso colombiano','ACT'),('CR','CRC','Colón costarricense','DES'),('CV','CVE','Escudo de Cabo Verde','ACT'),('CY','EUR','euro','ACT'),('CZ','CZK','Corona checa','ACT'),('DE','EUR','euro','ACT'),('DJ','DJF','Franco de Djibouti','ACT'),('DK','DKK','Corona danesa','ACT'),('DM','XCD','Dólar del Caribe Oriental','ACT'),('DO','DOP','Peso dominicano','DES'),('DZ','DZD','Dinar argelino','ACT'),('EC','USD','Dólar estadounidense','DES'),('EE','EUR','euro','ACT'),('EE','USD','Dólar estadounidense','ACT'),('EG','EGP','Libra egipcia','ACT'),('EP','EUR','euro','ACT'),('ER','ERN','Nakfa eritreo','ACT'),('ES','EUR','euro','ACT'),('ES','EUR','euro','ACT'),('ET','ETB','Birr etíope','ACT'),('FI','EUR','euro','ACT'),('FJ','FJD','Dólar de Fiyi','ACT'),('FM','USD','Dólar estadounidense','ACT'),('FM','USD','Dólar estadounidense','ACT'),('FM','USD','Dólar estadounidense','ACT'),('FM','USD','Dólar estadounidense','ACT'),('FM','USD','Dólar estadounidense','ACT'),('FO','DKK','Corona danesa','ACT'),('FR','EUR','euro','ACT'),('GA','XAF','Franco CFA, BEAC','ACT'),('GB','GBP','Libra esterlina','ACT'),('GB','GBP','Libra esterlina','ACT'),('GB','GBP','Libra esterlina','ACT'),('GB','GBP','Libra esterlina','ACT'),('GB','GBP','Libra esterlina','ACT'),('GD','XCD','Dólar del Caribe Oriental','ACT'),('GE','GEL','Lari georgiano','ACT'),('GF','EUR','euro','ACT'),('GG','GBP','Libra esterlina','ACT'),('GH','GHS','Cedi ghanés','ACT'),('GI','GIP','Libra de Gibraltar','ACT'),('GL','DKK','Corona danesa','ACT'),('GM','GMD','Dalasi gambiano','ACT'),('GN','GNF','Franco guineano','ACT'),('GP','EUR','euro','ACT'),('GP','EUR','euro','ACT'),('GP','EUR','euro','ACT'),('GQ','XAF','Franco CFA, BEAC','ACT'),('GR','EUR','euro','ACT'),('GT','GTQ','Quetzal guatemalteco','ACT'),('GU','USD','Dólar estadounidense','ACT'),('GW','XOF','Franco CFA, BCEAO','ACT'),('GY','GYD','Dólar guayanés','ACT'),('HK','HKD','Dólar de Hong Kong','ACT'),('HN','HNL','Lempira hondureño','DES'),('HR','EUR','euro','ACT'),('HT','HTG','Gourde haitiano','ACT'),('HU','HUF','Forint húngaro','ACT'),('ID','IDR','Rupia indonesia','ACT'),('IE','EUR','euro','ACT'),('IL','ILS','Nuevo shékel israelí','ACT'),('IN','INR','Rupia india','ACT'),('IQ','NID','Dinar iraquí','ACT'),('IS','ISK','Corona islandesa','ACT'),('IT','EUR','euro','ACT'),('JE','GBP','Libra esterlina','ACT'),('JM','JMD','Dólar de Jamaica','ACT'),('JO','JOD','Dinar jordano','ACT'),('JP','JPY','Yen japonés','ACT'),('KE','KES','Chelín keniano','ACT'),('KG','KGS','Som kirguizo','ACT'),('KH','KHR','Riel camboyano','ACT'),('KI','AUD','Dólar australiano','ACT'),('KM','USD','Franco comorano','ACT'),('KN','XCD','Dólar del Caribe Oriental','ACT'),('KN','XCD','Dólar del Caribe Oriental','ACT'),('KR','KRW','Won surcoreano','ACT'),('KW','KWD','Dinar kuwaití','ACT'),('KY','KYD','Dólar de las Islas Caimán','ACT'),('KZ','KZT','Tenge kazajo','ACT'),('LA','LAK','Kip laosiano','ACT'),('LB','LBP','Libra libanesa','ACT'),('LC','XCD','Dólar del Caribe Oriental','ACT'),('LI','CHF','Franco suizo','ACT'),('LK','LKR','Esrilanqués Lankan rupia','ACT'),('LR','LRD','Dólar liberiano','ACT'),('LS','LSL','Loti de Lesoto','ACT'),('LT','LTL','Litas lituano','ACT'),('LU','EUR','euro','ACT'),('LV','LVL','Lats letón','ACT'),('LY','LYD','Dinar libio','ACT'),('MA','MAD','Dirham marroquí','ACT'),('MC','EUR','euro','ACT'),('MD','MDL','Leu moldavo','ACT'),('ME','EUR','Dinar serbio','ACT'),('MG','MGA','Ariary','ACT'),('MH','USD','Dólar estadounidense','ACT'),('MK','EUR','euro','ACT'),('ML','XOF','Franco CFA, BCEAO','ACT'),('MN','MNT','Tugrik mongol','ACT'),('MO','MOP','Pataca de Macao','ACT'),('MP','USD','Dólar estadounidense','ACT'),('MP','USD','Dólar estadounidense','ACT'),('MP','USD','Dólar estadounidense','ACT'),('MP','USD','Dólar estadounidense','ACT'),('MQ','EUR','euro','ACT'),('MR','MRO','Ouguiya mauritano','ACT'),('MS','XCD','Dólar del Caribe Oriental','ACT'),('MT','EUR','euro','ACT'),('MU','MUR','Rupia mauriciana','ACT'),('MV','MVR','Rufiyaa de Maldivas','ACT'),('MW','MWK','Kwacha de Malaui','ACT'),('MX','MXN','Peso mexicano','DES'),('MY','MYR','Ringgit malasio','ACT'),('MZ','MZM','Metical mozambiqueño','ACT'),('NA','NAD','Dólar de Namibia','ACT'),('NC','XPF','Franco CFP','ACT'),('NE','XOF','Franco CFA, BCEAO','ACT'),('NF','AUD','Dólar australiano','ACT'),('NG','NGN','Naira nigeriano','ACT'),('NI','NIO','Córdoba de oro nicaragüense','DES'),('NL','EUR','euro','ACT'),('NL','EUR','euro','ACT'),('NO','NOK','Corona noruega','ACT'),('NP','NPR','Rupia nepalesa','ACT'),('NZ','NZD','Dólar neozelandés','ACT'),('OM','OMR','Rial omaní','ACT'),('PA','PAB','Balboa panameño','DES'),('PE','PEN','Nuevo sol peruano','DES'),('PF','XPF','Franco CFP','ACT'),('PF','XPF','Franco CFP','ACT'),('PG','PGK','Kina de Papúa-Nueva Guinea','ACT'),('PH','PHP','Peso filipino','ACT'),('PK','PKR','Rupia paquistaní','ACT'),('PL','PLN','Zloty polaco','ACT'),('PR','USD','Dólar estadounidense','DES'),('PT','EUR','euro','ACT'),('PT','EUR','euro','ACT'),('PT','EUR','euro','ACT'),('PW','USD','Dólar estadounidense','ACT'),('PY','PYG','Guaraní paraguayo','DES'),('QA','QAR','Riyal de Qatar','ACT'),('RE','EUR','euro','ACT'),('RO','ROL','Leu rumano','ACT'),('RS','EUR','Dinar serbio','ACT'),('RU','RUB','Rublo ruso','ACT'),('RW','RWF','Franco ruandés','ACT'),('SA','SAR','Riyal saudí','ACT'),('SB','SBD','Dólar de las Islas Salomón','ACT'),('SC','SCR','Rupia de las Seychelles','ACT'),('SE','SEK','Corona sueca','ACT'),('SG','SGD','Dólar singapurense','ACT'),('SI','EUR','euro','ACT'),('SK','EUR','euro','ACT'),('SL','SLL','Sierra Leona leone','ACT'),('SM','EUR','euro','ACT'),('SN','XOF','Franco CFA, BCEAO','ACT'),('SR','SRG','Surinamés guilder','ACT'),('SV','USD','Dólar estadounidense','DES'),('SZ','SZL','Suazilandia lilangeni','ACT'),('TC','USD','Dólar estadounidense','ACT'),('TD','XAF','Franco CFA, BEAC','ACT'),('TG','XOF','Franco CFA, BCEAO','ACT'),('TH','THB','Baht tailandés','ACT'),('TJ','TJS','Tayikistán somoni','ACT'),('TL','USD','Dólar estadounidense','ACT'),('TM','TMM','Turcomano manat','ACT'),('TN','TND','Dinar tunecino','ACT'),('TO','TOP','Tonga pa´anga','ACT'),('TR','TRQ','Lira turca','ACT'),('TT','TTD','Dólar de Trinidad y Tobago','ACT'),('TV','AUD','Dólar australiano','ACT'),('TW','TWD','Dólar de Taiwán','ACT'),('TZ','TZS','Chelín tanzano','ACT'),('UA','UAH','Ucraniano jrivnia','ACT'),('UG','UGX','Chelín ugandés','ACT'),('UY','UYU','Peso uruguayo','DES'),('UZ','UZS','Uzbeko som','ACT'),('VA','EUR','euro','ACT'),('VC','XCD','Dólar del Caribe Oriental','ACT'),('VC','XCD','Dólar del Caribe Oriental','ACT'),('VE','VEB','Bolívar venezolano','DES'),('VG','USD','Dólar estadounidense','ACT'),('VG','USD','Dólar estadounidense','ACT'),('VG','USD','Dólar estadounidense','ACT'),('VI','USD','Dólar estadounidense','ACT'),('VI','USD','Dólar estadounidense','ACT'),('VI','USD','Dólar estadounidense','ACT'),('VI','USD','Dólar estadounidense','ACT'),('VN','VND','Dong vietnamita','ACT'),('VU','VUV','Vanuatu vatu','ACT'),('WF','XPF','Franco CFP','ACT'),('WS','WST','Samoano tala','ACT'),('YE','YER','Yemení rial','ACT'),('YT','EUR','Franco','ACT'),('ZA','ZAR','Rand sudafricano','ACT'),('ZM','ZMK','Kwacha zambiano','ACT'),('ZW','ZWD','Zimbabuense dólar','ACT');
/*!40000 ALTER TABLE `cat_moneda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_movimiento`
--

DROP TABLE IF EXISTS `cat_movimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_movimiento` (
  `id_movimiento` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_movimiento` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_movimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_movimiento`
--

LOCK TABLES `cat_movimiento` WRITE;
/*!40000 ALTER TABLE `cat_movimiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `cat_movimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_municipio`
--

DROP TABLE IF EXISTS `cat_municipio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_municipio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2319 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_municipio`
--

LOCK TABLES `cat_municipio` WRITE;
/*!40000 ALTER TABLE `cat_municipio` DISABLE KEYS */;
INSERT INTO `cat_municipio` VALUES (1,'Aguascalientes','ACT'),(2,'San Francisco de los Romo','ACT'),(3,'El Llano','ACT'),(4,'Rincón de Romos','ACT'),(5,'Cosío','ACT'),(6,'San José de Gracia','ACT'),(7,'Tepezalá','ACT'),(8,'Pabellón de Arteaga','ACT'),(9,'Asientos','ACT'),(10,'Calvillo','ACT'),(11,'Jesús María','ACT'),(12,'Mexicali','ACT'),(13,'Tecate','ACT'),(14,'Tijuana','ACT'),(15,'Playas de Rosarito','ACT'),(16,'Ensenada','ACT'),(17,'La Paz','ACT'),(18,'Los Cabos','ACT'),(19,'Comondú','ACT'),(20,'Loreto','ACT'),(21,'Mulegé','ACT'),(22,'Campeche','ACT'),(23,'Carmen','ACT'),(24,'Palizada','ACT'),(25,'Candelaria','ACT'),(26,'Escárcega','ACT'),(27,'Champotón','ACT'),(28,'Hopelchén','ACT'),(29,'Calakmul','ACT'),(30,'Tenabo','ACT'),(31,'Hecelchakán','ACT'),(32,'Calkiní','ACT'),(33,'Saltillo','ACT'),(34,'Arteaga','ACT'),(35,'Juárez','ACT'),(36,'Progreso','ACT'),(37,'Escobedo','ACT'),(38,'San Buenaventura','ACT'),(39,'Abasolo','ACT'),(40,'Candela','ACT'),(41,'Frontera','ACT'),(42,'Monclova','ACT'),(43,'Castaños','ACT'),(44,'Ramos Arizpe','ACT'),(45,'General Cepeda','ACT'),(46,'Piedras Negras','ACT'),(47,'Nava','ACT'),(48,'Acuña','ACT'),(49,'Múzquiz','ACT'),(50,'Jiménez','ACT'),(51,'Zaragoza','ACT'),(52,'Morelos','ACT'),(53,'Allende','ACT'),(54,'Villa Unión','ACT'),(55,'Guerrero','ACT'),(56,'Hidalgo','ACT'),(57,'Sabinas','ACT'),(58,'San Juan de Sabinas','ACT'),(59,'Torreón','ACT'),(60,'Matamoros','ACT'),(61,'Viesca','ACT'),(62,'Ocampo','ACT'),(63,'Nadadores','ACT'),(64,'Sierra Mojada','ACT'),(65,'Cuatro Ciénegas','ACT'),(66,'Lamadrid','ACT'),(67,'Sacramento','ACT'),(68,'San Pedro','ACT'),(69,'Francisco I. Madero','ACT'),(70,'Parras','ACT'),(71,'Colima','ACT'),(72,'Tecomán','ACT'),(73,'Manzanillo','ACT'),(74,'Armería','ACT'),(75,'Coquimatlán','ACT'),(76,'Comala','ACT'),(77,'Cuauhtémoc','ACT'),(78,'Ixtlahuacán','ACT'),(79,'Minatitlán','ACT'),(80,'Villa de Álvarez','ACT'),(81,'Tuxtla Gutiérrez','ACT'),(82,'San Fernando','ACT'),(83,'Berriozábal','ACT'),(84,'Ocozocoautla de Espinosa','ACT'),(85,'Suchiapa','ACT'),(86,'Chiapa de Corzo','ACT'),(87,'Osumacinta','ACT'),(88,'San Cristóbal de las Casas','ACT'),(89,'Chamula','ACT'),(90,'Ixtapa','ACT'),(91,'Zinacantán','ACT'),(92,'Acala','ACT'),(93,'Chiapilla','ACT'),(94,'San Lucas','ACT'),(95,'Teopisca','ACT'),(96,'Amatenango del Valle','ACT'),(97,'Chanal','ACT'),(98,'Oxchuc','ACT'),(99,'Huixtán','ACT'),(100,'Tenejapa','ACT'),(101,'Mitontic','ACT'),(102,'Reforma','ACT'),(103,'Pichucalco','ACT'),(104,'Sunuapa','ACT'),(105,'Ostuacán','ACT'),(106,'Francisco León','ACT'),(107,'Ixtacomitán','ACT'),(108,'Solosuchiapa','ACT'),(109,'Ixtapangajoya','ACT'),(110,'Tecpatán','ACT'),(111,'Copainalá','ACT'),(112,'Chicoasén','ACT'),(113,'Coapilla','ACT'),(114,'Pantepec','ACT'),(115,'Tapalapa','ACT'),(116,'Ocotepec','ACT'),(117,'Chapultenango','ACT'),(118,'Amatán','ACT'),(119,'Huitiupán','ACT'),(120,'Ixhuatán','ACT'),(121,'Tapilula','ACT'),(122,'Rayón','ACT'),(123,'Pueblo Nuevo Solistahuacán','ACT'),(124,'Jitotol','ACT'),(125,'Bochil','ACT'),(126,'Soyaló','ACT'),(127,'San Juan Cancuc','ACT'),(128,'Sabanilla','ACT'),(129,'Simojovel','ACT'),(130,'San Andrés Duraznal','ACT'),(131,'El Bosque','ACT'),(132,'Chalchihuitán','ACT'),(133,'Larráinzar','ACT'),(134,'Santiago el Pinar','ACT'),(135,'Chenalhó','ACT'),(136,'Aldama','ACT'),(137,'Pantelhó','ACT'),(138,'Sitalá','ACT'),(139,'Salto de Agua','ACT'),(140,'Tila','ACT'),(141,'Tumbalá','ACT'),(142,'Yajalón','ACT'),(143,'Ocosingo','ACT'),(144,'Chilón','ACT'),(145,'Benemérito de las Américas','ACT'),(146,'Marqués de Comillas','ACT'),(147,'Palenque','ACT'),(148,'La Libertad','ACT'),(149,'Catazajá','ACT'),(150,'Comitán de Domínguez','ACT'),(151,'Tzimol','ACT'),(152,'Chicomuselo','ACT'),(153,'Bella Vista','ACT'),(154,'Frontera Comalapa','ACT'),(155,'La Trinitaria','ACT'),(156,'La Independencia','ACT'),(157,'Maravilla Tenejapa','ACT'),(158,'Las Margaritas','ACT'),(159,'Altamirano','ACT'),(160,'Venustiano Carranza','ACT'),(161,'Totolapa','ACT'),(162,'Nicolás Ruíz','ACT'),(163,'Las Rosas','ACT'),(164,'La Concordia','ACT'),(165,'Angel Albino Corzo','ACT'),(166,'Montecristo de Guerrero','ACT'),(167,'Socoltenango','ACT'),(168,'Cintalapa','ACT'),(169,'Jiquipilas','ACT'),(170,'Arriaga','ACT'),(171,'Villaflores','ACT'),(172,'Tonalá','ACT'),(173,'Villa Corzo','ACT'),(174,'Pijijiapan','ACT'),(175,'Mapastepec','ACT'),(176,'Acapetahua','ACT'),(177,'Acacoyagua','ACT'),(178,'Escuintla','ACT'),(179,'Villa Comaltitlán','ACT'),(180,'Huixtla','ACT'),(181,'Mazatán','ACT'),(182,'Huehuetán','ACT'),(183,'Tuzantán','ACT'),(184,'Tapachula','ACT'),(185,'Suchiate','ACT'),(186,'Frontera Hidalgo','ACT'),(187,'Metapa','ACT'),(188,'Tuxtla Chico','ACT'),(189,'Unión Juárez','ACT'),(190,'Cacahoatán','ACT'),(191,'Motozintla','ACT'),(192,'Mazapa de Madero','ACT'),(193,'Amatenango de la Frontera','ACT'),(194,'Bejucal de Ocampo','ACT'),(195,'La Grandeza','ACT'),(196,'El Porvenir','ACT'),(197,'Siltepec','ACT'),(198,'Chihuahua','ACT'),(199,'Riva Palacio','ACT'),(200,'Aquiles Serdán','ACT'),(201,'Bachíniva','ACT'),(202,'Nuevo Casas Grandes','ACT'),(203,'Ascensión','ACT'),(204,'Janos','ACT'),(205,'Casas Grandes','ACT'),(206,'Galeana','ACT'),(207,'Buenaventura','ACT'),(208,'Gómez Farías','ACT'),(209,'Ignacio Zaragoza','ACT'),(210,'Madera','ACT'),(211,'Namiquipa','ACT'),(212,'Temósachic','ACT'),(213,'Matachí','ACT'),(214,'Guadalupe','ACT'),(215,'Praxedis G. Guerrero','ACT'),(216,'Ahumada','ACT'),(217,'Coyame del Sotol','ACT'),(218,'Ojinaga','ACT'),(219,'Julimes','ACT'),(220,'Manuel Benavides','ACT'),(221,'Delicias','ACT'),(222,'Rosales','ACT'),(223,'Meoqui','ACT'),(224,'Dr. Belisario Domínguez','ACT'),(225,'Satevó','ACT'),(226,'San Francisco de Borja','ACT'),(227,'Nonoava','ACT'),(228,'Guachochi','ACT'),(229,'Bocoyna','ACT'),(230,'Cusihuiriachi','ACT'),(231,'Gran Morelos','ACT'),(232,'Santa Isabel','ACT'),(233,'Carichí','ACT'),(234,'Uruachi','ACT'),(235,'Moris','ACT'),(236,'Chínipas','ACT'),(237,'Maguarichi','ACT'),(238,'Guazapares','ACT'),(239,'Batopilas','ACT'),(240,'Urique','ACT'),(241,'Guadalupe y Calvo','ACT'),(242,'San Francisco del Oro','ACT'),(243,'Rosario','ACT'),(244,'Huejotitán','ACT'),(245,'El Tule','ACT'),(246,'Balleza','ACT'),(247,'Santa Bárbara','ACT'),(248,'Camargo','ACT'),(249,'Saucillo','ACT'),(250,'Valle de Zaragoza','ACT'),(251,'La Cruz','ACT'),(252,'San Francisco de Conchos','ACT'),(253,'Hidalgo del Parral','ACT'),(254,'López','ACT'),(255,'Coronado','ACT'),(256,'Álvaro Obregón','ACT'),(257,'Azcapotzalco','ACT'),(258,'Benito Juárez','ACT'),(259,'Coyoacán','ACT'),(260,'Cuajimalpa de Morelos','ACT'),(261,'Gustavo A. Madero','ACT'),(262,'Iztacalco','ACT'),(263,'Iztapalapa','ACT'),(264,'La Magdalena Contreras','ACT'),(265,'Miguel Hidalgo','ACT'),(266,'Milpa Alta','ACT'),(267,'Tláhuac','ACT'),(268,'Tlalpan','ACT'),(269,'Xochimilco','ACT'),(270,'Durango','ACT'),(271,'Canatlán','ACT'),(272,'Nuevo Ideal','ACT'),(273,'Coneto de Comonfort','ACT'),(274,'San Juan del Río','ACT'),(275,'Canelas','ACT'),(276,'Topia','ACT'),(277,'Tamazula','ACT'),(278,'Santiago Papasquiaro','ACT'),(279,'Otáez','ACT'),(280,'San Dimas','ACT'),(281,'Guadalupe Victoria','ACT'),(282,'Peñón Blanco','ACT'),(283,'Pánuco de Coronado','ACT'),(284,'Poanas','ACT'),(285,'Nombre de Dios','ACT'),(286,'Vicente Guerrero','ACT'),(287,'Súchil','ACT'),(288,'Pueblo Nuevo','ACT'),(289,'Mezquital','ACT'),(290,'Gómez Palacio','ACT'),(291,'Lerdo','ACT'),(292,'Mapimí','ACT'),(293,'Tlahualilo','ACT'),(294,'Guanaceví','ACT'),(295,'San Bernardo','ACT'),(296,'Indé','ACT'),(297,'San Pedro del Gallo','ACT'),(298,'Tepehuanes','ACT'),(299,'El Oro','ACT'),(300,'Nazas','ACT'),(301,'San Luis del Cordero','ACT'),(302,'Rodeo','ACT'),(303,'Cuencamé','ACT'),(304,'Santa Clara','ACT'),(305,'San Juan de Guadalupe','ACT'),(306,'General Simón Bolívar','ACT'),(307,'Guanajuato','ACT'),(308,'Silao de la Victoria','ACT'),(309,'Romita','ACT'),(310,'San Francisco del Rincón','ACT'),(311,'Purísima del Rincón','ACT'),(312,'Manuel Doblado','ACT'),(313,'Irapuato','ACT'),(314,'Salamanca','ACT'),(315,'Pénjamo','ACT'),(316,'Cuerámaro','ACT'),(317,'Huanímaro','ACT'),(318,'León','ACT'),(319,'San Felipe','ACT'),(320,'San Miguel de Allende','ACT'),(321,'Dolores Hidalgo Cuna de la Independencia Nacional','ACT'),(322,'San Diego de la Unión','ACT'),(323,'San Luis de la Paz','ACT'),(324,'Victoria','ACT'),(325,'Xichú','ACT'),(326,'Atarjea','ACT'),(327,'Santa Catarina','ACT'),(328,'Doctor Mora','ACT'),(329,'Tierra Blanca','ACT'),(330,'San José Iturbide','ACT'),(331,'Celaya','ACT'),(332,'Apaseo el Grande','ACT'),(333,'Comonfort','ACT'),(334,'Santa Cruz de Juventino Rosas','ACT'),(335,'Villagrán','ACT'),(336,'Cortazar','ACT'),(337,'Valle de Santiago','ACT'),(338,'Jaral del Progreso','ACT'),(339,'Apaseo el Alto','ACT'),(340,'Jerécuaro','ACT'),(341,'Coroneo','ACT'),(342,'Acámbaro','ACT'),(343,'Tarimoro','ACT'),(344,'Tarandacuao','ACT'),(345,'Moroleón','ACT'),(346,'Salvatierra','ACT'),(347,'Yuriria','ACT'),(348,'Santiago Maravatío','ACT'),(349,'Uriangato','ACT'),(350,'Chilpancingo de los Bravo','ACT'),(351,'General Heliodoro Castillo','ACT'),(352,'Leonardo Bravo','ACT'),(353,'Tixtla de Guerrero','ACT'),(354,'Ayutla de los Libres','ACT'),(355,'Mochitlán','ACT'),(356,'Quechultenango','ACT'),(357,'Tecoanapa','ACT'),(358,'Acapulco de Juárez','ACT'),(359,'Juan R. Escudero','ACT'),(360,'San Marcos','ACT'),(361,'Iguala de la Independencia','ACT'),(362,'Huitzuco de los Figueroa','ACT'),(363,'Tepecoacuilco de Trujano','ACT'),(364,'Eduardo Neri','ACT'),(365,'Taxco de Alarcón','ACT'),(366,'Buenavista de Cuéllar','ACT'),(367,'Tetipac','ACT'),(368,'Pilcaya','ACT'),(369,'Teloloapan','ACT'),(370,'Ixcateopan de Cuauhtémoc','ACT'),(371,'Pedro Ascencio Alquisiras','ACT'),(372,'General Canuto A. Neri','ACT'),(373,'Arcelia','ACT'),(374,'Apaxtla','ACT'),(375,'Cuetzala del Progreso','ACT'),(376,'Cocula','ACT'),(377,'Tlapehuala','ACT'),(378,'Cutzamala de Pinzón','ACT'),(379,'Pungarabato','ACT'),(380,'Tlalchapa','ACT'),(381,'Coyuca\n de Catalán','ACT'),(382,'Ajuchitlán del Progreso','ACT'),(383,'Zirándaro','ACT'),(384,'San Miguel Totolapan','ACT'),(385,'La Unión de Isidoro Montes de Oca','ACT'),(386,'Petatlán','ACT'),(387,'Coahuayutla de José María Izazaga','ACT'),(388,'Zihuatanejo de Azueta','ACT'),(389,'Técpan de Galeana','ACT'),(390,'Atoyac de Álvarez','ACT'),(391,'Coyuca de Benítez','ACT'),(392,'Olinalá','ACT'),(393,'Atenango del Río','ACT'),(394,'Copalillo','ACT'),(395,'Cualác','ACT'),(396,'Chilapa de Álvarez','ACT'),(397,'José Joaquín de Herrera','ACT'),(398,'Ahuacuotzingo','ACT'),(399,'Zitlala','ACT'),(400,'Mártir de Cuilapan','ACT'),(401,'Huamuxtitlán','ACT'),(402,'Xochihuehuetlán','ACT'),(403,'Alpoyeca','ACT'),(404,'Tlapa de Comonfort','ACT'),(405,'Tlalixtaquilla de Maldonado','ACT'),(406,'Xalpatláhuac','ACT'),(407,'Zapotitlán Tablas','ACT'),(408,'Acatepec','ACT'),(409,'Atlixtac','ACT'),(410,'Copanatoyac','ACT'),(411,'Malinaltepec','ACT'),(412,'Iliatenco','ACT'),(413,'Tlacoapa','ACT'),(414,'Atlamajalcingo del Monte','ACT'),(415,'San Luis Acatlán','ACT'),(416,'Metlatónoc','ACT'),(417,'Cochoapa el Grande','ACT'),(418,'Alcozauca de Guerrero','ACT'),(419,'Ometepec','ACT'),(420,'Tlacoachistlahuaca','ACT'),(421,'Xochistlahuaca','ACT'),(422,'Florencio Villarreal','ACT'),(423,'Cuautepec','ACT'),(424,'Copala','ACT'),(425,'Azoyú','ACT'),(426,'Juchitán','ACT'),(427,'Marquelia','ACT'),(428,'Cuajinicuilapa','ACT'),(429,'Igualapa','ACT'),(430,'Pachuca de Soto','ACT'),(431,'Mineral del Chico','ACT'),(432,'Mineral del Monte','ACT'),(433,'Ajacuba','ACT'),(434,'San Agustín Tlaxiaca','ACT'),(435,'Mineral de la Reforma','ACT'),(436,'Zapotlán de Juárez','ACT'),(437,'Jacala de Ledezma','ACT'),(438,'Pisaflores','ACT'),(439,'Pacula','ACT'),(440,'La Misión','ACT'),(441,'Chapulhuacán','ACT'),(442,'Ixmiquilpan','ACT'),(443,'Zimapán','ACT'),(444,'Nicolás Flores','ACT'),(445,'Cardonal','ACT'),(446,'Tasquillo','ACT'),(447,'Alfajayucan','ACT'),(448,'Huichapan','ACT'),(449,'Tecozautla','ACT'),(450,'Nopala de Villagrán','ACT'),(451,'Actopan','ACT'),(452,'Santiago de Anaya','ACT'),(453,'San Salvador','ACT'),(454,'El Arenal','ACT'),(455,'Mixquiahuala de Juárez','ACT'),(456,'Progreso de Obregón','ACT'),(457,'Chilcuautla','ACT'),(458,'Tezontepec de Aldama','ACT'),(459,'Tlahuelilpan','ACT'),(460,'Tula de Allende','ACT'),(461,'Tepeji del Río de Ocampo','ACT'),(462,'Chapantongo','ACT'),(463,'Tepetitlán','ACT'),(464,'Tetepango','ACT'),(465,'Tlaxcoapan','ACT'),(466,'Atitalaquia','ACT'),(467,'Atotonilco de Tula','ACT'),(468,'Huejutla de Reyes','ACT'),(469,'San Felipe Orizatlán','ACT'),(470,'Jaltocán','ACT'),(471,'Huautla','ACT'),(472,'Atlapexco','ACT'),(473,'Huazalingo','ACT'),(474,'Yahualica','ACT'),(475,'Xochiatipan','ACT'),(476,'Molango de Escamilla','ACT'),(477,'Tepehuacán de Guerrero','ACT'),(478,'Lolotla','ACT'),(479,'Tlanchinol','ACT'),(480,'Tlahuiltepa','ACT'),(481,'Juárez Hidalgo','ACT'),(482,'Zacualtipán de Ángeles','ACT'),(483,'Calnali','ACT'),(484,'Xochicoatlán','ACT'),(485,'Tianguistengo','ACT'),(486,'Atotonilco el Grande','ACT'),(487,'Eloxochitlán','ACT'),(488,'Metztitlán','ACT'),(489,'San Agustín Metzquititlán','ACT'),(490,'Metepec','ACT'),(491,'Huehuetla','ACT'),(492,'San Bartolo Tutotepec','ACT'),(493,'Agua Blanca de Iturbide','ACT'),(494,'Tenango de Doria','ACT'),(495,'Huasca de Ocampo','ACT'),(496,'Acatlán','ACT'),(497,'Omitlán de Juárez','ACT'),(498,'Epazoyucan','ACT'),(499,'Tulancingo de Bravo','ACT'),(500,'Acaxochitlán','ACT'),(501,'Cuautepec de Hinojosa','ACT'),(502,'Santiago Tulantepec de Lugo Guerrero','ACT'),(503,'Singuilucan','ACT'),(504,'Tizayuca','ACT'),(505,'Zempoala','ACT'),(506,'Tolcayuca','ACT'),(507,'Villa de Tezontepec','ACT'),(508,'Apan','ACT'),(509,'Tlanalapa','ACT'),(510,'Almoloya','ACT'),(511,'Emiliano Zapata','ACT'),(512,'Tepeapulco','ACT'),(513,'Guadalajara','ACT'),(514,'Zapopan','ACT'),(515,'San Cristóbal de la Barranca','ACT'),(516,'Ixtlahuacán del Río','ACT'),(517,'Tala','ACT'),(518,'Amatitán','ACT'),(519,'Zapotlanejo','ACT'),(520,'Acatic','ACT'),(521,'Cuquío','ACT'),(522,'San Pedro Tlaquepaque','ACT'),(523,'Tlajomulco de Zúñiga','ACT'),(524,'El Salto','ACT'),(525,'Acatlán de Juárez','ACT'),(526,'Villa Corona','ACT'),(527,'Zacoalco de Torres','ACT'),(528,'Atemajac de Brizuela','ACT'),(529,'Jocotepec','ACT'),(530,'Ixtlahuacán de los Membrillos','ACT'),(531,'Juanacatlán','ACT'),(532,'Chapala','ACT'),(533,'Poncitlán','ACT'),(534,'Zapotlán del Rey','ACT'),(535,'Huejuquilla el Alto','ACT'),(536,'Mezquitic','ACT'),(537,'Villa Guerrero','ACT'),(538,'Bolaños','ACT'),(539,'Totatiche','ACT'),(540,'Colotlán','ACT'),(541,'Santa María de los Ángeles','ACT'),(542,'Huejúcar','ACT'),(543,'Chimaltitán','ACT'),(544,'San Martín de Bolaños','ACT'),(545,'Tequila','ACT'),(546,'Hostotipaquillo','ACT'),(547,'Magdalena','ACT'),(548,'Etzatlán','ACT'),(549,'San Juanito de Escobedo','ACT'),(550,'Ameca','ACT'),(551,'Ahualulco de Mercado','ACT'),(552,'Teuchitlán','ACT'),(553,'San Martín Hidalgo','ACT'),(554,'Guachinango','ACT'),(555,'Mixtlán','ACT'),(556,'Mascota','ACT'),(557,'San Sebastián del Oeste','ACT'),(558,'San Juan de los Lagos','ACT'),(559,'Jalostotitlán','ACT'),(560,'San Miguel el Alto','ACT'),(561,'San Julián','ACT'),(562,'Arandas','ACT'),(563,'San Ignacio Cerro Gordo','ACT'),(564,'Teocaltiche','ACT'),(565,'Villa Hidalgo','ACT'),(566,'Encarnación de Díaz','ACT'),(567,'Yahualica de González Gallo','ACT'),(568,'Mexticacán','ACT'),(569,'Cañadas de Obregón','ACT'),(570,'Valle de Guadalupe','ACT'),(571,'Lagos de Moreno','ACT'),(572,'Ojuelos de Jalisco','ACT'),(573,'Unión de San Antonio','ACT'),(574,'San Diego de Alejandría','ACT'),(575,'Tepatitlán de Morelos','ACT'),(576,'Tototlán','ACT'),(577,'Atotonilco el Alto','ACT'),(578,'Ocotlán','ACT'),(579,'Jamay','ACT'),(580,'La Barca','ACT'),(581,'Ayotlán','ACT'),(582,'Degollado','ACT'),(583,'Unión de Tula','ACT'),(584,'Ayutla','ACT'),(585,'Atenguillo','ACT'),(586,'Cuautla','ACT'),(587,'Atengo','ACT'),(588,'Talpa de Allende','ACT'),(589,'Puerto Vallarta','ACT'),(590,'Cabo Corrientes','ACT'),(591,'Tomatlán','ACT'),(592,'Tecolotlán','ACT'),(593,'Tenamaxtlán','ACT'),(594,'Juchitlán','ACT'),(595,'Chiquilistlán','ACT'),(596,'Ejutla','ACT'),(597,'El Limón','ACT'),(598,'El Grullo','ACT'),(599,'Tonaya','ACT'),(600,'Tuxcacuesco','ACT'),(601,'Villa Purificación','ACT'),(602,'La Huerta','ACT'),(603,'Autlán de Navarro','ACT'),(604,'Casimiro Castillo','ACT'),(605,'Cuautitlán de García Barragán','ACT'),(606,'Cihuatlán','ACT'),(607,'Zapotlán el Grande','ACT'),(608,'Concepción de Buenos Aires','ACT'),(609,'Atoyac','ACT'),(610,'Techaluta de Montenegro','ACT'),(611,'Teocuitatlán de Corona','ACT'),(612,'Sayula','ACT'),(613,'Tapalpa','ACT'),(614,'Amacueca','ACT'),(615,'Tizapán el Alto','ACT'),(616,'Tuxcueca','ACT'),(617,'La Manzanilla de la Paz','ACT'),(618,'Mazamitla','ACT'),(619,'Valle de Juárez','ACT'),(620,'Quitupan','ACT'),(621,'Zapotiltic','ACT'),(622,'Tamazula de Gordiano','ACT'),(623,'San Gabriel','ACT'),(624,'Tolimán','ACT'),(625,'Zapotitlán de Vadillo','ACT'),(626,'Tuxpan','ACT'),(627,'Tonila','ACT'),(628,'Pihuamo','ACT'),(629,'Tecalitlán','ACT'),(630,'Jilotlán de los Dolores','ACT'),(631,'Santa María del Oro','ACT'),(632,'Toluca','ACT'),(633,'Acambay de Ruíz Castañeda','ACT'),(634,'Aculco','ACT'),(635,'Temascalcingo','ACT'),(636,'Atlacomulco','ACT'),(637,'Timilpan','ACT'),(638,'San Felipe del Progreso','ACT'),(639,'San José del Rincón','ACT'),(640,'Jocotitlán','ACT'),(641,'Ixtlahuaca','ACT'),(642,'Jiquipilco','ACT'),(643,'Temoaya','ACT'),(644,'Almoloya de Juárez','ACT'),(645,'Villa Victoria','ACT'),(646,'Villa de Allende','ACT'),(647,'Donato Guerra','ACT'),(648,'Ixtapan del Oro','ACT'),(649,'Santo Tomás','ACT'),(650,'Otzoloapan','ACT'),(651,'Zacazonapan','ACT'),(652,'Valle de Bravo','ACT'),(653,'Amanalco','ACT'),(654,'Temascaltepec','ACT'),(655,'Zinacantepec','ACT'),(656,'Tejupilco','ACT'),(657,'Luvianos','ACT'),(658,'San Simón de Guerrero','ACT'),(659,'Amatepec','ACT'),(660,'Tlatlaya','ACT'),(661,'Sultepec','ACT'),(662,'Texcaltitlán','ACT'),(663,'Coatepec Harinas','ACT'),(664,'Zacualpan','ACT'),(665,'Almoloya de Alquisiras','ACT'),(666,'Ixtapan de la Sal','ACT'),(667,'Tonatico','ACT'),(668,'Zumpahuacán','ACT'),(669,'Lerma','ACT'),(670,'Xonacatlán','ACT'),(671,'Otzolotepec','ACT'),(672,'San Mateo Atenco','ACT'),(673,'Mexicaltzingo','ACT'),(674,'Calimaya','ACT'),(675,'Chapultepec','ACT'),(676,'San Antonio la Isla','ACT'),(677,'Tenango del Valle','ACT'),(678,'Joquicingo','ACT'),(679,'Tenancingo','ACT'),(680,'Malinalco','ACT'),(681,'Ocuilan','ACT'),(682,'Atizapán','ACT'),(683,'Almoloya del Río','ACT'),(684,'Texcalyacac','ACT'),(685,'Tianguistenco','ACT'),(686,'Xalatlaco','ACT'),(687,'Capulhuac','ACT'),(688,'Ocoyoacac','ACT'),(689,'Huixquilucan','ACT'),(690,'Atizapán de Zaragoza','ACT'),(691,'Naucalpan de Juárez','ACT'),(692,'Tlalnepantla de Baz','ACT'),(693,'Polotitlán','ACT'),(694,'Jilotepec','ACT'),(695,'Soyaniquilpan de Juárez','ACT'),(696,'Villa del Carbón','ACT'),(697,'Chapa de Mota','ACT'),(698,'Nicolás Romero','ACT'),(699,'Isidro Fabela','ACT'),(700,'Jilotzingo','ACT'),(701,'Tepotzotlán','ACT'),(702,'Coyotepec','ACT'),(703,'Huehuetoca','ACT'),(704,'Cuautitlán Izcalli','ACT'),(705,'Teoloyucan','ACT'),(706,'Cuautitlán','ACT'),(707,'Melchor Ocampo','ACT'),(708,'Tultitlán','ACT'),(709,'Tultepec','ACT'),(710,'Ecatepec de Morelos','ACT'),(711,'Zumpango','ACT'),(712,'Tequixquiac','ACT'),(713,'Apaxco','ACT'),(714,'Hueypoxtla','ACT'),(715,'Coacalco de Berriozábal','ACT'),(716,'Tecámac','ACT'),(717,'Jaltenco','ACT'),(718,'Tonanitla','ACT'),(719,'Nextlalpan','ACT'),(720,'Teotihuacán','ACT'),(721,'San Martín de las Pirámides','ACT'),(722,'Acolman','ACT'),(723,'Otumba','ACT'),(724,'Axapusco','ACT'),(725,'Nopaltepec','ACT'),(726,'Temascalapa','ACT'),(727,'Tezoyuca','ACT'),(728,'Chiautla','ACT'),(729,'Papalotla','ACT'),(730,'Tepetlaoxtoc','ACT'),(731,'Texcoco','ACT'),(732,'Chiconcuac','ACT'),(733,'Atenco','ACT'),(734,'Chimalhuacán','ACT'),(735,'Chicoloapan','ACT'),(736,'Ixtapaluca','ACT'),(737,'Chalco','ACT'),(738,'Valle\n de Chalco Solidaridad','ACT'),(739,'Temamatla','ACT'),(740,'Cocotitlán','ACT'),(741,'Tlalmanalco','ACT'),(742,'Ayapango','ACT'),(743,'Tenango del Aire','ACT'),(744,'Ozumba','ACT'),(745,'Juchitepec','ACT'),(746,'Tepetlixpa','ACT'),(747,'Amecameca','ACT'),(748,'Atlautla','ACT'),(749,'Ecatzingo','ACT'),(750,'Nezahualcóyotl','ACT'),(751,'Morelia','ACT'),(752,'Huaniqueo','ACT'),(753,'Coeneo','ACT'),(754,'Quiroga','ACT'),(755,'Tzintzuntzan','ACT'),(756,'Lagunillas','ACT'),(757,'Acuitzio','ACT'),(758,'Madero','ACT'),(759,'Puruándiro','ACT'),(760,'José Sixto Verduzco','ACT'),(761,'Angamacutiro','ACT'),(762,'Panindícuaro','ACT'),(763,'Zacapu','ACT'),(764,'Tlazazalca','ACT'),(765,'Purépero','ACT'),(766,'Huandacareo','ACT'),(767,'Cuitzeo','ACT'),(768,'Chucándiro','ACT'),(769,'Copándaro','ACT'),(770,'Tarímbaro','ACT'),(771,'Santa Ana Maya','ACT'),(772,'Zinapécuaro','ACT'),(773,'Indaparapeo','ACT'),(774,'Queréndaro','ACT'),(775,'Sahuayo','ACT'),(776,'Briseñas','ACT'),(777,'Cojumatlán de Régules','ACT'),(778,'Pajacuarán','ACT'),(779,'Vista Hermosa','ACT'),(780,'Tanhuato','ACT'),(781,'Yurécuaro','ACT'),(782,'Ixtlán','ACT'),(783,'La Piedad','ACT'),(784,'Numarán','ACT'),(785,'Churintzio','ACT'),(786,'Zináparo','ACT'),(787,'Penjamillo','ACT'),(788,'Marcos Castellanos','ACT'),(789,'Jiquilpan','ACT'),(790,'Villamar','ACT'),(791,'Chavinda','ACT'),(792,'Zamora','ACT'),(793,'Ecuandureo','ACT'),(794,'Tangancícuaro','ACT'),(795,'Chilchota','ACT'),(796,'Jacona','ACT'),(797,'Tangamandapio','ACT'),(798,'Cotija','ACT'),(799,'Tocumbo','ACT'),(800,'Tingüindín','ACT'),(801,'Uruapan','ACT'),(802,'Charapan','ACT'),(803,'Paracho','ACT'),(804,'Cherán','ACT'),(805,'Nahuatzen','ACT'),(806,'Tingambato','ACT'),(807,'Los Reyes','ACT'),(808,'Peribán','ACT'),(809,'Tancítaro','ACT'),(810,'Nuevo Parangaricutiro','ACT'),(811,'Buenavista','ACT'),(812,'Tepalcatepec','ACT'),(813,'Aguililla','ACT'),(814,'Apatzingán','ACT'),(815,'Parácuaro','ACT'),(816,'Coahuayana','ACT'),(817,'Chinicuila','ACT'),(818,'Coalcomán de Vázquez Pallares','ACT'),(819,'Aquila','ACT'),(820,'Tumbiscatío','ACT'),(821,'Lázaro Cárdenas','ACT'),(822,'Epitacio Huerta','ACT'),(823,'Contepec','ACT'),(824,'Tlalpujahua','ACT'),(825,'Maravatío','ACT'),(826,'Irimbo','ACT'),(827,'Senguio','ACT'),(828,'Charo','ACT'),(829,'Tzitzio','ACT'),(830,'Tiquicheo de Nicolás Romero','ACT'),(831,'Aporo','ACT'),(832,'Angangueo','ACT'),(833,'Jungapeo','ACT'),(834,'Zitácuaro','ACT'),(835,'Tuzantla','ACT'),(836,'Susupuato','ACT'),(837,'Pátzcuaro','ACT'),(838,'Erongarícuaro','ACT'),(839,'Huiramba','ACT'),(840,'Tacámbaro','ACT'),(841,'Turicato','ACT'),(842,'Ziracuaretiro','ACT'),(843,'Taretan','ACT'),(844,'Gabriel Zamora','ACT'),(845,'Nuevo Urecho','ACT'),(846,'Múgica','ACT'),(847,'Salvador Escalante','ACT'),(848,'Ario','ACT'),(849,'La Huacana','ACT'),(850,'Churumuco','ACT'),(851,'Nocupétaro','ACT'),(852,'Carácuaro','ACT'),(853,'Huetamo','ACT'),(854,'Cuernavaca','ACT'),(855,'Huitzilac','ACT'),(856,'Tepoztlán','ACT'),(857,'Tlalnepantla','ACT'),(858,'Tlayacapan','ACT'),(859,'Jiutepec','ACT'),(860,'Temixco','ACT'),(861,'Miacatlán','ACT'),(862,'Coatlán del Río','ACT'),(863,'Tetecala','ACT'),(864,'Mazatepec','ACT'),(865,'Amacuzac','ACT'),(866,'Puente de Ixtla','ACT'),(867,'Ayala','ACT'),(868,'Yautepec','ACT'),(869,'Tlaltizapán de Zapata','ACT'),(870,'Zacatepec','ACT'),(871,'Xochitepec','ACT'),(872,'Tetela del Volcán','ACT'),(873,'Yecapixtla','ACT'),(874,'Totolapan','ACT'),(875,'Atlatlahucan','ACT'),(876,'Ocuituco','ACT'),(877,'Temoac','ACT'),(878,'Jojutla','ACT'),(879,'Tepalcingo','ACT'),(880,'Jonacatepec','ACT'),(881,'Axochiapan','ACT'),(882,'Jantetelco','ACT'),(883,'Tlaquiltenango','ACT'),(884,'Tepic','ACT'),(885,'Santiago Ixcuintla','ACT'),(886,'Acaponeta','ACT'),(887,'Tecuala','ACT'),(888,'Huajicori','ACT'),(889,'Del Nayar','ACT'),(890,'La Yesca','ACT'),(891,'Ruíz','ACT'),(892,'Rosamorada','ACT'),(893,'Compostela','ACT'),(894,'Bahía de Banderas','ACT'),(895,'San Blas','ACT'),(896,'Xalisco','ACT'),(897,'San Pedro Lagunillas','ACT'),(898,'Jala','ACT'),(899,'Ahuacatlán','ACT'),(900,'Ixtlán del Río','ACT'),(901,'Amatlán de Cañas','ACT'),(902,'Monterrey','ACT'),(903,'Anáhuac','ACT'),(904,'Lampazos de Naranjo','ACT'),(905,'Mina','ACT'),(906,'Bustamante','ACT'),(907,'Sabinas Hidalgo','ACT'),(908,'Villaldama','ACT'),(909,'Vallecillo','ACT'),(910,'Parás','ACT'),(911,'Salinas Victoria','ACT'),(912,'Ciénega de Flores','ACT'),(913,'Higueras','ACT'),(914,'General Zuazua','ACT'),(915,'Agualeguas','ACT'),(916,'General Treviño','ACT'),(917,'Cerralvo','ACT'),(918,'García','ACT'),(919,'General Escobedo','ACT'),(920,'San Pedro Garza García','ACT'),(921,'San Nicolás de los Garza','ACT'),(922,'El Carmen','ACT'),(923,'Apodaca','ACT'),(924,'Pesquería','ACT'),(925,'Marín','ACT'),(926,'Doctor González','ACT'),(927,'Los Ramones','ACT'),(928,'Los Herreras','ACT'),(929,'Los Aldamas','ACT'),(930,'Doctor Coss','ACT'),(931,'General Bravo','ACT'),(932,'China','ACT'),(933,'Santiago','ACT'),(934,'General Terán','ACT'),(935,'Cadereyta Jiménez','ACT'),(936,'Montemorelos','ACT'),(937,'Rayones','ACT'),(938,'Linares','ACT'),(939,'Iturbide','ACT'),(940,'Hualahuises','ACT'),(941,'Doctor Arroyo','ACT'),(942,'Aramberri','ACT'),(943,'General Zaragoza','ACT'),(944,'Mier y Noriega','ACT'),(945,'Oaxaca de Juárez','ACT'),(946,'Villa de Etla','ACT'),(947,'San Juan Bautista Atatlahuca','ACT'),(948,'San Jerónimo Sosola','ACT'),(949,'San Juan Bautista Jayacatlán','ACT'),(950,'San Francisco Telixtlahuaca','ACT'),(951,'Santiago Tenango','ACT'),(952,'San Pablo Huitzo','ACT'),(953,'San Juan del Estado','ACT'),(954,'Magdalena Apasco','ACT'),(955,'Santiago Suchilquitongo','ACT'),(956,'San Juan Bautista Guelache','ACT'),(957,'Reyes Etla','ACT'),(958,'Nazareno Etla','ACT'),(959,'San Andrés Zautla','ACT'),(960,'San Agustín Etla','ACT'),(961,'Soledad Etla','ACT'),(962,'Santo Tomás Mazaltepec','ACT'),(963,'Guadalupe Etla','ACT'),(964,'San Pablo Etla','ACT'),(965,'San Felipe Tejalápam','ACT'),(966,'San Lorenzo Cacaotepec','ACT'),(967,'Santa María Peñoles','ACT'),(968,'Santiago Tlazoyaltepec','ACT'),(969,'Tlalixtac de Cabrera','ACT'),(970,'San Jacinto Amilpas','ACT'),(971,'San Andrés Huayápam','ACT'),(972,'San Agustín Yatareni','ACT'),(973,'Santo Domingo Tomaltepec','ACT'),(974,'Santa María del Tule','ACT'),(975,'San Juan Bautista Tuxtepec','ACT'),(976,'Loma Bonita','ACT'),(977,'San José Independencia','ACT'),(978,'Cosolapa','ACT'),(979,'Acatlán de Pérez Figueroa','ACT'),(980,'San Miguel Soyaltepec','ACT'),(981,'Ayotzintepec','ACT'),(982,'San Pedro Ixcatlán','ACT'),(983,'San José Chiltepec','ACT'),(984,'San Felipe Jalapa de Díaz','ACT'),(985,'Santa María Jacatepec','ACT'),(986,'San Lucas Ojitlán','ACT'),(987,'San Juan Bautista Valle Nacional','ACT'),(988,'San Felipe Usila','ACT'),(989,'Huautla de Jiménez','ACT'),(990,'Santa María Chilchotla','ACT'),(991,'Santa Ana Ateixtlahuaca','ACT'),(992,'San Lorenzo Cuaunecuiltitla','ACT'),(993,'San Francisco Huehuetlán','ACT'),(994,'San Pedro Ocopetatillo','ACT'),(995,'Santa Cruz Acatepec','ACT'),(996,'Eloxochitlán de Flores Magón','ACT'),(997,'Santiago Texcalcingo','ACT'),(998,'Teotitlán de Flores Magón','ACT'),(999,'Santa María Teopoxco','ACT'),(1000,'San Martín Toxpalan','ACT'),(1001,'San Jerónimo Tecóatl','ACT'),(1002,'Santa María la Asunción','ACT'),(1003,'Huautepec','ACT'),(1004,'San Juan Coatzóspam','ACT'),(1005,'San Lucas Zoquiápam','ACT'),(1006,'San Antonio Nanahuatípam','ACT'),(1007,'San José Tenango','ACT'),(1008,'San Mateo Yoloxochitlán','ACT'),(1009,'San Bartolomé Ayautla','ACT'),(1010,'Mazatlán Villa de Flores','ACT'),(1011,'San Juan de los Cués','ACT'),(1012,'Santa María Tecomavaca','ACT'),(1013,'Santa María Ixcatlán','ACT'),(1014,'San Juan Bautista Cuicatlán','ACT'),(1015,'Cuyamecalco Villa de Zaragoza','ACT'),(1016,'Santa Ana Cuauhtémoc','ACT'),(1017,'Chiquihuitlán de Benito Juárez','ACT'),(1018,'San Pedro Teutila','ACT'),(1019,'San Miguel Santa Flor','ACT'),(1020,'Santa María Tlalixtac','ACT'),(1021,'San Andrés Teotilálpam','ACT'),(1022,'San Francisco Chapulapa','ACT'),(1023,'Concepción Pápalo','ACT'),(1024,'Santos Reyes Pápalo','ACT'),(1025,'San Juan Bautista Tlacoatzintepec','ACT'),(1026,'Santa María Pápalo','ACT'),(1027,'San Juan Tepeuxila','ACT'),(1028,'San Pedro Sochiápam','ACT'),(1029,'Valerio Trujano','ACT'),(1030,'San Pedro Jocotipac','ACT'),(1031,'Santa María Texcatitlán','ACT'),(1032,'San Pedro Jaltepetongo','ACT'),(1033,'Santiago Nacaltepec','ACT'),(1034,'Natividad','ACT'),(1035,'San Juan Quiotepec','ACT'),(1036,'San Pedro Yólox','ACT'),(1037,'Santiago Comaltepec','ACT'),(1038,'Abejones','ACT'),(1039,'San Pablo Macuiltianguis','ACT'),(1040,'Ixtlán de Juárez','ACT'),(1041,'San Juan Atepec','ACT'),(1042,'San Pedro Yaneri','ACT'),(1043,'San Miguel Aloápam','ACT'),(1044,'Teococuilco de Marcos Pérez','ACT'),(1045,'Santa Ana Yareni','ACT'),(1046,'San Juan Evangelista Analco','ACT'),(1047,'Santa María Jaltianguis','ACT'),(1048,'San Miguel del Río','ACT'),(1049,'San Juan Chicomezúchil','ACT'),(1050,'Capulálpam de Méndez','ACT'),(1051,'Nuevo Zoquiápam','ACT'),(1052,'Santiago Xiacuí','ACT'),(1053,'Guelatao de Juárez','ACT'),(1054,'Santa Catarina Ixtepeji','ACT'),(1055,'San Miguel Yotao','ACT'),(1056,'Santa Catarina Lachatao','ACT'),(1057,'San Miguel Amatlán','ACT'),(1058,'Santa María Yavesía','ACT'),(1059,'Santiago Laxopa','ACT'),(1060,'San Ildefonso Villa Alta','ACT'),(1061,'Santiago Camotlán','ACT'),(1062,'San Juan Yaeé','ACT'),(1063,'Santiago Lalopa','ACT'),(1064,'San Juan Yatzona','ACT'),(1065,'Villa Talea de Castro','ACT'),(1066,'Tanetze de Zaragoza','ACT'),(1067,'San Juan Juquila Vijanos','ACT'),(1068,'San Cristóbal Lachirioag','ACT'),(1069,'Santa María Temaxcalapa','ACT'),(1070,'Santo Domingo Roayaga','ACT'),(1071,'Santa María Yalina','ACT'),(1072,'San Andrés Solaga','ACT'),(1073,'San Juan Tabaá','ACT'),(1074,'San Melchor Betaza','ACT'),(1075,'San Andrés Yaá','ACT'),(1076,'San Bartolomé Zoogocho','ACT'),(1077,'San Baltazar\n Yatzachi el Bajo','ACT'),(1078,'Santiago Zoochila','ACT'),(1079,'San Francisco Cajonos','ACT'),(1080,'San Mateo Cajonos','ACT'),(1081,'San Pedro Cajonos','ACT'),(1082,'Santo Domingo Xagacía','ACT'),(1083,'San Pablo Yaganiza','ACT'),(1084,'Santiago Choápam','ACT'),(1085,'Santiago Jocotepec','ACT'),(1086,'San Juan Lalana','ACT'),(1087,'Santiago Yaveo','ACT'),(1088,'San Juan Petlapa','ACT'),(1089,'San Juan Comaltepec','ACT'),(1090,'Heroica Ciudad de Huajuapan de León','ACT'),(1091,'Santiago Chazumba','ACT'),(1092,'Cosoltepec','ACT'),(1093,'San Pedro y San Pablo Tequixtepec','ACT'),(1094,'San Juan Bautista Suchitepec','ACT'),(1095,'Santa Catarina Zapoquila','ACT'),(1096,'Santiago Miltepec','ACT'),(1097,'San Jerónimo Silacayoapilla','ACT'),(1098,'Zapotitlán Palmas','ACT'),(1099,'San Andrés Dinicuiti','ACT'),(1100,'Santiago Cacaloxtepec','ACT'),(1101,'Asunción Cuyotepeji','ACT'),(1102,'Santa María Camotlán','ACT'),(1103,'Santiago Huajolotitlán','ACT'),(1104,'Santiago Tamazola','ACT'),(1105,'San Juan Cieneguilla','ACT'),(1106,'Zapotitlán Lagunas','ACT'),(1107,'San Juan Ihualtepec','ACT'),(1108,'San Nicolás Hidalgo','ACT'),(1109,'Guadalupe de Ramírez','ACT'),(1110,'San Andrés Tepetlapa','ACT'),(1111,'San Miguel Ahuehuetitlán','ACT'),(1112,'San Mateo Nejápam','ACT'),(1113,'San Juan Bautista Tlachichilco','ACT'),(1114,'Tezoatlán de Segura y Luna','ACT'),(1115,'Fresnillo de Trujano','ACT'),(1116,'Santiago Ayuquililla','ACT'),(1117,'San José Ayuquila','ACT'),(1118,'San Martín Zacatepec','ACT'),(1119,'San Miguel Amatitlán','ACT'),(1120,'Mariscala de Juárez','ACT'),(1121,'Santa Cruz Tacache de Mina','ACT'),(1122,'San Simón Zahuatlán','ACT'),(1123,'San Marcos Arteaga','ACT'),(1124,'San Jorge Nuchita','ACT'),(1125,'Santos Reyes Yucuná','ACT'),(1126,'Santo Domingo Tonalá','ACT'),(1127,'Santo Domingo Yodohino','ACT'),(1128,'San Juan Bautista Coixtlahuaca','ACT'),(1129,'Tepelmeme Villa de Morelos','ACT'),(1130,'Concepción Buenavista','ACT'),(1131,'Santiago Ihuitlán Plumas','ACT'),(1132,'Tlacotepec Plumas','ACT'),(1133,'San Francisco Teopan','ACT'),(1134,'Santa Magdalena Jicotlán','ACT'),(1135,'San Mateo Tlapiltepec','ACT'),(1136,'San Miguel Tequixtepec','ACT'),(1137,'San Miguel Tulancingo','ACT'),(1138,'Santiago Tepetlapa','ACT'),(1139,'San Cristóbal Suchixtlahuaca','ACT'),(1140,'Santa María Nativitas','ACT'),(1141,'Silacayoápam','ACT'),(1142,'Santiago Yucuyachi','ACT'),(1143,'San Lorenzo Victoria','ACT'),(1144,'San Agustín Atenango','ACT'),(1145,'Calihualá','ACT'),(1146,'Santa Cruz de Bravo','ACT'),(1147,'Ixpantepec Nieves','ACT'),(1148,'San Francisco Tlapancingo','ACT'),(1149,'Santiago del Río','ACT'),(1150,'San Pedro y San Pablo Teposcolula','ACT'),(1151,'La Trinidad Vista Hermosa','ACT'),(1152,'Villa de Tamazulápam del Progreso','ACT'),(1153,'San Pedro Nopala','ACT'),(1154,'Teotongo','ACT'),(1155,'San Antonio Acutla','ACT'),(1156,'Villa Tejúpam de la Unión','ACT'),(1157,'Santo Domingo Tonaltepec','ACT'),(1158,'Villa de Chilapa de Díaz','ACT'),(1159,'San Antonino Monte Verde','ACT'),(1160,'San Andrés Lagunas','ACT'),(1161,'San Pedro Yucunama','ACT'),(1162,'San Juan Teposcolula','ACT'),(1163,'San Bartolo Soyaltepec','ACT'),(1164,'Santiago Yolomécatl','ACT'),(1165,'San Sebastián Nicananduta','ACT'),(1166,'Santo Domingo Tlatayápam','ACT'),(1167,'Santa María Nduayaco','ACT'),(1168,'San Vicente Nuñú','ACT'),(1169,'San Pedro Topiltepec','ACT'),(1170,'Santiago Nejapilla','ACT'),(1171,'Asunción Nochixtlán','ACT'),(1172,'San Miguel Huautla','ACT'),(1173,'San Miguel Chicahua','ACT'),(1174,'Santa María Apazco','ACT'),(1175,'Santiago Apoala','ACT'),(1176,'Santa María Chachoápam','ACT'),(1177,'San Pedro Coxcaltepec Cántaros','ACT'),(1178,'Santiago Huauclilla','ACT'),(1179,'Santo Domingo Yanhuitlán','ACT'),(1180,'San Andrés Sinaxtla','ACT'),(1181,'San Juan Yucuita','ACT'),(1182,'San Juan Sayultepec','ACT'),(1183,'Santiago Tillo','ACT'),(1184,'San Francisco Chindúa','ACT'),(1185,'San Mateo Etlatongo','ACT'),(1186,'Santa Inés de Zaragoza','ACT'),(1187,'Santiago Juxtlahuaca','ACT'),(1188,'San Miguel Tlacotepec','ACT'),(1189,'San Sebastián Tecomaxtlahuaca','ACT'),(1190,'Santos Reyes Tepejillo','ACT'),(1191,'San Juan Mixtepec -Dto. 08 -','ACT'),(1192,'San Martín Peras','ACT'),(1193,'Coicoyán de las Flores','ACT'),(1194,'Heroica Ciudad de Tlaxiaco','ACT'),(1195,'San Juan Ñumí','ACT'),(1196,'San Pedro Mártir Yucuxaco','ACT'),(1197,'San Martín Huamelúlpam','ACT'),(1198,'Santa Cruz Tayata','ACT'),(1199,'Santiago Nundiche','ACT'),(1200,'Santa María del Rosario','ACT'),(1201,'San Juan Achiutla','ACT'),(1202,'Santa Catarina Tayata','ACT'),(1203,'San Cristóbal Amoltepec','ACT'),(1204,'San Miguel Achiutla','ACT'),(1205,'San Martín Itunyoso','ACT'),(1206,'Magdalena Peñasco','ACT'),(1207,'San Bartolomé Yucuañe','ACT'),(1208,'Santa Cruz Nundaco','ACT'),(1209,'San Agustín Tlacotepec','ACT'),(1210,'Santo Tomás Ocotepec','ACT'),(1211,'San Antonio Sinicahua','ACT'),(1212,'San Mateo Peñasco','ACT'),(1213,'Santa María Tataltepec','ACT'),(1214,'San Pedro Molinos','ACT'),(1215,'Santa María Yosoyúa','ACT'),(1216,'San Juan Teita','ACT'),(1217,'Magdalena Jaltepec','ACT'),(1218,'Magdalena Yodocono de Porfirio Díaz','ACT'),(1219,'San Miguel Tecomatlán','ACT'),(1220,'Magdalena Zahuatlán','ACT'),(1221,'San Francisco Nuxaño','ACT'),(1222,'San Pedro Tidaá','ACT'),(1223,'San Francisco Jaltepetongo','ACT'),(1224,'Santiago Tilantongo','ACT'),(1225,'San Juan Diuxi','ACT'),(1226,'San Andrés Nuxiño','ACT'),(1227,'San Juan Tamazola','ACT'),(1228,'Santo Domingo Nuxaá','ACT'),(1229,'Yutanduchi de Guerrero','ACT'),(1230,'San Pedro Teozacoalco','ACT'),(1231,'San Miguel Piedras','ACT'),(1232,'San Mateo Sindihui','ACT'),(1233,'Heroica Ciudad de Juchitán de Zaragoza','ACT'),(1234,'Ciudad Ixtepec','ACT'),(1235,'El Espinal','ACT'),(1236,'Santo Domingo Ingenio','ACT'),(1237,'Santa María Xadani','ACT'),(1238,'Santiago Niltepec','ACT'),(1239,'San Dionisio del Mar','ACT'),(1240,'Asunción Ixtaltepec','ACT'),(1241,'San Francisco del Mar','ACT'),(1242,'Unión Hidalgo','ACT'),(1243,'San Miguel Chimalapa','ACT'),(1244,'Santo Domingo Zanatepec','ACT'),(1245,'Reforma de Pineda','ACT'),(1246,'San Francisco Ixhuatán','ACT'),(1247,'San Pedro Tapanatepec','ACT'),(1248,'Chahuites','ACT'),(1249,'Santiago Zacatepec','ACT'),(1250,'Santo Domingo Tepuxtepec','ACT'),(1251,'San Juan Cotzocón','ACT'),(1252,'San Juan Mazatlán','ACT'),(1253,'Totontepec Villa de Morelos','ACT'),(1254,'Mixistlán de la Reforma','ACT'),(1255,'Santa María Tlahuitoltepec','ACT'),(1256,'Santa María Alotepec','ACT'),(1257,'Santiago Atitlán','ACT'),(1258,'Tamazulápam del Espíritu Santo','ACT'),(1259,'San Pedro y San Pablo Ayutla','ACT'),(1260,'Santa María Tepantlali','ACT'),(1261,'San Miguel Quetzaltepec','ACT'),(1262,'Asunción Cacalotepec','ACT'),(1263,'San Pedro Ocotepec','ACT'),(1264,'San Lucas Camotlán','ACT'),(1265,'Santiago Ixcuintepec','ACT'),(1266,'Matías Romero Avendaño','ACT'),(1267,'San Juan Guichicovi','ACT'),(1268,'Santo Domingo Petapa','ACT'),(1269,'Santa María Chimalapa','ACT'),(1270,'Santa María Petapa','ACT'),(1271,'El Barrio de la Soledad','ACT'),(1272,'Tlacolula de Matamoros','ACT'),(1273,'San Sebastián Abasolo','ACT'),(1274,'Villa Díaz Ordaz','ACT'),(1275,'Santa María Guelacé','ACT'),(1276,'Teotitlán del Valle','ACT'),(1277,'San Francisco Lachigoló','ACT'),(1278,'San Sebastián Teitipac','ACT'),(1279,'Santa Ana del Valle','ACT'),(1280,'San Pablo Villa de Mitla','ACT'),(1281,'Santiago Matatlán','ACT'),(1282,'Santo Domingo Albarradas','ACT'),(1283,'Rojas de Cuauhtémoc','ACT'),(1284,'San Juan Teitipac','ACT'),(1285,'Santa Cruz Papalutla','ACT'),(1286,'Magdalena Teitipac','ACT'),(1287,'San Jerónimo Tlacochahuaya','ACT'),(1288,'San Juan Guelavía','ACT'),(1289,'San Lucas Quiaviní','ACT'),(1290,'San Bartolomé Quialana','ACT'),(1291,'San Lorenzo Albarradas','ACT'),(1292,'San Pedro Totolápam','ACT'),(1293,'San Pedro Quiatoni','ACT'),(1294,'Santa María Zoquitlán','ACT'),(1295,'San Dionisio Ocotepec','ACT'),(1296,'San Carlos Yautepec','ACT'),(1297,'San Juan Juquila Mixes','ACT'),(1298,'Nejapa de Madero','ACT'),(1299,'Santa Ana Tavela','ACT'),(1300,'San Juan Lajarcia','ACT'),(1301,'San Bartolo Yautepec','ACT'),(1302,'Santa María Ecatepec','ACT'),(1303,'Asunción Tlacolulita','ACT'),(1304,'San Pedro Mártir Quiechapa','ACT'),(1305,'Santa María Quiegolani','ACT'),(1306,'Santa Catarina Quioquitani','ACT'),(1307,'Santa Catalina Quierí','ACT'),(1308,'Salina Cruz','ACT'),(1309,'Santiago Lachiguiri','ACT'),(1310,'Santa María Jalapa del Marqués','ACT'),(1311,'Santa María Totolapilla','ACT'),(1312,'Santiago Laollaga','ACT'),(1313,'Guevea de Humboldt','ACT'),(1314,'Santo Domingo Chihuitán','ACT'),(1315,'Santa María Guienagati','ACT'),(1316,'Magdalena Tequisistlán','ACT'),(1317,'Magdalena Tlacotepec','ACT'),(1318,'San Pedro Comitancillo','ACT'),(1319,'Santa María Mixtequilla','ACT'),(1320,'Santo Domingo Tehuantepec','ACT'),(1321,'San Pedro Huamelula','ACT'),(1322,'San Pedro Huilotepec','ACT'),(1323,'San Mateo del Mar','ACT'),(1324,'San Blas Atempa','ACT'),(1325,'Santiago Astata','ACT'),(1326,'San Miguel Tenango','ACT'),(1327,'Miahuatlán de Porfirio Díaz','ACT'),(1328,'San Nicolás','ACT'),(1329,'San Simón Almolongas','ACT'),(1330,'San Luis Amatlán','ACT'),(1331,'San José Lachiguiri','ACT'),(1332,'Sitio de Xitlapehua','ACT'),(1333,'San Francisco Logueche','ACT'),(1334,'Santa Ana','ACT'),(1335,'Santa Cruz Xitla','ACT'),(1336,'Monjas','ACT'),(1337,'San Ildefonso Amatlán','ACT'),(1338,'Santa Catarina Cuixtla','ACT'),(1339,'San José del Peñasco','ACT'),(1340,'San Cristóbal Amatlán','ACT'),(1341,'San Juan Mixtepec -Dto. 26 -','ACT'),(1342,'San Pedro Mixtepec -Dto. 26 -','ACT'),(1343,'Santa Lucía Miahuatlán','ACT'),(1344,'San Jerónimo Coatlán','ACT'),(1345,'San Sebastián Coatlán','ACT'),(1346,'San Pablo Coatlán','ACT'),(1347,'San Mateo Río Hondo','ACT'),(1348,'Santo Tomás Tamazulapan','ACT'),(1349,'San Andrés Paxtlán','ACT'),(1350,'Santa María Ozolotepec','ACT'),(1351,'San\n Miguel Coatlán','ACT'),(1352,'San Sebastián Río Hondo','ACT'),(1353,'San Miguel Suchixtepec','ACT'),(1354,'Santo Domingo Ozolotepec','ACT'),(1355,'San Francisco Ozolotepec','ACT'),(1356,'Santiago Xanica','ACT'),(1357,'San Marcial Ozolotepec','ACT'),(1358,'San Juan Ozolotepec','ACT'),(1359,'San Pedro Pochutla','ACT'),(1360,'Santo Domingo de Morelos','ACT'),(1361,'Santa Catarina Loxicha','ACT'),(1362,'San Agustín Loxicha','ACT'),(1363,'San Baltazar Loxicha','ACT'),(1364,'Santa María Colotepec','ACT'),(1365,'San Bartolomé Loxicha','ACT'),(1366,'Santa María Tonameca','ACT'),(1367,'Candelaria Loxicha','ACT'),(1368,'Pluma Hidalgo','ACT'),(1369,'San Pedro el Alto','ACT'),(1370,'San Mateo Piñas','ACT'),(1371,'Santa María Huatulco','ACT'),(1372,'San Miguel del Puerto','ACT'),(1373,'Putla Villa de Guerrero','ACT'),(1374,'Constancia del Rosario','ACT'),(1375,'Mesones Hidalgo','ACT'),(1376,'Santa María Zacatepec','ACT'),(1377,'San Pedro Amuzgos','ACT'),(1378,'La Reforma','ACT'),(1379,'Santa María Ipalapa','ACT'),(1380,'Chalcatongo de Hidalgo','ACT'),(1381,'Santa María Yucuhiti','ACT'),(1382,'San Esteban Atatlahuca','ACT'),(1383,'Santa Catarina Ticuá','ACT'),(1384,'Santiago Nuyoó','ACT'),(1385,'Santa Catarina Yosonotú','ACT'),(1386,'San Miguel el Grande','ACT'),(1387,'Santo Domingo Ixcatlán','ACT'),(1388,'San Pablo Tijaltepec','ACT'),(1389,'Santa Cruz Tacahua','ACT'),(1390,'Santa Lucía Monteverde','ACT'),(1391,'San Andrés Cabecera Nueva','ACT'),(1392,'Santa María Yolotepec','ACT'),(1393,'Santiago Yosondúa','ACT'),(1394,'Santa Cruz Itundujia','ACT'),(1395,'Zimatlán de Álvarez','ACT'),(1396,'San Bernardo Mixtepec','ACT'),(1397,'Santa Cruz Mixtepec','ACT'),(1398,'San Miguel Mixtepec','ACT'),(1399,'Santa María Atzompa','ACT'),(1400,'San Andrés Ixtlahuaca','ACT'),(1401,'Santa Cruz Amilpas','ACT'),(1402,'Santa Cruz Xoxocotlán','ACT'),(1403,'Santa Lucía del Camino','ACT'),(1404,'San Pedro Ixtlahuaca','ACT'),(1405,'San Antonio de la Cal','ACT'),(1406,'San Agustín de las Juntas','ACT'),(1407,'San Pablo Huixtepec','ACT'),(1408,'Ánimas Trujano','ACT'),(1409,'San Jacinto Tlacotepec','ACT'),(1410,'San Raymundo Jalpan','ACT'),(1411,'Trinidad Zaachila','ACT'),(1412,'Santa María Coyotepec','ACT'),(1413,'San Bartolo Coyotepec','ACT'),(1414,'Santa Inés Yatzeche','ACT'),(1415,'Ciénega de Zimatlán','ACT'),(1416,'San Antonio Huitepec','ACT'),(1417,'Villa de Zaachila','ACT'),(1418,'San Sebastián Tutla','ACT'),(1419,'San Miguel Peras','ACT'),(1420,'San Pablo Cuatro Venados','ACT'),(1421,'Santa Inés del Monte','ACT'),(1422,'Santa Gertrudis','ACT'),(1423,'San Antonino el Alto','ACT'),(1424,'Magdalena Mixtepec','ACT'),(1425,'Santa Catarina Quiané','ACT'),(1426,'Ayoquezco de Aldama','ACT'),(1427,'Santa Ana Tlapacoyan','ACT'),(1428,'Santa Cruz Zenzontepec','ACT'),(1429,'San Francisco Cahuacuá','ACT'),(1430,'San Mateo Yucutindoo','ACT'),(1431,'Santiago Textitlán','ACT'),(1432,'Santiago Amoltepec','ACT'),(1433,'Santa María Zaniza','ACT'),(1434,'Santo Domingo Teojomulco','ACT'),(1435,'Cuilápam de Guerrero','ACT'),(1436,'Villa Sola de Vega','ACT'),(1437,'Santa María Lachixío','ACT'),(1438,'San Vicente Lachixío','ACT'),(1439,'San Lorenzo Texmelúcan','ACT'),(1440,'Santa María Sola','ACT'),(1441,'San Francisco Sola','ACT'),(1442,'San Ildefonso Sola','ACT'),(1443,'Santiago Minas','ACT'),(1444,'Heroica Ciudad de Ejutla de Crespo','ACT'),(1445,'San Martín Tilcajete','ACT'),(1446,'Santo Tomás Jalieza','ACT'),(1447,'San Juan Chilateca','ACT'),(1448,'Ocotlán de Morelos','ACT'),(1449,'Santa Ana Zegache','ACT'),(1450,'Santiago Apóstol','ACT'),(1451,'San Antonino Castillo Velasco','ACT'),(1452,'Asunción Ocotlán','ACT'),(1453,'San Pedro Mártir','ACT'),(1454,'San Dionisio Ocotlán','ACT'),(1455,'Magdalena Ocotlán','ACT'),(1456,'San Miguel Tilquiápam','ACT'),(1457,'Santa Catarina Minas','ACT'),(1458,'San Baltazar Chichicápam','ACT'),(1459,'San Pedro Apóstol','ACT'),(1460,'Santa Lucía Ocotlán','ACT'),(1461,'San Jerónimo Taviche','ACT'),(1462,'San Andrés Zabache','ACT'),(1463,'San José del Progreso','ACT'),(1464,'Yaxe','ACT'),(1465,'San Pedro Taviche','ACT'),(1466,'San Martín de los Cansecos','ACT'),(1467,'San Martín Lachilá','ACT'),(1468,'La Pe','ACT'),(1469,'La Compañía','ACT'),(1470,'Coatecas Altas','ACT'),(1471,'San Juan Lachigalla','ACT'),(1472,'San Agustín Amatengo','ACT'),(1473,'Taniche','ACT'),(1474,'San Miguel Ejutla','ACT'),(1475,'Yogana','ACT'),(1476,'San Vicente Coatlán','ACT'),(1477,'Santiago Pinotepa Nacional','ACT'),(1478,'San Juan Cacahuatepec','ACT'),(1479,'San Juan Bautista Lo de Soto','ACT'),(1480,'Mártires de Tacubaya','ACT'),(1481,'San Sebastián Ixcapa','ACT'),(1482,'San Antonio Tepetlapa','ACT'),(1483,'Santa María Cortijo','ACT'),(1484,'Santiago Llano Grande','ACT'),(1485,'San Miguel Tlacamama','ACT'),(1486,'Santiago Tapextla','ACT'),(1487,'San José Estancia Grande','ACT'),(1488,'Santo Domingo Armenta','ACT'),(1489,'Santiago Jamiltepec','ACT'),(1490,'San Pedro Atoyac','ACT'),(1491,'San Juan Colorado','ACT'),(1492,'Santiago Ixtayutla','ACT'),(1493,'San Pedro Jicayán','ACT'),(1494,'Pinotepa de Don Luis','ACT'),(1495,'San Lorenzo','ACT'),(1496,'San Agustín Chayuco','ACT'),(1497,'San Andrés Huaxpaltepec','ACT'),(1498,'Santa Catarina Mechoacán','ACT'),(1499,'Santiago Tetepec','ACT'),(1500,'Santa María Huazolotitlán','ACT'),(1501,'Villa de Tututepec de Melchor Ocampo','ACT'),(1502,'Tataltepec de Valdés','ACT'),(1503,'San Juan Quiahije','ACT'),(1504,'San Miguel Panixtlahuaca','ACT'),(1505,'Santa Catarina Juquila','ACT'),(1506,'San Pedro Juchatengo','ACT'),(1507,'Santiago Yaitepec','ACT'),(1508,'San Juan Lachao','ACT'),(1509,'Santa María Temaxcaltepec','ACT'),(1510,'Santos Reyes Nopala','ACT'),(1511,'San Gabriel Mixtepec','ACT'),(1512,'San Pedro Mixtepec -Dto. 22 -','ACT'),(1513,'Puebla','ACT'),(1514,'Tlaltenango','ACT'),(1515,'San Miguel Xoxtla','ACT'),(1516,'Juan C. Bonilla','ACT'),(1517,'Coronango','ACT'),(1518,'Cuautlancingo','ACT'),(1519,'San Pedro Cholula','ACT'),(1520,'San Andrés Cholula','ACT'),(1521,'Ocoyucan','ACT'),(1522,'Amozoc','ACT'),(1523,'Francisco Z. Mena','ACT'),(1524,'Jalpan','ACT'),(1525,'Tlaxco','ACT'),(1526,'Tlacuilotepec','ACT'),(1527,'Xicotepec','ACT'),(1528,'Pahuatlán','ACT'),(1529,'Honey','ACT'),(1530,'Naupan','ACT'),(1531,'Huauchinango','ACT'),(1532,'Ahuazotepec','ACT'),(1533,'Juan Galindo','ACT'),(1534,'Tlaola','ACT'),(1535,'Zihuateutla','ACT'),(1536,'Jopala','ACT'),(1537,'Tlapacoya','ACT'),(1538,'Chignahuapan','ACT'),(1539,'Zacatlán','ACT'),(1540,'Chiconcuautla','ACT'),(1541,'Tepetzintla','ACT'),(1542,'San Felipe Tepatlán','ACT'),(1543,'Amixtlán','ACT'),(1544,'Tepango de Rodríguez','ACT'),(1545,'Zongozotla','ACT'),(1546,'Hermenegildo Galeana','ACT'),(1547,'Olintla','ACT'),(1548,'Coatepec','ACT'),(1549,'Camocuautla','ACT'),(1550,'Hueytlalpan','ACT'),(1551,'Zapotitlán de Méndez','ACT'),(1552,'Huitzilan de Serdán','ACT'),(1553,'Xochitlán de Vicente Suárez','ACT'),(1554,'Ixtepec','ACT'),(1555,'Atlequizayan','ACT'),(1556,'Tenampulco','ACT'),(1557,'Tuzamapan de Galeana','ACT'),(1558,'Caxhuacan','ACT'),(1559,'Jonotla','ACT'),(1560,'Zoquiapan','ACT'),(1561,'Nauzontla','ACT'),(1562,'Cuetzalan del Progreso','ACT'),(1563,'Ayotoxco de Guerrero','ACT'),(1564,'Hueytamalco','ACT'),(1565,'Acateno','ACT'),(1566,'Cuautempan','ACT'),(1567,'Aquixtla','ACT'),(1568,'Tetela de Ocampo','ACT'),(1569,'Xochiapulco','ACT'),(1570,'Zacapoaxtla','ACT'),(1571,'Ixtacamaxtitlán','ACT'),(1572,'Zautla','ACT'),(1573,'Libres','ACT'),(1574,'Teziutlán','ACT'),(1575,'Tlatlauquitepec','ACT'),(1576,'Yaonáhuac','ACT'),(1577,'Hueyapan','ACT'),(1578,'Teteles de Avila Castillo','ACT'),(1579,'Atempan','ACT'),(1580,'Chignautla','ACT'),(1581,'Xiutetelco','ACT'),(1582,'Cuyoaco','ACT'),(1583,'Tepeyahualco','ACT'),(1584,'San Martín Texmelucan','ACT'),(1585,'Tlahuapan','ACT'),(1586,'San Matías Tlalancaleca','ACT'),(1587,'San Salvador el Verde','ACT'),(1588,'San Felipe Teotlalcingo','ACT'),(1589,'Chiautzingo','ACT'),(1590,'Huejotzingo','ACT'),(1591,'Domingo Arenas','ACT'),(1592,'Calpan','ACT'),(1593,'San Nicolás de los Ranchos','ACT'),(1594,'Atlixco','ACT'),(1595,'Nealtican','ACT'),(1596,'San Jerónimo Tecuanipan','ACT'),(1597,'San Gregorio Atzompa','ACT'),(1598,'Tochimilco','ACT'),(1599,'Tianguismanalco','ACT'),(1600,'Santa Isabel Cholula','ACT'),(1601,'Huaquechula','ACT'),(1602,'San Diego la Mesa Tochimiltzingo','ACT'),(1603,'Tepeojuma','ACT'),(1604,'Izúcar de Matamoros','ACT'),(1605,'Atzitzihuacán','ACT'),(1606,'Acteopan','ACT'),(1607,'Cohuecan','ACT'),(1608,'Tepemaxalco','ACT'),(1609,'Tlapanalá','ACT'),(1610,'Tepexco','ACT'),(1611,'Tilapa','ACT'),(1612,'Chietla','ACT'),(1613,'Atzala','ACT'),(1614,'Teopantlán','ACT'),(1615,'San Martín Totoltepec','ACT'),(1616,'Xochiltepec','ACT'),(1617,'Epatlán','ACT'),(1618,'Ahuatlán','ACT'),(1619,'Coatzingo','ACT'),(1620,'Santa Catarina Tlaltempan','ACT'),(1621,'Chigmecatitlán','ACT'),(1622,'Zacapala','ACT'),(1623,'Tepexi de Rodríguez','ACT'),(1624,'Teotlalco','ACT'),(1625,'Jolalpan','ACT'),(1626,'Huehuetlán el Chico','ACT'),(1627,'Cohetzala','ACT'),(1628,'Xicotlán','ACT'),(1629,'Chila de la Sal','ACT'),(1630,'Ixcamilpa de Guerrero','ACT'),(1631,'Albino Zertuche','ACT'),(1632,'Tulcingo','ACT'),(1633,'Tehuitzingo','ACT'),(1634,'Cuayuca de Andrade','ACT'),(1635,'Santa Inés Ahuatempan','ACT'),(1636,'Axutla','ACT'),(1637,'Chinantla','ACT'),(1638,'Ahuehuetitla','ACT'),(1639,'San Pablo Anicano','ACT'),(1640,'Tecomatlán','ACT'),(1641,'Piaxtla','ACT'),(1642,'Ixcaquixtla','ACT'),(1643,'Xayacatlán de Bravo','ACT'),(1644,'Totoltepec de Guerrero','ACT'),(1645,'San Jerónimo Xayacatlán','ACT'),(1646,'San Pedro Yeloixtlahuaca','ACT'),(1647,'Petlalcingo','ACT'),(1648,'San Miguel Ixitlán','ACT'),(1649,'Chila','ACT'),(1650,'Rafael Lara Grajales','ACT'),(1651,'San José Chiapa','ACT'),(1652,'Oriental','ACT'),(1653,'San Nicolás Buenos Aires','ACT'),(1654,'Tlachichuca','ACT'),(1655,'Lafragua','ACT'),(1656,'Chilchotla','ACT'),(1657,'Quimixtlán','ACT'),(1658,'Chichiquila','ACT'),(1659,'Tepatlaxco\n de Hidalgo','ACT'),(1660,'Acajete','ACT'),(1661,'Nopalucan','ACT'),(1662,'Mazapiltepec de Juárez','ACT'),(1663,'Soltepec','ACT'),(1664,'Acatzingo','ACT'),(1665,'San Salvador el Seco','ACT'),(1666,'General Felipe Ángeles','ACT'),(1667,'Aljojuca','ACT'),(1668,'San Juan Atenco','ACT'),(1669,'Tepeaca','ACT'),(1670,'Cuautinchán','ACT'),(1671,'Tecali de Herrera','ACT'),(1672,'Mixtla','ACT'),(1673,'Santo Tomás Hueyotlipan','ACT'),(1674,'Tzicatlacoyan','ACT'),(1675,'Huehuetlán el Grande','ACT'),(1676,'La Magdalena Tlatlauquitepec','ACT'),(1677,'San Juan Atzompa','ACT'),(1678,'Huatlatlauca','ACT'),(1679,'Los Reyes de Juárez','ACT'),(1680,'Cuapiaxtla de Madero','ACT'),(1681,'San Salvador Huixcolotla','ACT'),(1682,'Quecholac','ACT'),(1683,'Tecamachalco','ACT'),(1684,'Palmar de Bravo','ACT'),(1685,'Chalchicomula de Sesma','ACT'),(1686,'Atzitzintla','ACT'),(1687,'Esperanza','ACT'),(1688,'Cañada Morelos','ACT'),(1689,'Tlanepantla','ACT'),(1690,'Tochtepec','ACT'),(1691,'Atoyatempan','ACT'),(1692,'Tepeyahualco de Cuauhtémoc','ACT'),(1693,'Huitziltepec','ACT'),(1694,'Molcaxac','ACT'),(1695,'Xochitlán Todos Santos','ACT'),(1696,'Yehualtepec','ACT'),(1697,'Tlacotepec de Benito Juárez','ACT'),(1698,'Juan N. Méndez','ACT'),(1699,'Tehuacán','ACT'),(1700,'Tepanco de López','ACT'),(1701,'Chapulco','ACT'),(1702,'Santiago Miahuatlán','ACT'),(1703,'Nicolás Bravo','ACT'),(1704,'Atexcal','ACT'),(1705,'San Antonio Cañada','ACT'),(1706,'Zapotitlán','ACT'),(1707,'San Gabriel Chilac','ACT'),(1708,'Caltepec','ACT'),(1709,'Ajalpan','ACT'),(1710,'Zoquitlán','ACT'),(1711,'San Sebastián Tlacotepec','ACT'),(1712,'Altepexi','ACT'),(1713,'Zinacatepec','ACT'),(1714,'San José Miahuatlán','ACT'),(1715,'Coxcatlán','ACT'),(1716,'Coyomeapan','ACT'),(1717,'Querétaro','ACT'),(1718,'El Marqués','ACT'),(1719,'Colón','ACT'),(1720,'Pinal de Amoles','ACT'),(1721,'Jalpan de Serra','ACT'),(1722,'Landa de Matamoros','ACT'),(1723,'Arroyo Seco','ACT'),(1724,'Peñamiller','ACT'),(1725,'Cadereyta de Montes','ACT'),(1726,'San Joaquín','ACT'),(1727,'Ezequiel Montes','ACT'),(1728,'Pedro Escobedo','ACT'),(1729,'Tequisquiapan','ACT'),(1730,'Amealco de Bonfil','ACT'),(1731,'Corregidora','ACT'),(1732,'Huimilpan','ACT'),(1733,'Othón P. Blanco','ACT'),(1734,'Felipe Carrillo Puerto','ACT'),(1735,'Isla Mujeres','ACT'),(1736,'Cozumel','ACT'),(1737,'Solidaridad','ACT'),(1738,'Tulum','ACT'),(1739,'José María Morelos','ACT'),(1740,'Bacalar','ACT'),(1741,'San Luis Potosí','ACT'),(1742,'Soledad de Graciano Sánchez','ACT'),(1743,'Cerro de San Pedro','ACT'),(1744,'Ahualulco','ACT'),(1745,'Mexquitic de Carmona','ACT'),(1746,'Villa de Arriaga','ACT'),(1747,'Vanegas','ACT'),(1748,'Cedral','ACT'),(1749,'Catorce','ACT'),(1750,'Charcas','ACT'),(1751,'Salinas','ACT'),(1752,'Santo Domingo','ACT'),(1753,'Villa de Ramos','ACT'),(1754,'Matehuala','ACT'),(1755,'Villa de la Paz','ACT'),(1756,'Villa de Guadalupe','ACT'),(1757,'Guadalcázar','ACT'),(1758,'Moctezuma','ACT'),(1759,'Venado','ACT'),(1760,'Villa de Arista','ACT'),(1761,'Armadillo de los Infante','ACT'),(1762,'Ciudad Valles','ACT'),(1763,'Ebano','ACT'),(1764,'Tamuín','ACT'),(1765,'El Naranjo','ACT'),(1766,'Ciudad del Maíz','ACT'),(1767,'Alaquines','ACT'),(1768,'Cárdenas','ACT'),(1769,'Cerritos','ACT'),(1770,'Villa Juárez','ACT'),(1771,'San Nicolás Tolentino','ACT'),(1772,'Villa de Reyes','ACT'),(1773,'Santa María del Río','ACT'),(1774,'Tierra Nueva','ACT'),(1775,'Rioverde','ACT'),(1776,'Ciudad Fernández','ACT'),(1777,'San Ciro de Acosta','ACT'),(1778,'Tamasopo','ACT'),(1779,'Aquismón','ACT'),(1780,'Tancanhuitz','ACT'),(1781,'Tanlajás','ACT'),(1782,'San Vicente Tancuayalab','ACT'),(1783,'San Antonio','ACT'),(1784,'Tanquián de Escobedo','ACT'),(1785,'Tampamolón Corona','ACT'),(1786,'Huehuetlán','ACT'),(1787,'Xilitla','ACT'),(1788,'Axtla de Terrazas','ACT'),(1789,'Tampacán','ACT'),(1790,'San Martín Chalchicuautla','ACT'),(1791,'Tamazunchale','ACT'),(1792,'Matlapa','ACT'),(1793,'Culiacán','ACT'),(1794,'Navolato','ACT'),(1795,'Badiraguato','ACT'),(1796,'Cosalá','ACT'),(1797,'Mocorito','ACT'),(1798,'Guasave','ACT'),(1799,'Ahome','ACT'),(1800,'Salvador Alvarado','ACT'),(1801,'Angostura','ACT'),(1802,'Choix','ACT'),(1803,'El Fuerte','ACT'),(1804,'Sinaloa','ACT'),(1805,'Mazatlán','ACT'),(1806,'Escuinapa','ACT'),(1807,'Concordia','ACT'),(1808,'Elota','ACT'),(1809,'San Ignacio','ACT'),(1810,'Hermosillo','ACT'),(1811,'San Miguel de Horcasitas','ACT'),(1812,'Carbó','ACT'),(1813,'San Luis Río Colorado','ACT'),(1814,'Puerto Peñasco','ACT'),(1815,'General Plutarco Elías Calles','ACT'),(1816,'Caborca','ACT'),(1817,'Altar','ACT'),(1818,'Tubutama','ACT'),(1819,'Atil','ACT'),(1820,'Oquitoa','ACT'),(1821,'Sáric','ACT'),(1822,'Benjamín Hill','ACT'),(1823,'Trincheras','ACT'),(1824,'Pitiquito','ACT'),(1825,'Nogales','ACT'),(1826,'Imuris','ACT'),(1827,'Santa Cruz','ACT'),(1828,'Naco','ACT'),(1829,'Agua Prieta','ACT'),(1830,'Fronteras','ACT'),(1831,'Nacozari de García','ACT'),(1832,'Bavispe','ACT'),(1833,'Bacerac','ACT'),(1834,'Huachinera','ACT'),(1835,'Nácori Chico','ACT'),(1836,'Granados','ACT'),(1837,'Bacadéhuachi','ACT'),(1838,'Cumpas','ACT'),(1839,'Huásabas','ACT'),(1840,'Cananea','ACT'),(1841,'Arizpe','ACT'),(1842,'Cucurpe','ACT'),(1843,'Bacoachi','ACT'),(1844,'San Pedro de la Cueva','ACT'),(1845,'Divisaderos','ACT'),(1846,'Tepache','ACT'),(1847,'Villa Pesqueira','ACT'),(1848,'Opodepe','ACT'),(1849,'Huépac','ACT'),(1850,'Banámichi','ACT'),(1851,'Ures','ACT'),(1852,'Aconchi','ACT'),(1853,'Baviácora','ACT'),(1854,'San Felipe de Jesús','ACT'),(1855,'Cajeme','ACT'),(1856,'Navojoa','ACT'),(1857,'Huatabampo','ACT'),(1858,'Bácum','ACT'),(1859,'Etchojoa','ACT'),(1860,'Empalme','ACT'),(1861,'Guaymas','ACT'),(1862,'San Ignacio Río Muerto','ACT'),(1863,'La Colorada','ACT'),(1864,'Suaqui Grande','ACT'),(1865,'Sahuaripa','ACT'),(1866,'San Javier','ACT'),(1867,'Soyopa','ACT'),(1868,'Bacanora','ACT'),(1869,'Arivechi','ACT'),(1870,'Quiriego','ACT'),(1871,'Onavas','ACT'),(1872,'Alamos','ACT'),(1873,'Yécora','ACT'),(1874,'Centro','ACT'),(1875,'Jalpa de Méndez','ACT'),(1876,'Nacajuca','ACT'),(1877,'Comalcalco','ACT'),(1878,'Huimanguillo','ACT'),(1879,'Paraíso','ACT'),(1880,'Cunduacán','ACT'),(1881,'Macuspana','ACT'),(1882,'Centla','ACT'),(1883,'Jonuta','ACT'),(1884,'Teapa','ACT'),(1885,'Jalapa','ACT'),(1886,'Tacotalpa','ACT'),(1887,'Tenosique','ACT'),(1888,'Balancán','ACT'),(1889,'Llera','ACT'),(1890,'Güémez','ACT'),(1891,'Casas','ACT'),(1892,'Valle Hermoso','ACT'),(1893,'Cruillas','ACT'),(1894,'Soto la Marina','ACT'),(1895,'San Carlos','ACT'),(1896,'Padilla','ACT'),(1897,'Mainero','ACT'),(1898,'Tula','ACT'),(1899,'Jaumave','ACT'),(1900,'Miquihuana','ACT'),(1901,'Palmillas','ACT'),(1902,'Nuevo Laredo','ACT'),(1903,'Miguel Alemán','ACT'),(1904,'Mier','ACT'),(1905,'Gustavo Díaz Ordaz','ACT'),(1906,'Reynosa','ACT'),(1907,'Río Bravo','ACT'),(1908,'Méndez','ACT'),(1909,'Burgos','ACT'),(1910,'Tampico','ACT'),(1911,'Ciudad Madero','ACT'),(1912,'Altamira','ACT'),(1913,'González','ACT'),(1914,'Xicoténcatl','ACT'),(1915,'El Mante','ACT'),(1916,'Antiguo Morelos','ACT'),(1917,'Nuevo Morelos','ACT'),(1918,'Tlaxcala','ACT'),(1919,'Ixtacuixtla de Mariano Matamoros','ACT'),(1920,'Santa Ana Nopalucan','ACT'),(1921,'Panotla','ACT'),(1922,'Totolac','ACT'),(1923,'Tepeyanco','ACT'),(1924,'Santa Isabel Xiloxoxtla','ACT'),(1925,'San Juan Huactzinco','ACT'),(1926,'Calpulalpan','ACT'),(1927,'Sanctórum de Lázaro Cárdenas','ACT'),(1928,'Hueyotlipan','ACT'),(1929,'Nanacamilpa de Mariano Arista','ACT'),(1930,'Españita','ACT'),(1931,'Apizaco','ACT'),(1932,'Atlangatepec','ACT'),(1933,'Muñoz de Domingo Arenas','ACT'),(1934,'Tetla de la Solidaridad','ACT'),(1935,'Xaltocan','ACT'),(1936,'San Lucas Tecopilco','ACT'),(1937,'Yauhquemehcan','ACT'),(1938,'Xaloztoc','ACT'),(1939,'Tocatlán','ACT'),(1940,'Tzompantepec','ACT'),(1941,'San José Teacalco','ACT'),(1942,'Huamantla','ACT'),(1943,'Terrenate','ACT'),(1944,'Atltzayanca','ACT'),(1945,'Cuapiaxtla','ACT'),(1946,'El Carmen Tequexquitla','ACT'),(1947,'Ixtenco','ACT'),(1948,'Ziltlaltépec de Trinidad Sánchez Santos','ACT'),(1949,'Apetatitlán de Antonio Carvajal','ACT'),(1950,'Amaxac de Guerrero','ACT'),(1951,'Santa Cruz Tlaxcala','ACT'),(1952,'Cuaxomulco','ACT'),(1953,'Contla de Juan Cuamatzi','ACT'),(1954,'Tepetitla de Lardizábal','ACT'),(1955,'Natívitas','ACT'),(1956,'Santa Apolonia Teacalco','ACT'),(1957,'Tetlatlahuca','ACT'),(1958,'San Damián Texóloc','ACT'),(1959,'San Jerónimo Zacualpan','ACT'),(1960,'Zacatelco','ACT'),(1961,'San Lorenzo Axocomanitla','ACT'),(1962,'Santa Catarina Ayometla','ACT'),(1963,'Xicohtzinco','ACT'),(1964,'Papalotla de Xicohténcatl','ACT'),(1965,'Chiautempan','ACT'),(1966,'La Magdalena Tlaltelulco','ACT'),(1967,'San Francisco Tetlanohcan','ACT'),(1968,'Teolocholco','ACT'),(1969,'Acuamanala de Miguel Hidalgo','ACT'),(1970,'Santa Cruz Quilehtla','ACT'),(1971,'Mazatecochco de José María Morelos','ACT'),(1972,'San Pablo del Monte','ACT'),(1973,'Xalapa','ACT'),(1974,'Tlalnelhuayocan','ACT'),(1975,'Xico','ACT'),(1976,'Ixhuacán de los Reyes','ACT'),(1977,'Ayahualulco','ACT'),(1978,'Perote','ACT'),(1979,'Banderilla','ACT'),(1980,'Rafael Lucio','ACT'),(1981,'Las Vigas de Ramírez','ACT'),(1982,'Villa Aldama','ACT'),(1983,'Tlacolulan','ACT'),(1984,'Tonayán','ACT'),(1985,'Coacoatzintla','ACT'),(1986,'Naolinco','ACT'),(1987,'Miahuatlán','ACT'),(1988,'Tepetlán','ACT'),(1989,'Juchique de Ferrer','ACT'),(1990,'Alto Lucero de Gutiérrez Barrios','ACT'),(1991,'Teocelo','ACT'),(1992,'Cosautlán de Carvajal','ACT'),(1993,'Apazapan','ACT'),(1994,'Puente Nacional','ACT'),(1995,'Ursulo Galván','ACT'),(1996,'Paso de Ovejas','ACT'),(1997,'La Antigua','ACT'),(1998,'Veracruz','ACT'),(1999,'Pánuco','ACT'),(2000,'Pueblo Viejo','ACT'),(2001,'Tampico Alto','ACT'),(2002,'Tempoal','ACT'),(2003,'Ozuluama de Mascareñas','ACT'),(2004,'Tantoyuca','ACT'),(2005,'Platón Sánchez','ACT'),(2006,'Chiconamel','ACT'),(2007,'Chalma','ACT'),(2008,'Chontla','ACT'),(2009,'Citlaltépetl','ACT'),(2010,'Ixcatepec','ACT'),(2011,'Naranjos\n Amatlán','ACT'),(2012,'El Higo','ACT'),(2013,'Chinampa de Gorostiza','ACT'),(2014,'Tantima','ACT'),(2015,'Tamalín','ACT'),(2016,'Cerro Azul','ACT'),(2017,'Tancoco','ACT'),(2018,'Tamiahua','ACT'),(2019,'Huayacocotla','ACT'),(2020,'Ilamatlán','ACT'),(2021,'Zontecomatlán de López y Fuentes','ACT'),(2022,'Texcatepec','ACT'),(2023,'Tlachichilco','ACT'),(2024,'Ixhuatlán de Madero','ACT'),(2025,'Chicontepec','ACT'),(2026,'Álamo Temapache','ACT'),(2027,'Tihuatlán','ACT'),(2028,'Castillo de Teayo','ACT'),(2029,'Cazones de Herrera','ACT'),(2030,'Zozocolco de Hidalgo','ACT'),(2031,'Chumatlán','ACT'),(2032,'Coxquihui','ACT'),(2033,'Mecatlán','ACT'),(2034,'Filomeno Mata','ACT'),(2035,'Coahuitlán','ACT'),(2036,'Coyutla','ACT'),(2037,'Coatzintla','ACT'),(2038,'Espinal','ACT'),(2039,'Poza Rica de Hidalgo','ACT'),(2040,'Papantla','ACT'),(2041,'Gutiérrez Zamora','ACT'),(2042,'Tecolutla','ACT'),(2043,'Martínez de la Torre','ACT'),(2044,'San Rafael','ACT'),(2045,'Tlapacoyan','ACT'),(2046,'Jalacingo','ACT'),(2047,'Atzalan','ACT'),(2048,'Altotonga','ACT'),(2049,'Las Minas','ACT'),(2050,'Tatatila','ACT'),(2051,'Tenochtitlán','ACT'),(2052,'Nautla','ACT'),(2053,'Misantla','ACT'),(2054,'Landero y Coss','ACT'),(2055,'Chiconquiaco','ACT'),(2056,'Yecuatla','ACT'),(2057,'Colipa','ACT'),(2058,'Vega de Alatorre','ACT'),(2059,'Jalcomulco','ACT'),(2060,'Tlaltetela','ACT'),(2061,'Tenampa','ACT'),(2062,'Totutla','ACT'),(2063,'Sochiapa','ACT'),(2064,'Tlacotepec de Mejía','ACT'),(2065,'Huatusco','ACT'),(2066,'Calcahualco','ACT'),(2067,'Alpatláhuac','ACT'),(2068,'Coscomatepec','ACT'),(2069,'La Perla','ACT'),(2070,'Chocamán','ACT'),(2071,'Ixhuatlán del Café','ACT'),(2072,'Tepatlaxco','ACT'),(2073,'Comapa','ACT'),(2074,'Zentla','ACT'),(2075,'Camarón de Tejeda','ACT'),(2076,'Soledad de Doblado','ACT'),(2077,'Manlio Fabio Altamirano','ACT'),(2078,'Jamapa','ACT'),(2079,'Medellín','ACT'),(2080,'Boca del Río','ACT'),(2081,'Orizaba','ACT'),(2082,'Rafael Delgado','ACT'),(2083,'Mariano Escobedo','ACT'),(2084,'Ixhuatlancillo','ACT'),(2085,'Atzacan','ACT'),(2086,'Ixtaczoquitlán','ACT'),(2087,'Fortín','ACT'),(2088,'Córdoba','ACT'),(2089,'Maltrata','ACT'),(2090,'Río Blanco','ACT'),(2091,'Camerino Z. Mendoza','ACT'),(2092,'Acultzingo','ACT'),(2093,'Soledad Atzompa','ACT'),(2094,'Huiloapan de Cuauhtémoc','ACT'),(2095,'Tlaquilpa','ACT'),(2096,'Astacinga','ACT'),(2097,'Xoxocotla','ACT'),(2098,'Atlahuilco','ACT'),(2099,'San Andrés Tenejapan','ACT'),(2100,'Tlilapan','ACT'),(2101,'Naranjal','ACT'),(2102,'Coetzala','ACT'),(2103,'Omealca','ACT'),(2104,'Cuitláhuac','ACT'),(2105,'Cuichapa','ACT'),(2106,'Yanga','ACT'),(2107,'Amatlán de los Reyes','ACT'),(2108,'Paso del Macho','ACT'),(2109,'Carrillo Puerto','ACT'),(2110,'Cotaxtla','ACT'),(2111,'Zongolica','ACT'),(2112,'Tehuipango','ACT'),(2113,'Mixtla de Altamirano','ACT'),(2114,'Texhuacán','ACT'),(2115,'Tezonapa','ACT'),(2116,'Tlalixcoyan','ACT'),(2117,'Ignacio de la Llave','ACT'),(2118,'Alvarado','ACT'),(2119,'Lerdo de Tejada','ACT'),(2120,'Tres Valles','ACT'),(2121,'Carlos A. Carrillo','ACT'),(2122,'Cosamaloapan de Carpio','ACT'),(2123,'Ixmatlahuacan','ACT'),(2124,'Acula','ACT'),(2125,'Amatitlán','ACT'),(2126,'Tlacotalpan','ACT'),(2127,'Saltabarranca','ACT'),(2128,'Otatitlán','ACT'),(2129,'Tlacojalpan','ACT'),(2130,'Tuxtilla','ACT'),(2131,'Chacaltianguis','ACT'),(2132,'José Azueta','ACT'),(2133,'Playa Vicente','ACT'),(2134,'Santiago Sochiapan','ACT'),(2135,'Isla','ACT'),(2136,'Juan Rodríguez Clara','ACT'),(2137,'San Andrés Tuxtla','ACT'),(2138,'Santiago Tuxtla','ACT'),(2139,'Angel R. Cabada','ACT'),(2140,'Hueyapan de Ocampo','ACT'),(2141,'Catemaco','ACT'),(2142,'Soteapan','ACT'),(2143,'Mecayapan','ACT'),(2144,'Tatahuicapan de Juárez','ACT'),(2145,'Pajapan','ACT'),(2146,'Chinameca','ACT'),(2147,'Acayucan','ACT'),(2148,'San Juan Evangelista','ACT'),(2149,'Sayula de Alemán','ACT'),(2150,'Oluta','ACT'),(2151,'Soconusco','ACT'),(2152,'Texistepec','ACT'),(2153,'Jáltipan','ACT'),(2154,'Oteapan','ACT'),(2155,'Cosoleacaque','ACT'),(2156,'Nanchital de Lázaro Cárdenas del Río','ACT'),(2157,'Ixhuatlán del Sureste','ACT'),(2158,'Moloacán','ACT'),(2159,'Coatzacoalcos','ACT'),(2160,'Agua Dulce','ACT'),(2161,'Hidalgotitlán','ACT'),(2162,'Jesús Carranza','ACT'),(2163,'Las Choapas','ACT'),(2164,'Uxpanapa','ACT'),(2165,'Mérida','ACT'),(2166,'Chicxulub Pueblo','ACT'),(2167,'Ixil','ACT'),(2168,'Conkal','ACT'),(2169,'Yaxkukul','ACT'),(2170,'Hunucmá','ACT'),(2171,'Ucú','ACT'),(2172,'Kinchil','ACT'),(2173,'Tetiz','ACT'),(2174,'Celestún','ACT'),(2175,'Kanasín','ACT'),(2176,'Timucuy','ACT'),(2177,'Acanceh','ACT'),(2178,'Tixpéhual','ACT'),(2179,'Umán','ACT'),(2180,'Telchac Pueblo','ACT'),(2181,'Dzemul','ACT'),(2182,'Telchac Puerto','ACT'),(2183,'Cansahcab','ACT'),(2184,'Sinanché','ACT'),(2185,'Yobaín','ACT'),(2186,'Motul','ACT'),(2187,'Baca','ACT'),(2188,'Mocochá','ACT'),(2189,'Muxupip','ACT'),(2190,'Cacalchén','ACT'),(2191,'Bokobá','ACT'),(2192,'Tixkokob','ACT'),(2193,'Hoctún','ACT'),(2194,'Tahmek','ACT'),(2195,'Dzidzantún','ACT'),(2196,'Temax','ACT'),(2197,'Tekantó','ACT'),(2198,'Teya','ACT'),(2199,'Suma','ACT'),(2200,'Tepakán','ACT'),(2201,'Tekal de Venegas','ACT'),(2202,'Izamal','ACT'),(2203,'Hocabá','ACT'),(2204,'Xocchel','ACT'),(2205,'Seyé','ACT'),(2206,'Cuzamá','ACT'),(2207,'Homún','ACT'),(2208,'Sanahcat','ACT'),(2209,'Huhí','ACT'),(2210,'Dzilam González','ACT'),(2211,'Dzilam de Bravo','ACT'),(2212,'Panabá','ACT'),(2213,'Buctzotz','ACT'),(2214,'Sucilá','ACT'),(2215,'Cenotillo','ACT'),(2216,'Dzoncauich','ACT'),(2217,'Tunkás','ACT'),(2218,'Quintana Roo','ACT'),(2219,'Dzitás','ACT'),(2220,'Kantunil','ACT'),(2221,'Sudzal','ACT'),(2222,'Tekit','ACT'),(2223,'Sotuta','ACT'),(2224,'Tizimín','ACT'),(2225,'Río Lagartos','ACT'),(2226,'Espita','ACT'),(2227,'Temozón','ACT'),(2228,'Calotmul','ACT'),(2229,'Tinum','ACT'),(2230,'Chankom','ACT'),(2231,'Chichimilá','ACT'),(2232,'Tixcacalcupul','ACT'),(2233,'Kaua','ACT'),(2234,'Cuncunul','ACT'),(2235,'Tekom','ACT'),(2236,'Chemax','ACT'),(2237,'Valladolid','ACT'),(2238,'Uayma','ACT'),(2239,'Maxcanú','ACT'),(2240,'Samahil','ACT'),(2241,'Opichén','ACT'),(2242,'Chocholá','ACT'),(2243,'Kopomá','ACT'),(2244,'Tecoh','ACT'),(2245,'Abalá','ACT'),(2246,'Halachó','ACT'),(2247,'Muna','ACT'),(2248,'Sacalum','ACT'),(2249,'Maní','ACT'),(2250,'Dzán','ACT'),(2251,'Chapab','ACT'),(2252,'Ticul','ACT'),(2253,'Oxkutzcab','ACT'),(2254,'Santa Elena','ACT'),(2255,'Mama','ACT'),(2256,'Chumayel','ACT'),(2257,'Mayapán','ACT'),(2258,'Teabo','ACT'),(2259,'Cantamayec','ACT'),(2260,'Yaxcabá','ACT'),(2261,'Peto','ACT'),(2262,'Chikindzonot','ACT'),(2263,'Tahdziú','ACT'),(2264,'Tixmehuac','ACT'),(2265,'Chacsinkín','ACT'),(2266,'Tzucacab','ACT'),(2267,'Tekax','ACT'),(2268,'Akil','ACT'),(2269,'Zacatecas','ACT'),(2270,'Vetagrande','ACT'),(2271,'Concepción del Oro','ACT'),(2272,'Mazapil','ACT'),(2273,'El Salvador','ACT'),(2274,'Juan Aldama','ACT'),(2275,'Miguel Auza','ACT'),(2276,'General Francisco R. Murguía','ACT'),(2277,'Río Grande','ACT'),(2278,'Villa de Cos','ACT'),(2279,'Cañitas de Felipe Pescador','ACT'),(2280,'Calera','ACT'),(2281,'General Enrique Estrada','ACT'),(2282,'Trancoso','ACT'),(2283,'Genaro Codina','ACT'),(2284,'Ojocaliente','ACT'),(2285,'General Pánfilo Natera','ACT'),(2286,'Luis Moya','ACT'),(2287,'Villa González Ortega','ACT'),(2288,'Noria de Ángeles','ACT'),(2289,'Villa García','ACT'),(2290,'Pinos','ACT'),(2291,'Fresnillo','ACT'),(2292,'Sombrerete','ACT'),(2293,'Sain Alto','ACT'),(2294,'Valparaíso','ACT'),(2295,'Chalchihuites','ACT'),(2296,'Jiménez del Teul','ACT'),(2297,'Jerez','ACT'),(2298,'Monte Escobedo','ACT'),(2299,'Susticacán','ACT'),(2300,'Villanueva','ACT'),(2301,'Tepetongo','ACT'),(2302,'El Plateado de Joaquín Amaro','ACT'),(2303,'Jalpa','ACT'),(2304,'Tabasco','ACT'),(2305,'Huanusco','ACT'),(2306,'Tlaltenango de Sánchez Román','ACT'),(2307,'Momax','ACT'),(2308,'Atolinga','ACT'),(2309,'Tepechitlán','ACT'),(2310,'Teúl de González Ortega','ACT'),(2311,'Santa María de la Paz','ACT'),(2312,'Trinidad García de la Cadena','ACT'),(2313,'Mezquital del Oro','ACT'),(2314,'Nochistlán de Mejía','ACT'),(2315,'Apulco','ACT'),(2316,'Apozol','ACT'),(2317,'Juchipila','ACT'),(2318,'Moyahua de Estrada','ACT');
/*!40000 ALTER TABLE `cat_municipio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_ocupacion`
--

DROP TABLE IF EXISTS `cat_ocupacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_ocupacion` (
  `id_ocupacion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_ocupacion`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_ocupacion`
--

LOCK TABLES `cat_ocupacion` WRITE;
/*!40000 ALTER TABLE `cat_ocupacion` DISABLE KEYS */;
INSERT INTO `cat_ocupacion` VALUES (1,'Estudiante','ACT'),(2,'Ama de casa','ACT'),(3,'Empleado','ACT'),(4,'Negocio propio','ACT');
/*!40000 ALTER TABLE `cat_ocupacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_paquete`
--

DROP TABLE IF EXISTS `cat_paquete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_paquete` (
  `id_paquete` int(11) NOT NULL AUTO_INCREMENT,
  `id_mercancia` int(11) NOT NULL,
  `estutus` varchar(3) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id_paquete`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_paquete`
--

LOCK TABLES `cat_paquete` WRITE;
/*!40000 ALTER TABLE `cat_paquete` DISABLE KEYS */;
/*!40000 ALTER TABLE `cat_paquete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_perfil_permiso`
--

DROP TABLE IF EXISTS `cat_perfil_permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_perfil_permiso` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_perfil_permiso`
--

LOCK TABLES `cat_perfil_permiso` WRITE;
/*!40000 ALTER TABLE `cat_perfil_permiso` DISABLE KEYS */;
INSERT INTO `cat_perfil_permiso` VALUES (1,'Administrador total','ACT'),(2,'Afiliado total','ACT'),(3,'Afiliado nuevo','ACT');
/*!40000 ALTER TABLE `cat_perfil_permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_permiso`
--

DROP TABLE IF EXISTS `cat_permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_permiso` (
  `id_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `id_grupo` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_permiso`
--

LOCK TABLES `cat_permiso` WRITE;
/*!40000 ALTER TABLE `cat_permiso` DISABLE KEYS */;
INSERT INTO `cat_permiso` VALUES (1,1,'altas','Altas','ACT'),(2,1,'comisiones','Comisiones','ACT'),(3,1,'oficina_virtual','Oficina virtual','ACT'),(4,1,'red','Red','ACT'),(5,1,'reportes','Reportes','ACT'),(6,2,'encuestas','Encuestas','ACT'),(7,2,'archivero','Archivero','ACT'),(8,2,'tablero','Tablero','ACT'),(9,2,'compartir','Compartir','ACT'),(10,2,'perfil','Perfil','ACT'),(11,2,'foto','Foto','ACT'),(12,2,'afiliar','Afiliar','ACT'),(13,2,'red','Red','ACT'),(14,2,'carrito','Carrito','ACT'),(15,2,'billetera','Billetera','ACT'),(16,2,'estadisticas','Estadisticas','ACT'),(17,2,'reportes','Reportes','ACT'),(18,2,'informacion','Información','ACT'),(19,2,'presentaciones','Presentaciones','ACT'),(20,2,'e_books','E-books','ACT'),(21,2,'videos','Vídeos','ACT'),(22,2,'descargas','descargas','ACT'),(23,2,'promociones','Promociones','ACT'),(24,2,'crm','CRM','ACT'),(25,2,'eventos','Eventos','ACT'),(26,2,'noticias','Noticias','ACT'),(27,2,'videollamadas','Vídeo-llamadas','ACT'),(28,2,'cupones','Cupones','ACT'),(29,2,'reconocimientos','Reconocimientos','ACT'),(30,2,'mensajes','Mensajes','ACT'),(31,2,'soporte_tecnico','Soporte_Tecnico','ACT'),(32,2,'chat','Chat','ACT'),(33,2,'e_mail','E-mail','ACT'),(34,2,'tickets','Tickets/Boletos','ACT'),(35,2,'social_network','Social network','ACT');
/*!40000 ALTER TABLE `cat_permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_promo`
--

DROP TABLE IF EXISTS `cat_promo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_promo` (
  `id_promo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_promo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_promo`
--

LOCK TABLES `cat_promo` WRITE;
/*!40000 ALTER TABLE `cat_promo` DISABLE KEYS */;
INSERT INTO `cat_promo` VALUES (1,'Paquete','ACT'),(2,'Regalo','ACT');
/*!40000 ALTER TABLE `cat_promo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_proveedor`
--

DROP TABLE IF EXISTS `cat_proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_proveedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `comision` decimal(7,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_proveedor`
--

LOCK TABLES `cat_proveedor` WRITE;
/*!40000 ALTER TABLE `cat_proveedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `cat_proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_rango`
--

DROP TABLE IF EXISTS `cat_rango`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_rango` (
  `id_rango` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL DEFAULT 'ACT',
  `condicion_red_afilacion` varchar(4) NOT NULL,
  PRIMARY KEY (`id_rango`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_rango`
--

LOCK TABLES `cat_rango` WRITE;
/*!40000 ALTER TABLE `cat_rango` DISABLE KEYS */;
/*!40000 ALTER TABLE `cat_rango` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_regimen`
--

DROP TABLE IF EXISTS `cat_regimen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_regimen` (
  `id_regimen` int(11) NOT NULL AUTO_INCREMENT,
  `abreviatura` varchar(20) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_regimen`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_regimen`
--

LOCK TABLES `cat_regimen` WRITE;
/*!40000 ALTER TABLE `cat_regimen` DISABLE KEYS */;
INSERT INTO `cat_regimen` VALUES (1,'S.A','Sociedad anonima','ACT'),(2,'S.R.L','Sociedad de responsabilidad limitada','ACT');
/*!40000 ALTER TABLE `cat_regimen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_retencion`
--

DROP TABLE IF EXISTS `cat_retencion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_retencion` (
  `id_retencion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `porcentaje` int(11) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  `duracion` varchar(3) NOT NULL,
  PRIMARY KEY (`id_retencion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_retencion`
--

LOCK TABLES `cat_retencion` WRITE;
/*!40000 ALTER TABLE `cat_retencion` DISABLE KEYS */;
/*!40000 ALTER TABLE `cat_retencion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_retenciones_historial`
--

DROP TABLE IF EXISTS `cat_retenciones_historial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_retenciones_historial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  `valor` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `id_afiliado` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_retenciones_historial`
--

LOCK TABLES `cat_retenciones_historial` WRITE;
/*!40000 ALTER TABLE `cat_retenciones_historial` DISABLE KEYS */;
/*!40000 ALTER TABLE `cat_retenciones_historial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_sexo`
--

DROP TABLE IF EXISTS `cat_sexo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_sexo` (
  `id_sexo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(10) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_sexo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_sexo`
--

LOCK TABLES `cat_sexo` WRITE;
/*!40000 ALTER TABLE `cat_sexo` DISABLE KEYS */;
INSERT INTO `cat_sexo` VALUES (1,'Masculino','ACT'),(2,'Femenino','ACT');
/*!40000 ALTER TABLE `cat_sexo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_social`
--

DROP TABLE IF EXISTS `cat_social`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_social` (
  `id_social` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(60) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_social`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_social`
--

LOCK TABLES `cat_social` WRITE;
/*!40000 ALTER TABLE `cat_social` DISABLE KEYS */;
/*!40000 ALTER TABLE `cat_social` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_tiempo_dedicado`
--

DROP TABLE IF EXISTS `cat_tiempo_dedicado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_tiempo_dedicado` (
  `id_tiempo_dedicado` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_tiempo_dedicado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_tiempo_dedicado`
--

LOCK TABLES `cat_tiempo_dedicado` WRITE;
/*!40000 ALTER TABLE `cat_tiempo_dedicado` DISABLE KEYS */;
INSERT INTO `cat_tiempo_dedicado` VALUES (1,'Tiempo completo','ACT'),(2,'Medio tiempo','ACT');
/*!40000 ALTER TABLE `cat_tiempo_dedicado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_tipo_archivo`
--

DROP TABLE IF EXISTS `cat_tipo_archivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_tipo_archivo` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_tipo_archivo`
--

LOCK TABLES `cat_tipo_archivo` WRITE;
/*!40000 ALTER TABLE `cat_tipo_archivo` DISABLE KEYS */;
INSERT INTO `cat_tipo_archivo` VALUES (1,'pdf','ACT'),(2,'mp4','ACT'),(3,'ppt','ACT'),(4,'pptx','ACT'),(5,'png','ACT'),(6,'jpg','ACT'),(7,'gif','ACT'),(8,'odp','ACT'),(9,'sdd','ACT'),(10,'sxi','ACT'),(11,'pot','ACT'),(12,'pothtml','ACT'),(13,'ppa','ACT'),(14,'pps','ACT'),(15,'ppthtml','ACT'),(16,'qpx','ACT'),(17,'qtp','ACT'),(18,'qts','ACT'),(19,'qtx','ACT'),(20,'qup','ACT'),(21,'urlVideo','ACT'),(22,'urlPresentacion','ACT'),(23,'doc','ACT'),(24,'docx','ACT'),(25,'ods','ACT'),(26,'odt','ACT'),(27,'xls','ACT'),(28,'csv','ACT'),(29,'xlsx','ACT'),(30,'jpeg','ACT'),(31,'zip','ACT'),(32,'mpg','ACT'),(33,'rar','ACT'),(34,'wav','ACT'),(35,'bmp','ACT'),(36,'html','ACT'),(37,'htm','ACT'),(38,'tar','ACT'),(39,'tgz','ACT'),(40,'mid','ACT'),(41,'txt','ACT'),(42,'text','ACT'),(43,'cvs','ACT'),(44,'gz','ACT'),(45,'7z','ACT'),(46,'rtf','ACT'),(47,'xml','ACT');
/*!40000 ALTER TABLE `cat_tipo_archivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_tipo_evento`
--

DROP TABLE IF EXISTS `cat_tipo_evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_tipo_evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_tipo_evento`
--

LOCK TABLES `cat_tipo_evento` WRITE;
/*!40000 ALTER TABLE `cat_tipo_evento` DISABLE KEYS */;
INSERT INTO `cat_tipo_evento` VALUES (1,'informativo'),(2,'privado'),(3,'urgente'),(4,'reunion'),(5,'libre'),(6,'rutina');
/*!40000 ALTER TABLE `cat_tipo_evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_tipo_mercancia`
--

DROP TABLE IF EXISTS `cat_tipo_mercancia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_tipo_mercancia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_tipo_mercancia`
--

LOCK TABLES `cat_tipo_mercancia` WRITE;
/*!40000 ALTER TABLE `cat_tipo_mercancia` DISABLE KEYS */;
INSERT INTO `cat_tipo_mercancia` VALUES (1,'Producto','ACT'),(2,'Servicio','ACT'),(3,'Combinado','ACT'),(4,'Paquete de Inscripcion','ACT'),(5,'Membresia','ACT');
/*!40000 ALTER TABLE `cat_tipo_mercancia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_tipo_paquete`
--

DROP TABLE IF EXISTS `cat_tipo_paquete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_tipo_paquete` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_tipo_paquete`
--

LOCK TABLES `cat_tipo_paquete` WRITE;
/*!40000 ALTER TABLE `cat_tipo_paquete` DISABLE KEYS */;
INSERT INTO `cat_tipo_paquete` VALUES (1,'Afiliacion','ACT'),(2,'Renovación','ACT'),(3,'Actualización','ACT');
/*!40000 ALTER TABLE `cat_tipo_paquete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_tipo_producto`
--

DROP TABLE IF EXISTS `cat_tipo_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_tipo_producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_producto` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_tipo_producto`
--

LOCK TABLES `cat_tipo_producto` WRITE;
/*!40000 ALTER TABLE `cat_tipo_producto` DISABLE KEYS */;
INSERT INTO `cat_tipo_producto` VALUES (1,'Insumo'),(2,'Individual'),(3,'Paquete');
/*!40000 ALTER TABLE `cat_tipo_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_tipo_proveedor`
--

DROP TABLE IF EXISTS `cat_tipo_proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_tipo_proveedor` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_tipo_proveedor`
--

LOCK TABLES `cat_tipo_proveedor` WRITE;
/*!40000 ALTER TABLE `cat_tipo_proveedor` DISABLE KEYS */;
INSERT INTO `cat_tipo_proveedor` VALUES (1,'Producto','ACT'),(2,'Servicio','ACT'),(3,'Mensajería','DES');
/*!40000 ALTER TABLE `cat_tipo_proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_tipo_rango`
--

DROP TABLE IF EXISTS `cat_tipo_rango`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_tipo_rango` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `estatus` varchar(5) DEFAULT 'ACT',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_tipo_rango`
--

LOCK TABLES `cat_tipo_rango` WRITE;
/*!40000 ALTER TABLE `cat_tipo_rango` DISABLE KEYS */;
INSERT INTO `cat_tipo_rango` VALUES (1,'Afiliados a la Red','ACT'),(2,'Ventas de la red','ACT'),(3,'Compras personales','ACT'),(4,'Puntos Comisionables','ACT'),(5,'Puntos de la Red','ACT');
/*!40000 ALTER TABLE `cat_tipo_rango` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_tipo_servicio`
--

DROP TABLE IF EXISTS `cat_tipo_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_tipo_servicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_servicio` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_tipo_servicio`
--

LOCK TABLES `cat_tipo_servicio` WRITE;
/*!40000 ALTER TABLE `cat_tipo_servicio` DISABLE KEYS */;
INSERT INTO `cat_tipo_servicio` VALUES (1,'conferencia'),(2,'curso');
/*!40000 ALTER TABLE `cat_tipo_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_tipo_tarjeta`
--

DROP TABLE IF EXISTS `cat_tipo_tarjeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_tipo_tarjeta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(10) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_tipo_tarjeta`
--

LOCK TABLES `cat_tipo_tarjeta` WRITE;
/*!40000 ALTER TABLE `cat_tipo_tarjeta` DISABLE KEYS */;
INSERT INTO `cat_tipo_tarjeta` VALUES (1,'credito','ACT'),(2,'debito','ACT');
/*!40000 ALTER TABLE `cat_tipo_tarjeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_tipo_tel`
--

DROP TABLE IF EXISTS `cat_tipo_tel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_tipo_tel` (
  `id_tipo_tel` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(40) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_tipo_tel`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_tipo_tel`
--

LOCK TABLES `cat_tipo_tel` WRITE;
/*!40000 ALTER TABLE `cat_tipo_tel` DISABLE KEYS */;
INSERT INTO `cat_tipo_tel` VALUES (1,'Fijo','ACT'),(2,'Móvil','ACT');
/*!40000 ALTER TABLE `cat_tipo_tel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_tipo_usuario`
--

DROP TABLE IF EXISTS `cat_tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_tipo_usuario`
--

LOCK TABLES `cat_tipo_usuario` WRITE;
/*!40000 ALTER TABLE `cat_tipo_usuario` DISABLE KEYS */;
INSERT INTO `cat_tipo_usuario` VALUES (1,'Direccion General','ACT'),(2,'Afiliado','ACT'),(3,'Soporte Tecnico','ACT'),(4,'Comercial','ACT'),(5,'Logistica','ACT'),(6,'Oficina Virtual','ACT'),(7,'Administracion y Contabilidad','ACT'),(8,'CEDI','ACT'),(9,'Almacen','ACT'),(10,'Cliente VIP','ACT');
/*!40000 ALTER TABLE `cat_tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_titulo`
--

DROP TABLE IF EXISTS `cat_titulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_titulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orden` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` text NOT NULL,
  `frecuencia` varchar(4) NOT NULL DEFAULT 'MES',
  `tipo` varchar(10) NOT NULL DEFAULT 'PUNTOSP',
  `condicion_red_afilacion` varchar(4) NOT NULL DEFAULT 'EQU',
  `porcentaje` float NOT NULL DEFAULT '0',
  `valor` float NOT NULL DEFAULT '0',
  `ganancia` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_titulo`
--

LOCK TABLES `cat_titulo` WRITE;
/*!40000 ALTER TABLE `cat_titulo` DISABLE KEYS */;
INSERT INTO `cat_titulo` VALUES (1,1,'ninguno','ninguno','MES','PUNTOSP','EQU',0,0,0);
/*!40000 ALTER TABLE `cat_titulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_usuario_fiscal`
--

DROP TABLE IF EXISTS `cat_usuario_fiscal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_usuario_fiscal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_usuario_fiscal`
--

LOCK TABLES `cat_usuario_fiscal` WRITE;
/*!40000 ALTER TABLE `cat_usuario_fiscal` DISABLE KEYS */;
INSERT INTO `cat_usuario_fiscal` VALUES (1,'Fisica','ACT'),(2,'Moral','ACT');
/*!40000 ALTER TABLE `cat_usuario_fiscal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_zona`
--

DROP TABLE IF EXISTS `cat_zona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_zona` (
  `id_zona` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(25) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_zona`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_zona`
--

LOCK TABLES `cat_zona` WRITE;
/*!40000 ALTER TABLE `cat_zona` DISABLE KEYS */;
INSERT INTO `cat_zona` VALUES (1,'Norte','ACT'),(2,'Sur','ACT'),(3,'Este','ACT'),(4,'Oeste','ACT');
/*!40000 ALTER TABLE `cat_zona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cedi`
--

DROP TABLE IF EXISTS `cedi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cedi` (
  `id_cedi` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estatus` varchar(3) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `codigo_postal` char(10) DEFAULT NULL,
  PRIMARY KEY (`id_cedi`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cedi`
--

LOCK TABLES `cedi` WRITE;
/*!40000 ALTER TABLE `cedi` DISABLE KEYS */;
INSERT INTO `cedi` VALUES (1,'tierra santa','tierra santa','9076','ebenezer','8676533','2016-09-28 23:14:42','ACT','A','252211'),(2,'supercundi','supercundi','9076','av. panamericana','8463643','2016-09-28 23:14:57','ACT','A','252211'),(3,'mercatodos','mercatodos','9076','calle 6','8458677','2016-09-28 23:09:19','ACT','C','252211'),(4,'melaos','sport','9076','camellon 8','8465454','2016-09-28 23:11:10','ACT','C','252211');
/*!40000 ALTER TABLE `cedi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coaplicante`
--

DROP TABLE IF EXISTS `coaplicante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coaplicante` (
  `id_coaplicante` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `keyword` varchar(20) NOT NULL,
  PRIMARY KEY (`id_coaplicante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coaplicante`
--

LOCK TABLES `coaplicante` WRITE;
/*!40000 ALTER TABLE `coaplicante` DISABLE KEYS */;
/*!40000 ALTER TABLE `coaplicante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cobro`
--

DROP TABLE IF EXISTS `cobro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cobro` (
  `id_cobro` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_metodo` int(11) NOT NULL,
  `id_estatus` int(11) NOT NULL,
  `monto` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_pago` date NOT NULL,
  `cuenta` int(20) NOT NULL,
  `titular` varchar(200) NOT NULL,
  `banco` varchar(100) NOT NULL,
  `clabe` int(11) NOT NULL,
  `swift` varchar(35) DEFAULT NULL,
  `pais` varchar(3) DEFAULT 'COL',
  `otro` varchar(35) DEFAULT NULL,
  `postal` int(11) DEFAULT '0',
  PRIMARY KEY (`id_cobro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cobro`
--

LOCK TABLES `cobro` WRITE;
/*!40000 ALTER TABLE `cobro` DISABLE KEYS */;
/*!40000 ALTER TABLE `cobro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `combinado`
--

DROP TABLE IF EXISTS `combinado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `combinado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `descuento` decimal(10,2) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  `id_red` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `combinado`
--

LOCK TABLES `combinado` WRITE;
/*!40000 ALTER TABLE `combinado` DISABLE KEYS */;
/*!40000 ALTER TABLE `combinado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentario`
--

DROP TABLE IF EXISTS `comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` text NOT NULL,
  `autor` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_video` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario`
--

LOCK TABLES `comentario` WRITE;
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentario_video_soporte_tecnico`
--

DROP TABLE IF EXISTS `comentario_video_soporte_tecnico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentario_video_soporte_tecnico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` text NOT NULL,
  `autor` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_video` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario_video_soporte_tecnico`
--

LOCK TABLES `comentario_video_soporte_tecnico` WRITE;
/*!40000 ALTER TABLE `comentario_video_soporte_tecnico` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentario_video_soporte_tecnico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comercializacion`
--

DROP TABLE IF EXISTS `comercializacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comercializacion` (
  `mercancia` int(11) NOT NULL,
  `canal` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comercializacion`
--

LOCK TABLES `comercializacion` WRITE;
/*!40000 ALTER TABLE `comercializacion` DISABLE KEYS */;
INSERT INTO `comercializacion` VALUES (1,1),(1,2),(2,1),(2,2);
/*!40000 ALTER TABLE `comercializacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cometchat`
--

DROP TABLE IF EXISTS `cometchat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cometchat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` int(10) unsigned NOT NULL,
  `to` int(10) unsigned NOT NULL,
  `message` text NOT NULL,
  `sent` int(10) unsigned NOT NULL DEFAULT '0',
  `read` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `direction` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `to` (`to`),
  KEY `from` (`from`),
  KEY `direction` (`direction`),
  KEY `read` (`read`),
  KEY `sent` (`sent`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cometchat`
--

LOCK TABLES `cometchat` WRITE;
/*!40000 ALTER TABLE `cometchat` DISABLE KEYS */;
INSERT INTO `cometchat` VALUES (1,2,172,'oye mi perro',1436559719,1,0),(2,2,172,'donde anda',1436559743,1,0),(3,161,2,'donde anda',1436560069,1,0),(4,161,172,'brevas',1436560076,1,0),(5,2,172,'brevas',1436560102,1,0),(6,2,161,'que dice mi perro',1436560136,1,0),(7,161,2,'brevas',1436560285,1,0),(8,2,161,'que dice el tino',1436560305,1,0),(9,172,2,'entonces',1436560336,1,0),(10,172,161,'que dice el tino',1436560344,1,0),(11,161,172,'nada mi perro',1436560352,1,0),(12,161,2,'wqert',1436560360,1,0),(13,57,2,'q mas',1436562116,1,0),(14,2,57,'que dice mi perro',1436562126,1,0),(15,57,2,'no marica aqui jodiendo con un puto chat',1436562141,1,0),(16,2,57,'te ha enviado un archivo<br/><a href=\"//oficina.pekcellgold.com/cometchat/plugins/filetransfer/download.php?file=images.jpeg\" target=\"_blank\"><a class=\"imagemessage\" href=\"//oficina.pekcellgold.com/cometchat/plugins/filetransfer/download.php?file=images.jpeg\" onClick=\"javascript:jqcc(\'div.cometchat_other > a\')[0].click();return false;\" target=\"none\" imageheight=\"193\" imagewidth=\"261\"><img class=\"file_image\" type=\"image\" src=\"/cometchat/plugins/filetransfer/uploads/06bb5650953df8a4f0c15c4bbf19fdba\" style=\"height:70px;\"/></a></a>',1436562143,1,1),(17,2,57,'ha enviado un archivo con éxito<br/><a href=\"//oficina.pekcellgold.com/cometchat/plugins/filetransfer/download.php?file=images.jpeg\" target=\"_blank\"><a class=\"imagemessage\" href=\"//oficina.pekcellgold.com/cometchat/plugins/filetransfer/download.php?file=images.jpeg\" onClick=\"javascript:jqcc(\'div.cometchat_other > a\')[0].click();return false;\" target=\"none\"  imageheight=\"193\" imagewidth=\"261\"><img class=\"file_image\" type=\"image\" src=\"/cometchat/plugins/filetransfer/uploads/06bb5650953df8a4f0c15c4bbf19fdba\" style=\"height:70px;\"/></a></a>',1436562144,1,2),(18,2,57,'<img class=\"cometchat_smiley\" height=\"20\" width=\"20\" src=\"/cometchat/images/smileys/trollface.png\" title=\"Trollface\">',1436562248,1,0),(19,57,2,'te ha invitado a unirte a una sala de chat. <a href=\"javascript:jqcc.cometchat.joinChatroom(\'1\',\'da39a3ee5e6b4b0d3255bfef95601890afd80709\',\'U29wb3J0ZSBUZWNuaWNv\')\">Clic aquí para unirte</a>',1436562281,1,1),(20,57,7,'te ha invitado a unirte a una sala de chat. <a href=\"javascript:jqcc.cometchat.joinChatroom(\'1\',\'da39a3ee5e6b4b0d3255bfef95601890afd80709\',\'U29wb3J0ZSBUZWNuaWNv\')\">Clic aquí para unirte</a>',1436564047,0,1),(21,57,2,'te ha invitado a unirte a una sala de chat. <a href=\"javascript:jqcc.cometchat.joinChatroom(\'1\',\'da39a3ee5e6b4b0d3255bfef95601890afd80709\',\'U29wb3J0ZSBUZWNuaWNv\')\">Clic aquí para unirte</a>',1436564048,1,1),(22,57,172,'te ha invitado a unirte a una sala de chat. <a href=\"javascript:jqcc.cometchat.joinChatroom(\'1\',\'da39a3ee5e6b4b0d3255bfef95601890afd80709\',\'U29wb3J0ZSBUZWNuaWNv\')\">Clic aquí para unirte</a>',1436564048,0,1),(23,2,4,'hhh',1438439871,1,0),(24,4,2,'d',1438441856,1,0),(25,4,3,'KK',1438443845,1,0),(26,101,100,'oye mi perro',1452211457,1,0),(27,90,101,'que dice el viejo cristian',1452212550,1,0),(28,101,90,'Nada',1452212601,1,0),(29,100,101,'vientos o mareas',1452212843,1,0),(30,90,101,'brevas mi perro',1452212852,1,0),(31,101,100,'vientos y mareas',1452212865,1,0),(32,101,90,'jj',1452212878,1,0),(33,2,100,'entonces',1452212889,1,0),(34,2,101,'Que mas',1452272025,1,0),(35,101,2,'te ha enviado un archivo<br/><a href=\"//erp.multinivel/cometchat/plugins/filetransfer/download.php?file=stockvaultbancoimagenesgratis.jpg\" target=\"_blank\"><a class=\"imagemessage\" href=\"//erp.multinivel/cometchat/plugins/filetransfer/download.php?file=stockvaultbancoimagenesgratis.jpg\" onClick=\"javascript:jqcc(\'div.cometchat_other > a\')[0].click();return false;\" target=\"none\" imageheight=\"290\" imagewidth=\"759\"><img class=\"file_image\" type=\"image\" src=\"/cometchat/plugins/filetransfer/uploads/1afba3aa8f29c09761509420acc28f54\" style=\"height:70px;\"/></a></a>',1452285466,1,1),(36,101,2,'ha enviado un archivo con éxito<br/><a href=\"//erp.multinivel/cometchat/plugins/filetransfer/download.php?file=stockvaultbancoimagenesgratis.jpg\" target=\"_blank\"><a class=\"imagemessage\" href=\"//erp.multinivel/cometchat/plugins/filetransfer/download.php?file=stockvaultbancoimagenesgratis.jpg\" onClick=\"javascript:jqcc(\'div.cometchat_other > a\')[0].click();return false;\" target=\"none\"  imageheight=\"290\" imagewidth=\"759\"><img class=\"file_image\" type=\"image\" src=\"/cometchat/plugins/filetransfer/uploads/1afba3aa8f29c09761509420acc28f54\" style=\"height:70px;\"/></a></a>',1452285467,1,2),(37,102,2,'<img class=\"cometchat_smiley\" height=\"20\" width=\"20\" src=\"/cometchat/images/smileys/floppy_disk.png\" title=\"Floppy_disk\">',1452287126,1,0),(38,103,2,'giovanny',1452300262,1,0);
/*!40000 ALTER TABLE `cometchat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cometchat_announcements`
--

DROP TABLE IF EXISTS `cometchat_announcements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cometchat_announcements` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `announcement` text NOT NULL,
  `time` int(10) unsigned NOT NULL,
  `to` int(10) NOT NULL,
  `recd` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `to` (`to`),
  KEY `time` (`time`),
  KEY `to_id` (`to`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cometchat_announcements`
--

LOCK TABLES `cometchat_announcements` WRITE;
/*!40000 ALTER TABLE `cometchat_announcements` DISABLE KEYS */;
/*!40000 ALTER TABLE `cometchat_announcements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cometchat_block`
--

DROP TABLE IF EXISTS `cometchat_block`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cometchat_block` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fromid` int(10) unsigned NOT NULL,
  `toid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fromid` (`fromid`),
  KEY `toid` (`toid`),
  KEY `fromid_toid` (`fromid`,`toid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cometchat_block`
--

LOCK TABLES `cometchat_block` WRITE;
/*!40000 ALTER TABLE `cometchat_block` DISABLE KEYS */;
/*!40000 ALTER TABLE `cometchat_block` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cometchat_chatroommessages`
--

DROP TABLE IF EXISTS `cometchat_chatroommessages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cometchat_chatroommessages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(10) unsigned NOT NULL,
  `chatroomid` int(10) unsigned NOT NULL,
  `message` text NOT NULL,
  `sent` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `chatroomid` (`chatroomid`),
  KEY `sent` (`sent`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cometchat_chatroommessages`
--

LOCK TABLES `cometchat_chatroommessages` WRITE;
/*!40000 ALTER TABLE `cometchat_chatroommessages` DISABLE KEYS */;
INSERT INTO `cometchat_chatroommessages` VALUES (1,2,1,'entonces',1436562297),(2,57,1,'Aqui te dare ayuda con cualquier problema que encuentres',1436562322),(3,172,1,'entonces',1436562339),(4,57,1,'hola mi amor',1436562355),(5,2,1,'que falta de seriedad ome',1436562373),(6,57,1,'jajajajaja',1436562384),(7,161,1,'que falta de respeto',1436562410),(8,57,1,'ya me corompieron la sala de soporte',1436562445),(9,161,1,'<span style=\"color:#FFA000\">que ome</span>',1436562457),(10,18,2,'dwdawdawd',1443623572),(11,19,2,'ASASASAs',1443623581),(12,18,2,'sadsdasdasd',1443623597),(13,18,2,'ha iniciado una conversación en video. <a token =\'\' href=\'javascript:void(0);\' onclick=\"javascript:jqcc.ccavchat.join(\'2\');\">Clic aquí para unirte a la conversación.</a> ',1443623600),(14,19,2,'ha iniciado una conversación en video. <a token =\'\' href=\'javascript:void(0);\' onclick=\"javascript:jqcc.ccavchat.join(\'2\');\">Clic aquí para unirte a la conversación.</a> ',1443623621),(15,18,2,'NetSoft12345@NetSoft12345@',1443623676),(16,21,2,'ha iniciado una conversación en video. <a token =\'\' href=\'javascript:void(0);\' onclick=\"javascript:jqcc.ccavchat.join(\'2\');\">Clic aquí para unirte a la conversación.</a> ',1443623685),(17,21,2,'ha iniciado una conversación en video. <a token =\'\' href=\'javascript:void(0);\' onclick=\"javascript:jqcc.ccavchat.join(\'2\');\">Clic aquí para unirte a la conversación.</a> ',1443623771),(18,21,3,'hoa',1445702558),(19,2,3,'fdgdfg',1445702559),(20,2,3,'hkho',1445702593),(21,101,3,'123123',1452210735),(22,101,3,'ha iniciado una conversación en video. <a token =\'\' href=\'javascript:void(0);\' onclick=\"javascript:jqcc.ccavchat.join(\'3\');\">Clic aquí para unirte a la conversación.</a> ',1452210788),(23,2,3,'adjadj',1455767143);
/*!40000 ALTER TABLE `cometchat_chatroommessages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cometchat_chatrooms`
--

DROP TABLE IF EXISTS `cometchat_chatrooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cometchat_chatrooms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `lastactivity` int(10) unsigned NOT NULL,
  `createdby` int(10) unsigned NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `vidsession` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lastactivity` (`lastactivity`),
  KEY `createdby` (`createdby`),
  KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cometchat_chatrooms`
--

LOCK TABLES `cometchat_chatrooms` WRITE;
/*!40000 ALTER TABLE `cometchat_chatrooms` DISABLE KEYS */;
INSERT INTO `cometchat_chatrooms` VALUES (1,'Soporte Tecnico',1436562458,57,'',0,NULL),(2,'diego',1443623773,19,'',0,NULL),(3,'hh',1455767144,2,'',0,NULL);
/*!40000 ALTER TABLE `cometchat_chatrooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cometchat_chatrooms_users`
--

DROP TABLE IF EXISTS `cometchat_chatrooms_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cometchat_chatrooms_users` (
  `userid` int(10) unsigned NOT NULL,
  `chatroomid` int(10) unsigned NOT NULL,
  `lastactivity` int(10) unsigned NOT NULL,
  `isbanned` int(1) DEFAULT '0',
  PRIMARY KEY (`userid`,`chatroomid`) USING BTREE,
  KEY `chatroomid` (`chatroomid`),
  KEY `lastactivity` (`lastactivity`),
  KEY `userid` (`userid`),
  KEY `userid_chatroomid` (`chatroomid`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cometchat_chatrooms_users`
--

LOCK TABLES `cometchat_chatrooms_users` WRITE;
/*!40000 ALTER TABLE `cometchat_chatrooms_users` DISABLE KEYS */;
INSERT INTO `cometchat_chatrooms_users` VALUES (2,3,1455767149,0),(18,2,1443623853,0),(19,2,1443623854,0),(21,3,1445702584,0),(57,1,1436565902,0),(101,3,1452211528,0),(161,1,1436562659,0),(172,1,1436562800,0),(10000001,3,1452210691,0);
/*!40000 ALTER TABLE `cometchat_chatrooms_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cometchat_comethistory`
--

DROP TABLE IF EXISTS `cometchat_comethistory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cometchat_comethistory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `channel` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `sent` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `channel` (`channel`),
  KEY `sent` (`sent`),
  KEY `channel_sent` (`channel`,`sent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cometchat_comethistory`
--

LOCK TABLES `cometchat_comethistory` WRITE;
/*!40000 ALTER TABLE `cometchat_comethistory` DISABLE KEYS */;
/*!40000 ALTER TABLE `cometchat_comethistory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cometchat_guests`
--

DROP TABLE IF EXISTS `cometchat_guests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cometchat_guests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `lastactivity` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lastactivity` (`lastactivity`)
) ENGINE=InnoDB AUTO_INCREMENT=10000002 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cometchat_guests`
--

LOCK TABLES `cometchat_guests` WRITE;
/*!40000 ALTER TABLE `cometchat_guests` DISABLE KEYS */;
INSERT INTO `cometchat_guests` VALUES (57,'Edix',2120),(10000000,'guest-10000000',0),(10000001,'50034',1452207926);
/*!40000 ALTER TABLE `cometchat_guests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cometchat_messages_old`
--

DROP TABLE IF EXISTS `cometchat_messages_old`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cometchat_messages_old` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` int(10) unsigned NOT NULL,
  `to` int(10) unsigned NOT NULL,
  `message` text NOT NULL,
  `sent` int(10) unsigned NOT NULL DEFAULT '0',
  `read` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `direction` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `to` (`to`),
  KEY `from` (`from`),
  KEY `direction` (`direction`),
  KEY `read` (`read`),
  KEY `sent` (`sent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cometchat_messages_old`
--

LOCK TABLES `cometchat_messages_old` WRITE;
/*!40000 ALTER TABLE `cometchat_messages_old` DISABLE KEYS */;
/*!40000 ALTER TABLE `cometchat_messages_old` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cometchat_status`
--

DROP TABLE IF EXISTS `cometchat_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cometchat_status` (
  `userid` int(10) unsigned NOT NULL,
  `message` text,
  `status` enum('available','away','busy','invisible','offline') DEFAULT NULL,
  `typingto` int(10) unsigned DEFAULT NULL,
  `typingtime` int(10) unsigned DEFAULT NULL,
  `isdevice` int(1) unsigned NOT NULL DEFAULT '0',
  `lastactivity` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`userid`),
  KEY `typingto` (`typingto`),
  KEY `typingtime` (`typingtime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cometchat_status`
--

LOCK TABLES `cometchat_status` WRITE;
/*!40000 ALTER TABLE `cometchat_status` DISABLE KEYS */;
INSERT INTO `cometchat_status` VALUES (2,NULL,'available',NULL,NULL,1,1455855327),(3,NULL,'away',NULL,NULL,0,1438445135),(4,NULL,'away',NULL,NULL,0,1438445096),(7,NULL,'available',NULL,NULL,1,1422044968),(18,NULL,'away',NULL,NULL,0,1443624749),(19,NULL,'available',NULL,NULL,0,1443625663),(21,NULL,'away',NULL,NULL,0,1445708744),(23,NULL,NULL,NULL,NULL,0,1443625353),(51,NULL,NULL,NULL,NULL,0,1445702756),(57,NULL,'available',NULL,NULL,1,1436565888),(90,NULL,NULL,NULL,NULL,0,1452213027),(100,NULL,'away',NULL,NULL,0,1452213401),(101,NULL,'available',NULL,NULL,0,1452300230),(102,NULL,'available',NULL,NULL,0,1452288616),(103,NULL,'available',NULL,NULL,0,1452300811),(104,NULL,'available',NULL,NULL,0,1452300181),(109,NULL,NULL,NULL,NULL,0,1453306792),(161,NULL,'',NULL,NULL,1,1436562648),(172,NULL,'',NULL,NULL,1,1436562779);
/*!40000 ALTER TABLE `cometchat_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comision`
--

DROP TABLE IF EXISTS `comision`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comision` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_venta` int(11) NOT NULL,
  `id_afiliado` varchar(45) NOT NULL,
  `id_red` int(11) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `puntos` varchar(45) NOT NULL,
  `valor` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comision`
--

LOCK TABLES `comision` WRITE;
/*!40000 ALTER TABLE `comision` DISABLE KEYS */;
/*!40000 ALTER TABLE `comision` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comisionPuntosRemanentes`
--

DROP TABLE IF EXISTS `comisionPuntosRemanentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comisionPuntosRemanentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_bono` int(11) NOT NULL,
  `id_bono_historial` int(11) NOT NULL,
  `total` int(11) NOT NULL DEFAULT '0',
  `id_pata` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comisionPuntosRemanentes`
--

LOCK TABLES `comisionPuntosRemanentes` WRITE;
/*!40000 ALTER TABLE `comisionPuntosRemanentes` DISABLE KEYS */;
/*!40000 ALTER TABLE `comisionPuntosRemanentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comision_bono`
--

DROP TABLE IF EXISTS `comision_bono`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comision_bono` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_bono` int(11) NOT NULL,
  `id_bono_historial` int(11) NOT NULL,
  `valor` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comision_bono`
--

LOCK TABLES `comision_bono` WRITE;
/*!40000 ALTER TABLE `comision_bono` DISABLE KEYS */;
/*!40000 ALTER TABLE `comision_bono` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comision_bono_historial`
--

DROP TABLE IF EXISTS `comision_bono_historial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comision_bono_historial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bono` int(11) NOT NULL,
  `dia` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comision_bono_historial`
--

LOCK TABLES `comision_bono_historial` WRITE;
/*!40000 ALTER TABLE `comision_bono_historial` DISABLE KEYS */;
/*!40000 ALTER TABLE `comision_bono_historial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comision_web_personal`
--

DROP TABLE IF EXISTS `comision_web_personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comision_web_personal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_afiliado` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_comprador` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comision_web_personal`
--

LOCK TABLES `comision_web_personal` WRITE;
/*!40000 ALTER TABLE `comision_web_personal` DISABLE KEYS */;
/*!40000 ALTER TABLE `comision_web_personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compartir`
--

DROP TABLE IF EXISTS `compartir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compartir` (
  `id_archivero` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estatus` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compartir`
--

LOCK TABLES `compartir` WRITE;
/*!40000 ALTER TABLE `compartir` DISABLE KEYS */;
/*!40000 ALTER TABLE `compartir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comprador`
--

DROP TABLE IF EXISTS `comprador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comprador` (
  `dni` int(11) NOT NULL,
  `nombre` text,
  `apellido` text,
  `id_pais` varchar(3) DEFAULT NULL,
  `estado` text,
  `municipio` text,
  `colonia` text,
  `direccion` text,
  `email` text,
  `telefono` text,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comprador`
--

LOCK TABLES `comprador` WRITE;
/*!40000 ALTER TABLE `comprador` DISABLE KEYS */;
/*!40000 ALTER TABLE `comprador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compras_reportes`
--

DROP TABLE IF EXISTS `compras_reportes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compras_reportes` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado actual` tinyint(1) NOT NULL,
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `producto` varchar(30) NOT NULL,
  `fecha_venta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `precio` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras_reportes`
--

LOCK TABLES `compras_reportes` WRITE;
/*!40000 ALTER TABLE `compras_reportes` DISABLE KEYS */;
/*!40000 ALTER TABLE `compras_reportes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compropago`
--

DROP TABLE IF EXISTS `compropago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compropago` (
  `email` varchar(100) NOT NULL DEFAULT 'you@domain.com',
  `pk_test` varchar(255) DEFAULT 'pk_test',
  `sk_test` varchar(255) DEFAULT 'sk_test',
  `pk_live` varchar(255) DEFAULT 'pk_live',
  `sk_live` varchar(255) DEFAULT 'sk_live',
  `moneda` varchar(45) NOT NULL DEFAULT 'MXN',
  `test` int(11) NOT NULL DEFAULT '1',
  `estatus` varchar(3) NOT NULL DEFAULT 'DES',
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compropago`
--

LOCK TABLES `compropago` WRITE;
/*!40000 ALTER TABLE `compropago` DISABLE KEYS */;
INSERT INTO `compropago` VALUES ('dev@networksoft.mx','pk_test_86300652249404673b','sk_test_67a4702492064ed4b7','pk_live_445924905b8a4a0651','sk_live_928023cd8249248176','MXN',1,'ACT');
/*!40000 ALTER TABLE `compropago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_autocompra_mercancia`
--

DROP TABLE IF EXISTS `cross_autocompra_mercancia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_autocompra_mercancia` (
  `id_autocompra` int(11) NOT NULL,
  `id_mercancia` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_autocompra_mercancia`
--

LOCK TABLES `cross_autocompra_mercancia` WRITE;
/*!40000 ALTER TABLE `cross_autocompra_mercancia` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_autocompra_mercancia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_combinado`
--

DROP TABLE IF EXISTS `cross_combinado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_combinado` (
  `id_combinado` int(11) NOT NULL,
  `id_mercancia` int(11) DEFAULT NULL,
  `cantidad` varchar(3) DEFAULT '0',
  `id_red` int(11) DEFAULT '1',
  `id_tipo_mercancia` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_combinado`
--

LOCK TABLES `cross_combinado` WRITE;
/*!40000 ALTER TABLE `cross_combinado` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_combinado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_comprador_venta`
--

DROP TABLE IF EXISTS `cross_comprador_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_comprador_venta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_comprador` int(11) DEFAULT NULL,
  `id_venta` int(11) DEFAULT NULL,
  `id_afiliado` int(11) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_comprador_venta`
--

LOCK TABLES `cross_comprador_venta` WRITE;
/*!40000 ALTER TABLE `cross_comprador_venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_comprador_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_cuenta_user`
--

DROP TABLE IF EXISTS `cross_cuenta_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_cuenta_user` (
  `id_user` int(11) NOT NULL,
  `cuenta` varchar(20) NOT NULL,
  `clabe` varchar(20) NOT NULL,
  `clave_banco` varchar(3) NOT NULL,
  `banco` varchar(250) NOT NULL,
  `estatus` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_cuenta_user`
--

LOCK TABLES `cross_cuenta_user` WRITE;
/*!40000 ALTER TABLE `cross_cuenta_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_cuenta_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_dir_emp`
--

DROP TABLE IF EXISTS `cross_dir_emp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_dir_emp` (
  `id_empresa` int(11) NOT NULL,
  `cp` varchar(7) NOT NULL,
  `calle` varchar(100) NOT NULL,
  `colonia` varchar(100) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `numero_exterior` varchar(5) NOT NULL,
  `numero_interior` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_dir_emp`
--

LOCK TABLES `cross_dir_emp` WRITE;
/*!40000 ALTER TABLE `cross_dir_emp` DISABLE KEYS */;
INSERT INTO `cross_dir_emp` VALUES (1,'252211','manila','fusa','cundinamarca','COL','9','22');
/*!40000 ALTER TABLE `cross_dir_emp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_dir_user`
--

DROP TABLE IF EXISTS `cross_dir_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_dir_user` (
  `id_user` int(11) NOT NULL DEFAULT '0',
  `cp` varchar(10) NOT NULL,
  `calle` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `colonia` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `municipio` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(3) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_dir_user`
--

LOCK TABLES `cross_dir_user` WRITE;
/*!40000 ALTER TABLE `cross_dir_user` DISABLE KEYS */;
INSERT INTO `cross_dir_user` VALUES (2,'sadasd','','','','','COL');
/*!40000 ALTER TABLE `cross_dir_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_grupo_perfil`
--

DROP TABLE IF EXISTS `cross_grupo_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_grupo_perfil` (
  `id_grupo` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_grupo_perfil`
--

LOCK TABLES `cross_grupo_perfil` WRITE;
/*!40000 ALTER TABLE `cross_grupo_perfil` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_grupo_perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_img_archivo`
--

DROP TABLE IF EXISTS `cross_img_archivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_img_archivo` (
  `id_archivo` int(11) NOT NULL,
  `id_img` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_img_archivo`
--

LOCK TABLES `cross_img_archivo` WRITE;
/*!40000 ALTER TABLE `cross_img_archivo` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_img_archivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_img_archivo_soporte_tecnico`
--

DROP TABLE IF EXISTS `cross_img_archivo_soporte_tecnico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_img_archivo_soporte_tecnico` (
  `id_archivo` int(11) NOT NULL,
  `id_img` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_img_archivo_soporte_tecnico`
--

LOCK TABLES `cross_img_archivo_soporte_tecnico` WRITE;
/*!40000 ALTER TABLE `cross_img_archivo_soporte_tecnico` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_img_archivo_soporte_tecnico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_img_promo`
--

DROP TABLE IF EXISTS `cross_img_promo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_img_promo` (
  `id_promo` int(11) NOT NULL,
  `id_img` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_img_promo`
--

LOCK TABLES `cross_img_promo` WRITE;
/*!40000 ALTER TABLE `cross_img_promo` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_img_promo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_img_user`
--

DROP TABLE IF EXISTS `cross_img_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_img_user` (
  `id_user` int(11) NOT NULL,
  `id_img` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_img_user`
--

LOCK TABLES `cross_img_user` WRITE;
/*!40000 ALTER TABLE `cross_img_user` DISABLE KEYS */;
INSERT INTO `cross_img_user` VALUES (2,3);
/*!40000 ALTER TABLE `cross_img_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_inventario_bloqueo`
--

DROP TABLE IF EXISTS `cross_inventario_bloqueo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_inventario_bloqueo` (
  `id_inventario` int(11) NOT NULL,
  `estatus` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_inventario_bloqueo`
--

LOCK TABLES `cross_inventario_bloqueo` WRITE;
/*!40000 ALTER TABLE `cross_inventario_bloqueo` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_inventario_bloqueo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_merc_dist`
--

DROP TABLE IF EXISTS `cross_merc_dist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_merc_dist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mercancia` int(11) NOT NULL,
  `id_distribuidor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_merc_dist`
--

LOCK TABLES `cross_merc_dist` WRITE;
/*!40000 ALTER TABLE `cross_merc_dist` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_merc_dist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_merc_img`
--

DROP TABLE IF EXISTS `cross_merc_img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_merc_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mercancia` int(11) NOT NULL,
  `id_cat_imagen` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_merc_img`
--

LOCK TABLES `cross_merc_img` WRITE;
/*!40000 ALTER TABLE `cross_merc_img` DISABLE KEYS */;
INSERT INTO `cross_merc_img` VALUES (1,1,645),(2,2,646);
/*!40000 ALTER TABLE `cross_merc_img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_merc_impuesto`
--

DROP TABLE IF EXISTS `cross_merc_impuesto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_merc_impuesto` (
  `id_mercancia` int(11) NOT NULL,
  `id_impuesto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_merc_impuesto`
--

LOCK TABLES `cross_merc_impuesto` WRITE;
/*!40000 ALTER TABLE `cross_merc_impuesto` DISABLE KEYS */;
INSERT INTO `cross_merc_impuesto` VALUES (1,2),(2,2);
/*!40000 ALTER TABLE `cross_merc_impuesto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_pack_merc`
--

DROP TABLE IF EXISTS `cross_pack_merc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_pack_merc` (
  `id_paquete` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad_producto` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `cantidad_servicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_pack_merc`
--

LOCK TABLES `cross_pack_merc` WRITE;
/*!40000 ALTER TABLE `cross_pack_merc` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_pack_merc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_paquete`
--

DROP TABLE IF EXISTS `cross_paquete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_paquete` (
  `id_paquete` int(11) NOT NULL,
  `id_mercancia` int(11) DEFAULT NULL,
  `cantidad` varchar(3) DEFAULT '0',
  `id_red` int(11) DEFAULT '1',
  `id_tipo_mercancia` varchar(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_paquete`
--

LOCK TABLES `cross_paquete` WRITE;
/*!40000 ALTER TABLE `cross_paquete` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_paquete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_perfil_usuario`
--

DROP TABLE IF EXISTS `cross_perfil_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_perfil_usuario` (
  `id_user` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_perfil_usuario`
--

LOCK TABLES `cross_perfil_usuario` WRITE;
/*!40000 ALTER TABLE `cross_perfil_usuario` DISABLE KEYS */;
INSERT INTO `cross_perfil_usuario` VALUES (1,1),(2,2);
/*!40000 ALTER TABLE `cross_perfil_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_permiso_perfil`
--

DROP TABLE IF EXISTS `cross_permiso_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_permiso_perfil` (
  `id_permiso` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  PRIMARY KEY (`id_permiso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_permiso_perfil`
--

LOCK TABLES `cross_permiso_perfil` WRITE;
/*!40000 ALTER TABLE `cross_permiso_perfil` DISABLE KEYS */;
INSERT INTO `cross_permiso_perfil` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,2),(7,2),(8,2),(9,2),(10,2),(11,2),(12,2),(13,2),(14,2),(15,2),(16,2),(17,2),(18,2),(19,2),(20,2),(21,2),(22,2),(23,2),(24,2),(25,2),(26,2),(27,2),(28,2),(29,2),(30,2),(31,2),(32,2),(33,2),(34,2);
/*!40000 ALTER TABLE `cross_permiso_perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_plan_bonos`
--

DROP TABLE IF EXISTS `cross_plan_bonos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_plan_bonos` (
  `id_plan` int(11) NOT NULL,
  `id_bono` int(11) NOT NULL,
  `order` int(11) DEFAULT '1',
  PRIMARY KEY (`id_plan`,`id_bono`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_plan_bonos`
--

LOCK TABLES `cross_plan_bonos` WRITE;
/*!40000 ALTER TABLE `cross_plan_bonos` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_plan_bonos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_premio_usuario`
--

DROP TABLE IF EXISTS `cross_premio_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_premio_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_premio` int(11) NOT NULL,
  `id_afiliado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` varchar(20) DEFAULT 'Pendiente',
  `fecha_entrega` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_premio_usuario`
--

LOCK TABLES `cross_premio_usuario` WRITE;
/*!40000 ALTER TABLE `cross_premio_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_premio_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_rango_tipos`
--

DROP TABLE IF EXISTS `cross_rango_tipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_rango_tipos` (
  `id_rango` int(11) NOT NULL,
  `id_tipo_rango` int(11) NOT NULL,
  `valor` int(11) NOT NULL DEFAULT '0',
  `condicion_red` varchar(10) NOT NULL DEFAULT 'DIRECTOS',
  `nivel_red` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_rango`,`id_tipo_rango`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_rango_tipos`
--

LOCK TABLES `cross_rango_tipos` WRITE;
/*!40000 ALTER TABLE `cross_rango_tipos` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_rango_tipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_rango_user`
--

DROP TABLE IF EXISTS `cross_rango_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_rango_user` (
  `id_user` int(11) NOT NULL,
  `id_rango` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entregado` tinyint(1) NOT NULL,
  `estatus` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_rango_user`
--

LOCK TABLES `cross_rango_user` WRITE;
/*!40000 ALTER TABLE `cross_rango_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_rango_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_surtido_embarque`
--

DROP TABLE IF EXISTS `cross_surtido_embarque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_surtido_embarque` (
  `id_surtido` int(11) NOT NULL,
  `id_embarque` int(11) NOT NULL,
  PRIMARY KEY (`id_surtido`,`id_embarque`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_surtido_embarque`
--

LOCK TABLES `cross_surtido_embarque` WRITE;
/*!40000 ALTER TABLE `cross_surtido_embarque` DISABLE KEYS */;
INSERT INTO `cross_surtido_embarque` VALUES (1,1);
/*!40000 ALTER TABLE `cross_surtido_embarque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_tel_user`
--

DROP TABLE IF EXISTS `cross_tel_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_tel_user` (
  `id_user` int(11) NOT NULL,
  `id_tipo_tel` int(11) NOT NULL,
  `numero` varchar(22) NOT NULL,
  `estatus` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_tel_user`
--

LOCK TABLES `cross_tel_user` WRITE;
/*!40000 ALTER TABLE `cross_tel_user` DISABLE KEYS */;
INSERT INTO `cross_tel_user` VALUES (2,1,'','ACT'),(2,2,'','ACT');
/*!40000 ALTER TABLE `cross_tel_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_user_banco`
--

DROP TABLE IF EXISTS `cross_user_banco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_user_banco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT '2',
  `cuenta` varchar(20) NOT NULL DEFAULT 'Your Card',
  `titular` varchar(200) NOT NULL DEFAULT 'You',
  `banco` varchar(100) NOT NULL DEFAULT 'Your Bank',
  `pais` varchar(3) NOT NULL DEFAULT 'COL',
  `swift` varchar(45) DEFAULT NULL,
  `otro` varchar(45) DEFAULT NULL,
  `clabe` int(11) DEFAULT NULL,
  `dir_postal` int(35) DEFAULT NULL,
  `estatus` varchar(3) NOT NULL DEFAULT 'ACT',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_user_banco`
--

LOCK TABLES `cross_user_banco` WRITE;
/*!40000 ALTER TABLE `cross_user_banco` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_user_banco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_usuario_cupon`
--

DROP TABLE IF EXISTS `cross_usuario_cupon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_usuario_cupon` (
  `id_usuario` int(11) NOT NULL,
  `id_cupon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_usuario_cupon`
--

LOCK TABLES `cross_usuario_cupon` WRITE;
/*!40000 ALTER TABLE `cross_usuario_cupon` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_usuario_cupon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_venta_envio`
--

DROP TABLE IF EXISTS `cross_venta_envio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_venta_envio` (
  `id_venta` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `id_pais` varchar(3) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `municipio` varchar(50) NOT NULL,
  `colonia` varchar(50) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `proveedor_mensajeria` varchar(50) DEFAULT NULL,
  `info_ad` text,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_venta_envio`
--

LOCK TABLES `cross_venta_envio` WRITE;
/*!40000 ALTER TABLE `cross_venta_envio` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_venta_envio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_venta_mercancia`
--

DROP TABLE IF EXISTS `cross_venta_mercancia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_venta_mercancia` (
  `id_venta` int(11) NOT NULL,
  `id_mercancia` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `costo_unidad` float NOT NULL,
  `impuesto_unidad` float NOT NULL DEFAULT '0',
  `costo_total` float NOT NULL,
  `nombreImpuesto` varchar(100) NOT NULL DEFAULT '',
  `id_` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_venta_mercancia`
--

LOCK TABLES `cross_venta_mercancia` WRITE;
/*!40000 ALTER TABLE `cross_venta_mercancia` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_venta_mercancia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_video_img`
--

DROP TABLE IF EXISTS `cross_video_img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_video_img` (
  `id_video` int(11) NOT NULL,
  `id_img` int(11) NOT NULL,
  `ruta_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_video_img`
--

LOCK TABLES `cross_video_img` WRITE;
/*!40000 ALTER TABLE `cross_video_img` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_video_img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuenta_pagar_banco_historial`
--

DROP TABLE IF EXISTS `cuenta_pagar_banco_historial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuenta_pagar_banco_historial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_banco` varchar(45) DEFAULT NULL,
  `id_usuario` varchar(45) DEFAULT NULL,
  `id_venta` int(11) DEFAULT NULL,
  `valor` varchar(45) DEFAULT NULL,
  `estatus` varchar(3) NOT NULL DEFAULT 'DES',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuenta_pagar_banco_historial`
--

LOCK TABLES `cuenta_pagar_banco_historial` WRITE;
/*!40000 ALTER TABLE `cuenta_pagar_banco_historial` DISABLE KEYS */;
INSERT INTO `cuenta_pagar_banco_historial` VALUES (1,'2016-09-29 06:03:04','1','2',1,'116','ACT');
/*!40000 ALTER TABLE `cuenta_pagar_banco_historial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cupon`
--

DROP TABLE IF EXISTS `cupon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cupon` (
  `id_cupon` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `estado` varchar(3) NOT NULL,
  `fecha_adicion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_cupon`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cupon`
--

LOCK TABLES `cupon` WRITE;
/*!40000 ALTER TABLE `cupon` DISABLE KEYS */;
/*!40000 ALTER TABLE `cupon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos_generales_soporte_tecnico`
--

DROP TABLE IF EXISTS `datos_generales_soporte_tecnico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos_generales_soporte_tecnico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skype` text,
  `pekey` text,
  `pinkost` text,
  `id_red` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos_generales_soporte_tecnico`
--

LOCK TABLES `datos_generales_soporte_tecnico` WRITE;
/*!40000 ALTER TABLE `datos_generales_soporte_tecnico` DISABLE KEYS */;
/*!40000 ALTER TABLE `datos_generales_soporte_tecnico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distribucion`
--

DROP TABLE IF EXISTS `distribucion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `distribucion` (
  `canal` int(11) NOT NULL,
  `tipo_mercancia` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distribucion`
--

LOCK TABLES `distribucion` WRITE;
/*!40000 ALTER TABLE `distribucion` DISABLE KEYS */;
INSERT INTO `distribucion` VALUES (1,1),(2,1);
/*!40000 ALTER TABLE `distribucion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documento_inventario`
--

DROP TABLE IF EXISTS `documento_inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documento_inventario` (
  `id_doc` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `estatus` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id_doc`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documento_inventario`
--

LOCK TABLES `documento_inventario` WRITE;
/*!40000 ALTER TABLE `documento_inventario` DISABLE KEYS */;
INSERT INTO `documento_inventario` VALUES (2,'Factura','ACT'),(3,'Remision','ACT'),(4,'Consignacion','ACT'),(5,'Traspaso interno','ACT'),(6,'Devoluvion','ACT'),(7,'Donacion','ACT'),(8,'Destruccion','ACT'),(9,'Traspaso externo','ACT');
/*!40000 ALTER TABLE `documento_inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emails_departamentos`
--

DROP TABLE IF EXISTS `emails_departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emails_departamentos` (
  `nombre` text,
  `email` text,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emails_departamentos`
--

LOCK TABLES `emails_departamentos` WRITE;
/*!40000 ALTER TABLE `emails_departamentos` DISABLE KEYS */;
INSERT INTO `emails_departamentos` VALUES ('Pagos','pagos@miempresamultinivel.com',31),('Contacto','contacto@miempresamultinivel.com',32),('','',33),('','',34),('','',35),('','',36),('','',37),('','',38),('','',39),('','',40);
/*!40000 ALTER TABLE `emails_departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `embarque`
--

DROP TABLE IF EXISTS `embarque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `embarque` (
  `id_embarque` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_entrega` date NOT NULL,
  `id_estatus` int(11) NOT NULL,
  `n_guia` text,
  `id_mensajeria` int(11) DEFAULT '0',
  PRIMARY KEY (`id_embarque`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `embarque`
--

LOCK TABLES `embarque` WRITE;
/*!40000 ALTER TABLE `embarque` DISABLE KEYS */;
/*!40000 ALTER TABLE `embarque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `id_razon` varchar(30) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `site` varchar(255) NOT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,'fabrica','1','factory@networksoft.mx','http://networksoft.mx/');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa_multinivel`
--

DROP TABLE IF EXISTS `empresa_multinivel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa_multinivel` (
  `id_tributaria` varchar(15) NOT NULL DEFAULT '000000000-0',
  `nombre` varchar(65) NOT NULL DEFAULT 'NetworkSoft',
  `regimen` int(11) NOT NULL DEFAULT '1',
  `fijo` varchar(22) NOT NULL DEFAULT '000-00-00',
  `movil` varchar(22) NOT NULL DEFAULT '000-000-00-00',
  `direccion` varchar(65) NOT NULL DEFAULT 'Cll 0',
  `web` varchar(100) NOT NULL DEFAULT 'http://www.yourdomain.com',
  `pais` varchar(3) NOT NULL DEFAULT 'AAA',
  `postal` varchar(15) NOT NULL DEFAULT '000000',
  `ciudad` varchar(45) DEFAULT 'No Define',
  `provincia` varchar(45) DEFAULT 'No Define',
  `membresia` varchar(3) DEFAULT 'DES',
  `paquete` varchar(3) DEFAULT 'DES',
  `item` varchar(3) DEFAULT 'DES',
  `banner` int(11) DEFAULT '1',
  `resolucion` varchar(300) NOT NULL,
  `comentarios` varchar(300) NOT NULL,
  `afiliados_directos` int(11) NOT NULL DEFAULT '0',
  `puntos_personales` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_tributaria`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa_multinivel`
--

LOCK TABLES `empresa_multinivel` WRITE;
/*!40000 ALTER TABLE `empresa_multinivel` DISABLE KEYS */;
INSERT INTO `empresa_multinivel` VALUES ('9278986546','Mi empresa',1,'0','0','No define','http://miempresamultinivel.com','COL','No define','No define','No define','DES','DES','DES',0,'','',0,0);
/*!40000 ALTER TABLE `empresa_multinivel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `encuesta`
--

DROP TABLE IF EXISTS `encuesta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `encuesta` (
  `id_encuesta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(140) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_encuesta`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encuesta`
--

LOCK TABLES `encuesta` WRITE;
/*!40000 ALTER TABLE `encuesta` DISABLE KEYS */;
INSERT INTO `encuesta` VALUES (1,'Primera encuesta','Esta encuesta es para conocer su opinion por el diseño de su oficina virtual',1,'2015-01-23 18:45:54','ACT'),(2,'Segunda Encuesta','Esta encuesta es para conocer su opnion respecto al carrito',1,'2015-01-28 16:28:10','ACT'),(4,'Tercera Encuesta','Esta encuesta es para conocer su opinion respecto a lagunas secciones de la oficia virtual',1,'2015-01-28 16:48:31','ACT');
/*!40000 ALTER TABLE `encuesta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `encuesta_contestada`
--

DROP TABLE IF EXISTS `encuesta_contestada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `encuesta_contestada` (
  `id_encuesta_contestada` int(11) NOT NULL AUTO_INCREMENT,
  `id_encuesta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_encuesta_contestada`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encuesta_contestada`
--

LOCK TABLES `encuesta_contestada` WRITE;
/*!40000 ALTER TABLE `encuesta_contestada` DISABLE KEYS */;
INSERT INTO `encuesta_contestada` VALUES (1,1,2,'2015-01-23 18:47:13');
/*!40000 ALTER TABLE `encuesta_contestada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `encuesta_pregunta`
--

DROP TABLE IF EXISTS `encuesta_pregunta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `encuesta_pregunta` (
  `id_pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `id_encuesta` int(11) NOT NULL,
  `pregunta` varchar(140) NOT NULL,
  PRIMARY KEY (`id_pregunta`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encuesta_pregunta`
--

LOCK TABLES `encuesta_pregunta` WRITE;
/*!40000 ALTER TABLE `encuesta_pregunta` DISABLE KEYS */;
INSERT INTO `encuesta_pregunta` VALUES (1,1,'¿Que tan satisfecho esta con el cambio de colores de su oficina?'),(2,1,'¿Que tan satisfecho esta con la distribucion de su oficina?'),(3,1,'¿Que tan satisfecho esta con el clima?'),(4,1,'¿Que tan satisfecho esta con el seguridad del sistema?'),(5,1,'¿Que tan satisfecho esta con el espacio de almacenamiento de su oficina?'),(6,2,'La distribucion de la información en el carrito de compras me parece...'),(7,2,'¿Como calificaria la velocidad con la que se procesa la informacion en el carrito?'),(8,2,'¿Que tan satisfecho esta con la apariencia el carrito?'),(9,2,'¿Se siente con confianza de usar el carrito?'),(10,2,'La forma en la que se procesan los pagos me parece...'),(16,4,'La forma en la que se muestran los videos en la seccion de videos me parece...'),(17,4,'La forma en la que se muestran las noticias en la seccion de noticias me parece...'),(18,4,'La forma en la que se muestran la informacion en la seccion de informacion me parece...'),(19,4,'La forma en la que se muestran los eventos en el calendario en la seccion de eventos me parece...'),(20,4,'La forma en la que se muestra las encuestas para contestarlas me parece...');
/*!40000 ALTER TABLE `encuesta_pregunta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `encuesta_respuesta`
--

DROP TABLE IF EXISTS `encuesta_respuesta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `encuesta_respuesta` (
  `id_respuesta` int(11) NOT NULL AUTO_INCREMENT,
  `id_pregunta` int(11) NOT NULL,
  `respuesta` varchar(140) NOT NULL,
  PRIMARY KEY (`id_respuesta`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encuesta_respuesta`
--

LOCK TABLES `encuesta_respuesta` WRITE;
/*!40000 ALTER TABLE `encuesta_respuesta` DISABLE KEYS */;
INSERT INTO `encuesta_respuesta` VALUES (1,1,'Totalmente insatisfecho'),(2,1,'insatisfecho'),(3,1,'Satisfecho'),(4,1,'Totalmente satisfecho'),(5,1,'Encantado'),(6,2,'Totalmente insatisfecho'),(7,2,'insatisfecho'),(8,2,'Satisfecho'),(9,2,'Totalmente satisfecho'),(10,2,'Encantado'),(11,3,'Totalmente insatisfecho'),(12,3,'insatisfecho'),(13,3,'Satisfecho'),(14,3,'Totalmente satisfecho'),(15,3,'Encantado'),(16,4,'Totalmente insatisfecho'),(17,4,'insatisfecho'),(18,4,'Satisfecho'),(19,4,'Totalmente satisfecho'),(20,4,'Encantado'),(21,5,'Totalmente insatisfecho'),(22,5,'insatisfecho'),(23,5,'Satisfecho'),(24,5,'Totalmente satisfecho'),(25,5,'Encantado'),(26,6,'Muy buena'),(27,6,'Buena'),(28,6,'Regular'),(29,6,'Mala'),(30,6,'Muy mala'),(31,7,'Muy Rapida'),(32,7,'Rapida'),(33,7,'Normal'),(34,7,'Lenta'),(35,7,'Muy Lenta'),(36,8,'Encantado'),(37,8,'Satisfecho'),(38,8,'Ligeramente Satisfecho'),(39,8,'Insatisfecho'),(40,8,'Muy insatisfecho'),(41,9,'Muy confiado'),(42,9,'Confiado'),(43,9,'Ligeramente confiado'),(44,9,'Desconfiado'),(45,9,'Totalmente Desconfiado'),(46,10,'Muy buena'),(47,10,'Buena'),(48,10,'Regular'),(49,10,'Mala'),(50,10,'Muy Mala'),(76,16,'Muy buena'),(77,16,'Buena'),(78,16,'Regular'),(79,16,'Mala'),(80,16,'Muy Mala'),(81,17,'Muy Buena'),(82,17,'Buena'),(83,17,'Regular'),(84,17,'Mala'),(85,17,'Muy mala'),(86,18,'Muy buena'),(87,18,'Buena'),(88,18,'Regular'),(89,18,'Mala'),(90,18,'Muy Mala'),(91,19,'Muy Buena'),(92,19,'Buena'),(93,19,'Regular'),(94,19,'Mala'),(95,19,'Muy Mala'),(96,20,'Muy Buena'),(97,20,'Buena'),(98,20,'Regular'),(99,20,'Mala'),(100,20,'Muy Mala');
/*!40000 ALTER TABLE `encuesta_respuesta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `encuesta_resultado`
--

DROP TABLE IF EXISTS `encuesta_resultado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `encuesta_resultado` (
  `id_encuesta_contestada` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `id_respuesta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encuesta_resultado`
--

LOCK TABLES `encuesta_resultado` WRITE;
/*!40000 ALTER TABLE `encuesta_resultado` DISABLE KEYS */;
INSERT INTO `encuesta_resultado` VALUES (1,1,5),(1,2,10),(1,3,13),(1,4,16),(1,5,25);
/*!40000 ALTER TABLE `encuesta_resultado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estate`
--

DROP TABLE IF EXISTS `estate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) DEFAULT NULL,
  `id_pais` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1427 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estate`
--

LOCK TABLES `estate` WRITE;
/*!40000 ALTER TABLE `estate` DISABLE KEYS */;
INSERT INTO `estate` VALUES (10,'Abhasia [Aphazeti]','GEO'),(11,'Abidjan','CIV'),(12,'Abruzzit','ITA'),(13,'Abu Dhabi','ARE'),(14,'Aceh','IDN'),(15,'Acre','BRA'),(16,'Adana','TUR'),(17,'Addis Abeba','ETH'),(18,'Aden','YEM'),(19,'Adiyaman','TUR'),(20,'Adygea','RUS'),(21,'Adzaria [AtÅ¡ara]','GEO'),(22,'Afyon','TUR'),(23,'Aguascalientes','MEX'),(24,'Ahal','TKM'),(25,'Aichi','JPN'),(26,'Ajman','ARE'),(27,'Akershus','NOR'),(28,'Akita','JPN'),(29,'Aksaray','TUR'),(30,'al-Anbar','IRQ'),(31,'al-Asima','KWT'),(32,'al-Bahr al-Abyad','SDN'),(33,'al-Bahr al-Ahmar','SDN'),(34,'al-Batina','OMN'),(35,'al-Buhayra','EGY'),(36,'al-Daqahliya','EGY'),(37,'al-Faiyum','EGY'),(38,'al-Gharbiya','EGY'),(39,'al-Hasaka','SYR'),(40,'al-Jazira','SDN'),(41,'al-Khudud al-Samaliy','SAU'),(42,'al-Manama','BHR'),(43,'al-Minufiya','EGY'),(44,'al-Minya','EGY'),(45,'al-Najaf','IRQ'),(46,'al-Qadarif','SDN'),(47,'al-Qadisiya','IRQ'),(48,'al-Qalyubiya','EGY'),(49,'al-Qasim','SAU'),(50,'al-Raqqa','SYR'),(51,'al-Shamal','LBN'),(52,'al-Sharqiya','EGY'),(53,'al-Sharqiya','SAU'),(54,'al-Sulaymaniya','IRQ'),(55,'al-Tamim','IRQ'),(56,'al-Zarqa','JOR'),(57,'al-Zawiya','LBY'),(58,'Alabama','USA'),(59,'Alagoas','BRA'),(60,'Alaska','USA'),(61,'Alberta','CAN'),(62,'Aleksandria','EGY'),(63,'Aleppo','SYR'),(64,'Alger','DZA'),(65,'Almaty','KAZ'),(66,'Almaty Qalasy','KAZ'),(67,'Alsace','FRA'),(68,'Altai','RUS'),(69,'Alto ParanÃ¡','PRY'),(70,'AmapÃ¡','BRA'),(71,'Amazonas','BRA'),(72,'Amhara','ETH'),(73,'Amman','JOR'),(74,'Amur','RUS'),(75,'An Giang','VNM'),(76,'Anambra & Enugu & Eb','NGA'),(77,'Ancash','PER'),(78,'Andalusia','ESP'),(79,'Andhra Pradesh','IND'),(80,'Andijon','UZB'),(81,'Andorra la Vella','AND'),(82,'Anhalt Sachsen','DEU'),(83,'Anhui','CHN'),(84,'Ankara','TUR'),(85,'Annaba','DZA'),(86,'Antalya','TUR'),(87,'Antananarivo','MDG'),(88,'Antioquia','COL'),(89,'Antofagasta','CHL'),(90,'Antwerpen','BEL'),(91,'AnzoÃ¡tegui\n','VEN'),(92,'AnzoÃ¡tegui','VEN'),(93,'Aomori','JPN'),(94,'Apulia','ITA'),(95,'Apure','VEN'),(96,'AqtÃ¶be','KAZ'),(97,'Aqua Grande','STP'),(98,'Aquitaine','FRA'),(99,'Arad','ROM'),(100,'Aragonia','ESP'),(101,'Aragua','VEN'),(102,'Ardebil','IRN'),(103,'Arecibo','PRI'),(104,'Arequipa','PER'),(105,'Arges','ROM'),(106,'Ariana','TUN'),(107,'Arizona','USA'),(108,'Arkangeli','RUS'),(109,'Arkansas','USA'),(110,'ARMM','PHL'),(111,'Arusha','TZA'),(112,'Ashanti','GHA'),(113,'Asir','SAU'),(114,'Assam','IND'),(115,'Assuan','EGY'),(116,'Astana','KAZ'),(117,'Astrahan','RUS'),(118,'Asturia','ESP'),(119,'AsunciÃ³n','PRY'),(120,'Asyut','EGY'),(121,'Atacama','CHL'),(122,'Atacora','BEN'),(123,'Atlantique','BEN'),(124,'Atlantico','COL'),(125,'AtlÃ¡ntida','HND'),(126,'Attika','GRC'),(127,'Atyrau','KAZ'),(128,'Auckland','NZL'),(129,'Auvergne','FRA'),(130,'Ayacucho','PER'),(131,'Aydin','TUR'),(132,'Azuay','ECU'),(133,'â€“','ABW'),(134,'â€“','AIA'),(135,'â€“','CXR'),(136,'â€“','GBR'),(137,'â€“','GIB'),(138,'â€“','GUM'),(139,'â€“','MCO'),(140,'â€“','NCL'),(141,'â€“','NFK'),(142,'â€“','NIU'),(143,'â€“','NRU'),(144,'â€“','PCN'),(145,'â€“','SGP'),(146,'â€“','VAT'),(147,'Ã…rhus','DNK'),(148,'Ã‡orum','TUR'),(149,'ÃŽle-de-France','FRA'),(150,'Ã–rebros lÃ¤n','SWE'),(151,'Ba Ria-Vung Tau','VNM'),(152,'Babil','IRQ'),(153,'Bac Thai','VNM'),(154,'Bacau','ROM'),(155,'Baden-WÃ¼rttemberg','DEU'),(156,'Baghdad','IRQ'),(157,'Bahia','BRA'),(158,'Bahr al-Jabal','SDN'),(159,'Baijeri','DEU'),(160,'Baja California','MEX'),(161,'Baja California Sur','MEX'),(162,'Baki','AZE'),(163,'Balears','ESP'),(164,'Bali','IDN'),(165,'Balikesir','TUR'),(166,'Balkh','AFG'),(167,'Balti','MDA'),(168,'Baluchistan','PAK'),(169,'Bamako','MLI'),(170,'Banaadir','SOM'),(171,'Bandundu','COD'),(172,'Bangkok','THA'),(173,'Bangui','CAF'),(174,'Bani Suwayf','EGY'),(175,'Banjul','GMB'),(176,'Baranya','HUN'),(177,'Barinas','VEN'),(178,'Barisal','BGD'),(179,'Bas-ZaÃ¯re','COD'),(180,'Basel-Stadt','CHE'),(181,'Baskimaa','ESP'),(182,'Basra','IRQ'),(183,'Basse-Normandie','FRA'),(184,'Basse-Terre','GLP'),(185,'Batman','TUR'),(186,'Batna','DZA'),(187,'Battambang','KHM'),(188,'Bauchi & Gombe','NGA'),(189,'BayamÃ³n','PRI'),(190,'BaÅ¡kortostan','RUS'),(191,'BÃ¡cs-Kiskun','HUN'),(192,'BÃ©char','DZA'),(193,'BÃ©jaÃ¯a','DZA'),(194,'BÃ­obÃ­o','CHL'),(195,'Beirut','LBN'),(196,'Belgorod','RUS'),(197,'Belize City','BLZ'),(198,'Bender (TÃ®ghina)','MDA'),(199,'Bengasi','LBY'),(200,'Bengkulu','IDN'),(201,'Benguela','AGO'),(202,'Benue','NGA'),(203,'Berliini','DEU'),(204,'Bern','CHE'),(205,'Bicol','PHL'),(206,'Bihar','IND'),(207,'Bihor','ROM'),(208,'Binh Dinh','VNM'),(209,'Binh Thuan','VNM'),(210,'Bioko','GNQ'),(211,'Biserta','TUN'),(212,'Bishkek shaary','KGZ'),(213,'Biskra','DZA'),(214,'Bissau','GNB'),(215,'Blantyre','MWI'),(216,'Blida','DZA'),(217,'Bolivar','COL'),(218,'BolÃ­var','VEN'),(219,'Borgou','BEN'),(220,'Borno & Yobe','NGA'),(221,'Borsod-AbaÃºj-ZemplÃ','HUN'),(222,'Botosani','ROM'),(223,'BouakÃ©','CIV'),(224,'BoulkiemdÃ©','BFA'),(225,'Bourgogne','FRA'),(226,'Boyaca','COL'),(227,'Braga','PRT'),(228,'Braila','ROM'),(229,'Brandenburg','DEU'),(230,'Brasov','ROM'),(231,'Bratislava','SVK'),(232,'Brazzaville','COG'),(233,'Bremen','DEU'),(234,'Brest','BLR'),(235,'Bretagne','FRA'),(236,'British Colombia','CAN'),(237,'Brjansk','RUS'),(238,'Brunei and Muara','BRN'),(239,'Bryssel','BEL'),(240,'Budapest','HUN'),(241,'Buenos Aires','ARG'),(242,'Buhoro','UZB'),(243,'Bujumbura','BDI'),(244,'Bukarest','ROM'),(245,'Bulawayo','ZWE'),(246,'Burgas','BGR'),(247,'Burjatia','RUS'),(248,'Bursa','TUR'),(249,'Bushehr','IRN'),(250,'Buzau','ROM'),(251,'Cagayan Valley','PHL'),(252,'Caguas','PRI'),(253,'Cajamarca','PER'),(254,'Calabria','ITA'),(255,'Caldas','COL'),(256,'California','USA'),(257,'Callao','PER'),(258,'CamagÃ¼ey','CUB'),(259,'Campania','ITA'),(260,'Campeche','MEX'),(261,'Can Tho','VNM'),(262,'Canary Islands','ESP'),(263,'Cantabria','ESP'),(264,'Canterbury','NZL'),(265,'Cap-Vert','SEN'),(266,'Capital Region','AUS'),(267,'Caqueta','COL'),(268,'CAR','PHL'),(269,'Carabobo','VEN'),(270,'Caraga','PHL'),(271,'Caras-Severin','ROM'),(272,'Carolina','PRI'),(273,'Caroni','TTO'),(274,'Casablanca','MAR'),(275,'Castilla and LeÃ³n','ESP'),(276,'Castries','LCA'),(277,'Catamarca','ARG'),(278,'Cauca','COL'),(279,'Cayenne','GUF'),(280,'Cayo','BLZ'),(281,'CÃ³rdoba','ARG'),(282,'Cordoba','COL'),(283,'CearÃ¡','BRA'),(284,'Central','FJI'),(285,'Central','KEN'),(286,'Central','LKA'),(287,'Central','NPL'),(288,'Central','PRY'),(289,'Central','UGA'),(290,'Central','ZMB'),(291,'Central Java','IDN'),(292,'Central Luzon','PHL'),(293,'Central Macedonia','GRC'),(294,'Central Mindanao','PHL'),(295,'Central Serbia','YUG'),(296,'Central Visayas','PHL'),(297,'Centre','CMR'),(298,'Centre','FRA'),(299,'Cesar','COL'),(300,'Chaco','ARG'),(301,'Chagang','PRK'),(302,'Chaharmahal va Bakht','IRN'),(303,'Champagne-Ardenne','FRA'),(304,'Chandigarh','IND'),(305,'Changhwa','TWN'),(306,'Chaouia-Ouardigha','MAR'),(307,'Chari-Baguirmi','TCD'),(308,'Cheju','KOR'),(309,'Chhatisgarh','IND'),(310,'Chiang Mai','THA'),(311,'Chiapas','MEX'),(312,'Chiayi','TWN'),(313,'Chiba','JPN'),(314,'Chihuahua','MEX'),(315,'Chimborazo','ECU'),(316,'Chinandega','NIC'),(317,'Chisinau','MDA'),(318,'Chittagong','BGD'),(319,'Chlef','DZA'),(320,'Chollabuk','KOR'),(321,'Chollanam','KOR'),(322,'Chongqing','CHN'),(323,'Chubut','ARG'),(324,'Chungchongbuk','KOR'),(325,'Chungchongnam','KOR'),(326,'Chuquisaca','BOL'),(327,'Chuuk','FSM'),(328,'Ciego de Ãvila','CUB'),(329,'Cienfuegos','CUB'),(330,'Cizah','UZB'),(331,'Cluj','ROM'),(332,'Coahuila de Zaragoza','MEX'),(333,'Coast','KEN'),(334,'CoÃ­mbra','PRT'),(335,'Cochabamba','BOL'),(336,'Colima','MEX'),(337,'Colorado','USA'),(338,'Conakry','GIN'),(339,'Connecticut','USA'),(340,'Constanta','ROM'),(341,'Constantine','DZA'),(342,'Copperbelt','ZMB'),(343,'Coquimbo','CHL'),(344,'Corrientes','ARG'),(345,'CortÃ©s','HND'),(346,'Crete','GRC'),(347,'Cross River','NGA'),(348,'CsongrÃ¡d','HUN'),(349,'Cundinamarca','COL'),(350,'CuraÃ§ao','ANT'),(351,'Cusco','PER'),(352,'Dac Lac','VNM'),(353,'Dagestan','RUS'),(354,'Dakhlet NouÃ¢dhibou','MRT'),(355,'Daloa','CIV'),(356,'Damascus','SYR'),(357,'Damaskos','SYR'),(358,'Dar es Salaam','TZA'),(359,'Darfur al-Janubiya','SDN'),(360,'Darfur al-Shamaliya','SDN'),(361,'Dashhowuz','TKM'),(362,'Daugavpils','LVA'),(363,'Dayr al-Zawr','SYR'),(364,'DÃ¢mbovita','ROM'),(365,'Delhi','IND'),(366,'Denizli','TUR'),(367,'Dhaka','BGD'),(368,'DhiQar','IRQ'),(369,'Dili','TMP'),(370,'Diourbel','SEN'),(371,'Dire Dawa','ETH'),(372,'District of Columbia','USA'),(373,'Distrito Central','HND'),(374,'Distrito Federal','ARG'),(375,'Distrito Federal','BRA'),(376,'Distrito Federal','MEX'),(377,'Distrito Federal','VEN'),(378,'Distrito Nacional','DOM'),(379,'Diyala','IRQ'),(380,'Diyarbakir','TUR'),(381,'Djibouti','DJI'),(382,'Dnipropetrovsk','UKR'),(383,'Dnjestria','MDA'),(384,'Dodoma','TZA'),(385,'Doha','QAT'),(386,'Dolj','ROM'),(387,'Dolnoslaskie','POL'),(388,'Donetsk','UKR'),(389,'Dong Nai','VNM'),(390,'Doukkala-Abda','MAR'),(391,'Drenthe','NLD'),(392,'Duarte','DOM'),(393,'Dubai','ARE'),(394,'Dunedin','NZL'),(395,'Durango','MEX'),(396,'East Azerbaidzan','IRN'),(397,'East Falkland','FLK'),(398,'East Flanderi','BEL'),(399,'East GÃ¶tanmaan lÃ¤n','SWE'),(400,'East Java','IDN'),(401,'East Kasai','COD'),(402,'East Kazakstan','KAZ'),(403,'Eastern','KEN'),(404,'Eastern','NPL'),(405,'Eastern Cape','ZAF'),(406,'Eastern Visayas','PHL'),(407,'Edirne','TUR'),(408,'Edo & Delta','NGA'),(409,'Ehime','JPN'),(410,'El Oro','ECU'),(411,'El-AaiÃºn','ESH'),(412,'ElÃ¢zig','TUR'),(413,'Emilia-Romagna','ITA'),(414,'England','GBR'),(415,'Entre Rios','ARG'),(416,'Equateur','COD'),(417,'Erzincan','TUR'),(418,'Erzurum','TUR'),(419,'Esfahan','IRN'),(420,'Eskisehir','TUR'),(421,'Esmeraldas','ECU'),(422,'EspÃ­rito Santo','BRA'),(423,'Estuaire','GAB'),(424,'ExtrÃªme-Nord','CMR'),(425,'Extremadura','ESP'),(426,'Fakaofo','TKL'),(427,'FalcÃ³n','VEN'),(428,'Fargona','UZB'),(429,'Fars','IRN'),(430,'FÃ¨s-Boulemane','MAR'),(431,'Federaatio','BIH'),(432,'Federal Capital Dist','NGA'),(433,'FejÃ©r','HUN'),(434,'Fianarantsoa','MDG'),(435,'Flevoland','NLD'),(436,'Florida','USA'),(437,'Formosa','ARG'),(438,'Fort-de-France','MTQ'),(439,'Franche-ComtÃ©','FRA'),(440,'Francistown','BWA'),(441,'Frederiksberg','DNK'),(442,'Free State','ZAF'),(443,'Friuli-Venezia Giuli','ITA'),(444,'Fujian','CHN'),(445,'Fukui','JPN'),(446,'Fukuoka','JPN'),(447,'Fukushima','JPN'),(448,'Funafuti','TUV'),(449,'Fyn','DNK'),(450,'GabÃ¨s','TUN'),(451,'Gaborone','BWA'),(452,'Galati','ROM'),(453,'Galicia','ESP'),(454,'Gansu','CHN'),(455,'Gauteng','ZAF'),(456,'Gaza','MOZ'),(457,'Gaza','PSE'),(458,'Gaziantep','TUR'),(459,'GÃ¤ncÃ¤','AZE'),(460,'GÃ¤vleborgs lÃ¤n','SWE'),(461,'Gelderland','NLD'),(462,'Geneve','CHE'),(463,'Georgetown','GUY'),(464,'Georgia','USA'),(465,'Gharb-Chrarda-BÃ©ni','MAR'),(466,'GhardaÃ¯a','DZA'),(467,'Gifu','JPN'),(468,'Gilan','IRN'),(469,'Giza','EGY'),(470,'GoiÃ¡s','BRA'),(471,'Golestan','IRN'),(472,'Gomel','BLR'),(473,'Gorj','ROM'),(474,'Grad Sofija','BGR'),(475,'Grad Zagreb','HRV'),(476,'Grand Cayman','CYM'),(477,'Grand Turk','TCA'),(478,'Grande-Terre','GLP'),(479,'Granma','CUB'),(480,'Greater Accra','GHA'),(481,'Grodno','BLR'),(482,'Groningen','NLD'),(483,'Guanajuato','MEX'),(484,'Guangdong','CHN'),(485,'Guangxi','CHN'),(486,'GuantÃ¡namo','CUB'),(487,'Guatemala','GTM'),(488,'Guayas','ECU'),(489,'Guaynabo','PRI'),(490,'GuÃ¡rico','VEN'),(491,'Guerrero','MEX'),(492,'Guizhou','CHN'),(493,'Gujarat','IND'),(494,'Gumma','JPN'),(495,'GyÃ¶r-Moson-Sopron','HUN'),(496,'Ha Darom','ISR'),(497,'Ha Merkaz','ISR'),(498,'Habarovsk','RUS'),(499,'Hadramawt','YEM'),(500,'Haifa','ISR'),(501,'Hail','SAU'),(502,'Hainan','CHN'),(503,'Hainaut','BEL'),(504,'Haiphong','VNM'),(505,'HajdÃº-Bihar','HUN'),(506,'Hakassia','RUS'),(507,'Hama','SYR'),(508,'Hamadan','IRN'),(509,'Hamburg','DEU'),(510,'Hamgyong N','PRK'),(511,'Hamgyong P','PRK'),(512,'Hamilton','BMU'),(513,'Hamilton','NZL'),(514,'Hanoi','VNM'),(515,'Hanti-Mansia','RUS'),(516,'Harare','ZWE'),(517,'Harjumaa','EST'),(518,'Harkova','UKR'),(519,'Haryana','IND'),(520,'Haskovo','BGR'),(521,'Hatay','TUR'),(522,'Haute-Normandie','FRA'),(523,'Haute-ZaÃ¯re','COD'),(524,'Hawaii','USA'),(525,'Hawalli','KWT'),(526,'HÃ¶fuÃ°borgarsvÃ¦Ã°i','ISL'),(527,'Hebei','CHN'),(528,'Hebron','PSE'),(529,'Heilongjiang','CHN'),(530,'Henan','CHN'),(531,'Herat','AFG'),(532,'Herson','UKR'),(533,'Hessen','DEU'),(534,'Hhohho','SWZ'),(535,'Hidalgo','MEX'),(536,'Hims','SYR'),(537,'Hiroshima','JPN'),(538,'HlavnÃ­ mesto Praha','CZE'),(539,'Hmelnytskyi','UKR'),(540,'Ho Chi Minh City','VNM'),(541,'Hodeida','YEM'),(542,'Hokkaido','JPN'),(543,'HolguÃ­n','CUB'),(544,'Home Island','CCK'),(545,'Hongkong','HKG'),(546,'Honiara','SLB'),(547,'Horad Minsk','BLR'),(548,'Hordaland','NOR'),(549,'Hormozgan','IRN'),(550,'Houet','BFA'),(551,'Hsinchu','TWN'),(552,'Hualien','TWN'),(553,'Huambo','AGO'),(554,'Huanuco','PER'),(555,'Hubei','CHN'),(556,'Huila','COL'),(557,'Hunan','CHN'),(558,'Hwanghae N','PRK'),(559,'Hwanghae P','PRK'),(560,'Hyogo','JPN'),(561,'Iasi','ROM'),(562,'IÃ§el','TUR'),(563,'Ibaragi','JPN'),(564,'Ibb','YEM'),(565,'Ica','PER'),(566,'Idaho','USA'),(567,'Idlib','SYR'),(568,'Ilam','IRN'),(569,'Ilan','TWN'),(570,'Illinois','USA'),(571,'Ilocos','PHL'),(572,'Imbabura','ECU'),(573,'Imereti','GEO'),(574,'Imo & Abia','NGA'),(575,'Inchon','KOR'),(576,'Indiana','USA'),(577,'Inhambane','MOZ'),(578,'Inner Harbour','MLT'),(579,'Inner Mongolia','CHN'),(580,'Iowa','USA'),(581,'Irbid','JOR'),(582,'Irbil','IRQ'),(583,'Irkutsk','RUS'),(584,'Irrawaddy\n [Ayeyarwa','MMR'),(585,'Irrawaddy [Ayeyarwad','MMR'),(586,'Ishikawa','JPN'),(587,'Islamabad','PAK'),(588,'Ismailia','EGY'),(589,'Isparta','TUR'),(590,'Istanbul','TUR'),(591,'Ivano-Frankivsk','UKR'),(592,'Ivanovo','RUS'),(593,'Iwate','JPN'),(594,'Izmir','TUR'),(595,'Jakarta Raya','IDN'),(596,'Jalisco','MEX'),(597,'Jambi','IDN'),(598,'Jammu and Kashmir','IND'),(599,'Jaroslavl','RUS'),(600,'JÃ¶nkÃ¶pings lÃ¤n','SWE'),(601,'Jersey','GBR'),(602,'Jerusalem','ISR'),(603,'Jharkhand','IND'),(604,'Jiangsu','CHN'),(605,'Jiangxi','CHN'),(606,'Jilin','CHN'),(607,'JiznÃ­ Cechy','CZE'),(608,'JiznÃ­ Morava','CZE'),(609,'Johor','MYS'),(610,'Jubbada Hoose','SOM'),(611,'Jujuy','ARG'),(612,'JunÃ­n','PER'),(613,'Kabardi-Balkaria','RUS'),(614,'Kabol','AFG'),(615,'Kadiogo','BFA'),(616,'Kaduna','NGA'),(617,'Kaesong-si','PRK'),(618,'Kafr al-Shaykh','EGY'),(619,'Kagawa','JPN'),(620,'Kagoshima','JPN'),(621,'Kahramanmaras','TUR'),(622,'Kairo','EGY'),(623,'Kairouan','TUN'),(624,'Kalimantan Barat','IDN'),(625,'Kalimantan Selatan','IDN'),(626,'Kalimantan Tengah','IDN'),(627,'Kalimantan Timur','IDN'),(628,'Kaliningrad','RUS'),(629,'Kalmykia','RUS'),(630,'Kaluga','RUS'),(631,'KamtÅ¡atka','RUS'),(632,'Kanagawa','JPN'),(633,'Kang-won','KOR'),(634,'Kangwon','PRK'),(635,'Kano & Jigawa','NGA'),(636,'Kansas','USA'),(637,'Kaohsiung','TWN'),(638,'Kaolack','SEN'),(639,'KarabÃ¼k','TUR'),(640,'Karakalpakistan','UZB'),(641,'Karaman','TUR'),(642,'KaratÅ¡ai-TÅ¡erkessi','RUS'),(643,'Karbala','IRQ'),(644,'Karjala','RUS'),(645,'Karnataka','IND'),(646,'Karotegin','TJK'),(647,'Kars','TUR'),(648,'Kassala','SDN'),(649,'Kastilia-La Mancha','ESP'),(650,'Katalonia','ESP'),(651,'Katsina','NGA'),(652,'Kaunas','LTU'),(653,'Kayseri','TUR'),(654,'KÃ¤rnten','AUT'),(655,'KÃ¸benhavn','DNK'),(656,'KÃ¼tahya','TUR'),(657,'Kedah','MYS'),(658,'Keelung','TWN'),(659,'Kelantan','MYS'),(660,'Kemerovo','RUS'),(661,'Kentucky','USA'),(662,'Kerala','IND'),(663,'Kerman','IRN'),(664,'Kermanshah','IRN'),(665,'Khan Yunis','PSE'),(666,'Khanh Hoa','VNM'),(667,'Khartum','SDN'),(668,'Khomas','NAM'),(669,'Khon Kaen','THA'),(670,'Khorasan','IRN'),(671,'Khorazm','UZB'),(672,'Khujand','TJK'),(673,'Khulna','BGD'),(674,'Khuzestan','IRN'),(675,'Kien Giang','VNM'),(676,'Kigali','RWA'),(677,'Kilimanjaro','TZA'),(678,'Kilis','TUR'),(679,'Kinshasa','COD'),(680,'Kiova','UKR'),(681,'Kirikkale','TUR'),(682,'Kirov','RUS'),(683,'Kirovograd','UKR'),(684,'Kitaa','GRL'),(685,'Klaipeda','LTU'),(686,'Kocaeli','TUR'),(687,'Kochi','JPN'),(688,'Kombo St Mary','GMB'),(689,'Komi','RUS'),(690,'Konya','TUR'),(691,'Kordestan','IRN'),(692,'Korhogo','CIV'),(693,'Koror','PLW'),(694,'Kosovo and Metohija','YUG'),(695,'Kostroma','RUS'),(696,'Kouilou','COG'),(697,'Kowloon and New Kowl','HKG'),(698,'Krasnodar','RUS'),(699,'Krasnojarsk','RUS'),(700,'Krim','UKR'),(701,'Kujawsko-Pomorskie','POL'),(702,'Kumamoto','JPN'),(703,'Kurdufan al-Shamaliy','SDN'),(704,'Kurgan','RUS'),(705,'Kursk','RUS'),(706,'Kvemo Kartli','GEO'),(707,'Kwangju','KOR'),(708,'Kwara & Kogi','NGA'),(709,'KwaZulu-Natal','ZAF'),(710,'Kyonggi','KOR'),(711,'Kyongsangbuk','KOR'),(712,'Kyongsangnam','KOR'),(713,'Kyoto','JPN'),(714,'La AraucanÃ­a','CHL'),(715,'La Guajira','COL'),(716,'La Habana','CUB'),(717,'La Libertad','PER'),(718,'La Libertad','SLV'),(719,'La Paz','BOL'),(720,'La Rioja','ARG'),(721,'La Rioja','ESP'),(722,'La Romana','DOM'),(723,'Lagos','NGA'),(724,'Lam Dong','VNM'),(725,'Lambayeque','PER'),(726,'Lampung','IDN'),(727,'Languedoc-Roussillon','FRA'),(728,'Lara','VEN'),(729,'Las Tunas','CUB'),(730,'Latakia','SYR'),(731,'Latium','ITA'),(732,'LÃ¤nsimaa','SJM'),(733,'LeÃ³n','NIC'),(734,'Lebap','TKM'),(735,'Leinster','IRL'),(736,'Liaoning','CHN'),(737,'LiÃ¨ge','BEL'),(738,'Liepaja','LVA'),(739,'Liguria','ITA'),(740,'Lilongwe','MWI'),(741,'Lima','PER'),(742,'Limassol','CYP'),(743,'Limburg','NLD'),(744,'Limousin','FRA'),(745,'Lipetsk','RUS'),(746,'Lisboa','PRT'),(747,'Lisboa','SWE'),(748,'Littoral','CMR'),(749,'Lodzkie','POL'),(750,'Logone Occidental','TCD'),(751,'Loja','ECU'),(752,'Lombardia','ITA'),(753,'Lorestan','IRN'),(754,'Loreto','PER'),(755,'Lori','ARM'),(756,'Lorraine','FRA'),(757,'Los Lagos','CHL'),(758,'Los RÃ­os','ECU'),(759,'Louisiana','USA'),(760,'Lovec','BGR'),(761,'Luanda','AGO'),(762,'Lubelskie','POL'),(763,'Lubuskie','POL'),(764,'Lugansk','UKR'),(765,'Lusaka','ZMB'),(766,'Luxembourg','LUX'),(767,'Luxor','EGY'),(768,'Lviv','UKR'),(769,'Maale','MDV'),(770,'Macau','MAC'),(771,'Madhya\n Pradesh','IND'),(772,'Madhya Pradesh','IND'),(773,'Madrid','ESP'),(774,'Maekel','ERI'),(775,'Magadan','RUS'),(776,'Magallanes','CHL'),(777,'Magdalena','COL'),(778,'Magwe [Magway]','MMR'),(779,'Mahajanga','MDG'),(780,'Maharashtra','IND'),(781,'MahÃ©','SYC'),(782,'Majuro','MHL'),(783,'Malatya','TUR'),(784,'Malopolskie','POL'),(785,'Mamoutzou','MYT'),(786,'ManabÃ­','ECU'),(787,'Managua','NIC'),(788,'Mandalay','MMR'),(789,'Mangghystau','KAZ'),(790,'Manica','MOZ'),(791,'Manicaland','ZWE'),(792,'Manipur','IND'),(793,'Manisa','TUR'),(794,'Manitoba','CAN'),(795,'Maputo','MOZ'),(796,'Maradi','NER'),(797,'Maramures','ROM'),(798,'MaranhÃ£o','BRA'),(799,'Marche','ITA'),(800,'Mardin','TUR'),(801,'Marinmaa','RUS'),(802,'Maritime','TGO'),(803,'Markazi','IRN'),(804,'Marrakech-Tensift-Al','MAR'),(805,'Mary','TKM'),(806,'Maryland','USA'),(807,'Masaya','NIC'),(808,'Maseru','LSO'),(809,'Masqat','OMN'),(810,'Massachusetts','USA'),(811,'Matanzas','CUB'),(812,'Mato Grosso','BRA'),(813,'Mato Grosso do Sul','BRA'),(814,'Maule','CHL'),(815,'MayagÃ¼ez','PRI'),(816,'Maysan','IRQ'),(817,'Mazandaran','IRN'),(818,'Mazowieckie','POL'),(819,'MÃ©rida','VEN'),(820,'MÃ©xico','MEX'),(821,'Mbeya','TZA'),(822,'Mecklenburg-Vorpomme','DEU'),(823,'Medina','SAU'),(824,'Meghalaya','IND'),(825,'Mehedinti','ROM'),(826,'Mekka','SAU'),(827,'MeknÃ¨s-Tafilalet','MAR'),(828,'Mendoza','ARG'),(829,'Meta','COL'),(830,'Miaoli','TWN'),(831,'Michigan','USA'),(832,'MichoacÃ¡n de Ocampo','MEX'),(833,'Midi-PyrÃ©nÃ©es','FRA'),(834,'Midlands','ZWE'),(835,'Mie','JPN'),(836,'Minas Gerais','BRA'),(837,'MingÃ¤Ã§evir','AZE'),(838,'Minnesota','USA'),(839,'Minsk','BLR'),(840,'Miranda','VEN'),(841,'Misiones','ARG'),(842,'Misrata','LBY'),(843,'Mississippi','USA'),(844,'Missouri','USA'),(845,'Miyagi','JPN'),(846,'Miyazaki','JPN'),(847,'Mizoram','IND'),(848,'Mogiljov','BLR'),(849,'Molukit','IDN'),(850,'Mon','MMR'),(851,'Monagas','VEN'),(852,'Montana','USA'),(853,'Montenegro','YUG'),(854,'Montevideo','URY'),(855,'Montserrado','LBR'),(856,'Mordva','RUS'),(857,'Morelos','MEX'),(858,'Morogoro','TZA'),(859,'Moscow (City)','RUS'),(860,'Moskova','RUS'),(861,'Mostaganem','DZA'),(862,'Mpumalanga','ZAF'),(863,'Munster','IRL'),(864,'Murcia','ESP'),(865,'Mures','ROM'),(866,'Murmansk','RUS'),(867,'Mwanza','TZA'),(868,'Mykolajiv','UKR'),(869,'Nablus','PSE'),(870,'Nagano','JPN'),(871,'Nagasaki','JPN'),(872,'Nairobi','KEN'),(873,'Najran','SAU'),(874,'Nakhon Pathom','THA'),(875,'Nakhon Ratchasima','THA'),(876,'Nakhon Sawan','THA'),(877,'Nam Ha','VNM'),(878,'Namangan','UZB'),(879,'Namibe','AGO'),(880,'Nampo-si','PRK'),(881,'Nampula','MOZ'),(882,'Namur','BEL'),(883,'Nantou','TWN'),(884,'Nara','JPN'),(885,'Narino','COL'),(886,'National Capital Dis','PNG'),(887,'National Capital Reg','PHL'),(888,'Navarra','ESP'),(889,'Navoi','UZB'),(890,'Nayarit','MEX'),(891,'Neamt','ROM'),(892,'Nebraska','USA'),(893,'Negeri\n Sembilan','MYS'),(894,'NeuquÃ©n','ARG'),(895,'Nevada','USA'),(896,'New Hampshire','USA'),(897,'New Jersey','USA'),(898,'New Mexico','USA'),(899,'New Providence','BHS'),(900,'New South Wales','AUS'),(901,'New York','USA'),(902,'Newfoundland','CAN'),(903,'Newmaa','FIN'),(904,'Nghe An','VNM'),(905,'Niamey','NER'),(906,'Nicosia','CYP'),(907,'Niedersachsen','DEU'),(908,'Niger','NGA'),(909,'Niigata','JPN'),(910,'Ninawa','IRQ'),(911,'Ningxia','CHN'),(912,'Nizni Novgorod','RUS'),(913,'Njazidja','COM'),(914,'Nonthaburi','THA'),(915,'Noord-Brabant','NLD'),(916,'Noord-Holland','NLD'),(917,'Nord','CMR'),(918,'Nord','HTI'),(919,'Nord-Ouest','CMR'),(920,'Nord-Pas-de-Calais','FRA'),(921,'Nordjylland','DNK'),(922,'Nordrhein-Westfalen','DEU'),(923,'Norte de Santander','COL'),(924,'North\n Carolina','USA'),(925,'North Austria','AUT'),(926,'North Carolina','USA'),(927,'North Gaza','PSE'),(928,'North Ireland','GBR'),(929,'North Kazakstan','KAZ'),(930,'North Kivu','COD'),(931,'North Ossetia-Alania','RUS'),(932,'North West','ZAF'),(933,'Northern','GHA'),(934,'Northern','LKA'),(935,'Northern Cape','ZAF'),(936,'Northern Mindanao','PHL'),(937,'Nothwest Border Prov','PAK'),(938,'Nouakchott','MRT'),(939,'Nova Scotia','CAN'),(940,'Novgorod','RUS'),(941,'Novosibirsk','RUS'),(942,'Nuevo LeÃ³n','MEX'),(943,'Nusa Tenggara Barat','IDN'),(944,'Nusa Tenggara Timur','IDN'),(945,'Nyanza','KEN'),(946,'Oaxaca','MEX'),(947,'OÂ´Higgins','CHL'),(948,'Odesa','UKR'),(949,'Ogun','NGA'),(950,'Ohio','USA'),(951,'Oita','JPN'),(952,'Okayama','JPN'),(953,'Okinawa','JPN'),(954,'Oklahoma','USA'),(955,'Omsk','RUS'),(956,'Ondo & Ekiti','NGA'),(957,'Ontario','CAN'),(958,'Opolskie','POL'),(959,'Oran','DZA'),(960,'Ordu','TUR'),(961,'Oregon','USA'),(962,'Orenburg','RUS'),(963,'Oriental','MAR'),(964,'Orissa','IND'),(965,'Orjol','RUS'),(966,'Oromia','ETH'),(967,'Oruro','BOL'),(968,'Osaka','JPN'),(969,'Osh','KGZ'),(970,'Osijek-Baranja','HRV'),(971,'Oslo','NOR'),(972,'Osmaniye','TUR'),(973,'Osrednjeslovenska','SVN'),(974,'OuÃ©mÃ©','BEN'),(975,'Ouest','CMR'),(976,'Ouest','HTI'),(977,'Outer Harbour','MLT'),(978,'Overijssel','NLD'),(979,'Oyo & Osun','NGA'),(980,'Pahang','MYS'),(981,'PanamÃ¡','PAN'),(982,'Panevezys','LTU'),(983,'ParaÃ­ba','BRA'),(984,'Paramaribo','SUR'),(985,'ParanÃ¡','BRA'),(986,'ParÃ¡','BRA'),(987,'Pavlodar','KAZ'),(988,'Pays de la Loire','FRA'),(989,'PÃ¤ijÃ¤t-HÃ¤me','FIN'),(990,'Pegu [Bago]','MMR'),(991,'Peking','CHN'),(992,'Pennsylvania','USA'),(993,'Penza','RUS'),(994,'Perak','MYS'),(995,'Perm','RUS'),(996,'Pernambuco','BRA'),(997,'Phnom Penh','KHM'),(998,'PiauÃ­','BRA'),(999,'Picardie','FRA'),(1000,'Pichincha','ECU'),(1001,'Piemonte','ITA'),(1002,'Pietari','RUS'),(1003,'Pihkova','RUS'),(1004,'Pinar del RÃ­o','CUB'),(1005,'Pingtung','TWN'),(1006,'Pirkanmaa','FIN'),(1007,'Piura','PER'),(1008,'Plaines Wilhelms','MUS'),(1009,'Plateau & Nassarawa','NGA'),(1010,'Plovdiv','BGR'),(1011,'Plymouth','MSR'),(1012,'Podkarpackie','POL'),(1013,'Podlaskie','POL'),(1014,'Podravska','SVN'),(1015,'Pohjois-Pohjanmaa','FIN'),(1016,'Pohnpei','FSM'),(1017,'Pomorskie','POL'),(1018,'Ponce','PRI'),(1019,'Pondicherry','IND'),(1020,'Port Said','EGY'),(1021,'Port-Louis','MUS'),(1022,'Port-of-Spain','TTO'),(1023,'Porto','PRT'),(1024,'Portuguesa','VEN'),(1025,'PotosÃ­','BOL'),(1026,'Prahova','ROM'),(1027,'Primorje','RUS'),(1028,'Primorje-Gorski Kota','HRV'),(1029,'Provence-Alpes-CÃ´te','FRA'),(1030,'Puebla','MEX'),(1031,'Puerto Plata','DOM'),(1032,'Pulau Pinang','MYS'),(1033,'Pultava','UKR'),(1034,'Punjab','IND'),(1035,'Punjab','PAK'),(1036,'Puno','PER'),(1037,'Pusan','KOR'),(1038,'Pyongan N','PRK'),(1039,'Pyongan P','PRK'),(1040,'Pyongyang-si','PRK'),(1041,'Qandahar','AFG'),(1042,'Qaraghandy','KAZ'),(1043,'Qashqadaryo','UZB'),(1044,'Qasim','SAU'),(1045,'Qazvin','IRN'),(1046,'Qina','EGY'),(1047,'Qinghai','CHN'),(1048,'Qom','IRN'),(1049,'Qostanay','KAZ'),(1050,'Quang Binh','VNM'),(1051,'Quang Nam-Da Nang','VNM'),(1052,'Quang Ninh','VNM'),(1053,'QuÃ©bec','CAN'),(1054,'Queensland','AUS'),(1055,'QuerÃ©taro','MEX'),(1056,'QuerÃ©taro de Arteag','MEX'),(1057,'Quetzaltenango','GTM'),(1058,'Quindio','COL'),(1059,'Quintana Roo','MEX'),(1060,'Qyzylorda','KAZ'),(1061,'Rabat-SalÃ©-Zammour-','MAR'),(1062,'Rafah','PSE'),(1063,'Rajasthan','IND'),(1064,'Rajshahi','BGD'),(1065,'Rakhine','MMR'),(1066,'Rangoon [Yangon]','MMR'),(1067,'Rarotonga','COK'),(1068,'Republika Srpska','BIH'),(1069,'RhÃ´ne-Alpes','FRA'),(1070,'Rheinland-Pfalz','DEU'),(1071,'Rhode Island','USA'),(1072,'Riad','SAU'),(1073,'Riau','IDN'),(1074,'Rift Valley','KEN'),(1075,'Riika','LVA'),(1076,'Rio de Janeiro','BRA'),(1077,'Rio Grande do Norte','BRA'),(1078,'Rio Grande do Sul','BRA'),(1079,'Risaralda','COL'),(1080,'Rivers & Bayelsa','NGA'),(1081,'Rivne','UKR'),(1082,'Riyadh','SAU'),(1083,'Rjazan','RUS'),(1084,'Rogaland','NOR'),(1085,'RondÃ´nia','BRA'),(1086,'Roraima','BRA'),(1087,'Rostov-na-Donu','RUS'),(1088,'Ruse','BGR'),(1089,'Saarland','DEU'),(1090,'Sabah','MYS'),(1091,'Saga','JPN'),(1092,'Sagaing','MMR'),(1093,'Saha (Jakutia)','RUS'),(1094,'Sahalin','RUS'),(1095,'Saint GeorgeÂ´s','BMU'),(1096,'Saint Helena','SHN'),(1097,'Saint-Denis','REU'),(1098,'Saint-Louis','SEN'),(1099,'Saint-Pierre','SPM'),(1100,'Saipan','MNP'),(1101,'Saitama','JPN'),(1102,'Sakarya','TUR'),(1103,'Saksi','DEU'),(1104,'Salta','ARG'),(1105,'Salzburg','AUT'),(1106,'Samara','RUS'),(1107,'Samarkand','UZB'),(1108,'Samsun','TUR'),(1109,'San JosÃ©','CRI'),(1110,'San Juan','ARG'),(1111,'San Juan','PRI'),(1112,'San Luis','ARG'),(1113,'San Luis PotosÃ­','MEX'),(1114,'San Marino','SMR'),(1115,'San Miguel','SLV'),(1116,'San Miguelito','PAN'),(1117,'San Pedro de MacorÃ­','DOM'),(1118,'San Salvador','SLV'),(1119,'Sanaa','YEM'),(1120,'Sancti-SpÃ­ritus','CUB'),(1121,'Sanliurfa','TUR'),(1122,'Santa Ana','SLV'),(1123,'Santa Catarina','BRA'),(1124,'Santa Cruz','BOL'),(1125,'Santa FÃ©','ARG'),(1126,'Santafe de Bogota','COL'),(1127,'Santander','COL'),(1128,'Santiago','CHL'),(1129,'Santiago','DOM'),(1130,'Santiago de Cuba','CUB'),(1131,'Santiago del Estero','ARG'),(1132,'Saratov','RUS'),(1133,'Sarawak','MYS'),(1134,'Sardinia','ITA'),(1135,'Saskatchewan','CAN'),(1136,'Satu Mare','ROM'),(1137,'Savannakhet','LAO'),(1138,'Sawhaj','EGY'),(1139,'SÃ£o Paulo','BRA'),(1140,'SÃ£o Tiago','CPV'),(1141,'SÃ©tif','DZA'),(1142,'SÃ¸r-TrÃ¸ndelag','NOR'),(1143,'Schaan','LIE'),(1144,'Schleswig-Holstein','DEU'),(1145,'Scotland','GBR'),(1146,'Selangor','MYS'),(1147,'Semnan','IRN'),(1148,'Seoul','KOR'),(1149,'Sergipe','BRA'),(1150,'Serravalle/Dogano','SMR'),(1151,'SevernÃ­ Cechy','CZE'),(1152,'SevernÃ­ Morava','CZE'),(1153,'Sfax','TUN'),(1154,'Shaanxi','CHN'),(1155,'Shaba','COD'),(1156,'Shamal Sina','EGY'),(1157,'Shan','MMR'),(1158,'Shandong','CHN'),(1159,'Shanghai','CHN'),(1160,'Shanxi','CHN'),(1161,'Sharja','ARE'),(1162,'Shefa','VUT'),(1163,'Shiga','JPN'),(1164,'Shimane','JPN'),(1165,'Shizuoka','JPN'),(1166,'Sibiu','ROM'),(1167,'Sichuan','CHN'),(1168,'Sidi Bel AbbÃ¨s','DZA'),(1169,'Siem Reap','KHM'),(1170,'Siirt','TUR'),(1171,'Sinaloa','MEX'),(1172,'Sind','PAK'),(1173,'Sindh','PAK'),(1174,'Sisilia','ITA'),(1175,'Sistan va Baluchesta','IRN'),(1176,'Sivas','TUR'),(1177,'SkÃ¥ne lÃ¤n','SWE'),(1178,'Skikda','DZA'),(1179,'Skopje','MKD'),(1180,'Slaskie','POL'),(1181,'Smolensk','RUS'),(1182,'Sofala','MOZ'),(1183,'Sokoto & Kebbi & Zam','NGA'),(1184,'Songkhla','THA'),(1185,'Sonora','MEX'),(1186,'Souss Massa-DraÃ¢','MAR'),(1187,'Sousse','TUN'),(1188,'South Australia','AUS'),(1189,'South Carolina','USA'),(1190,'South Dakota','USA'),(1191,'South Kazakstan','KAZ'),(1192,'South Kivu','COD'),(1193,'South Tarawa','KIR'),(1194,'Southern Mindanao','PHL'),(1195,'Southern Tagalog','PHL'),(1196,'Split-Dalmatia','HRV'),(1197,'St George','DMA'),(1198,'St George','GRD'),(1199,'St George','VCT'),(1200,'St George Basseterre','KNA'),(1201,'St John','ATG'),(1202,'St Michael','BRB'),(1203,'St Thomas','VIR'),(1204,'St. Andrew','JAM'),(1205,'St. Catherine','JAM'),(1206,'Stavropol','RUS'),(1207,'Steiermark','AUT'),(1208,'Streymoyar','FRO'),(1209,'Suceava','ROM'),(1210,'Sucre','COL'),(1211,'Sucre','VEN'),(1212,'Suez','EGY'),(1213,'Sulawesi Selatan','IDN'),(1214,'Sulawesi Tengah','IDN'),(1215,'Sulawesi Tenggara','IDN'),(1216,'Sulawesi Utara','IDN'),(1217,'Sumatera Barat','IDN'),(1218,'Sumatera Selatan','IDN'),(1219,'Sumatera Utara','IDN'),(1220,'Sumqayit','AZE'),(1221,'Sumy','UKR'),(1222,'Surkhondaryo','UZB'),(1223,'Sverdlovsk','RUS'),(1224,'Swietokrzyskie','POL'),(1225,'Sylhet','BGD'),(1226,'Szabolcs-SzatmÃ¡r-Be','HUN'),(1227,'Tabasco','MEX'),(1228,'Tabora','TZA'),(1229,'Tabuk','SAU'),(1230,'Tacna','PER'),(1231,'Tadla-Azilal','MAR'),(1232,'Taegu','KOR'),(1233,'Taejon','KOR'),(1234,'Tahiti','PYF'),(1235,'Taichung','TWN'),(1236,'Tainan','TWN'),(1237,'Taipei','TWN'),(1238,'Taitung','TWN'),(1239,'Taizz','YEM'),(1240,'Taka-Karpatia','UKR'),(1241,'Tamaulipas','MEX'),(1242,'Tambov','RUS'),(1243,'Tamil\n Nadu','IND'),(1244,'Tamil Nadu','IND'),(1245,'Tanga','TZA'),(1246,'Tanger-TÃ©touan','MAR'),(1247,'Taoyuan','TWN'),(1248,'TarapacÃ¡','CHL'),(1249,'Taraz','KAZ'),(1250,'Tarija','BOL'),(1251,'Tartumaa','EST'),(1252,'Tasmania','AUS'),(1253,'Tatarstan','RUS'),(1254,'Taza-Al Hoceima-Taou','MAR'),(1255,'TÃ¡chira','VEN'),(1256,'TÃ©bessa','DZA'),(1257,'Tbilisi','GEO'),(1258,'Teheran','IRN'),(1259,'Tekirdag','TUR'),(1260,'Tel Aviv','ISR'),(1261,'Tenasserim [Tanintha','MMR'),(1262,'Tennessee','USA'),(1263,'Terengganu','MYS'),(1264,'Ternopil','UKR'),(1265,'Tete','MOZ'),(1266,'Texas','USA'),(1267,'ThÃ¼ringen','DEU'),(1268,'Thessalia','GRC'),(1269,'ThiÃ¨s','SEN'),(1270,'Thimphu','BTN'),(1271,'Thua Thien-Hue','VNM'),(1272,'Tianjin','CHN'),(1273,'Tiaret','DZA'),(1274,'Tibet','CHN'),(1275,'Tien Giang','VNM'),(1276,'Tigray','ETH'),(1277,'Timis','ROM'),(1278,'Tirana','ALB'),(1279,'Tiroli','AUT'),(1280,'Tjumen','RUS'),(1281,'Tlemcen','DZA'),(1282,'Toa Baja','PRI'),(1283,'Toamasina','MDG'),(1284,'Tocantins','BRA'),(1285,'Tochigi','JPN'),(1286,'Tokat','TUR'),(1287,'Tokushima','JPN'),(1288,'Tokyo-to','JPN'),(1289,'Tolima','COL'),(1290,'Tomsk','RUS'),(1291,'Tongatapu','TON'),(1292,'Tortola','VGB'),(1293,'Toscana','ITA'),(1294,'Toskent','UZB'),(1295,'Toskent Shahri','UZB'),(1296,'Tottori','JPN'),(1297,'Toyama','JPN'),(1298,'Trabzon','TUR'),(1299,'Trentino-Alto Adige','ITA'),(1300,'Tripoli','LBY'),(1301,'Tripura','IND'),(1302,'Trujillo','VEN'),(1303,'TucumÃ¡n','ARG'),(1304,'Tula','RUS'),(1305,'Tulcea','ROM'),(1306,'Tungurahua','ECU'),(1307,'Tunis','TUN'),(1308,'Tutuila','ASM'),(1309,'Tver','RUS'),(1310,'Tyva','RUS'),(1311,'TÅ¡eljabinsk','RUS'),(1312,'TÅ¡erkasy','UKR'),(1313,'TÅ¡ernigiv','UKR'),(1314,'TÅ¡ernivtsi','UKR'),(1315,'TÅ¡etÅ¡enia','RUS'),(1316,'TÅ¡ita','RUS'),(1317,'TÅ¡uvassia','RUS'),(1318,'Ubon Ratchathani','THA'),(1319,'Ucayali','PER'),(1320,'Udmurtia','RUS'),(1321,'Udon Thani','THA'),(1322,'Ulaanbaatar','MNG'),(1323,'Uljanovsk','RUS'),(1324,'Umbria','ITA'),(1325,'Upolu','WSM'),(1326,'Uppsala lÃ¤n','SWE'),(1327,'Usak','TUR'),(1328,'Utah','USA'),(1329,'Utrecht','NLD'),(1330,'Uttar Pradesh','IND'),(1331,'Uttaranchal','IND'),(1332,'Vaduz','LIE'),(1333,'Valencia','ESP'),(1334,'Valle','COL'),(1335,'ValparaÃ­so','CHL'),(1336,'Van','TUR'),(1337,'Varna','BGR'),(1338,'Varsinais-Suomi','FIN'),(1339,'Vaud','CHE'),(1340,'VÃ¢lcea','ROM'),(1341,'VÃ¤sterbottens lÃ¤n','SWE'),(1342,'VÃ¤sternorrlands lÃ¤','SWE'),(1343,'VÃ¤stmanlands lÃ¤n','SWE'),(1344,'VÃ½chodnÃ© Slovensko','SVK'),(1345,'VÃ½chodnÃ­ Cechy','CZE'),(1346,'Veneto','ITA'),(1347,'Veracruz','MEX'),(1348,'Veracruz-Llave','MEX'),(1349,'Viangchan','LAO'),(1350,'Victoria','AUS'),(1351,'Villa Clara','CUB'),(1352,'Vilna','LTU'),(1353,'Vinnytsja','UKR'),(1354,'Virginia','USA'),(1355,'Vitebsk','BLR'),(1356,'Vladimir','RUS'),(1357,'Vojvodina','YUG'),(1358,'Volgograd','RUS'),(1359,'Vologda','RUS'),(1360,'Volynia','UKR'),(1361,'Voronez','RUS'),(1362,'Vrancea','ROM'),(1363,'Wakayama','JPN'),(1364,'Wales','GBR'),(1365,'Wallis','WLF'),(1366,'Warminsko-Mazurskie','POL'),(1367,'Washington','USA'),(1368,'Wasit','IRQ'),(1369,'Wellington','NZL'),(1370,'West Australia','AUS'),(1371,'West Azerbaidzan','IRN'),(1372,'West Bengali','IND'),(1373,'West Flanderi','BEL'),(1374,'West GÃ¶tanmaan lÃ¤n','SWE'),(1375,'West Greece','GRC'),(1376,'West Irian','IDN'),(1377,'West Island','CCK'),(1378,'West Java','IDN'),(1379,'West Kasai','COD'),(1380,'West Kazakstan','KAZ'),(1381,'Western','GHA'),(1382,'Western','LKA'),(1383,'Western','NPL'),(1384,'Western','SLE'),(1385,'Western Cape','ZAF'),(1386,'Western Mindanao','PHL'),(1387,'Western Visayas','PHL'),(1388,'Wielkopolskie','POL'),(1389,'Wien','AUT'),(1390,'Wilayah Persekutuan','MYS'),(1391,'Wisconsin','USA'),(1392,'Woqooyi Galbeed','SOM'),(1393,'Xinxiang','CHN'),(1394,'Yamagata','JPN'),(1395,'Yamaguchi','JPN'),(1396,'Yamalin Nenetsia','RUS'),(1397,'Yamanashi','JPN'),(1398,'Yamoussoukro','CIV'),(1399,'Yanggang','PRK'),(1400,'Yaracuy','VEN'),(1401,'Yazd','IRN'),(1402,'YÃ¼nlin','TWN'),(1403,'Yerevan','ARM'),(1404,'Yogyakarta','IDN'),(1405,'YucatÃ¡n','MEX'),(1406,'Yunnan','CHN'),(1407,'Zacatecas','MEX'),(1408,'Zachodnio-Pomorskie','POL'),(1409,'ZambÃ©zia','MOZ'),(1410,'Zanjan','IRN'),(1411,'Zanzibar West','TZA'),(1412,'ZapadnÃ­ Cechy','CZE'),(1413,'Zaporizzja','UKR'),(1414,'ZÃ¼rich','CHE'),(1415,'Zhejiang','CHN'),(1416,'Ziguinchor','SEN'),(1417,'Zinder','NER'),(1418,'Zonguldak','TUR'),(1419,'Zufar','OMN'),(1420,'Zuid-Holland','NLD'),(1421,'Zulia','VEN'),(1422,'Zytomyr','UKR'),(1423,'Å iauliai','LTU'),(1424,'Å irak','ARM'),(1426,'N/A APLICA','AAA');
/*!40000 ALTER TABLE `estate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estilo_usuario`
--

DROP TABLE IF EXISTS `estilo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estilo_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `bg_color` varchar(100) NOT NULL,
  `btn_1_color` varchar(30) NOT NULL,
  `btn_2_color` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estilo_usuario`
--

LOCK TABLES `estilo_usuario` WRITE;
/*!40000 ALTER TABLE `estilo_usuario` DISABLE KEYS */;
INSERT INTO `estilo_usuario` VALUES (1,1,'#03b4db','#7e7e7e','#2c3640'),(2,2,'#00b4dc','#16222d','#555555');
/*!40000 ALTER TABLE `estilo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `inicio` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `lugar` varchar(100) NOT NULL,
  `costo` int(11) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `latitud` varchar(12) NOT NULL,
  `longitud` varchar(12) NOT NULL,
  `observaciones` varchar(200) NOT NULL,
  `estatus` varchar(3) NOT NULL DEFAULT 'ACT',
  `url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `factura` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_pais` varchar(3) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `municipio` varchar(50) NOT NULL,
  `colonia` varchar(50) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `rfc` varchar(50) NOT NULL,
  `compania` varchar(50) DEFAULT NULL,
  `celular` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
INSERT INTO `factura` VALUES (1,'COL','sadas','','','','','Administrador','Oficina Virtual','admin@miempresa.com','1069740663','','-Numero Fijo[]\n-Numero Móvil[]\n');
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `informacion`
--

DROP TABLE IF EXISTS `informacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `informacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `img` varchar(100) NOT NULL,
  `status` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `informacion`
--

LOCK TABLES `informacion` WRITE;
/*!40000 ALTER TABLE `informacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `informacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventario`
--

DROP TABLE IF EXISTS `inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventario` (
  `id_inventario` int(11) NOT NULL AUTO_INCREMENT,
  `id_almacen` int(11) NOT NULL,
  `id_mercancia` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `bloqueados` int(11) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_inventario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventario`
--

LOCK TABLES `inventario` WRITE;
/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventario_historial`
--

DROP TABLE IF EXISTS `inventario_historial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventario_historial` (
  `id_inventario_historial` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_origen` int(11) DEFAULT NULL,
  `otro_origen` text,
  `id_destino` int(11) DEFAULT NULL,
  `id_documento` int(11) DEFAULT NULL,
  `cantidad` varchar(45) DEFAULT NULL,
  `id_inventario` varchar(45) DEFAULT NULL,
  `id_mercancia` int(11) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `n_documento` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_inventario_historial`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventario_historial`
--

LOCK TABLES `inventario_historial` WRITE;
/*!40000 ALTER TABLE `inventario_historial` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventario_historial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `items`
--

DROP TABLE IF EXISTS `items`;
/*!50001 DROP VIEW IF EXISTS `items`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `items` AS SELECT 
 1 AS `id`,
 1 AS `sku`,
 1 AS `puntos_comisionables`,
 1 AS `item`,
 1 AS `categoria`,
 1 AS `red`,
 1 AS `id_tipo_mercancia`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mails`
--

DROP TABLE IF EXISTS `mails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_emails` int(11) DEFAULT '1',
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mails`
--

LOCK TABLES `mails` WRITE;
/*!40000 ALTER TABLE `mails` DISABLE KEYS */;
INSERT INTO `mails` VALUES (1,2,'AFILIACION'),(2,2,'ACTIVACION'),(3,2,'CAMBIO EMAIL'),(4,1,'COBROS'),(5,1,'CUENTAS COBRAR'),(6,2,'RECUPERA CONTRASENA'),(7,2,'NUEVA CONTRASENA'),(8,2,'INVITACION'),(9,2,'AUTORESPONDER'),(10,1,'TRANSACCION EMPRESA');
/*!40000 ALTER TABLE `mails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `membresia`
--

DROP TABLE IF EXISTS `membresia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `membresia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `caducidad` varchar(3) NOT NULL,
  `descripcion` text NOT NULL,
  `id_red` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membresia`
--

LOCK TABLES `membresia` WRITE;
/*!40000 ALTER TABLE `membresia` DISABLE KEYS */;
/*!40000 ALTER TABLE `membresia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensaje`
--

DROP TABLE IF EXISTS `mensaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mensaje` (
  `id_mensaje` int(11) NOT NULL AUTO_INCREMENT,
  `enviado` int(11) NOT NULL,
  `id_estatus_msg` int(11) NOT NULL,
  `recibido` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_mensaje`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensaje`
--

LOCK TABLES `mensaje` WRITE;
/*!40000 ALTER TABLE `mensaje` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensaje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mercancia`
--

DROP TABLE IF EXISTS `mercancia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mercancia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sku` int(11) NOT NULL,
  `sku_2` varchar(20) NOT NULL,
  `id_tipo_mercancia` int(11) NOT NULL,
  `pais` varchar(3) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estatus` varchar(3) NOT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `real` decimal(10,2) NOT NULL,
  `costo` decimal(10,2) NOT NULL,
  `costo_publico` decimal(10,2) NOT NULL,
  `entrega` varchar(3) NOT NULL,
  `puntos_comisionables` decimal(10,2) NOT NULL,
  `iva` varchar(3) NOT NULL DEFAULT 'CON',
  `descuento` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mercancia`
--

LOCK TABLES `mercancia` WRITE;
/*!40000 ALTER TABLE `mercancia` DISABLE KEYS */;
/*!40000 ALTER TABLE `mercancia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movimiento`
--

DROP TABLE IF EXISTS `movimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movimiento` (
  `id_movimiento` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo` int(11) NOT NULL,
  `entrada` int(11) NOT NULL,
  `keyword` varchar(10) NOT NULL,
  `origen` varchar(100) NOT NULL,
  `destino` varchar(100) NOT NULL,
  `id_mercancia` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_impuesto` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `importe` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_estatus` int(11) NOT NULL,
  PRIMARY KEY (`id_movimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimiento`
--

LOCK TABLES `movimiento` WRITE;
/*!40000 ALTER TABLE `movimiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `movimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movimiento_inventario`
--

DROP TABLE IF EXISTS `movimiento_inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movimiento_inventario` (
  `id_doc` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `estatus` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id_doc`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimiento_inventario`
--

LOCK TABLES `movimiento_inventario` WRITE;
/*!40000 ALTER TABLE `movimiento_inventario` DISABLE KEYS */;
INSERT INTO `movimiento_inventario` VALUES (1,'Factura','ACT'),(2,'Remisión','ACT'),(3,'Consignación','ACT'),(4,'Traspaso Interno','ACT'),(5,'Traspaso Externo','ACT');
/*!40000 ALTER TABLE `movimiento_inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `noticia`
--

DROP TABLE IF EXISTS `noticia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `noticia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `contenido` text NOT NULL,
  `imagen` varchar(1000) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(3) NOT NULL,
  `id_grupo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noticia`
--

LOCK TABLES `noticia` WRITE;
/*!40000 ALTER TABLE `noticia` DISABLE KEYS */;
/*!40000 ALTER TABLE `noticia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificacion`
--

DROP TABLE IF EXISTS `notificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_fin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nombre` varchar(45) NOT NULL DEFAULT 'AVISO GENERAL',
  `descripcion` varchar(255) NOT NULL DEFAULT 'Hola, Bienvenido',
  `link` varchar(255) DEFAULT '/',
  `estatus` varchar(3) DEFAULT 'ACT',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificacion`
--

LOCK TABLES `notificacion` WRITE;
/*!40000 ALTER TABLE `notificacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `notificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pago_online_proceso`
--

DROP TABLE IF EXISTS `pago_online_proceso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pago_online_proceso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `contenido_carrito` text NOT NULL,
  `carrito` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pago_online_proceso`
--

LOCK TABLES `pago_online_proceso` WRITE;
/*!40000 ALTER TABLE `pago_online_proceso` DISABLE KEYS */;
/*!40000 ALTER TABLE `pago_online_proceso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pago_online_transaccion`
--

DROP TABLE IF EXISTS `pago_online_transaccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pago_online_transaccion` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `transaction_id` varchar(45) NOT NULL,
  `fecha` date NOT NULL,
  `reference_sale` varchar(45) NOT NULL,
  `payment_method_id` varchar(45) NOT NULL,
  `payment_method_name` varchar(45) NOT NULL,
  `state_pol` varchar(45) NOT NULL,
  `response_code_pol` varchar(45) NOT NULL,
  `currency` varchar(45) NOT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pago_online_transaccion`
--

LOCK TABLES `pago_online_transaccion` WRITE;
/*!40000 ALTER TABLE `pago_online_transaccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `pago_online_transaccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paquete_inscripcion`
--

DROP TABLE IF EXISTS `paquete_inscripcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paquete_inscripcion` (
  `id_paquete` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `Descripcion` text,
  `precio` decimal(10,2) NOT NULL,
  `puntos` decimal(10,2) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  `id_red` int(11) DEFAULT NULL,
  `tipo` char(2) DEFAULT NULL,
  `caducidad` varchar(3) DEFAULT '0',
  PRIMARY KEY (`id_paquete`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paquete_inscripcion`
--

LOCK TABLES `paquete_inscripcion` WRITE;
/*!40000 ALTER TABLE `paquete_inscripcion` DISABLE KEYS */;
/*!40000 ALTER TABLE `paquete_inscripcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paypal`
--

DROP TABLE IF EXISTS `paypal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paypal` (
  `email` varchar(45) NOT NULL DEFAULT 'seonetworksoft-facilitator@gmail.com',
  `moneda` varchar(45) NOT NULL DEFAULT 'USD',
  `test` varchar(45) NOT NULL DEFAULT '1',
  `estatus` varchar(3) NOT NULL DEFAULT 'DES',
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paypal`
--

LOCK TABLES `paypal` WRITE;
/*!40000 ALTER TABLE `paypal` DISABLE KEYS */;
INSERT INTO `paypal` VALUES ('seonetworksoft-facilitator@gmail.com','USD','1','DES');
/*!40000 ALTER TABLE `paypal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payulatam`
--

DROP TABLE IF EXISTS `payulatam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payulatam` (
  `apykey` varchar(100) NOT NULL DEFAULT '6u39nqhq8ftd0hlvnjfs66eh8c',
  `id_comercio` varchar(45) NOT NULL DEFAULT '500238',
  `id_cuenta` varchar(45) NOT NULL DEFAULT '509171',
  `moneda` varchar(45) NOT NULL DEFAULT 'USD',
  `test` int(11) NOT NULL DEFAULT '1',
  `estatus` varchar(3) NOT NULL DEFAULT 'DES',
  PRIMARY KEY (`apykey`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payulatam`
--

LOCK TABLES `payulatam` WRITE;
/*!40000 ALTER TABLE `payulatam` DISABLE KEYS */;
INSERT INTO `payulatam` VALUES ('6u39nqhq8ftd0hlvnjfs66eh8c','500238','509171','USD',1,'DES');
/*!40000 ALTER TABLE `payulatam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plan`
--

DROP TABLE IF EXISTS `plan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL DEFAULT 'Default',
  `descripcion` varchar(255) NOT NULL DEFAULT 'ejemplo',
  `estatus` varchar(3) DEFAULT 'ACT',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plan`
--

LOCK TABLES `plan` WRITE;
/*!40000 ALTER TABLE `plan` DISABLE KEYS */;
/*!40000 ALTER TABLE `plan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pos_venta`
--

DROP TABLE IF EXISTS `pos_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pos_venta` (
  `id_venta` int(11) NOT NULL DEFAULT '1',
  `id_user` int(11) NOT NULL DEFAULT '2',
  `costo` float NOT NULL DEFAULT '0',
  `descuento` float DEFAULT '0',
  `iva` float DEFAULT '0',
  `puntos` float DEFAULT '0',
  `estatus` varchar(3) DEFAULT 'ACT'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pos_venta`
--

LOCK TABLES `pos_venta` WRITE;
/*!40000 ALTER TABLE `pos_venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `pos_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pos_venta_historial`
--

DROP TABLE IF EXISTS `pos_venta_historial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pos_venta_historial` (
  `id_venta` int(11) NOT NULL DEFAULT '1',
  `id_user` int(11) NOT NULL DEFAULT '2',
  `cliente` int(11) NOT NULL DEFAULT '2',
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `item` int(11) NOT NULL DEFAULT '1',
  `cantidad` int(11) NOT NULL DEFAULT '1',
  `costo` varchar(5) NOT NULL DEFAULT 'DETAL',
  `puntos` float DEFAULT '0',
  `descuento` float NOT NULL DEFAULT '0',
  `tipo_descuento` varchar(1) NOT NULL DEFAULT '$',
  `total` float NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pos_venta_historial`
--

LOCK TABLES `pos_venta_historial` WRITE;
/*!40000 ALTER TABLE `pos_venta_historial` DISABLE KEYS */;
/*!40000 ALTER TABLE `pos_venta_historial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pos_venta_item`
--

DROP TABLE IF EXISTS `pos_venta_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pos_venta_item` (
  `id_venta` int(11) NOT NULL DEFAULT '1',
  `item` int(11) NOT NULL DEFAULT '1',
  `cantidad` int(11) NOT NULL DEFAULT '1',
  `valor` float NOT NULL DEFAULT '0',
  `puntos` float DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pos_venta_item`
--

LOCK TABLES `pos_venta_item` WRITE;
/*!40000 ALTER TABLE `pos_venta_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `pos_venta_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pos_venta_temporal`
--

DROP TABLE IF EXISTS `pos_venta_temporal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pos_venta_temporal` (
  `id_temporal` varchar(30) NOT NULL DEFAULT '1',
  `id_user` int(11) NOT NULL DEFAULT '2',
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `item` int(11) NOT NULL DEFAULT '1',
  `cantidad` int(11) NOT NULL DEFAULT '1',
  `costo` varchar(5) NOT NULL DEFAULT 'DETAL',
  `descuento` float NOT NULL DEFAULT '0',
  `tipo_descuento` varchar(1) NOT NULL DEFAULT '$',
  `estatus` varchar(3) DEFAULT 'ACT',
  `puntos` float DEFAULT '0',
  `cliente` int(11) NOT NULL DEFAULT '2'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pos_venta_temporal`
--

LOCK TABLES `pos_venta_temporal` WRITE;
/*!40000 ALTER TABLE `pos_venta_temporal` DISABLE KEYS */;
/*!40000 ALTER TABLE `pos_venta_temporal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `premios`
--

DROP TABLE IF EXISTS `premios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `premios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `imagen` varchar(255) DEFAULT NULL,
  `nivel` varchar(10) NOT NULL,
  `num_afiliados` varchar(15) NOT NULL,
  `id_red` int(11) NOT NULL DEFAULT '1',
  `frecuencia` text NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `premios`
--

LOCK TABLES `premios` WRITE;
/*!40000 ALTER TABLE `premios` DISABLE KEYS */;
/*!40000 ALTER TABLE `premios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preregistro`
--

DROP TABLE IF EXISTS `preregistro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preregistro` (
  `id_preregistro` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `correo` varchar(120) NOT NULL,
  `celular` varchar(30) DEFAULT NULL,
  `invitado_por` varchar(100) DEFAULT NULL,
  `cedula` varchar(22) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_preregistro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preregistro`
--

LOCK TABLES `preregistro` WRITE;
/*!40000 ALTER TABLE `preregistro` DISABLE KEYS */;
/*!40000 ALTER TABLE `preregistro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_grupo` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `concepto` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `peso` decimal(6,2) DEFAULT NULL,
  `alto` decimal(6,2) DEFAULT NULL,
  `ancho` decimal(6,2) DEFAULT NULL,
  `profundidad` decimal(6,2) DEFAULT NULL,
  `diametro` decimal(6,2) DEFAULT NULL,
  `marca` varchar(45) NOT NULL,
  `codigo_barras` varchar(30) NOT NULL,
  `min_venta` varchar(3) NOT NULL,
  `max_venta` varchar(10) NOT NULL,
  `instalacion` tinyint(1) NOT NULL,
  `especificacion` tinyint(1) NOT NULL,
  `produccion` tinyint(1) NOT NULL,
  `importacion` tinyint(1) NOT NULL,
  `sobrepedido` tinyint(1) NOT NULL,
  `inventario` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promocion`
--

DROP TABLE IF EXISTS `promocion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promocion` (
  `id_promocion` int(11) NOT NULL AUTO_INCREMENT,
  `id_mercancia` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `cantidad_mercancia` varchar(3) NOT NULL,
  `costo` decimal(10,2) DEFAULT NULL,
  `descripcion` text NOT NULL,
  `inicio` date NOT NULL,
  `fin` date NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_promocion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promocion`
--

LOCK TABLES `promocion` WRITE;
/*!40000 ALTER TABLE `promocion` DISABLE KEYS */;
/*!40000 ALTER TABLE `promocion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) DEFAULT NULL,
  `id_regimen` int(11) NOT NULL,
  `id_zona` int(11) NOT NULL,
  `mercancia` int(11) NOT NULL,
  `razon_social` varchar(255) NOT NULL,
  `curp` varchar(20) NOT NULL,
  `rfc` varchar(20) NOT NULL,
  `id_impuesto` int(11) NOT NULL,
  `condicion_pago` varchar(255) NOT NULL,
  `promedio_entrega` varchar(3) NOT NULL,
  `promedio_entrega_documentacion` varchar(3) NOT NULL,
  `plazo_pago` varchar(3) NOT NULL,
  `plazo_suspencion` varchar(3) NOT NULL,
  `plazo_suspencion_firma` varchar(3) NOT NULL,
  `interes_moratorio` varchar(3) NOT NULL,
  `dia_corte` varchar(3) NOT NULL,
  `dia_pago` varchar(3) NOT NULL,
  `credito_autorizado` tinyint(1) NOT NULL,
  `credito_suspendido` tinyint(1) NOT NULL,
  `estatus` varchar(3) NOT NULL DEFAULT 'ACT',
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (1,1,1,2,1,'NetworkSoft Factory','746346262','2665645646',2,'ninguno','3','2','7','5','5','3','7','7',1,0,'ACT');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor_contacto`
--

DROP TABLE IF EXISTS `proveedor_contacto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor_contacto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proveedor` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `telefono_movil` text,
  `telefono_fijo` text,
  `mail` varchar(100) DEFAULT NULL,
  `puesto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor_contacto`
--

LOCK TABLES `proveedor_contacto` WRITE;
/*!40000 ALTER TABLE `proveedor_contacto` DISABLE KEYS */;
INSERT INTO `proveedor_contacto` VALUES (38,34,'-----------------','-------------------','0000000000//','0000000000//','------@h.com','-----------');
/*!40000 ALTER TABLE `proveedor_contacto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor_datos`
--

DROP TABLE IF EXISTS `proveedor_datos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor_datos` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `pais` varchar(3) DEFAULT NULL,
  `provincia` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `codigo_postal` varchar(10) DEFAULT NULL,
  `comision` varchar(5) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `telefono` text,
  `direccion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor_datos`
--

LOCK TABLES `proveedor_datos` WRITE;
/*!40000 ALTER TABLE `proveedor_datos` DISABLE KEYS */;
INSERT INTO `proveedor_datos` VALUES (1,'Soy el','Fabricante','COL','cundinamarca','fusa','252211','0','proveedor@networksoft.mx',' - 3008797700 - 8748332','calle 22');
/*!40000 ALTER TABLE `proveedor_datos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor_mensajeria`
--

DROP TABLE IF EXISTS `proveedor_mensajeria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor_mensajeria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razon_social` varchar(255) DEFAULT NULL,
  `nombre_empresa` varchar(255) DEFAULT NULL,
  `idioma` varchar(100) DEFAULT NULL,
  `id_pais` varchar(3) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `colonia` varchar(100) DEFAULT NULL,
  `municipio` varchar(100) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `codigo_postal` varchar(10) DEFAULT NULL,
  `direccion_web` varchar(100) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estatus` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor_mensajeria`
--

LOCK TABLES `proveedor_mensajeria` WRITE;
/*!40000 ALTER TABLE `proveedor_mensajeria` DISABLE KEYS */;
INSERT INTO `proveedor_mensajeria` VALUES (34,'---------------','Ninguno','Español','ESP','------------------','-------------------','5270',78,'----------','-------------','2016-02-05 05:23:07','ACT');
/*!40000 ALTER TABLE `proveedor_mensajeria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `puntos_padre`
--

DROP TABLE IF EXISTS `puntos_padre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `puntos_padre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `puntos` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puntos_padre`
--

LOCK TABLES `puntos_padre` WRITE;
/*!40000 ALTER TABLE `puntos_padre` DISABLE KEYS */;
/*!40000 ALTER TABLE `puntos_padre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `red`
--

DROP TABLE IF EXISTS `red`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `red` (
  `id_red` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `profundidad` varchar(11) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  `premium` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_red`,`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `red`
--

LOCK TABLES `red` WRITE;
/*!40000 ALTER TABLE `red` DISABLE KEYS */;
INSERT INTO `red` VALUES (1,2,'0','ACT','2');
/*!40000 ALTER TABLE `red` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sepomex`
--

DROP TABLE IF EXISTS `sepomex`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sepomex` (
  `id_sepomex` int(11) NOT NULL AUTO_INCREMENT,
  `cp` varchar(5) NOT NULL,
  `colonia` varchar(100) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `id_estado` int(2) NOT NULL,
  PRIMARY KEY (`id_sepomex`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sepomex`
--

LOCK TABLES `sepomex` WRITE;
/*!40000 ALTER TABLE `sepomex` DISABLE KEYS */;
/*!40000 ALTER TABLE `sepomex` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicio`
--

DROP TABLE IF EXISTS `servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `concepto` varchar(30) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `descripcion` text NOT NULL,
  `id_red` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicio`
--

LOCK TABLES `servicio` WRITE;
/*!40000 ALTER TABLE `servicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `surtido`
--

DROP TABLE IF EXISTS `surtido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `surtido` (
  `id_surtido` int(11) NOT NULL AUTO_INCREMENT,
  `id_almacen_origen` int(11) NOT NULL,
  `id_movimiento` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estatus` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  PRIMARY KEY (`id_surtido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surtido`
--

LOCK TABLES `surtido` WRITE;
/*!40000 ALTER TABLE `surtido` DISABLE KEYS */;
/*!40000 ALTER TABLE `surtido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarjeta`
--

DROP TABLE IF EXISTS `tarjeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarjeta` (
  `id_tarjeta` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_tarjeta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_banco` int(11) NOT NULL,
  `cuenta` varchar(50) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `titular` varchar(50) NOT NULL,
  `codigo_seguridad` varchar(10) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_tarjeta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarjeta`
--

LOCK TABLES `tarjeta` WRITE;
/*!40000 ALTER TABLE `tarjeta` DISABLE KEYS */;
/*!40000 ALTER TABLE `tarjeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temp_invitacion`
--

DROP TABLE IF EXISTS `temp_invitacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temp_invitacion` (
  `token` varchar(255) NOT NULL,
  `email` varchar(65) DEFAULT NULL,
  `red` int(11) DEFAULT '1',
  `sponsor` int(11) DEFAULT '2',
  `padre` int(11) DEFAULT '2',
  `lado` int(11) DEFAULT '0',
  `estatus` varchar(3) DEFAULT 'ACT',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temp_invitacion`
--

LOCK TABLES `temp_invitacion` WRITE;
/*!40000 ALTER TABLE `temp_invitacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `temp_invitacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_red`
--

DROP TABLE IF EXISTS `tipo_red`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_red` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `frontal` int(11) DEFAULT '1',
  `profundidad` int(11) DEFAULT '1',
  `valor_punto` int(11) NOT NULL DEFAULT '0',
  `estatus` varchar(3) DEFAULT 'ACT',
  `plan` varchar(3) DEFAULT 'MAT',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_red`
--

LOCK TABLES `tipo_red` WRITE;
/*!40000 ALTER TABLE `tipo_red` DISABLE KEYS */;
INSERT INTO `tipo_red` VALUES (1,'publicistas','publicistas',0,0,1,'ACT','MAT');
/*!40000 ALTER TABLE `tipo_red` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaccion_billetera`
--

DROP TABLE IF EXISTS `transaccion_billetera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaccion_billetera` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL DEFAULT '2',
  `tipo` varchar(3) NOT NULL DEFAULT 'ADD',
  `descripcion` varchar(225) NOT NULL DEFAULT 'Checkout',
  `monto` decimal(30,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaccion_billetera`
--

LOCK TABLES `transaccion_billetera` WRITE;
/*!40000 ALTER TABLE `transaccion_billetera` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaccion_billetera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tucompra`
--

DROP TABLE IF EXISTS `tucompra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tucompra` (
  `email` varchar(100) NOT NULL DEFAULT 'you@domain.com',
  `cuenta` varchar(45) DEFAULT 'you',
  `llave` varchar(255) DEFAULT 'your~key',
  `moneda` varchar(45) NOT NULL DEFAULT 'COP',
  `test` int(11) NOT NULL DEFAULT '1',
  `estatus` varchar(3) NOT NULL DEFAULT 'DES',
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tucompra`
--

LOCK TABLES `tucompra` WRITE;
/*!40000 ALTER TABLE `tucompra` DISABLE KEYS */;
INSERT INTO `tucompra` VALUES ('you@domain.com','you','your~key','COP',1,'DES');
/*!40000 ALTER TABLE `tucompra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_autologin`
--

DROP TABLE IF EXISTS `user_autologin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_autologin`
--

LOCK TABLES `user_autologin` WRITE;
/*!40000 ALTER TABLE `user_autologin` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_autologin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_envio`
--

DROP TABLE IF EXISTS `user_envio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_envio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `costo` varchar(45) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `id_pais` varchar(3) DEFAULT NULL,
  `estado` varchar(65) DEFAULT NULL,
  `municipio` varchar(65) DEFAULT NULL,
  `colonia` varchar(50) DEFAULT NULL,
  `calle` varchar(50) DEFAULT NULL,
  `cp` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_envio`
--

LOCK TABLES `user_envio` WRITE;
/*!40000 ALTER TABLE `user_envio` DISABLE KEYS */;
INSERT INTO `user_envio` VALUES (1,2,1,'0','soy el','Fabricante','COL','cundinamarca','fusagasuga','centro','22','252211','dev@networksoft.mx','8730705');
/*!40000 ALTER TABLE `user_envio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_profiles`
--

DROP TABLE IF EXISTS `user_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `id_sexo` int(11) NOT NULL DEFAULT '1',
  `id_edo_civil` int(11) NOT NULL DEFAULT '1',
  `id_tipo_usuario` int(11) NOT NULL,
  `id_estudio` int(11) NOT NULL DEFAULT '1',
  `id_ocupacion` int(11) NOT NULL DEFAULT '1',
  `id_tiempo_dedicado` int(11) NOT NULL DEFAULT '1',
  `id_estatus` int(11) NOT NULL DEFAULT '1',
  `id_fiscal` int(11) NOT NULL DEFAULT '1',
  `keyword` varchar(22) COLLATE utf8_bin NOT NULL DEFAULT '1',
  `paquete` int(11) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(40) COLLATE utf8_bin NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `ultima_sesion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estatus` varchar(3) COLLATE utf8_bin DEFAULT 'DES',
  `nivel_en_red` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profiles`
--

LOCK TABLES `user_profiles` WRITE;
/*!40000 ALTER TABLE `user_profiles` DISABLE KEYS */;
INSERT INTO `user_profiles` VALUES (1,1,0,0,1,0,0,0,1,1,'1',1,'Admin','','0000-00-00','2016-10-18 05:07:52','ACT',3),(2,2,1,1,2,5,3,1,1,1,'1069740663',1,'Administrador','Oficina Virtual','1980-01-01','2016-10-18 05:10:49','ACT',1);
/*!40000 ALTER TABLE `user_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_red_temporal`
--

DROP TABLE IF EXISTS `user_red_temporal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_red_temporal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(10) DEFAULT NULL,
  `id_red_temporal` varchar(10) DEFAULT NULL,
  `id_red_a_red` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_red_temporal`
--

LOCK TABLES `user_red_temporal` WRITE;
/*!40000 ALTER TABLE `user_red_temporal` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_red_temporal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_soporte`
--

DROP TABLE IF EXISTS `user_soporte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(10) DEFAULT NULL,
  `id_red_temporal` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_soporte`
--

LOCK TABLES `user_soporte` WRITE;
/*!40000 ALTER TABLE `user_soporte` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_soporte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_webs_personales`
--

DROP TABLE IF EXISTS `user_webs_personales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_webs_personales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `clave` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_webs_personales`
--

LOCK TABLES `user_webs_personales` WRITE;
/*!40000 ALTER TABLE `user_webs_personales` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_webs_personales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `recovery` varchar(65) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created` (`created`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'1','$2a$08$n7GIrO4xJmW30zmr8./Wd.dhT93nUZj5FG1ctu/weBF3qxYnGrj6a','admin@admin.com',1,0,NULL,NULL,NULL,NULL,NULL,'127.0.0.1','2016-10-17 17:07:52','2015-07-11 00:00:00','2016-10-18 00:07:52','admin1414'),(2,'admin','$2a$08$n7GIrO4xJmW30zmr8./Wd.dhT93nUZj5FG1ctu/weBF3qxYnGrj6a','admin@miempresa.com',1,0,NULL,NULL,NULL,NULL,NULL,'127.0.0.1','2016-10-17 17:23:03','2015-05-11 00:00:00','2016-10-18 00:23:03','admin1414');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_almacen`
--

DROP TABLE IF EXISTS `users_almacen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_almacen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cedi` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `pais` varchar(3) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_almacen`
--

LOCK TABLES `users_almacen` WRITE;
/*!40000 ALTER TABLE `users_almacen` DISABLE KEYS */;
INSERT INTO `users_almacen` VALUES (1,1,2147483647,'modista','modista','santa','68574575','modista@gmail.com','COL','2016-09-29 05:38:16','ACT'),(2,2,2147483647,'contratista','contratista','cundi','5786586','contratista@gmail.com','COL','2016-09-29 05:41:41','ACT');
/*!40000 ALTER TABLE `users_almacen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_attempts`
--

DROP TABLE IF EXISTS `users_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_attempts` (
  `ip` varchar(20) NOT NULL,
  `last_login` datetime NOT NULL,
  `attempts` int(1) NOT NULL DEFAULT '1',
  `blocked` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_attempts`
--

LOCK TABLES `users_attempts` WRITE;
/*!40000 ALTER TABLE `users_attempts` DISABLE KEYS */;
INSERT INTO `users_attempts` VALUES ('127.0.0.1','2016-10-16 00:59:39',1,0);
/*!40000 ALTER TABLE `users_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_cedi`
--

DROP TABLE IF EXISTS `users_cedi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_cedi` (
  `id_users_cedi` int(11) NOT NULL AUTO_INCREMENT,
  `id_cedi` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellido_uno` varchar(45) NOT NULL,
  `apellido_dos` varchar(45) NOT NULL,
  `telefono_fijo` varchar(45) NOT NULL,
  `telefono_movil` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `ocupacion` varchar(45) NOT NULL,
  `id_pais` varchar(3) NOT NULL,
  `idioma` varchar(45) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(3) NOT NULL,
  PRIMARY KEY (`id_users_cedi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_cedi`
--

LOCK TABLES `users_cedi` WRITE;
/*!40000 ALTER TABLE `users_cedi` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_cedi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `valor_comisiones`
--

DROP TABLE IF EXISTS `valor_comisiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `valor_comisiones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profundidad` int(11) NOT NULL,
  `id_red` int(11) NOT NULL,
  `valor` varchar(45) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valor_comisiones`
--

LOCK TABLES `valor_comisiones` WRITE;
/*!40000 ALTER TABLE `valor_comisiones` DISABLE KEYS */;
/*!40000 ALTER TABLE `valor_comisiones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_estatus` varchar(3) NOT NULL DEFAULT 'DES',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_metodo_pago` varchar(10) NOT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta`
--

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'erpMultinivel'
--
/*!50003 DROP PROCEDURE IF EXISTS `afiliar` */;
 
DELIMITER ;;
CREATE  PROCEDURE `afiliar`(	

								ID_afiliar int

								,in Perfil varchar(255),								

								in Afiliar varchar(255),

								in Estilo varchar(255),

								in Coaplicante varchar(255),

																in Dir varchar(255),

								in Billetera varchar(255),

								in Rango varchar(255),

								in Img varchar(255)						

							)
BEGIN



start transaction;



update users set activated = 1 where id = ID_afiliar;



SET @sql = CONCAT('insert into user_profiles 

	(user_id,id_sexo,id_edo_civil,id_tipo_usuario,id_estudio,

		id_ocupacion,id_tiempo_dedicado, id_estatus,id_fiscal,

		keyword,paquete,nombre,apellido,fecha_nacimiento)

values (', Perfil, ')');

  PREPARE stmt FROM @sql;

  EXECUTE stmt;

	DEALLOCATE PREPARE stmt;



SET @sql = CONCAT('insert into cross_perfil_usuario

values (',ID_afiliar,',2)');

  PREPARE stmt FROM @sql;

  EXECUTE stmt;

	DEALLOCATE PREPARE stmt;



  SET @sql = CONCAT('insert into afiliar

						(id_red,

						id_afiliado,

						debajo_de,

						directo,

						lado)

values (', Afiliar, ')');

  PREPARE stmt FROM @sql;

  EXECUTE stmt;

	DEALLOCATE PREPARE stmt;



SET @sql = CONCAT('insert into estilo_usuario

					(id_usuario,

					bg_color,

					btn_1_color,

					btn_2_color)

values (', Estilo, ')');

  PREPARE stmt FROM @sql;

  EXECUTE stmt;

	DEALLOCATE PREPARE stmt;



SET @sql = CONCAT('insert into coaplicante

						(id_user,

						nombre,

						apellido,

						keyword)

values (', Coaplicante, ')');

  PREPARE stmt FROM @sql;

  EXECUTE stmt;

	DEALLOCATE PREPARE stmt;



SET @sql = CONCAT('insert into cross_dir_user

values (', Dir, ')');

  PREPARE stmt FROM @sql;

  EXECUTE stmt;

	DEALLOCATE PREPARE stmt;



SET @sql = CONCAT('insert into billetera

						(id_user,

						estatus,

						activo)

values (', Billetera, ')');

  PREPARE stmt FROM @sql;

  EXECUTE stmt;

	DEALLOCATE PREPARE stmt;



SET @sql = CONCAT('insert into cross_rango_user

						(id_user,

						id_rango,

						entregado,

						estatus)

values (', Rango, ')');

  PREPARE stmt FROM @sql;

  EXECUTE stmt;

	DEALLOCATE PREPARE stmt;



SET @sql = CONCAT('insert into cat_img

							(url,

							nombre_completo,

							nombre,

							extencion,

							estatus)

values (', Img, ')');

  PREPARE stmt FROM @sql;

  EXECUTE stmt;

	DEALLOCATE PREPARE stmt;



SELECT @A:=max(id_img) FROM cat_img;



SET @sql = CONCAT('insert into cross_img_user

values (',ID_afiliar,',',@A,')');

  PREPARE stmt FROM @sql;

  EXECUTE stmt;

	DEALLOCATE PREPARE stmt;



SELECT @Validar:=u.id FROM users u,user_profiles p,afiliar a 

						where a.id_afiliado = p.user_id and p.user_id = u.id

							and u.id = ID_afiliar;



if (@Validar=ID_afiliar) then 

	commit; 

else 

	rollback; 

	delete from cross_tel_user where id_user = ID_afiliar; 

	delete from users where id = ID_afiliar;

end if;



END ;;
DELIMITER ;
 
--
-- Final view structure for view `items`
--

/*!50001 DROP VIEW IF EXISTS `items`*/;
 
/*!50001 CREATE  VIEW `items` AS select `m`.`id` AS `id`,`m`.`sku` AS `sku`,`m`.`puntos_comisionables` AS `puntos_comisionables`,(case when (`m`.`id_tipo_mercancia` = 1) then (select `producto`.`nombre` from `producto` where (`producto`.`id` = `m`.`sku`)) when (`m`.`id_tipo_mercancia` = 2) then (select `servicio`.`nombre` from `servicio` where (`servicio`.`id` = `m`.`sku`)) when (`m`.`id_tipo_mercancia` = 3) then (select `combinado`.`nombre` from `combinado` where (`combinado`.`id` = `m`.`sku`)) when (`m`.`id_tipo_mercancia` = 4) then (select `paquete_inscripcion`.`nombre` from `paquete_inscripcion` where (`paquete_inscripcion`.`id_paquete` = `m`.`sku`)) when (`m`.`id_tipo_mercancia` = 5) then (select `membresia`.`nombre` from `membresia` where (`membresia`.`id` = `m`.`sku`)) else 'No define' end) AS `item`,(case when (`m`.`id_tipo_mercancia` = 1) then (select `producto`.`id_grupo` from `producto` where (`producto`.`id` = `m`.`sku`)) when (`m`.`id_tipo_mercancia` = 2) then (select `servicio`.`id_red` from `servicio` where (`servicio`.`id` = `m`.`sku`)) when (`m`.`id_tipo_mercancia` = 3) then (select `combinado`.`id_red` from `combinado` where (`combinado`.`id` = `m`.`sku`)) when (`m`.`id_tipo_mercancia` = 4) then (select `paquete_inscripcion`.`id_red` from `paquete_inscripcion` where (`paquete_inscripcion`.`id_paquete` = `m`.`sku`)) when (`m`.`id_tipo_mercancia` = 5) then (select `membresia`.`id_red` from `membresia` where (`membresia`.`id` = `m`.`sku`)) else '' end) AS `categoria`,(case when (`m`.`id_tipo_mercancia` = 1) then (select `a`.`id_red` from (`producto` `p` join `cat_grupo_producto` `a`) where ((`a`.`id_grupo` = `p`.`id_grupo`) and (`p`.`id` = `m`.`sku`))) when (`m`.`id_tipo_mercancia` = 2) then (select `a`.`id_red` from (`servicio` `s` join `cat_grupo_producto` `a`) where ((`a`.`id_grupo` = `s`.`id_red`) and (`s`.`id` = `m`.`sku`))) when (`m`.`id_tipo_mercancia` = 3) then (select `a`.`id_red` from (`combinado` `o` join `cat_grupo_producto` `a`) where ((`a`.`id_grupo` = `o`.`id_red`) and (`o`.`id` = `m`.`sku`))) when (`m`.`id_tipo_mercancia` = 4) then (select `a`.`id_red` from (`paquete_inscripcion` `q` join `cat_grupo_producto` `a`) where ((`a`.`id_grupo` = `q`.`id_red`) and (`q`.`id_paquete` = `m`.`sku`))) when (`m`.`id_tipo_mercancia` = 5) then (select `a`.`id_red` from (`membresia` `b` join `cat_grupo_producto` `a`) where ((`a`.`id_grupo` = `b`.`id_red`) and (`b`.`id` = `m`.`sku`))) else '' end) AS `red`,`m`.`id_tipo_mercancia` AS `id_tipo_mercancia` from `mercancia` `m` */;
 

-- Dump completed on 2017-07-27 17:24:11
