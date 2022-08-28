CREATE DATABASE inventaris_smanila;
USE inventaris_smanila;

CREATE TABLE login (
	id 		INT (10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	email		VARCHAR (100) NOT NULL, 
	PASSWORD 	VARCHAR (100) NOT NULL, 
	role 		VARCHAR (100) NOT NULL
	);
DROP TABLE login
	
CREATE TABLE satuan (
	kd_satuan 	VARCHAR (50) NOT NULL PRIMARY KEY ,
	satuan 		VARCHAR (50) NOT NULL
	);
DROP TABLE satuan

CREATE TABLE kategori (
	kd_kategori 	INT AUTO_INCREMENT NOT NULL PRIMARY KEY ,
	kategori 	VARCHAR (50)
	);
DROP TABLE kategori

CREATE TABLE jenis_aset (
	kd_aset 	VARCHAR (50) NOT NULL PRIMARY KEY,
	jenis_aset 	VARCHAR (50) NOT NULL
	);
DROP TABLE jenis_aset	

CREATE TABLE barang (
	kd_barang 	VARCHAR (50) NOT NULL PRIMARY KEY, 
	nama_barang 	VARCHAR (100) NOT NULL ,
	stok 		INT (20) NOT NULL,
	kd_satuan 	VARCHAR (50) NOT NULL , 
	kd_kategori 	INT  NOT NULL,
	kd_aset	VARCHAR (50) NOT NULL,
	FOREIGN KEY (kd_satuan) REFERENCES satuan(kd_satuan)
	ON UPDATE CASCADE,
	FOREIGN KEY (kd_kategori) REFERENCES kategori(kd_kategori)
	ON UPDATE CASCADE,
	FOREIGN KEY (kd_aset) REFERENCES jenis_aset(kd_aset)
	);
	
DROP TABLE pengeluaran;
DROP TABLE pemasukan;
DROP TABLE barang
	
CREATE TABLE pengeluaran (
	id_keluar	INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	tanggal_keluar 	DATE NOT NULL ,
	kd_barang	VARCHAR (50) NOT NULL,
	jumlah_keluar 	INT (10) NOT NULL,
	keterangan 	VARCHAR (100) NOT NULL,
	penerima	VARCHAR (100) NOT NULL,
	FOREIGN KEY (kd_barang) REFERENCES barang(kd_barang)
	ON UPDATE CASCADE
	);
DROP TABLE pengeluaran	

CREATE TABLE pemasukan (
	id_masuk	INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	tanggal_masuk 	DATE NOT NULL,
	kd_barang	VARCHAR (50) NOT NULL,
	jumlah_masuk 	INT (10) NOT NULL,
	FOREIGN KEY (kd_barang) REFERENCES barang(kd_barang)
	ON UPDATE CASCADE
	);	
	
DROP TABLE pemasukan
INSERT INTO login VALUES (
	1,
	'admin1@gmail.com',
	'admin',
	'super'
	)
SELECT * FROM login

INSERT INTO satuan VALUES (
	'1',
	'unit'
	);

INSERT INTO satuan VALUES (
	'2',
	'Pcs'
	);

INSERT INTO kategori VALUES (
	'1',
	'mebel'
	);

INSERT INTO kategori VALUES (
	'2',
	'ATK'
	);
	
INSERT INTO jenis_aset VALUES (
	'1',
	'aset lancar'
	);
	
INSERT INTO barang VALUES (
	'001',
	'Kertas HVS A4',
	0,
	(SELECT kd_satuan FROM satuan WHERE satuan = 'Pcs'),
	(SELECT kd_kategori FROM kategori WHERE kategori = 'ATK'),
	(SELECT kd_aset FROM jenis_aset WHERE jenis_aset = 'Aset Lancar'))

INSERT INTO barang VALUES (
	'2',
	'kursi',
	0,
	(SELECT kd_satuan FROM satuan WHERE satuan = 'unit'),
	(SELECT kd_kategori FROM kategori WHERE kategori = 'mebel'),
	(SELECT kd_aset FROM jenis_aset WHERE jenis_aset = 'aset lancar')
	)

INSERT INTO barang VALUES (
	'3',
	'Pulpen',
	0,
	(SELECT kd_satuan FROM satuan WHERE satuan = 'unit'),
	(SELECT kd_kategori FROM kategori WHERE kategori = 'ATK'),
	(SELECT kd_aset FROM jenis_aset WHERE jenis_aset = 'aset lancar')
	)
	
INSERT INTO pengeluaran VALUES (
	'1',
	'2022-01-01',
	(SELECT kd_barang FROM barang WHERE nama_barang = 'meja'),
	10,
	'Event Porseni',
	'Budi'
	)
	
INSERT INTO pemasukan VALUES (
	'1',
	'2022-01-01',
	(SELECT kd_barang FROM barang WHERE nama_barang = 'meja'),
	10
	)
INSERT INTO pemasukan VALUES (
	'2',
	'2022-02-01',
	(SELECT kd_barang FROM barang WHERE nama_barang = 'kursi'),
	10
	)

INSERT INTO login (email, PASSWORD, role) VALUES ('admin1@gmail.com','admin', 'super')
DELETE FROM login WHERE id = 2
SELECT * FROM login
SELECT * FROM pemasukan;
SELECT * FROM pengeluaran;
SELECT * FROM barang;
SELECT * FROM kategori;
UPDATE barang SET stok = 10 WHERE kd_barang = '001'
INSERT INTO barang VALUES ('002', 'Spidol Hitam', 0, '3', '2', '1')
SELECT 
	barang.kd_barang,
	barang.nama_barang,
	kategori.kategori,
	barang.stok,
	SUM(pemasukan.jumlah_masuk) AS barang_masuk
FROM 
	((
		(barang
		INNER JOIN 
			kategori ON barang.kd_kategori = kategori.kd_kategori)
	INNER JOIN
		satuan ON barang.  = satuan.kd_satuan
	)
	INNER JOIN 
		pemasukan ON barang.kd_barang = pemasukan.kd_barang)
GROUP BY kd_barang



SELECT 
	barang.`kd_barang`,
	barang.`nama_barang`,
	kategori.kategori,
	barang.`stok`,
	satuan.`satuan` 
FROM 
	barang
INNER JOIN 
	kategori 
ON 
	barang.kd_kategori = kategori.kd_kategori
INNER JOIN 
	satuan
ON
	barang.kd_satuan = satuan.`kd_satuan`
	

UPDATE barang SET 
                    nama_barang ='Meja', 
                    stok        =1, 
                    kd_kategori    = '1', 
                    kd_satuan      = '2',
                    kd_aset     = '1'
                WHERE kd_barang ='1'

DELETE FROM barang WHERE kd_barang = 1


SELECT 
                      pemasukan.tanggal_masuk,
                      barang.nama_barang,
                      pemasukan.jumlah_masuk 
                    FROM pemasukan
                    INNER JOIN barang 
                          ON
                          pemasukan.kd_barang = barang.kd_barang
                         
                         
UPDATE pemasukan SET 
                    tanggal_masuk = '2000-10-1',
                    kd_barang     = '001',
                    jumlah_masuk     = 10
                    WHERE id_masuk ='9'
                    
 SELECT 
                      pemasukan.id_masuk AS id_masuk,
                      pemasukan.tanggal_masuk AS tanggal_masuk,
                      barang.nama_barang AS nama_barang,
                      pemasukan.jumlah_masuk AS jumlah_masuk
                    FROM pemasukan
                    INNER JOIN barang 
                          ON
                          pemasukan.kd_barang = barang.kd_barang
SELECT * FROM pengeluaran	
INSERT INTO pengeluaran 
	(tanggal_keluar, kd_barang, jumlah_keluar, keterangan, penerima) 
VALUES ('2001-01-01', '1', 10, 'Peminjaman Test', 'Budi Si Kecil')
SELECT * FROM pengeluaran;
SELECT * FROM pemasukan
INSERT INTO kategori (kategori) VALUES ('Testing')
SELECT * FROM kategori
SELECT * FROM jenis_aset
INSERT INTO jenis_aset  VALUES ('1', 'Aset Lancar'),('2','Aset Tetap')
UPDATE pengeluaran SET 
                    tanggal_keluar   = '2020-12-12',
                    kd_barang       = 1,
                    jumlah_keluar    = 10,
                    keterangan = 'Testing 10',
                    penerima = 'Raihan'
                    WHERE id_keluar  ='3'
                    
SELECT 
	barang.nama_barang AS nama_barang,
	SUM(pengeluaran.`jumlah_keluar`) AS High
FROM 
	pengeluaran
INNER JOIN 
	barang 
ON
	pengeluaran.kd_barang = barang.kd_barang
GROUP BY nama_barang ASC
LIMIT 1


SELECT 
	pemasukan.id_masuk AS id_masuk,
	pemasukan.tanggal_masuk AS tanggal_masuk,
	barang.nama_barang AS nama_barang,
	pemasukan.jumlah_masuk AS jumlah_masuk,
	(SELECT 
		kategori.`kategori` 
	 FROM 
		pemasukan,
		barang
	 INNER JOIN 
		kategori 
	 ON
		barang.`kd_kategori` = kategori.`kd_kategori` LIMIT 1) AS Kategori
		
FROM pemasukan
INNER JOIN barang 
    ON
    pemasukan.kd_barang = barang.kd_barang
    
 -- ----------------------------------------- --    
SELECT 
	pemasukan.id_masuk AS id_masuk,
	pemasukan.tanggal_masuk AS tanggal_masuk,
	barang.nama_barang AS nama_barang,
	pemasukan.jumlah_masuk AS jumlah_masuk,
	kategori.`kategori` AS Kategori
FROM 
	pemasukan
INNER JOIN 
	barang 
ON
pemasukan.kd_barang = barang.kd_barang,
	barang AS brg
INNER JOIN 
	kategori
ON 
	brg.`kd_kategori` = kategori.`kd_kategori`
	
 -- ----------------------------------------- -- 	
