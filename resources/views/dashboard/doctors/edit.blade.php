<div class="modal" id="edit{{ $doctor->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <form method="POST" action="{{ route('doctors.update', $doctor) }}">
                @method('PATCH')
                @csrf
                <input type="hidden" name="id" value="{{ $doctor->id }}">
                <div class="modal-header">
                    <h6 class="modal-title">{{ __('dashboard.sidebar.Edit Doctor') }}</h6><button aria-label="Close"
                        class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="panel panel-primary tabs-style-2">
                        <div class=" tab-menu-heading">
                            <div class="tabs-menu1">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs main-nav-line">
                                    <li><a href="#tab_edit_1{{ $doctor->id }}" class="nav-link active"
                                            data-toggle="tab">English</a></li>
                                    <li><a href="#tab_edit_2{{ $doctor->id }}" class="nav-link"
                                            data-toggle="tab">العربية</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="border panel-body tabs-menu-body main-content-body-right">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_edit_1{{ $doctor->id }}" style="direction: ltr;">
                                    <div class="form-group">
                                        <label for="name_en{{ $doctor->id }}" style="float:left; font-weight: 600;">Doctor Name</label>
                                        <input type="text" class="form-control" id="name_en{{ $doctor->id }}" name="name_en"
                                            placeholder="Enter doctor name in English"
                                            value="{{ $doctor->translate('en')->name }}">
                                        <label for="description_en{{ $doctor->id }}"
                                            style="float:left; font-weight: 600; margin-top:20px;">Doctor
                                            Description</label>
                                        <input type="text" class="form-control" id="description_en{{ $doctor->id }}"
                                            name="description_en" placeholder="Enter doctor description in English"
                                            value="{{ $doctor->translate('en')->description }}">
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_edit_2{{ $doctor->id }}" style="direction: rtl;">
                                    <div class="form-group">
                                        <label for="name_ar{{ $doctor->id }}" style="float:right; font-weight: 600;">أسم الطبيب</label>
                                        <input type="text" class="form-control" id="name_ar{{ $doctor->id }}" name="name_ar"
                                            placeholder="أدخل أسم الطبيب بالعربية"
                                            value="{{ $doctor->translate('ar')->name }}">
                                        <label for="description_ar{{ $doctor->id }}"
                                            style="float:right; font-weight: 600; margin-top:20px;">توصيف
                                            الطبيب</label>
                                        <input type="text" class="form-control" id="description_ar{{ $doctor->id }}"
                                            name="description_ar" placeholder="أدخل توصيف الطبيب بالعربية"
                                            value="{{ $doctor->translate('ar')->description }}">
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
