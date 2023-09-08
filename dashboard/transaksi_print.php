<?php
$pageTitle = "Print Transaksi";
include '../connection.php';

// Check if the transaction ID is provided in the URL
if (isset($_GET['transaksi_id'])) {
    $transaksiId = $_GET['transaksi_id'];

    // Retrieve transaction details from the database
    $query = "SELECT t.*, s.nama AS nama_santri, k.nama AS nama_kelas, td.semester AS semester, td.tahun_pelajaran AS tahun_pelajaran
    FROM transaksi t
    JOIN santri s ON t.id_santri = s.id_santri
    JOIN kelas k ON s.id_kelas = k.id_kelas
    JOIN transaksi_detail td ON t.id_transaksi_detail = td.id_transaksi_detail WHERE t.id_transaksi = $transaksiId";

    $query4 = "SELECT * FROM petugas WHERE id_petugas = 2";

    $query5 = "SELECT * FROM petugas WHERE id_petugas = 4";



    $result = mysqli_query($connection, $query);


    $result4 = mysqli_query($connection, $query4);

    $result5 = mysqli_query($connection, $query5);
} else {

    echo 'Invalid transaction ID.';
}

?>

<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">

<head>
    <title>SIMANTRINURI - <?php echo $pageTitle; ?></title> <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries --> <!-- Favicon icon -->
    <link rel="icon" href="..\files\assets\images\favicon.png" type="image/x-icon">

    <meta http-equiv=Content-Type content="text/html; charset=windows-1252">
    <meta name=ProgId content=Excel.Sheet>
    <meta name=Generator content="Microsoft Excel 15">
    <link rel=File-List href="transaksi_printing_files/filelist.xml">
    <!--[if !mso]>
