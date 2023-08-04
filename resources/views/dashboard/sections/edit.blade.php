<div class="modal" id="edit{{ $section->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <form method="POST" action="{{ route('sections.update', $section) }}">
                @method('PATCH')
                @csrf
                <input type="hidden" name="id" value="{{ $section->id }}">
                <div class="modal-header">
                    <h6 class="modal-title">{{ __('dashboard.sidebar.Edit Section') }}</h6><button aria-label="Close"
                        class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    {{-- <h6>Modal Body</h6>
                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur
                    magni dolores eos qui ratione voluptatem sequi nesciunt.</p> --}}
                    <div class="panel panel-primary tabs-style-2">
                        <div class=" tab-menu-heading">
                            <div class="tabs-menu1">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs main-nav-line">
                                    <li><a href="#tab_edit_1{{ $section->id }}" class="nav-link active"
                                            data-toggle="tab">English</a></li>
                                    <li><a href="#tab_edit_2{{ $section->id }}" class="nav-link"
                                            data-toggle="tab">العربية</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="border panel-body tabs-menu-body main-content-body-right">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_edit_1{{ $section->id }}" style="direction: ltr;">
                                    <div class="form-group">
                                        <label for="name_en" style="float:left; font-weight: 600;">Section Name</label>
                                        <input type="text" class="form-control" id="name_en" name="name_en"
                                            placeholder="Enter section name in English"
                                            value="{{ $section->translate('en')->name }}">
                                        <label for="description_en"
                                            style="float:left; font-weight: 600; margin-top:20px;">Section
                                            Description</label>
                                        <input type="text" class="form-control" id="description_en"
                                            name="description_en" placeholder="Enter section description in English"
                                            value="{{ $section->translate('en')->description }}">
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_edit_2{{ $section->id }}" style="direction: rtl;">
                                    <div class="form-group">
                                        <label for="name_ar" style="float:right; font-weight: 600;">أسم القسم</label>
                                        <input type="text" class="form-control" id="name_ar" name="name_ar"
                                            placeholder="أدخل أسم القسم بالعربية"
                                            value="{{ $section->translate('ar')->name }}">
                                        <label for="description_ar"
                                            style="float:right; font-weight: 600; margin-top:20px;">توصيف
                                            القسم</label>
                                        <input type="text" class="form-control" id="description_ar"
                                            name="description_ar" placeholder="أدخل توصيف القسم بالعربية"
                                            value="{{ $section->translate('ar')->description }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary"
                        type="submit">{{ __('dashboard.buttons.Save changes') }}</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal"
                        type="button">{{ __('dashboard.buttons.Close') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
