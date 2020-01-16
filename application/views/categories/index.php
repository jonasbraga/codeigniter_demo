


<!-- This view show all categories in the database -->
<div class="d-flex my-3">
  <div class="w-50">
    <h2>Categories</h2>
  </div>
  <div class="w-50">
    <a href="<?= site_url('/categories/create') ?>" class="btn btn-primary float-right"> + New category </a>
  </div>  
</div>
<div class="container">
  <div class="row">

  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Created at</th>
      <th scope="col">Functions</th>
    </tr>
  </thead>
  <tbody>

    <?php foreach($categories as $category):?>

      <tr class="table-secondary">
        <th scope="row"><?= $category['id'] ?></th>
        <td><?= $category['name'] ?></td>
        <td><?= format_date($category['created_at']) ?></td>
        <td>
          <a href="<?= site_url('/categories/edit/'.$category['id']) ?>"><i class="fa fa-edit" title="Edit"></i></a>
          <a href="<?= site_url('/categories/delete/'.$category['id']) ?>" class="ml-1" title="Delete"><i class="fa fa-times"></i></a>
        </td>
      </tr>
    </div>

    <?php endforeach;?>

    </tbody>
  </table> 

  </div>      
</div>