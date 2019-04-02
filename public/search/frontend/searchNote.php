<?php
/**
 * Created by PhpStorm.
 * User: neerajan
 * Date: 01/03/2019
 * Time: 13:21
 */
$connection=mysqli_connect('127.0.0.1','root','','studentmanagement');

if (!empty($_GET)){
    $data = $_GET['search_data'];

    $query ="SELECT * FROM notes WHERE
             note_title LIKE '%$data%' ||
              subject LIKE '%$data%' ";

    $result = mysqli_query($connection, $query);

    foreach ($result as $key=>$value){

        $output='';
        $output.= '<tr> <td>'.++$key.'</td>
                        <td>  <span class="badge badge-pill badge-primary">'.$value['class'].'</span></td>
                        <td>   <span class="badge badge-pill badge-info">'.$value['subject'].'</span></td>
                        <td>'.$value['note_title'].'</td>
                        <td>'.$value['created_at'].'</td>
                        <td>'.$value['file'].'</td>
                        <td>
                            <a href="{{route(\'delete-note\').\'\'.$note->id}}" onclick="return confirm(\'are you sure to delete?\')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                        </td>
                   </tr>';
    }
    echo $output;

}