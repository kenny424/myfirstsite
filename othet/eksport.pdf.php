<?php
include $_SERVER['DOCUMENT_ROOT'] . '../kyrs/includes/connect_db.php';

$ses = $_SESSION['id'];
session_start();

if (isset($_POST['sub_oplata_pdf']))
{
    $id=$_POST['id'];
    $csurname=$_POST['csurname'];
    $cname=$_POST['cname'];
    $cpatronymic=$_POST['cpatronymic'];
    $esurname=$_POST['esurname'];
    $ename=$_POST['ename'];
    $epatronymic=$_POST['epatronymic'];
    $appeal=$_POST['appeal'];
    $amount_paid=$_POST['amount_paid'];
    $actual_amount=$_POST['actual_amount'];
    $cbirth=$_POST['cbirth'];
    $ccity=$_POST['ccity'];
    $cphone=$_POST['cphone'];

    define('FPDF_FONTPATH',"../../fpdf/font/");

    require('../../fpdf/fpdf.php');

    $pdf=new FPDF('P','mm','A4');

    // устанавливаем заголовок документа
    $pdf->SetTitle("Чек докогова",'windows-1251');

// создаем страницу
    $pdf->AddPage('P');


// добавляем шрифт ариал
    $pdf->AddFont('Arial','','arial.php');
// устанавливаем шрифт Ариал
    $pdf->SetFont('Arial');
// устанавливаем цвет шрифта
    $pdf->SetTextColor(0,0,0);
// устанавливаем размер шрифта
    $pdf->SetFontSize(14);




// добавляем на страницу изображение


    $pdf->SetXY(70,10);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"Договор о хранении в ломбарде"));

    $pdf->SetXY(30,20);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"Дата обрашения в ломбард"));
    $pdf->SetX(150);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',$appeal));
    $pdf->SetXY(148,20.5);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"___________"));

    $pdf->SetXY(35,40);
    $pdf->Write(0,iconv('utf-8', 'windows-1251','ООО "Ломбард", именуемое в дальнейшем Ломбард, в лице'));
    $pdf->SetXY(25,50);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',$esurname)."  ".iconv('utf-8', 'windows-1251',$ename)."  ".iconv('utf-8', 'windows-1251',$epatronymic));
    $pdf->SetXY(20,50.5);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"_______________________________"));

    $pdf->SetXY(105,50);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',", действуюшего на основании устава, с"));
    $pdf->SetXY(25,60);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"одной стороны и гражданина"));
    $pdf->SetXY(105,60);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',$csurname)."  ".iconv('utf-8', 'windows-1251',$cname)."  ".iconv('utf-8', 'windows-1251',$cpatronymic));
    $pdf->SetXY(100,60.5);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"_______________________________"));



    $pdf->SetXY(88,170);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"Сумма залога"));
    $pdf->SetXY(50,180);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"Сумма залога "));
    $pdf->SetXY(100,180);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',$amount_paid)." p");
    $pdf->SetXY(50,185);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"Сумма выкупа "));
    $pdf->SetXY(100,185);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',$actual_amount)." p");

    $pdf->SetXY(150,195);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"___________"));
    $pdf->SetXY(155,200);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"(подпись)"));

    $pdf->SetXY(75,240);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"Реквизиты и подписи Сторон"));

    $pdf->SetXY(55,245);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"      Клиент                                     Ломбард"));
    $pdf->SetXY(50,250);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"_________________              _________________"));
    $pdf->SetXY(50,255);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"_________________              _________________"));
    $pdf->SetXY(50,270);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"_________________              _________________"));
    $pdf->SetXY(55,276);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"      Клиент                                     Ломбард"));

    $pdf->SetXY(20,90);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"Дата рождения клиента - "));
    $pdf->SetXY(82,90);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',$cbirth));
    $pdf->SetXY(79,90.5);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"______________________"));

    $pdf->SetXY(20,110);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"Город - "));
    $pdf->SetXY(43,110);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',$ccity));
    $pdf->SetXY(40,110.5);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"_______________________"));

    $pdf->SetXY(20,130);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"Номер телефона клиента - "));
    $pdf->SetXY(85,130);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',$cphone));
    $pdf->SetXY(84,130.5);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"______________________"));
// выводим документа в браузере
    $pdf->Output('storage-contract.pdf','I');

}