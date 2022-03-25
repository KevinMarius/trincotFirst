
<div id="content">
    <div class="inner">
    <div class="row">
                    <div class="col-lg-12">
                        <div class="chat-panel panel panel-primary">
                            <div class="panel-heading">
                                <i class="icon-comments"></i>
                                Chat
                            <div class="btn-group pull-right">
                                <button type="button" data-toggle="dropdown">
                                    <i class="icon-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu slidedown">
                                    <li>
                                        <a href="#">
                                            <i class="icon-refresh"></i> Refresh
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class=" icon-comment"></i> Available
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-time"></i> Busy
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-tint"></i> Away
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-signout"></i> Sign Out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            </div>

                            <div class="panel-body">
                                <ul class="chat">
                                    <?php
                                        foreach($messages as $message) {
                                    ?>
                                    <li class="left clearfix">
                                        <span class="chat-img pull-left">
                                            <img src="../public/admin/img/1.png" alt="User Avatar" class="img-circle" />
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font"> <?= $message->name; ?> </strong>
                                                <small class="pull-right text-muted">
                                                    <i class="icon-time"></i> 12 mins ago
                                                </small>
                                            </div>
                                             <br />
                                            <p>
                                                <?= $message->message; ?>
                                            </p>
                                        </div>
                                    </li>
                                    <?php
                                        }
                                    ?>
                                </ul>
                            </div>

                        </div>
                    </div>
</div>
    </div>
</div>