<style>
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
x\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>
<![endif]-->
    <style id="transaksi_print_template_1949_Styles">
        <!--table
        {
            mso-displayed-decimal-separator: "\,";
            mso-displayed-thousand-separator: "\.";
        }

        .font51949 {
            color: black;
            font-size: 14.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Verdana, sans-serif;
            mso-font-charset: 0;
        }

        .font61949 {
            color: black;
            font-size: 14.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Verdana, sans-serif;
            mso-font-charset: 0;
        }

        .xl151949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 1;
            mso-number-format: General;
            text-align: general;
            vertical-align: bottom;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl651949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 10.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 1;
            mso-number-format: General;
            text-align: general;
            vertical-align: middle;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl661949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 10.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 1;
            mso-number-format: General;
            text-align: general;
            vertical-align: bottom;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl671949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 10.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 1;
            mso-number-format: General;
            text-align: general;
            vertical-align: bottom;
            border-top: .5pt solid windowtext;
            border-right: none;
            border-bottom: none;
            border-left: .5pt solid windowtext;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl681949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 10.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 1;
            mso-number-format: General;
            text-align: general;
            vertical-align: bottom;
            border-top: .5pt solid windowtext;
            border-right: none;
            border-bottom: none;
            border-left: none;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl691949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 9.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Verdana, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: left;
            vertical-align: middle;
            border-top: .5pt solid windowtext;
            border-right: none;
            border-bottom: none;
            border-left: none;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl701949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 10.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Verdana, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: left;
            vertical-align: middle;
            border-top: .5pt solid windowtext;
            border-right: none;
            border-bottom: none;
            border-left: none;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl711949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 1;
            mso-number-format: General;
            text-align: general;
            vertical-align: bottom;
            border-top: .5pt solid windowtext;
            border-right: none;
            border-bottom: none;
            border-left: none;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl721949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 10.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 1;
            mso-number-format: General;
            text-align: general;
            vertical-align: bottom;
            border-top: none;
            border-right: none;
            border-bottom: none;
            border-left: .5pt solid windowtext;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl731949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 6.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: left;
            vertical-align: middle;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl741949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 8.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: left;
            vertical-align: middle;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl751949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 9.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: general;
            vertical-align: bottom;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl761949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 14.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Verdana, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: general;
            vertical-align: top;
            border-top: none;
            border-right: none;
            border-bottom: none;
            border-left: .5pt solid windowtext;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl771949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 14.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Verdana, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: general;
            vertical-align: top;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl781949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 14.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Verdana, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: general;
            vertical-align: top;
            border-top: none;
            border-right: .5pt solid windowtext;
            border-bottom: none;
            border-left: none;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl791949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 10.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 1;
            mso-number-format: General;
            text-align: general;
            vertical-align: bottom;
            border-top: none;
            border-right: .5pt solid windowtext;
            border-bottom: none;
            border-left: none;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl801949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 10.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 1;
            mso-number-format: General;
            text-align: general;
            vertical-align: bottom;
            border-top: none;
            border-right: none;
            border-bottom: .5pt solid windowtext;
            border-left: .5pt solid windowtext;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl811949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 10.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 1;
            mso-number-format: General;
            text-align: general;
            vertical-align: bottom;
            border-top: none;
            border-right: none;
            border-bottom: .5pt solid windowtext;
            border-left: none;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl821949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 10.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 1;
            mso-number-format: General;
            text-align: general;
            vertical-align: bottom;
            border-top: none;
            border-right: .5pt solid windowtext;
            border-bottom: .5pt solid windowtext;
            border-left: none;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl831949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 1;
            mso-number-format: General;
            text-align: general;
            vertical-align: middle;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl841949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 1;
            mso-number-format: General;
            text-align: general;
            vertical-align: middle;
            border-top: none;
            border-right: none;
            border-bottom: .5pt solid windowtext;
            border-left: none;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl851949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 9.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 1;
            mso-number-format: General;
            text-align: general;
            vertical-align: middle;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl861949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 1;
            mso-number-format: General;
            text-align: general;
            vertical-align: middle;
            border-top: .5pt solid windowtext;
            border-right: none;
            border-bottom: none;
            border-left: .5pt solid windowtext;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl871949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 1;
            mso-number-format: General;
            text-align: general;
            vertical-align: middle;
            border-top: .5pt solid windowtext;
            border-right: none;
            border-bottom: none;
            border-left: none;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl881949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 1;
            mso-number-format: General;
            text-align: general;
            vertical-align: middle;
            border-top: .5pt solid windowtext;
            border-right: .5pt solid windowtext;
            border-bottom: none;
            border-left: none;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl891949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 1;
            mso-number-format: General;
            text-align: general;
            vertical-align: bottom;
            border-top: none;
            border-right: none;
            border-bottom: .5pt solid windowtext;
            border-left: .5pt solid windowtext;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl901949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 1;
            mso-number-format: General;
            text-align: general;
            vertical-align: bottom;
            border-top: none;
            border-right: none;
            border-bottom: .5pt solid windowtext;
            border-left: none;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl911949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 1;
            mso-number-format: General;
            text-align: general;
            vertical-align: bottom;
            border-top: none;
            border-right: .5pt solid windowtext;
            border-bottom: .5pt solid windowtext;
            border-left: none;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl921949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 1;
            mso-number-format: General;
            text-align: center;
            vertical-align: middle;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl931949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: middle;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl941949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 1;
            mso-number-format: General;
            text-align: justify;
            vertical-align: middle;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: normal;
        }

        .xl951949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 1;
            mso-number-format: General;
            text-align: left;
            vertical-align: middle;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl961949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 6.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: left;
            vertical-align: middle;
            border-top: none;
            border-right: none;
            border-bottom: none;
            border-left: .5pt solid windowtext;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl971949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 6.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: left;
            vertical-align: middle;
            border-top: none;
            border-right: .5pt solid windowtext;
            border-bottom: none;
            border-left: none;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl981949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 8.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Verdana, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: top;
            border-top: none;
            border-right: none;
            border-bottom: .5pt solid windowtext;
            border-left: none;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl991949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 6.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: left;
            vertical-align: middle;
            border-top: none;
            border-right: none;
            border-bottom: none;
            border-left: .5pt solid windowtext;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: normal;
        }

        .xl1001949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 6.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: left;
            vertical-align: middle;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: normal;
        }

        .xl1011949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 6.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: left;
            vertical-align: middle;
            border-top: none;
            border-right: .5pt solid windowtext;
            border-bottom: none;
            border-left: none;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: normal;
        }

        .xl1021949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 10.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 1;
            mso-number-format: General;
            text-align: center;
            vertical-align: bottom;
            border: .5pt solid windowtext;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl1031949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 6.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Verdana, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: middle;
            border-top: .5pt solid windowtext;
            border-right: none;
            border-bottom: none;
            border-left: .5pt solid windowtext;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: normal;
        }

        .xl1041949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 6.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Verdana, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: middle;
            border-top: .5pt solid windowtext;
            border-right: none;
            border-bottom: none;
            border-left: none;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: normal;
        }

        .xl1051949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 6.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Verdana, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: middle;
            border-top: .5pt solid windowtext;
            border-right: .5pt solid windowtext;
            border-bottom: none;
            border-left: none;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: normal;
        }

        .xl1061949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 6.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Verdana, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: middle;
            border-top: none;
            border-right: none;
            border-bottom: none;
            border-left: .5pt solid windowtext;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: normal;
        }

        .xl1071949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 6.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Verdana, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: middle;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: normal;
        }

        .xl1081949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 6.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Verdana, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: middle;
            border-top: none;
            border-right: .5pt solid windowtext;
            border-bottom: none;
            border-left: none;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: normal;
        }

        .xl1091949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 14.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Verdana, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: top;
            border-top: none;
            border-right: none;
            border-bottom: none;
            border-left: .5pt solid windowtext;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl1101949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 14.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Verdana, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: top;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl1111949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 14.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Verdana, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: top;
            border-top: none;
            border-right: .5pt solid windowtext;
            border-bottom: none;
            border-left: none;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl1121949 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: left;
            vertical-align: middle;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }
        -->
    </style>
