
<div id="content">
<div class="inner">
                <div class="row">
                    <div class="col-lg-12">


                        <h2> Data Tables </h2>



                    </div>
                </div>

                <hr />


                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables of service
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                            foreach($services as $service) {
                                                
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?= $i++ ?></td>
                                            <td><?= $service->name; ?></td>
                                            <td><?= $service->description; ?></td>
                                            <td class="center">
                                                <a href="?p=admin.services.edit&id=<?= $service->id; ?>" class="btn btn-primary"><i class="icon-pencil icon-white"></i> Edit</a>
                                                <form action="?p=admin.services.delete" style="display:inline !important;" method="post">
                                                    <input type="hidden" name="id" value="<?= $service->id; ?>">
                                                    <button type="submit" href="?p=admin.services.delete&id=<?= $service->id; ?>" class="btn btn-danger"><i class="icon-remove icon-white"></i> Delete</button>
                                                </form>
                                            </td>
                                            
                                        </tr>

                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
</div>
</div>