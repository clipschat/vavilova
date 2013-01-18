<?
/*
Virus Remove Tool
(�) 2012, Alexander Popov
*/

function scan_file($pathFile) {
	if (filesize($pathFile) == 0) { return false; }
	$sig = file("./vir.sig");
	$file = file_get_contents($pathFile);
	$m = false;
	foreach ($sig as $sigline) {
		if (strpos($file, $sigline) !== FALSE) { 
			$file = str_replace($sigline, "", $file);
			$m = true; 
		}
	}
	
	if ($m == true) {
		file_put_contents($pathFile, $file);
		return true;
	} else {
		return false;
	}
}

// ��� ������� "����� �����", �� ��� �������� ������� � ����� ������ ������.
function scan_Dir($basepath)
{
	$hnd = opendir($basepath) or die("Cant open directory");
	//echo "<br> C�������� ����������: ".$basepath;
	while(false !== ($str = readdir($hnd))) {
		if(($str != ".") && ($str != "..")) {
			$fullPath = $basepath."/".$str;
			if(is_dir($fullPath)) {
				scan_Dir($fullPath);
			} else {
				$ext = explode(".", $str);
				$max = (count($ext)-1);
				if ($ext[$max] != "js") { continue; }
				echo "<br> �������� ����� ".$fullPath;
				if (scan_file($fullPath)) {
					echo " [ ����������� ]";
					// ����� ������������ '#[^a-z"\'!@\#\$%\^\&\*\(\)_\,;\:]#i' 
				} elseif (strpos(file_get_contents($fullPath), "��") || strpos(file_get_contents($fullPath), "��") || strpos(file_get_contents($fullPath), "��") || strpos(file_get_contents($fullPath), "��")) {
					echo " [ ���������� ]";
				} else {
					//echo " [ ��������� ]";
				}
			}
		}
	}
}

scan_Dir(".");
?>