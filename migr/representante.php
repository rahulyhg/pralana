<?php
ini_set('max_execution_time', 9999999999);
ini_set('memory_limit', '-1');
$hostname='localhost';
$username='root';
$password='';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=pralan_old",$username,$password);
    $dbhn = new PDO("mysql:host=$hostname;dbname=pralan",$username,$password);

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $dbhn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
     
    
    // IMPORTA PRODUTOS

    $sql = "SELECT * FROM prln_posts WHERE prln_posts.post_type = 'representantes'";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $data = $sth->fetchAll();
    foreach ($data as $row)
    {

        echo 'Inicio Adicionar ID '.$row['ID'].'<br>------------------------------------------------------------------------------------------<br>';

        $sql = "SELECT * FROM prln_term_relationships
        JOIN prln_term_taxonomy ON prln_term_taxonomy.term_taxonomy_id = prln_term_relationships.term_taxonomy_id 
        JOIN prln_terms ON prln_terms.term_id = prln_term_taxonomy.term_id 
        WHERE prln_term_relationships.object_id = :id";
        
        $sth = $dbh->prepare($sql);
        $sth->bindValue(':id', $row['ID']);
        $sth->execute();
        $data = $sth->fetch();

        $uf = utf8_encode($data['name']);
        $uf = mb_strtoupper($uf);
        switch($uf){
            case "ACRE" :					$uf = "AC";	break;
            case "ALAGOAS" :				$uf = "AL";	break;
            case "AMAZONAS" :				$uf = "AM";	break;
            case "AMAPÁ" :					$uf = "AP";	break;
            case "BAHIA" :					$uf = "BA";	break;
            case "CEARÁ" :					$uf = "CE";	break;
            case "DISTRITO FEDERAL" :		$uf = "DF";	break;
            case "ESPÍRITO SANTO" :			$uf = "ES";	break;
            case "GOIÁS" :					$uf = "GO";	break;
            case "MARANHÃO" :				$uf = "MA";	break;
            case "MINAS GERAIS" :			$uf = "MG";	break;
            case "MATO GROSSO DO SUL" :		$uf = "MS";	break;
            case "MATO GROSSO" :			$uf = "MT";	break;
            case "PARÁ" :					$uf = "PA";	break;
            case "PARAÍBA" :				$uf = "PB";	break;
            case "PERNAMBUCO" :				$uf = "PE";	break;
            case "PIAUÍ" :					$uf = "PI";	break;
            case "PARANÁ" :					$uf = "PR";	break;
            case "RIO DE JANEIRO" :			$uf = "RJ";	break;
            case "RIO GRANDE DO NORTE" :	$uf = "RN";	break;
            case "RONDÔNIA" : 				$uf = "RO";	break;
            case "RORAIMA" :				$uf = "RR";	break;
            case "RIO GRANDE DO SUL" :		$uf = "RS";	break;
            case "SANTA CATARINA" :			$uf = "SC";	break;
            case "SERGIPE" :				$uf = "SE";	break;
            case "SÃO PAULO" :				$uf = "SP";	break;
            case "TOCANTINS" :              $uf = "TO"; break;
        }
        $rep['uf'] = $uf;
        $rep['email'] = '';
        $rep['telefone'] = '';

        $sql = "SELECT * FROM prln_term_relationships
        JOIN prln_postmeta ON prln_postmeta.post_id = prln_term_relationships.object_id
        WHERE prln_term_relationships.object_id = :id";
        
        $sth = $dbh->prepare($sql);
        $sth->bindValue(':id', $row['ID']);
        $sth->execute();
        $data = $sth->fetchAll();

        foreach($data as $d){
            switch($d['meta_key']){
                case 'nome':
                    $rep['representante'] = $d['meta_value'];
                break;
                case 'subregiao':
                    $rep['subregiao'] = $d['meta_value'];
                break;
                case (preg_match('/^emails_\d_email_de_contato/', $d['meta_key']) ? true : false):
                    $rep['email'] .= $d['meta_value'].'<br>';
                break;
                case (preg_match('/^telefones_\d_numero_do_telefone/', $d['meta_key']) ? true : false):
                    $rep['telefone'] .= $d['meta_value'].'<br>';
                break;
            }
            
        }

        $sqlin = "INSERT INTO alamocomunicacao_pralana_representantes (subregiao, representante, email, telefone, uf) VALUES (:subregiao, :representante, :email, :telefone, :uf)";

        $p_sql = $dbhn->prepare($sqlin);

        $p_sql->bindValue(":subregiao", $rep['subregiao']);
        $p_sql->bindValue(":representante", $rep['representante']);
        $p_sql->bindValue(":email", $rep['email']);
        $p_sql->bindValue(":telefone", $rep['telefone']);
        $p_sql->bindValue(":uf", $rep['uf']);


        $p_sql->execute();

        // echo 'Produto Add <br>';

       echo 'Final Adicionar ID '.$row['ID'].'<br>------------------------------------------------------------------------------------------<br>';
    }
    
    
    // IMPORTA IMAGENS

    // $sql = "SELECT * FROM prln_posts WHERE prln_posts.post_type = 'attachment'";
    // $sth = $dbh->prepare($sql);
    // $sth->execute();
    // $data = $sth->fetchAll();
    // $i = 0;
    // $dest = '../storage/app/uploads/public/';
    // foreach($data as $d){
    //     $img = explode('/',$d['guid']);
    //     $file = explode('.',$img[7]);
    //     $image = md5($file[0]);
    //     $folders = str_split($image,3);
    //     mkdir($dest.$folders[0]);
    //     mkdir($dest.$folders[0].'/'.$folders[1]);
    //     mkdir($dest.$folders[0].'/'.$folders[1].'/'.$folders[2]);
    //     copy($dest.$img[5].'/'.$img[6].'/'.$img[7], $dest.$folders[0].'/'.$folders[1].'/'.$folders[2].'/'.$image.'.'.$file[1]);
    //     $imgs['id'] = $d['ID'];
    //     $imgs['disk_name'] = $image.'.'.$file[1];
    //     $imgs['file_name'] = $img[7];
    //     $imgs['content_type'] = $d['post_mime_type'];
    //     $imgs['field'] = 'image';
    //     $imgs['attachment_type'] = 'AlamoComunicacao\Pralana\Models\Produtos';
    //     $imgs['is_public'] = 1;
    //     $imgs['sort_order'] = $i++;
    //     $imgs['created_at'] = $d['post_date'];
    //     $imgs['updated_at'] = $d['post_modified'];
    //     $sqlin = "INSERT INTO system_files (id, disk_name, file_name, content_type, field, attachment_type, is_public, sort_order, created_at, updated_at) VALUES (:id, :disk_name, :file_name, :content_type, :field, :attachment_type, :is_public, :sort_order, :created_at, :updated_at)";
    //     $p_sql = $dbhn->prepare($sqlin);
    //     $p_sql->bindValue(":id", $imgs['id']);
    //     $p_sql->bindValue(":disk_name", $imgs['disk_name']);
    //     $p_sql->bindValue(":file_name", $imgs['file_name']);
    //     $p_sql->bindValue(":content_type", $imgs['content_type']);
    //     $p_sql->bindValue(":field", $imgs['field']);
    //     $p_sql->bindValue(":attachment_type", $imgs['attachment_type']);
    //     $p_sql->bindValue(":is_public", $imgs['is_public']);
    //     $p_sql->bindValue(":sort_order", $imgs['sort_order']);
    //     $p_sql->bindValue(":created_at", $imgs['created_at']);
    //     $p_sql->bindValue(":updated_at", $imgs['updated_at']);
    //     $p_sql->execute();
    //     echo $img[7].'<br>';
    // }



    // ATRIBUI IMAGENS AOS PRODUTOS

    // foreach ($data as $row){
    //     $sql = "SELECT * FROM prln_term_relationships
    //     JOIN prln_postmeta ON prln_postmeta.post_id = prln_term_relationships.object_id
    //     WHERE prln_term_relationships.object_id = :id";
        
    //     $sth = $dbh->prepare($sql);
    //     $sth->bindValue(':id', $row['ID']);
    //     $sth->execute();
    //     $data = $sth->fetchAll();

    //     foreach($data as $d){
    //         switch($d['meta_key']){
    //             case 'foto_do_produto':
    //                 $sqlin = "UPDATE system_files SET attachment_id = :ipa WHERE id = :id";
    //                 $p_sql = $dbhn->prepare($sqlin);
    //                 $p_sql->bindValue(":id", $d['meta_value']);
    //                 $p_sql->bindValue(":ipa", $d['post_id']);
    //                 $p_sql->execute();
    //                 echo 'imagem ID: '.$d['meta_value'].' POST ID: '.$d['post_id'].' adicionado <br>';
    //             break;
    //         }
            
    //     }
    // }


    $dbh = null;
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }