<?php
/**
 * Created by PhpStorm.
 * User: neerajan
 * Date: 01/03/2019
 * Time: 13:21
 */
$connection=mysqli_connect('127.0.0.1','root','','StudentManagement');

if (!empty($_GET)){
    $data = $_GET['search_data'];

    $query ="SELECT * FROM class_ones WHERE
             first_name LIKE '%$data%' ||
             last_name LIKE '%$data%' ||
             parent_name LIKE '%$data%' ||
             contact LIKE '%$data%' ||
             roll_no LIKE '%$data%' ";

    $result = mysqli_query($connection, $query);

    foreach ($result as $key=>$value){

        $output='';
        $output.= '<tr> <td>'.++$key.'</td>
                        <td>'.$value['first_name'].'</td>
                        <td>'.$value['last_name'].'</td>
                        <td>'.$value['roll_no'].'</td>
                        <td>'.$value['DoB'].'</td>
                        <td>'.$value['gender'].'</td>
                        <td>'.$value['contact'].'</td>
                        <td>'.$value['parent_name'].'</td>
                        <td>
                   
                        </td>
                        <td>
                           <a href="{{route(\'edit-student\').\'/\'.$classOne->id}}" class="btn btn-outline-warning btn-sm"><i class="fa fa-pencil-square-o"></i></a>
                           <a href="{{route(\'class-one-delete\').\'/\'.$classOne->id}}" onclick="return confirm(\'are you sure to delete?\')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                         </td>
                   </tr>';
    }
    echo $output;

}