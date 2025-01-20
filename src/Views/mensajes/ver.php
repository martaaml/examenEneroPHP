<?php
// how many records should be displayed on a page?
$records_per_page = 5;
// instantiate the pagination object
$pagination = new Zebra_Pagination();
// the number of total records is the number of records in the array
$pagination->records(count($mensajes));//aqui
// records per page
$pagination->records_per_page($records_per_page);
// here's the magic: we need to display only the records for the current page
//aqui
$mensajes = array_slice(
  //aqui
    $mensajes,
    (($pagination->get_page() - 1) * $records_per_page),
    $records_per_page
);
?>
<table>
  <tr>
    <th>DE</th>
    <th>ASUNTO</th>
    <th>FECHA</th> 
  </tr>         <!--Aqui-->
  <?php foreach($mensajes as $mensaje): ?>
    <tr>
      <td><?= $mensaje['id'] ?></td>
      <td><?= $mensaje['de'] ?></td>
      <td><?= $mensaje['asunto'] ?></td>
    </tr>
  <?php endforeach; ?>
</table>
<?php
    $pagination->render();
?>