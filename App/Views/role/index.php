

    <div class="row">
      <div class="col-sm-6"> <h2 class="title"><i class="fa fa-home fa-lg"></i> Rights Of Access</h2></div>
        <div class="col-sm-6">
          <ul class="list-unstyled pull-right links">
            <li><a href="<?= App::$path; ?>role/add"><span class="btn btn-success"><i class="fa fa-plus fa-lg"></i> Add</span></a></li>
          </ul>
      </div>
    </div>
    <hr>
    <table class="table table-main table-rights table-striped">
      <thead>
        <tr>

        </tr>
      </thead>
      <tbody>

       <?php foreach($roles as $role) { ?>
       <tr>
          <td>
          <?php  if ($_SESSION['user']->aed_users_aed) {

           if ($role->id > 1) { ?>

            <a href="" class="btn btn-danger" id_role="<?= $role->id ?>" onclick="deleteElement(this, event);"><i class="fa fa-times"></i>  Delete</a>
            <?php } else {
              echo "<span class='badge'>Admin</span>";
              } ?>
            <a href="<?= App::$path; ?>roles/edit/<?= $role->id; ?>" class="btn btn-primary"><i class="fa fa-edit"></i>  Edit</a>
          </td>
          <?php } ?>
          <td>
          <?php echo '<h3 class="role_name">'. $role->role_name. '</h3>';
          ?>
          </td>

          <td class="td-roles">
            <p>
              <span>Clients: </span>
              <?php if ($role->aed_clients) { ?>
              <span class="fa-roles-true">
                <i class="fa fa-plus-circle"></i>
                <i class="fa fa-edit"></i>
                <i class="fa fa-remove"></i>
              </span>
              <?php } else { ?>
              <span class="fa-roles-false">
                <i class="fa fa-plus-circle"></i>
                <i class="fa fa-edit"></i>
                <i class="fa fa-remove"></i>
              </span>
              <?php } ?>
              <?php if ($role->show_clients) { ?>
              <span class="fa-roles-true">
                <i class="fa fa-eye"></i>
              </span>
              <?php } else { ?>
              <span class="fa-roles-false">
                <i class="fa fa-eye"></i>
              </span>
              <?php } ?></p>
            <p>
              <span>Suppliers: </span>
              <?php if ($role->aed_suppliers) { ?>
              <span class="fa-roles-true">
                <i class="fa fa-plus-circle"></i>
                <i class="fa fa-edit"></i>
                <i class="fa fa-remove"></i>
              </span>
              <?php } else { ?>
              <span class="fa-roles-false">
                <i class="fa fa-plus-circle"></i>
                <i class="fa fa-edit"></i>
                <i class="fa fa-remove"></i>
              </span>
              <?php } ?>
              <?php if ($role->show_suppliers) { ?>
              <span class="fa-roles-true">
                <i class="fa fa-eye"></i>
              </span>
              <?php } else { ?>
              <span class="fa-roles-false">
                <i class="fa fa-eye"></i>
              </span>
              <?php } ?>
              </p>

             <p>
            <span>Sales: </span>
            <?php if ($role->aed_sales) { ?>
            <span class="fa-roles-true">
              <i class="fa fa-plus-circle"></i>
              <i class="fa fa-edit"></i>
              <i class="fa fa-remove"></i>
            </span>
            <?php } else { ?>
            <span class="fa-roles-false">
              <i class="fa fa-plus-circle"></i>
              <i class="fa fa-edit"></i>
              <i class="fa fa-remove"></i>
            </span>
            <?php } ?>
            <?php if ($role->show_sales) { ?>
            <span class="fa-roles-true">
              <i class="fa fa-eye"></i>
            </span>
            <?php } else { ?>
            <span class="fa-roles-false">
              <i class="fa fa-eye"></i>
            </span>
            <?php } ?></p>

             <p>
            <span>purchases: </span>
            <?php if ($role->aed_purchases) { ?>
            <span class="fa-roles-true">
              <i class="fa fa-plus-circle"></i>
              <i class="fa fa-edit"></i>
              <i class="fa fa-remove"></i>
            </span>
            <?php } else { ?>
            <span class="fa-roles-false">
              <i class="fa fa-plus-circle"></i>
              <i class="fa fa-edit"></i>
              <i class="fa fa-remove"></i>
            </span>
            <?php } ?>
            <?php if ($role->show_purchases) { ?>
            <span class="fa-roles-true">
              <i class="fa fa-eye"></i>
            </span>
            <?php } else { ?>
            <span class="fa-roles-false">
              <i class="fa fa-eye"></i>
            </span>
            <?php } ?></p>

            <p>
              <span>Articles: </span>
              <?php if ($role->show_articles) { ?>
              <span class="fa-roles-true">
                <i class="fa fa-eye"></i>
              </span>
              <?php } else { ?>
              <span class="fa-roles-false">
                <i class="fa fa-eye"></i>
              </span>
              <?php } ?>
            </p>

            <p>
              <span>Stoke: </span>
              <?php if ($role->show_stoke) { ?>
              <span class="fa-roles-true">
                <i class="fa fa-eye"></i>
              </span>
              <?php } else { ?>
              <span class="fa-roles-false">
                <i class="fa fa-eye"></i>
              </span>
              <?php } ?>
            </p>

            <p>
            <span>Users Roles : </span>
            <?php if ($role->aed_users_aed) { ?>
            <span class="fa-roles-true">
              <i class="fa fa-plus-circle"></i>
              <i class="fa fa-edit"></i>
              <i class="fa fa-remove"></i>
            </span>
            <?php } else { ?>
            <span class="fa-roles-false">
              <i class="fa fa-plus-circle"></i>
              <i class="fa fa-edit"></i>
              <i class="fa fa-remove"></i>
            </span>
            <?php } ?>
            <?php if ($role->show_users_roles) { ?>
            <span class="fa-roles-true">
              <i class="fa fa-eye"></i>
            </span>
            <?php } else { ?>
            <span class="fa-roles-false">
              <i class="fa fa-eye"></i>
            </span>
            <?php } ?></p>
          </td>

          </tr>
        <?php } ?>

      </tbody>
    </table>
