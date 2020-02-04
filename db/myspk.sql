/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     04/02/2020 10:04:41                          */
/*==============================================================*/


drop table if exists DATA_KEPALA_KELUARGA;

drop table if exists DETAIL_KRITERIA;

drop table if exists IR;

drop table if exists KRITERIA;

drop table if exists LOGIN;

drop table if exists PERBANDINGAN_KRITERIA;

drop table if exists PERBANDINGAN_PENDUDUK;

drop table if exists PV_KRITERIA;

drop table if exists PV_PENDUDUK;

/*==============================================================*/
/* Table: DATA_KEPALA_KELUARGA                                  */
/*==============================================================*/
create table DATA_KEPALA_KELUARGA
(
   ID_PENDUDUK          varchar(12) not null,
   NAMA                 varchar(100) not null,
   ALAMAT               varchar(100) not null,
   JUMLAH_ANGGOTA_KELUARGA int not null,
   STATUS_KPL_KELUARGA  varchar(15) not null,
   PEKERJAAN            varchar(50) not null,
   PENDIDIKAN_TERAKHIR  varchar(10) not null,
   PENGHASILAN          int not null,
   SUMBER_PENERANGAN    varchar(15) not null,
   BAHAN_BAKAR_MASAK    varchar(15) not null,
   MEMBELI_PAKAIAN      varchar(6) not null,
   SUMBER_AIR           varchar(10) not null,
   JENIS_DINDING        varchar(20) not null,
   JENIS_LANTAI         varchar(20) not null,
   KEMAMPUAN_BEROBAT    varchar(15) not null,
   primary key (ID_PENDUDUK)
);

/*==============================================================*/
/* Table: DETAIL_KRITERIA                                       */
/*==============================================================*/
create table DETAIL_KRITERIA
(
   ID_KRITERIA          char(7) not null,
   NILAI_KRITERIA       varchar(20) not null,
   BOBOT_NILAI_KRITERIA int not null
);

/*==============================================================*/
/* Table: IR                                                    */
/*==============================================================*/
create table IR
(
   JUMLAH               int not null,
   NILAI                float not null
);

/*==============================================================*/
/* Table: KRITERIA                                              */
/*==============================================================*/
create table KRITERIA
(
   ID_KRITERIA          char(7) not null,
   ID_PENDUDUK          varchar(12),
   NAMA_KRITERIA        varchar(20) not null,
   BOBOT_KRITERIA       decimal(6) not null,
   primary key (ID_KRITERIA)
);

/*==============================================================*/
/* Table: LOGIN                                                 */
/*==============================================================*/
create table LOGIN
(
   USER_NAME            varchar(16) not null,
   USER_PSW             char(16),
   USER_ROLE            varchar(30),
   primary key (USER_NAME)
);

/*==============================================================*/
/* Table: PERBANDINGAN_KRITERIA                                 */
/*==============================================================*/
create table PERBANDINGAN_KRITERIA
(
   KRITERIA1            char(7) not null,
   KRITERIA2            char(7) not null,
   NILAI_ANALISA_KRITERIA int
);

/*==============================================================*/
/* Table: PERBANDINGAN_PENDUDUK                                 */
/*==============================================================*/
create table PERBANDINGAN_PENDUDUK
(
   ID                   int not null,
   PENDUDUK1            varchar(12) not null,
   ID_KRITERIA          char(7) not null,
   PENDUDUK2            varchar(12) not null,
   NILAI                float,
   primary key (ID)
);

/*==============================================================*/
/* Table: PV_KRITERIA                                           */
/*==============================================================*/
create table PV_KRITERIA
(
   ID_KRITERIA          char(7) not null,
   NILAI                float
);

/*==============================================================*/
/* Table: PV_PENDUDUK                                           */
/*==============================================================*/
create table PV_PENDUDUK
(
   ID_KRITERIA          char(7),
   ID_PENDUDUK          varchar(12),
   NILAI                float
);

alter table DETAIL_KRITERIA add constraint FK_RELATIONSHIP_7 foreign key (ID_KRITERIA)
      references KRITERIA (ID_KRITERIA) on delete restrict on update restrict;

alter table KRITERIA add constraint FK_RELATIONSHIP_2 foreign key (ID_PENDUDUK)
      references DATA_KEPALA_KELUARGA (ID_PENDUDUK) on delete restrict on update restrict;

alter table PERBANDINGAN_KRITERIA add constraint FK_RELATIONSHIP_5 foreign key (KRITERIA2)
      references KRITERIA (ID_KRITERIA) on delete restrict on update restrict;

alter table PERBANDINGAN_KRITERIA add constraint FK_RELATIONSHIP_6 foreign key (KRITERIA1)
      references KRITERIA (ID_KRITERIA) on delete restrict on update restrict;

alter table PERBANDINGAN_PENDUDUK add constraint FK_RELATIONSHIP_10 foreign key (ID_KRITERIA)
      references KRITERIA (ID_KRITERIA) on delete restrict on update restrict;

alter table PERBANDINGAN_PENDUDUK add constraint FK_RELATIONSHIP_8 foreign key (PENDUDUK2)
      references DATA_KEPALA_KELUARGA (ID_PENDUDUK) on delete restrict on update restrict;

alter table PERBANDINGAN_PENDUDUK add constraint FK_RELATIONSHIP_9 foreign key (PENDUDUK1)
      references DATA_KEPALA_KELUARGA (ID_PENDUDUK) on delete restrict on update restrict;

alter table PV_KRITERIA add constraint FK_RELATIONSHIP_13 foreign key (ID_KRITERIA)
      references KRITERIA (ID_KRITERIA) on delete restrict on update restrict;

alter table PV_PENDUDUK add constraint FK_RELATIONSHIP_11 foreign key (ID_KRITERIA)
      references KRITERIA (ID_KRITERIA) on delete restrict on update restrict;

alter table PV_PENDUDUK add constraint FK_RELATIONSHIP_12 foreign key (ID_PENDUDUK)
      references DATA_KEPALA_KELUARGA (ID_PENDUDUK) on delete restrict on update restrict;

