CREATE TABLE `sysuser` (
  `id` int,
  `username` varchar(255),
  `password` varchar(255),
  `name` varchar(255),
  `user_group` int,
  `user_hospital` int
);

CREATE TABLE `tblpuskesmas` (
  `id` int,
  `nama` varchar(255),
  `alamat` varchar(255),
  `notelp` varchar(255)
);

CREATE TABLE `sysgroup` (
  `id` int,
  `name` varchar(255)
);

CREATE TABLE `sysrole` (
  `id` int,
  `group_id` int,
  `program_id` varchar(255)
);

CREATE TABLE `sysmodule` (
  `program_id` varchar(255),
  `name` varchar(255),
  `parent_id` varchar(255),
  `link` varchar(255),
  `icon` varchar(255)
);

CREATE TABLE `sysregion` (
  `id` varchar(255),
  `name` varchar(255),
  `parent_id` varchar(255),
  `level` int
);

CREATE TABLE `syscode` (
  `idgroup` varchar(255),
  `idcode` varchar(255),
  `bpjs_code` varchar(255),
  `short_name` varchar(255),
  `full_name` varchar(255),
  `remark` varchar(255),
  `use_yn` varchar(255)
);

CREATE TABLE `syslog` (
  `id` int,
  `user_id` int,
  `action` varchar(255),
  `description` text,
  `result` text
);

CREATE TABLE `tblpasien` (
  `id` varchar(255),
  `nik` varchar(255),
  `bpjs_no` varchar(255),
  `nama` varchar(255),
  `pasien_type` varchar(255),
  `blood_type` varchar(255),
  `alamat` varchar(255),
  `orchard_id` varchar(255),
  `village` varchar(255),
  `district` varchar(255),
  `city` varchar(255),
  `birth_dt` date,
  `sex` varchar(255),
  `work` varchar(255),
  `education` varchar(255),
  `phone` varchar(255)
);

CREATE TABLE `tblvisits` (
  `id` int,
  `pasien_id` varchar(255),
  `visit_dt` date,
  `visit_type` varchar(255),
  `inap_yn` varchar(255),
  `worker_id` int,
  `kunj_sakit` int,
  `puskesmas_id` int,
  `poli_cd` varchar(255),
  `bpjs_kunj` varchar(255),
  `bpjs_no` varchar(255),
  `keluhan` text,
  `sadar_cd` varchar(255),
  `sistole` numeric,
  `diastole` numeric,
  `bb` numeric,
  `tb` numeric,
  `resprate` numeric,
  `heartrate` numeric,
  `rujukan_provider` varchar(255),
  `pulang_cd` varchar(255),
  `pulang_dt` date,
  `dokter_cd` varchar(255),
  `diag_1` varchar(255),
  `diag_2` varchar(255),
  `diag_3` varchar(255),
  `action_id` varchar(255),
  `rujukan_poli` varchar(255),
  `rujuk_lanjut` varchar(255),
  `ins_id` int,
  `ins_dt` datetime,
  `del_yn` varchar(255),
  `del_dt` datetime
);

CREATE TABLE `tblvisits_log` (
  `id` int,
  `log_dt` timestamp,
  `step` int,
  `remark` text
);

CREATE TABLE `tblresep` (
  `id` int,
  `visit_id` int,
  `obat_id` varchar(255),
  `qty` numeric,
  `dosis` varchar(255),
  `unit_cd` varchar(255),
  `ins_id` int,
  `ins_dt` datetime
);

CREATE TABLE `tbltindakan` (
  `id` int,
  `group_id` varchar(255),
  `nama` varchar(255),
  `js` numeric,
  `jp` numeric,
  `jb` numeric,
  `bpjs_code` varchar(255)
);

CREATE TABLE `tblhospital` (
  `id` int,
  `provider_id` varchar(255),
  `nama` varchar(255),
  `alamat` text,
  `phone` varchar(255),
  `kelas` varchar(255),
  `city` varchar(255),
  `jadwal` text
);

CREATE TABLE `tbldiagnosa` (
  `id` int,
  `diag_cd` varchar(255),
  `name` varchar(255),
  `nonspesialis` int,
  `bpjsblock` int
);

CREATE TABLE `tblobat` (
  `id` varchar(255),
  `bpjs_code` varchar(255),
  `nama` varchar(255),
  `unit_cd` varchar(255)
);

CREATE TABLE `tblobatmasuk` (
  `id` int,
  `puskesmas_id` int,
  `dt` date,
  `obat_id` varchar(255),
  `qty` numeric,
  `flag` varchar(255),
  `ins_id` varchar(255),
  `ins_dt` datetime
);

CREATE TABLE `tblobatclosing` (
  `id` int,
  `close_dt` varchar(255),
  `puskesmas_id` int,
  `obat_id` int,
  `stock_awal` numeric,
  `masuk` numeric,
  `keluar` numeric
);
