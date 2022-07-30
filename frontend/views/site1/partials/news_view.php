
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card" data-aos="fade-up">
                    <div class="card-body">
                        <div class="aboutus-wrapper">
                            <h1 class="mt-5" style="color: darkblue">
                                <?= /** @var TYPE_NAME $model */
                                $model->title_uz ?>
                            </h1>
                            <p class="font-weight-600 fs-15 text-center">
                               <?= $model->desc_uz ?>
                            </p>

                            <img
                                src="<?= '/uploads/storage/data/'. $model->image ?>"
                                alt="banner"
                                class="img-fluid mb-5"
                            />


                            <p class="font-weight-600 fs-15 mb-5 mt-4 text-center">
                                <?= $model->body_uz ?>
                            </p>

                            <iframe width="727" height="409"

                                    src="https://www.youtube.com/embed/sO8eGL6SFsA" title="Software Testing Full Course In 10 Hours | Software Testing Tutorial | Edureka" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>

                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>