</head>

<body>




    <!--[if !excel]>&nbsp;&nbsp;<![endif]-->
    <!--The following information was generated by Microsoft Excel's Publish as Web
Page wizard.-->
    <!--If the same item is republished from Excel, all information between the DIV
tags will be replaced.-->
    <!----------------------------->
    <!--START OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD -->
    <!----------------------------->

    <div id="transaksi_print_template_1949" align=center x:publishsource="Excel">

        <table border=0 cellpadding=0 cellspacing=0 width=415 style='border-collapse:
 collapse;table-layout:fixed;width:311pt'>
            <col width=22 style='mso-width-source:userset;mso-width-alt:804;width:17pt'>
            <col width=21 style='mso-width-source:userset;mso-width-alt:768;width:16pt'>
            <col width=23 span=4 style='mso-width-source:userset;mso-width-alt:841;
 width:17pt'>
            <col width=34 style='mso-width-source:userset;mso-width-alt:1243;width:26pt'>
            <col width=25 span=3 style='mso-width-source:userset;mso-width-alt:914;
 width:19pt'>
            <col width=19 span=4 style='mso-width-source:userset;mso-width-alt:694;
 width:14pt'>
            <col width=12 span=6 style='mso-width-source:userset;mso-width-alt:438;
 width:9pt'>
            <col width=23 style='mso-width-source:userset;mso-width-alt:841;width:17pt'>
            <tr height=18 style='mso-height-source:userset;height:14.1pt'>
                <td height=18 class=xl651949 width=22 style='height:14.1pt;width:17pt'></td>
                <td class=xl651949 width=21 style='width:16pt'></td>
                <td class=xl651949 width=23 style='width:17pt'></td>
                <td class=xl651949 width=23 style='width:17pt'></td>
                <td class=xl651949 width=23 style='width:17pt'></td>
                <td class=xl651949 width=23 style='width:17pt'></td>
                <td class=xl651949 width=34 style='width:26pt'></td>
                <td class=xl651949 width=25 style='width:19pt'></td>
                <td class=xl651949 width=25 style='width:19pt'></td>
                <td class=xl651949 width=25 style='width:19pt'></td>
                <td class=xl651949 width=19 style='width:14pt'></td>
                <td class=xl651949 width=19 style='width:14pt'></td>
                <td class=xl651949 width=19 style='width:14pt'></td>
                <td class=xl651949 width=19 style='width:14pt'></td>
                <td class=xl651949 width=12 style='width:9pt'></td>
                <td class=xl651949 width=12 style='width:9pt'></td>
                <td class=xl651949 width=12 style='width:9pt'></td>
                <td class=xl651949 width=12 style='width:9pt'></td>
                <td class=xl651949 width=12 style='width:9pt'></td>
                <td class=xl651949 width=12 style='width:9pt'></td>
                <td class=xl651949 width=23 style='width:17pt'></td>
            </tr>
            <tr height=20 style='mso-height-source:userset;height:15.0pt'>
                <td height=20 style='height:15.0pt' align=left valign=top><!--[if gte vml 1]><v:shapetype
   id="_x0000_t75" coordsize="21600,21600" o:spt="75" o:preferrelative="t"
   path="m@4@5l@4@11@9@11@9@5xe" filled="f" stroked="f">
   <v:stroke joinstyle="miter"/>
   <v:formulas>
    <v:f eqn="if lineDrawn pixelLineWidth 0"/>
    <v:f eqn="sum @0 1 0"/>
    <v:f eqn="sum 0 0 @1"/>
    <v:f eqn="prod @2 1 2"/>
    <v:f eqn="prod @3 21600 pixelWidth"/>
    <v:f eqn="prod @3 21600 pixelHeight"/>
    <v:f eqn="sum @0 0 1"/>
    <v:f eqn="prod @6 1 2"/>
    <v:f eqn="prod @7 21600 pixelWidth"/>
    <v:f eqn="sum @8 21600 0"/>
    <v:f eqn="prod @7 21600 pixelHeight"/>
    <v:f eqn="sum @10 21600 0"/>
   </v:formulas>
   <v:path o:extrusionok="f" gradientshapeok="t" o:connecttype="rect"/>
   <o:lock v:ext="edit" aspectratio="t"/>
  </v:shapetype><v:shape id="Picture_x0020_0" o:spid="_x0000_s1025" type="#_x0000_t75"
   style='position:absolute;margin-left:1.5pt;margin-top:1.5pt;width:48pt;
   height:46.5pt;z-index:1;visibility:visible' o:gfxdata="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
