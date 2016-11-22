<?php if (!defined('THINK_PATH')) exit(); if(is_array($render)): foreach($render as $key=>$v): ?><div class="portfolio-item">
        <div class="portfolio-box">
            <div class="ibox">
                <div class="ibox-content">
                    <a href="<?php echo U('news/'.$v['id']);?>" class="btn-link">
                        <h5>
                            <?php echo ($v["title"]); ?>
                        </h5>
                    </a>
                    <div class="small m-b-xs">
                        <strong><?php echo ($v["blogauther"]); ?></strong> <span class="text-muted"><i class="fa fa-clock-o"></i>发布于：<?php echo (date('Y年m月d日 H:i:s',$v["time"])); ?></span>
                    </div>
                    <p>
                        <?php echo ($v["summary"]); ?>
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>标签：</h5>
                            <button class="btn btn-primary btn-xs" type="button"><?php echo ($v["tags"]); ?></button>
                        </div>
                        <div class="col-md-6">
                            <div class="small text-right">
                                <h6>状态：</h6>
                                <i class="fa fa-eye"> </i> <?php echo ($v["click"]); ?> 浏览
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><?php endforeach; endif; ?>