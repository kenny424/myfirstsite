<?php
//������������ � ��
$connect = mysqli_connect('hostname', 'login', 'pass', 'BDname', ) or die ('��� ����������� � ���� ������');

//���������� ������ ��������� �� ����� � ����������
$subject = $_POST['subject'];
$body_text = $_POST['body_text'];

//���������� ������ � �� � ����������
$query = "SELECT * FROM store_list";

// ��������� �������� ������� � �� � ������� ��������� �������
$result = mysqli_query($connect, $query) or die ('��� �� ����� �� ���...');

while ($row = mysqli_fetch_array($result)) {
mail ($row[email], $subject, $body_text);
echo '������ ������� ���������� ����������: ' . $row[first_name] . ' ' . $row[last_name] . '  �� �����: ' . $row[email] . '<br />'; 
};

// ��������� ���������� � ��
mysqli_close($connect);

?>