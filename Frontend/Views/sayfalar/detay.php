


        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div id="review-dialog" class="mfp-with-anim mfp-hide mfp-dialog clearfix">
                        <h3>Add a Review</h3>
                        <form>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" placeholder="e.g. John Doe" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="text" placeholder="e.g. jogndoe@gmail.com" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Review</label>
                                <textarea class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Rating</label>
                                <ul class="icon-list icon-list-inline star-rating" id="star-rating">
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                </ul>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Submit" />
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="fotorama" data-nav="thumbs" data-allowfullscreen="1" data-thumbheight="150" data-thumbwidth="150">
                                <?php foreach($urunResimleri as $urunResmi){ ?>
                                  <img src="<?=baseurl(UPLOADS_DIR.$urunResmi->resim) ?>" alt="Image Alternative text" title="Gamer Chick" />
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="product-info box">
                                <ul class="icon-group icon-list-rating text-color" title="4.5/5 rating">
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star-half-empty"></i>
                                    </li>
                                </ul>	<small><a href="#" class="text-muted">based on 8 reviews</a></small>
                                <h3><?=$urun->adi ?></h3>
                                <p class="product-info-price fiyat"><?=$maxmin->min." - ".$maxmin->max; ?> <i class="fa fa-try"></i></p>
                                <p class="text-smaller text-muted"><?=$urun->kisaaciklama ?></p>
                                <div class="product-info-price"></div>
                                <form class="sepet-form" action="<?=baseurl("sepet/ekle/".$urun->id); ?>" method="post">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <h5><?=$urun->grupadi ?></h5>
                                      <select class="form-control" name="fiyatid">
                                        <?php foreach($urunOzellikleri as $urunozellik){ ?>
                                          <option data-fiyat="<?=$urunozellik->fiyat ?>" value="<?=$urunozellik->id ?>"><?=$urunozellik->ozellikadi ?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                    <div class="col-md-6">
                                      <h5>Miktarı</h5>
                                      <input type="number" name="miktar" value="1" class="form-control">
                                    </div>
                                  </div>
                                </form>
                                <div class="product-info-price"></div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <button class="btn btn-primary btn-block btn-sepet-submit"><i class="fa fa-shopping-cart"></i> Sepete Ekle</button>
                                  </div>
                                  <div class="col-md-6">
                                    <a href="#" class="btn btn-default btn-block"><i class="fa fa-star"></i> Favorilere Ekle</a>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gap"></div>
                    <div class="tabbable">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active"><a href="#tab-1" data-toggle="tab"><i class="fa fa-pencil"></i>Ürün Açıklaması</a>
                            </li>
                            <li><a href="#tab-2" data-toggle="tab"><i class="fa fa-info"></i>Ödeme Yöntemleri</a>
                            </li>
                            <li><a href="#tab-3" data-toggle="tab"><i class="fa fa-truck"></i>Kargo</a>
                            </li>
                            <li><a href="#tab-4" data-toggle="tab"><i class="fa fa-comments"></i>Ürün yorumları</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab-1">
                                <?=$urun->aciklama ?>
                            </div>
                            <div class="tab-pane fade" id="tab-2">
                                <table class="table table-striped mb0">
                                    <tbody>
                                        <tr>
                                            <td>Weight</td>
                                            <td>1.5kg</td>
                                        </tr>
                                        <tr>
                                            <td>Dimentions</td>
                                            <td>10 x 20 x 30 cm</td>
                                        </tr>
                                        <tr>
                                            <td>Composition</td>
                                            <td>100% Cotton</td>
                                        </tr>
                                        <tr>
                                            <td>Size & Fit</td>
                                            <td>This style comes in a regular fit which fits true to size</td>
                                        </tr>
                                        <tr>
                                            <td>Other Info</td>
                                            <td>Machine wash according to instructions on care label</td>
                                        </tr>
                                        <tr>
                                            <td>Size</td>
                                            <td>Small, Medium, Large</td>
                                        </tr>
                                        <tr>
                                            <td>Color</td>
                                            <td>Brown</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="tab-3">
                                <p>Felis elit netus sed iaculis interdum nullam sem habitasse vulputate laoreet turpis fringilla duis suspendisse arcu ullamcorper scelerisque elit quam dignissim velit lacus urna quam interdum quisque bibendum platea iaculis</p>
                                <p>Blandit dapibus non natoque purus pellentesque nibh duis neque metus elementum aliquet ut egestas orci elit pellentesque pulvinar in nam class mollis netus dolor augue nec senectus torquent velit fusce</p>
                            </div>
                            <div class="tab-pane fade" id="tab-4">
                                <ul class="comments-list">
                                    <li>
                                        <!-- REVIEW -->
                                        <article class="comment">
                                            <div class="comment-author">
                                                <img src="img/50x50.png" alt="Image Alternative text" title="Gamer Chick" />
                                            </div>
                                            <div class="comment-inner">
                                                <ul class="icon-group icon-list-rating comment-review-rate" title="4/5 rating">
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star-o"></i>
                                                    </li>
                                                </ul><span class="comment-author-name">Blake Abraham</span>
                                                <p class="comment-content">Feugiat class condimentum et enim metus lobortis aptent dictumst laoreet et felis sollicitudin dignissim viverra cum lobortis nulla nascetur cras</p>
                                            </div>
                                        </article>
                                    </li>
                                    <li>
                                        <!-- REVIEW -->
                                        <article class="comment">
                                            <div class="comment-author">
                                                <img src="img/50x50.png" alt="Image Alternative text" title="Ana 29" />
                                            </div>
                                            <div class="comment-inner">
                                                <ul class="icon-group icon-list-rating comment-review-rate" title="5/5 rating">
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                </ul><span class="comment-author-name">John Doe</span>
                                                <p class="comment-content">Lorem ligula maecenas tristique porta tristique cum lacus porta laoreet semper netus faucibus aenean bibendum congue</p>
                                            </div>
                                        </article>
                                    </li>
                                    <li>
                                        <!-- REVIEW -->
                                        <article class="comment">
                                            <div class="comment-author">
                                                <img src="img/50x50.png" alt="Image Alternative text" title="Afro" />
                                            </div>
                                            <div class="comment-inner">
                                                <ul class="icon-group icon-list-rating comment-review-rate" title="5/5 rating">
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                </ul><span class="comment-author-name">Oliver Ross</span>
                                                <p class="comment-content">Enim nulla consequat non donec arcu himenaeos eget lectus vehicula vel inceptos ultrices</p>
                                            </div>
                                        </article>
                                    </li>
                                    <li>
                                        <!-- REVIEW -->
                                        <article class="comment">
                                            <div class="comment-author">
                                                <img src="img/50x50.png" alt="Image Alternative text" title="Bubbles" />
                                            </div>
                                            <div class="comment-inner">
                                                <ul class="icon-group icon-list-rating comment-review-rate" title="4/5 rating">
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star-o"></i>
                                                    </li>
                                                </ul><span class="comment-author-name">Elizabeth Wallace</span>
                                                <p class="comment-content">Mattis vehicula nisl egestas nec ultrices varius semper laoreet molestie purus euismod fames odio volutpat eleifend turpis nec cras quam litora</p>
                                            </div>
                                        </article>
                                    </li>
                                    <li>
                                        <!-- REVIEW -->
                                        <article class="comment">
                                            <div class="comment-author">
                                                <img src="img/50x50.png" alt="Image Alternative text" title="Me with the Uke" />
                                            </div>
                                            <div class="comment-inner">
                                                <ul class="icon-group icon-list-rating comment-review-rate" title="5/5 rating">
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                </ul><span class="comment-author-name">Cheryl Gustin</span>
                                                <p class="comment-content">Suscipit curabitur hac hac congue netus integer ridiculus volutpat varius</p>
                                            </div>
                                        </article>
                                    </li>
                                    <li>
                                        <!-- REVIEW -->
                                        <article class="comment">
                                            <div class="comment-author">
                                                <img src="img/50x50.png" alt="Image Alternative text" title="AMaze" />
                                            </div>
                                            <div class="comment-inner">
                                                <ul class="icon-group icon-list-rating comment-review-rate" title="4/5 rating">
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star-o"></i>
                                                    </li>
                                                </ul><span class="comment-author-name">John Doe</span>
                                                <p class="comment-content">Mauris venenatis sed dui primis porttitor sit turpis litora eu nisl volutpat nam per primis</p>
                                            </div>
                                        </article>
                                    </li>
                                    <li>
                                        <!-- REVIEW -->
                                        <article class="comment">
                                            <div class="comment-author">
                                                <img src="img/50x50.png" alt="Image Alternative text" title="Chiara" />
                                            </div>
                                            <div class="comment-inner">
                                                <ul class="icon-group icon-list-rating comment-review-rate" title="4/5 rating">
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star-o"></i>
                                                    </li>
                                                </ul><span class="comment-author-name">Blake Hardacre</span>
                                                <p class="comment-content">Fusce lorem eu tortor proin egestas neque senectus netus ac augue senectus pulvinar rutrum habitasse nostra montes aenean mauris lacinia sociosqu posuere curabitur vestibulum venenatis euismod habitasse litora rhoncus purus</p>
                                            </div>
                                        </article>
                                    </li>
                                    <li>
                                        <!-- REVIEW -->
                                        <article class="comment">
                                            <div class="comment-author">
                                                <img src="img/50x50.png" alt="Image Alternative text" title="Andrea" />
                                            </div>
                                            <div class="comment-inner">
                                                <ul class="icon-group icon-list-rating comment-review-rate" title="4/5 rating">
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star"></i>
                                                    </li>
                                                    <li><i class="fa fa-star-o"></i>
                                                    </li>
                                                </ul><span class="comment-author-name">Brandon Burgess</span>
                                                <p class="comment-content">Ultrices elit quisque porta tortor sollicitudin bibendum proin facilisi duis magna</p>
                                            </div>
                                        </article>
                                    </li>
                                </ul><a class="popup-text btn btn-primary" href="#review-dialog" data-effect="mfp-zoom-out"><i class="fa fa-pencil"></i> Add a review</a>
                            </div>
                        </div>
                    </div>
                    <div class="gap"></div>
                    <h3>Related Porducts</h3>
                    <div class="gap gap-mini"></div>
                    <div class="row row-wrap">
                        <div class="col-md-4">
                            <div class="product-thumb">
                                <header class="product-header">
                                    <img src="img/800x600.png" alt="Image Alternative text" title="My Ice Cream and Your Ice Cream Spoons" />
                                </header>
                                <div class="product-inner">
                                    <ul class="icon-group icon-list-rating" title="3.5/5 rating">
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star-half-empty"></i>
                                        </li>
                                        <li><i class="fa fa-star-o"></i>
                                        </li>
                                    </ul>
                                    <h5 class="product-title">Lovely Ice Cream Spoons</h5>
                                    <p class="product-desciption">Tristique libero iaculis velit scelerisque ullamcorper id proin</p>
                                    <div class="product-meta">
                                        <ul class="product-price-list">
                                            <li><span class="product-price">$147</span>
                                            </li>
                                        </ul>
                                        <ul class="product-actions-list">
                                            <li><a class="btn btn-sm" href="#"><i class="fa fa-shopping-cart"></i> To Cart</a>
                                            </li>
                                            <li><a class="btn btn-sm"><i class="fa fa-bars"></i> Details</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="product-thumb">
                                <header class="product-header">
                                    <img src="img/800x600.png" alt="Image Alternative text" title="Ana 29" />
                                </header>
                                <div class="product-inner">
                                    <ul class="icon-group icon-list-rating" title="4.2/5 rating">
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star-half-empty"></i>
                                        </li>
                                    </ul>
                                    <h5 class="product-title">Hot Summer Collection</h5>
                                    <p class="product-desciption">Tristique libero iaculis velit scelerisque ullamcorper id proin</p>
                                    <div class="product-meta">
                                        <ul class="product-price-list">
                                            <li><span class="product-price">$197</span>
                                            </li>
                                        </ul>
                                        <ul class="product-actions-list">
                                            <li><a class="btn btn-sm" href="#"><i class="fa fa-shopping-cart"></i> To Cart</a>
                                            </li>
                                            <li><a class="btn btn-sm"><i class="fa fa-bars"></i> Details</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="product-thumb">
                                <header class="product-header">
                                    <img src="img/800x600.png" alt="Image Alternative text" title="Aspen Lounge Chair" />
                                </header>
                                <div class="product-inner">
                                    <ul class="icon-group icon-list-rating" title="3.6/5 rating">
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star-o"></i>
                                        </li>
                                    </ul>
                                    <h5 class="product-title">Aspen Lounge Chair</h5>
                                    <p class="product-desciption">Tristique libero iaculis velit scelerisque ullamcorper id proin</p>
                                    <div class="product-meta">
                                        <ul class="product-price-list">
                                            <li><span class="product-price">$213</span>
                                            </li>
                                        </ul>
                                        <ul class="product-actions-list">
                                            <li><a class="btn btn-sm" href="#"><i class="fa fa-shopping-cart"></i> To Cart</a>
                                            </li>
                                            <li><a class="btn btn-sm"><i class="fa fa-bars"></i> Details</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gap gap-small"></div>
                </div>
                <div class="col-md-3">
                    <aside class="sidebar-right">
                        <div class="sidebar-box">
                            <h5>Recent Viewed</h5>
                            <ul class="thumb-list">
                                <li>
                                    <a href="#">
                                        <img src="img/70x70.png" alt="Image Alternative text" title="Urbex Esch/Lux with Laney and Laaaaag" />
                                    </a>
                                    <div class="thumb-list-item-caption">
                                        <h5 class="thumb-list-item-title"><a href="#">Best Camera</a></h5>
                                        <p class="thumb-list-item-price">$190</p>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="img/70x70.png" alt="Image Alternative text" title="AMaze" />
                                    </a>
                                    <div class="thumb-list-item-caption">
                                        <h5 class="thumb-list-item-title"><a href="#">New Glass Collection</a></h5>
                                        <p class="thumb-list-item-price">$262</p>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="img/70x70.png" alt="Image Alternative text" title="waipio valley" />
                                    </a>
                                    <div class="thumb-list-item-caption">
                                        <h5 class="thumb-list-item-title"><a href="#">Awesome Vacation</a></h5>
                                        <p class="thumb-list-item-price">$192</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-box">
                            <h5>Popular</h5>
                            <ul class="thumb-list">
                                <li>
                                    <a href="#">
                                        <img src="img/70x70.png" alt="Image Alternative text" title="Food is Pride" />
                                    </a>
                                    <div class="thumb-list-item-caption">
                                        <h5 class="thumb-list-item-title"><a href="#">Best Pasta</a></h5>
                                        <p class="thumb-list-item-price">$356</p>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="img/70x70.png" alt="Image Alternative text" title="Old No7" />
                                    </a>
                                    <div class="thumb-list-item-caption">
                                        <h5 class="thumb-list-item-title"><a href="#">Jack Daniels Huge Pack</a></h5>
                                        <p class="thumb-list-item-price">$364</p>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="img/70x70.png" alt="Image Alternative text" title="The Hidden Power of the Heart" />
                                    </a>
                                    <div class="thumb-list-item-caption">
                                        <h5 class="thumb-list-item-title"><a href="#">Beach Holidays</a></h5>
                                        <p class="thumb-list-item-price">$491</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-box">
                            <h5>Recent Reviews</h5>
                            <ul class="thumb-list">
                                <li>
                                    <a href="#">
                                        <img src="img/70x70.png" alt="Image Alternative text" title="Hot mixer" />
                                    </a>
                                    <div class="thumb-list-item-caption">
                                        <ul class="icon-group icon-list-rating" title="5/5 rating">
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                        </ul>
                                        <h5 class="thumb-list-item-title"><a href="#">Modern DJ Set</a></h5>
                                        <p class="thumb-list-item-author">by Richard Jones</p>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="img/70x70.png" alt="Image Alternative text" title="Our Coffee miss u" />
                                    </a>
                                    <div class="thumb-list-item-caption">
                                        <ul class="icon-group icon-list-rating" title="3/5 rating">
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star-o"></i>
                                            </li>
                                            <li><i class="fa fa-star-o"></i>
                                            </li>
                                        </ul>
                                        <h5 class="thumb-list-item-title"><a href="#">Coffe Shop Discount</a></h5>
                                        <p class="thumb-list-item-author">by Carol Blevins</p>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="img/70x70.png" alt="Image Alternative text" title="Food is Pride" />
                                    </a>
                                    <div class="thumb-list-item-caption">
                                        <ul class="icon-group icon-list-rating" title="3/5 rating">
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star-o"></i>
                                            </li>
                                            <li><i class="fa fa-star-o"></i>
                                            </li>
                                        </ul>
                                        <h5 class="thumb-list-item-title"><a href="#">Best Pasta</a></h5>
                                        <p class="thumb-list-item-author">by Leah Kerr</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>

        </div>
        
