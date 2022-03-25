<div id="content">
           
                <div class="inner">
                    <div class="row">
                    <div class="col-lg-12">
                            
                               
                                    <h1 > Form Validations </h1>
                                  
                                
                                
                            </div>
                    </div>
                          <hr />
                       

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box">
                                <?php
                                    if($error) {
                                ?>
                                        <div class="alert alert-danger">
                                            une erreur est survenue lors de l'enregistrement!!!
                                        </div>
                                <?php
                                    }
                                ?>
                                <header>
                                    <div class="icons"><i class="icon-th-large"></i></div>
                                    <h5>Update post</h5>
                                    <div class="toolbar">
                                        <ul class="nav">
                                            <li>
                                                <div class="btn-group">
                                                    <a class="accordion-toggle btn btn-xs minimize-box" data-toggle="collapse"
                                                        href="#collapseOne">
                                                        <i class="icon-chevron-up"></i>
                                                    </a>
                                                    <button class="btn btn-xs btn-danger close-box">
                                                        <i class="icon-remove"></i>
                                                    </button>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                </header>

                                <div id="collapseOne" class="accordion-body collapse in body">
                                    <div id="cleditorDiv" class="body collapse in">
                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" id="block-validate">
                                            <?= $form->input('name', 'Name', [], null, 'Name'); ?> 
                                            
                                            <?= $form->input('description', 'Description', ['type' => 'textarea'], null, 'Description'); ?>
                                            <div class="form-group">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="../public/admin/img/demoUpload.jpg" alt="" /></div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                    <div>
                                                        <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><?= $form->input('file', 'file', ['type' => 'file']); ?></span>
                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?= $form->select('category_id', 'Categorie', $categories) ?>
                                            <br>
                                            <button class="btn btn-primary form-actions no-margin-bottom" id="cleditorForm" type="submit">Saved</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>