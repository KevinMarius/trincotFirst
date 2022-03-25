
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
                                <header>
                                    <div class="icons"><i class="icon-th-large"></i></div>
                                    <h5>Update category</h5>
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
                                    <form method="post" class="form-horizontal" id="block-validate">
                                        <?= $form->input('name', 'Name', [], null, 'Name'); ?>
                                        <?= $form->input('description', 'Description', ['type' => 'textarea'], null, 'Description'); ?>
                                        <br>
                                        <button class="btn btn-primary" type="submit">Saved</button>
                                        

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>