AAAhAKomDr68AAAAIQEAAB0AAABkcnMvX3JlbHMvcGljdHVyZXhtbC54bWwucmVsc4SPQWrDMBBF
94XcQcw+lp1FKMWyN6HgbUgOMEhjWcQaCUkt9e0jyCaBQJfzP/89ph///Cp+KWUXWEHXtCCIdTCO
rYLr5Xv/CSIXZINrYFKwUYZx2H30Z1qx1FFeXMyiUjgrWEqJX1JmvZDH3IRIXJs5JI+lnsnKiPqG
luShbY8yPTNgeGGKyShIk+lAXLZYzf+zwzw7TaegfzxxeaOQzld3BWKyVBR4Mg4fYddEtiCHXr48
NtwBAAD//wMAUEsBAi0AFAAGAAgAAAAhAFqYrcIMAQAAGAIAABMAAAAAAAAAAAAAAAAAAAAAAFtD
b250ZW50X1R5cGVzXS54bWxQSwECLQAUAAYACAAAACEACMMYpNQAAACTAQAACwAAAAAAAAAAAAAA
AAA9AQAAX3JlbHMvLnJlbHNQSwECLQAUAAYACAAAACEAzBklzqcDAAD4CQAAEgAAAAAAAAAAAAAA
AAA6AgAAZHJzL3BpY3R1cmV4bWwueG1sUEsBAi0ACgAAAAAAAAAhAF6QzlfcRgAA3EYAABQAAAAA
AAAAAAAAAAAAEQYAAGRycy9tZWRpYS9pbWFnZTEucG5nUEsBAi0AFAAGAAgAAAAhAM8XZ/AKAQAA
ggEAAA8AAAAAAAAAAAAAAAAAH00AAGRycy9kb3ducmV2LnhtbFBLAQItABQABgAIAAAAIQCqJg6+
vAAAACEBAAAdAAAAAAAAAAAAAAAAAFZOAABkcnMvX3JlbHMvcGljdHVyZXhtbC54bWwucmVsc1BL
BQYAAAAABgAGAIQBAABNTwAAAAA=
">
   <v:imagedata src="../images/kemenag.png"
    o:title=""/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]-->
                    <![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:1;margin-left:2px;margin-top:2px;width:64px;
  height:62px'><img width=64 height=62 src="..\files\assets\images\logo-sm.png" v:shapes="Picture_x0020_0"></span>
                    <![endif]><span style='mso-ignore:vglayout2'>
                        <table cellpadding=0 cellspacing=0>
                            <tr>
                                <td height=20 class=xl671949 width=22 style='height:15.0pt;width:17pt'>&nbsp;</td>
                            </tr>
                        </table>
                    </span>
                </td>
                <td class=xl681949>&nbsp;</td>
                <td class=xl681949>&nbsp;</td>
                <td class=xl691949 colspan=11>PONDOK PESANTREN NURUL IMAN</td>
                <td colspan=7 rowspan=2 class=xl1031949 width=95 style='border-right:.5pt solid black;
  width:71pt'>PENGANTAR NOTA KEUANGAN</td>
            </tr>
            <tr height=11 style='mso-height-source:userset;height:8.45pt'>
                <td height=11 class=xl721949 style='height:8.45pt'>&nbsp;</td>
                <td class=xl661949></td>
                <td class=xl661949></td>
                <td class=xl731949 colspan=10>Akte Notaris : Muhammad Yusuf Ibrahim, S.H.,
                    M.Kn. No. 01</td>
                <td class=xl751949></td>
            </tr>
            <tr height=11 style='mso-height-source:userset;height:8.45pt'>
                <td height=11 class=xl721949 style='height:8.45pt'>&nbsp;</td>
                <td class=xl661949></td>
                <td class=xl661949></td>
                <td class=xl731949 colspan=8>SK. Menkumham : AHU-0015607.AH.01.04.Tahun 2015</td>
                <td class=xl751949></td>
                <td class=xl751949></td>
                <td class=xl751949></td>
                <td colspan=7 rowspan=2 class=xl1091949 style='border-right:.5pt solid black'>
                    <font class="font61949">(</font>
                    <font class="font51949"> P N K </font>
                    <font class="font61949">)</font>
                </td>
            </tr>
            <tr height=26 style='mso-height-source:userset;height:19.5pt'>
                <td height=26 class=xl721949 style='height:19.5pt'>&nbsp;</td>
                <td class=xl661949></td>
                <td class=xl661949></td>
                <td colspan=11 class=xl1001949 width=254 style='border-right:.5pt solid black;
  width:190pt'>Piagam Kandepag No. : KW.13.5/02/PP.00.7/224/2004<span style='mso-spacerun:yes'> </span><br>
                    No. Statistik : 512 351 211 064</td>
            </tr>
            <tr height=16 style='mso-height-source:userset;height:12.0pt'>
                <td colspan=14 height=16 class=xl961949 style='border-right:.5pt solid black;
  height:12.0pt'>Jalan<span style='mso-spacerun:yes'> </span>PP Nurul Iman No
                    01<span style='mso-spacerun:yes'> </span>Seletreng Kapongan<span style='mso-spacerun:yes'> </span>Situbondo Jawa Timur Indonesia 68362</td>
                <td class=xl761949 style='border-left:none'>&nbsp;</td>
                <td class=xl771949></td>
                <td colspan=3 class=xl981949>No</td>
                <td class=xl771949></td>
                <td class=xl781949>&nbsp;</td>
            </tr>
            <tr height=23 style='mso-height-source:userset;height:17.25pt'>
                <td colspan=14 height=23 class=xl991949 width=320 style='border-right:.5pt solid black;
  height:17.25pt;width:240pt'>Telp (0338) 3958585 / 5509636<span style='mso-spacerun:yes'> </span>email : yppnis@gmail.com -
                    ppnuruliman@yahoo.com<span style='mso-spacerun:yes'> </span><br>
                    facebook : www.facebook.com/ppnuruliman</td>
                <td class=xl721949 style='border-left:none'>&nbsp;</td>
                <td class=xl661949></td>
                <td colspan=3 class=xl1021949>&nbsp;</td>
                <td class=xl661949></td>
                <td class=xl791949>&nbsp;</td>
            </tr>
            <tr height=9 style='mso-height-source:userset;height:6.75pt'>
                <td height=9 class=xl801949 style='height:6.75pt'>&nbsp;</td>
                <td class=xl811949>&nbsp;</td>
                <td class=xl811949>&nbsp;</td>
                <td class=xl811949>&nbsp;</td>
                <td class=xl811949>&nbsp;</td>
                <td class=xl811949>&nbsp;</td>
                <td class=xl811949>&nbsp;</td>
                <td class=xl811949>&nbsp;</td>
                <td class=xl811949>&nbsp;</td>
                <td class=xl811949>&nbsp;</td>
                <td class=xl811949>&nbsp;</td>
                <td class=xl811949>&nbsp;</td>
                <td class=xl811949>&nbsp;</td>
                <td class=xl811949>&nbsp;</td>
                <td class=xl801949>&nbsp;</td>
                <td class=xl811949>&nbsp;</td>
                <td class=xl811949>&nbsp;</td>
                <td class=xl811949>&nbsp;</td>
                <td class=xl811949>&nbsp;</td>
                <td class=xl811949>&nbsp;</td>
                <td class=xl821949>&nbsp;</td>
            </tr>
            <tr height=7 style='mso-height-source:userset;height:5.25pt'>
                <td height=7 class=xl681949 style='height:5.25pt;border-top:none'>&nbsp;</td>
                <td class=xl681949 style='border-top:none'>&nbsp;</td>
                <td class=xl681949 style='border-top:none'>&nbsp;</td>
                <td class=xl681949 style='border-top:none'>&nbsp;</td>
                <td class=xl681949 style='border-top:none'>&nbsp;</td>
                <td class=xl681949 style='border-top:none'>&nbsp;</td>
                <td class=xl681949 style='border-top:none'>&nbsp;</td>
                <td class=xl681949 style='border-top:none'>&nbsp;</td>
                <td class=xl681949 style='border-top:none'>&nbsp;</td>
                <td class=xl681949 style='border-top:none'>&nbsp;</td>
                <td class=xl681949 style='border-top:none'>&nbsp;</td>
                <td class=xl681949 style='border-top:none'>&nbsp;</td>
                <td class=xl681949 style='border-top:none'>&nbsp;</td>
                <td class=xl681949 style='border-top:none'>&nbsp;</td>
                <td class=xl681949 style='border-top:none'>&nbsp;</td>
                <td class=xl681949 style='border-top:none'>&nbsp;</td>
                <td class=xl681949 style='border-top:none'>&nbsp;</td>
                <td class=xl681949 style='border-top:none'>&nbsp;</td>
                <td class=xl681949 style='border-top:none'>&nbsp;</td>
                <td class=xl681949 style='border-top:none'>&nbsp;</td>
                <td class=xl681949 style='border-top:none'>&nbsp;</td>
            </tr>
            <?php
            if (mysqli_num_rows($result) > 0) {
                // Counter variable for numbering the rows

                if ($row = mysqli_fetch_assoc($result)) {

                    if ($row4 = mysqli_fetch_assoc($result4)) {

                        if ($row5 = mysqli_fetch_assoc($result5)) {





            ?>
                            <tr class=xl831949 height=27 style='mso-height-source:userset;height:20.45pt'>
                                <td height=27 class=xl831949 colspan=2 style='height:20.45pt'>Nama</td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949>:</td>
                                <td class=xl841949><?php

                                                    // Display the transaction details
                                                    // You can format and style the content here
                                                    echo '<p>' . $row['nama_santri'] . '</p>';


                                                    // ... display other details ...
                                                    ?></td>

                                <td class=xl831949></td>
                            </tr>
                            <tr class=xl831949 height=5 style='mso-height-source:userset;height:4.15pt'>
                                <td height=5 class=xl831949 style='height:4.15pt'></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                            </tr>
                            <tr class=xl831949 height=27 style='mso-height-source:userset;height:20.45pt'>
                                <td height=27 class=xl831949 colspan=3 style='height:20.45pt'>Program</td>
                                <td class=xl831949></td>
                                <td class=xl831949>:</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl831949></td>
                            </tr>
                            <tr class=xl831949 height=5 style='mso-height-source:userset;height:4.15pt'>
                                <td height=5 class=xl831949 style='height:4.15pt'></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                            </tr>
                            <tr class=xl831949 height=27 style='mso-height-source:userset;height:20.45pt'>
                                <td height=27 class=xl831949 colspan=4 style='height:20.45pt'>Pendidikan</td>
                                <td class=xl831949>:</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl831949></td>
                            </tr>
                            <tr class=xl831949 height=5 style='mso-height-source:userset;height:4.15pt'>
                                <td height=5 class=xl831949 style='height:4.15pt'></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                            </tr>
                            <tr class=xl831949 height=27 style='mso-height-source:userset;height:20.45pt'>
                                <td height=27 class=xl831949 colspan=2 style='height:20.45pt'>Kelas</td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949>:</td>
                                <td class=xl841949><?php echo $row['nama_kelas']; ?></td>

                                <td class=xl831949></td>
                            </tr>
                            <tr class=xl831949 height=5 style='mso-height-source:userset;height:4.15pt'>
                                <td height=5 class=xl831949 style='height:4.15pt'></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                            </tr>
                            <tr class=xl831949 height=27 style='mso-height-source:userset;height:20.45pt'>
                                <td height=27 class=xl831949 colspan=3 style='height:20.45pt'>Asrama</td>
                                <td class=xl831949></td>
                                <td class=xl831949>:</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl831949></td>
                            </tr>
                            <tr class=xl831949 height=5 style='mso-height-source:userset;height:4.15pt'>
                                <td height=5 class=xl831949 style='height:4.15pt'></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                            </tr>
                            <tr class=xl831949 height=27 style='mso-height-source:userset;height:20.45pt'>
                                <td height=27 class=xl831949 colspan=3 style='height:20.45pt'>Kamar</td>
                                <td class=xl831949></td>
                                <td class=xl831949>:</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl841949>&nbsp;</td>
                                <td class=xl831949></td>
                            </tr>
                            <tr class=xl831949 height=5 style='mso-height-source:userset;height:4.15pt'>
                                <td height=5 class=xl831949 style='height:4.15pt'></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                            </tr>
                            <tr class=xl831949 height=14 style='mso-height-source:userset;height:10.9pt'>
                                <td height=14 class=xl831949 style='height:10.9pt'></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                            </tr>
                            <tr class=xl831949 height=27 style='mso-height-source:userset;height:20.45pt'>
                                <td colspan=21 rowspan=2 height=66 class=xl941949 width=415 style='height:
  49.7pt;width:311pt'>bahwa nama yang tersebut diatas telah melunasi keuangan
                                    pesantren untuk tagihan Semester <?php echo $row['semester']; ?> Tahun Pelajaran <?php echo $row['tahun_pelajaran']; ?> dan memenuhi syarat secara
                                    administrasi keuangan</td>
                            </tr>
                            <tr class=xl831949 height=39 style='mso-height-source:userset;height:29.25pt'>
                            </tr>
                            <tr class=xl831949 height=12 style='mso-height-source:userset;height:9.6pt'>
                                <td height=12 class=xl831949 style='height:9.6pt'></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                            </tr>
                            <tr class=xl831949 height=5 style='mso-height-source:userset;height:4.15pt'>
                                <td height=5 class=xl831949 style='height:4.15pt'></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                            </tr>
                            <tr class=xl831949 height=27 style='mso-height-source:userset;height:20.45pt'>
                                <td colspan=21 height=27 class=xl951949 style='height:20.45pt'>Demikian untuk
                                    dijadikan acuan adanya</td>
                            </tr>
                            <tr class=xl831949 height=27 style='mso-height-source:userset;height:20.45pt'>
                                <td height=27 class=xl831949 style='height:20.45pt'></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td colspan=11 class=xl921949>Situbondo, <?php
                                                                            // Array of Indonesian month names
                                                                            $indoMonthNames = array(
                                                                                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli',
                                                                                'Agustus', 'September', 'Oktober', 'November', 'Desember'
                                                                            );

                                                                            $dateFromDatabase = $row['tanggal_transaksi']; // Assuming $row['tanggal_transaksi'] contains the date from the database

                                                                            // Convert the date to the desired format with Indonesian month name
                                                                            $formattedDate = date('j F Y', strtotime($dateFromDatabase));

                                                                            // Replace the English month name with Indonesian month name
                                                                            $formattedDate = str_replace(date('F', strtotime($dateFromDatabase)), $indoMonthNames[date('n', strtotime($dateFromDatabase)) - 1], $formattedDate);

                                                                            echo $formattedDate; // Output: 8 Agustus 2023
                                                                            ?>

                                </td>
                                <td class=xl831949></td>
                            </tr>
                            <tr class=xl831949 height=27 style='mso-height-source:userset;height:20.45pt'>
                                <td colspan=7 height=27 class=xl921949 style='height:20.45pt'>Verifikator,</td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td colspan=11 class=xl921949>Administrator Keuangan,</td>
                                <td class=xl831949></td>
                            </tr>
                            <tr class=xl831949 height=27 style='mso-height-source:userset;height:20.45pt'>
                                <td height=27 class=xl831949 style='height:20.45pt'></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                            </tr>
                            <tr class=xl831949 height=27 style='mso-height-source:userset;height:20.45pt'>
                                <td height=27 class=xl831949 style='height:20.45pt'></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                            </tr>
                            <tr class=xl831949 height=27 style='mso-height-source:userset;height:20.45pt'>
                                <td height=27 class=xl831949 style='height:20.45pt'></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                            </tr>
                            <tr class=xl831949 height=27 style='mso-height-source:userset;height:20.45pt'>
                                <td colspan=7 height=27 class=xl1121949 style='height:20.45pt'><?php echo $row4['nama']; ?></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td colspan=11 class=xl931949><?php echo $row5['nama']; ?></td>
                                <td class=xl831949></td>
                            </tr>
                            <tr class=xl831949 height=27 style='mso-height-source:userset;height:20.45pt'>
                                <td height=27 class=xl851949 colspan=3 style='height:20.45pt'>Catatan :</td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                                <td class=xl831949></td>
                            </tr>
                            <tr class=xl831949 height=27 style='mso-height-source:userset;height:20.45pt'>
                                <td height=27 class=xl861949 style='height:20.45pt'>&nbsp;</td>
                                <td class=xl871949>&nbsp;</td>
                                <td class=xl871949>&nbsp;</td>
                                <td class=xl871949>&nbsp;</td>
                                <td class=xl871949>&nbsp;</td>
                                <td class=xl871949>&nbsp;</td>
                                <td class=xl871949>&nbsp;</td>
                                <td class=xl871949>&nbsp;</td>
                                <td class=xl871949>&nbsp;</td>
                                <td class=xl871949>&nbsp;</td>
                                <td class=xl871949>&nbsp;</td>
                                <td class=xl871949>&nbsp;</td>
                                <td class=xl871949>&nbsp;</td>
                                <td class=xl871949>&nbsp;</td>
                                <td class=xl871949>&nbsp;</td>
                                <td class=xl871949>&nbsp;</td>
                                <td class=xl871949>&nbsp;</td>
                                <td class=xl871949>&nbsp;</td>
                                <td class=xl871949>&nbsp;</td>
                                <td class=xl871949>&nbsp;</td>
                                <td class=xl881949>&nbsp;</td>
                            </tr>
                            <tr height=20 style='height:15.0pt'>
                                <td height=20 class=xl891949 style='height:15.0pt'>&nbsp;</td>
                                <td class=xl901949>&nbsp;</td>
                                <td class=xl901949>&nbsp;</td>
                                <td class=xl901949>&nbsp;</td>
                                <td class=xl901949>&nbsp;</td>
                                <td class=xl901949>&nbsp;</td>
                                <td class=xl901949>&nbsp;</td>
                                <td class=xl901949>&nbsp;</td>
                                <td class=xl901949>&nbsp;</td>
                                <td class=xl901949>&nbsp;</td>
                                <td class=xl901949>&nbsp;</td>
                                <td class=xl901949>&nbsp;</td>
                                <td class=xl901949>&nbsp;</td>
                                <td class=xl901949>&nbsp;</td>
                                <td class=xl901949>&nbsp;</td>
                                <td class=xl901949>&nbsp;</td>
                                <td class=xl901949>&nbsp;</td>
                                <td class=xl901949>&nbsp;</td>
                                <td class=xl901949>&nbsp;</td>
                                <td class=xl901949>&nbsp;</td>
                                <td class=xl911949>&nbsp;</td>
                            </tr>
                            <![if supportMisalignedColumns]>
                            <tr height=0 style='display:none'>
                                <td width=22 style='width:17pt'></td>
                                <td width=21 style='width:16pt'></td>
                                <td width=23 style='width:17pt'></td>
                                <td width=23 style='width:17pt'></td>
                                <td width=23 style='width:17pt'></td>
                                <td width=23 style='width:17pt'></td>
                                <td width=34 style='width:26pt'></td>
                                <td width=25 style='width:19pt'></td>
                                <td width=25 style='width:19pt'></td>
                                <td width=25 style='width:19pt'></td>
                                <td width=19 style='width:14pt'></td>
                                <td width=19 style='width:14pt'></td>
                                <td width=19 style='width:14pt'></td>
                                <td width=19 style='width:14pt'></td>
                                <td width=12 style='width:9pt'></td>
                                <td width=12 style='width:9pt'></td>
                                <td width=12 style='width:9pt'></td>
                                <td width=12 style='width:9pt'></td>
                                <td width=12 style='width:9pt'></td>
                                <td width=12 style='width:9pt'></td>
                                <td width=23 style='width:17pt'></td>
                            </tr>
                            <![endif]>
        </table>

    </div>
<?php
                        }
                    }
                }
            } else {
                // No data found
?>
<tr>
    <td colspan="9" class="text-center" style="color: red;">Belum ada data transaksi</td>
</tr>
<?php
            }

            // Close the database connection
            mysqli_close($connection);
?>

<!----------------------------->
<!--END OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD-->
<!----------------------------->
</body>


<script>
    /* window.print(); */
</script>

</html>