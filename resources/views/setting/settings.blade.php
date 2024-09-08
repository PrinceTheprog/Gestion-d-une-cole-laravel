@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Settings</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('setting.page') }}">Settings</a></li>
                            <li class="breadcrumb-item active">General Settings</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="settings-menu-links">
                <ul class="nav nav-tabs menu-tabs">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('settings.general') }}">General Settings</a>
                    </li>
                    <!-- Add more tabs as needed -->
                </ul>
            </div>

            <div class="row">
                <!-- Website Basic Details Form -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Website Basic Details</h5>
                        </div>
                        <div class="card-body pt-0">
                            <form action="{{ url('settings.updateWebsiteDetails') }}" method="POST" enctype="multipart/form-data" id="website-form">
                                @csrf
                                <div class="settings-form">
                                    <div class="form-group">
                                        <label>Website Name <span class="star-red">*</span></label>
                                        <input type="text" name="website_name" class="form-control" placeholder="Enter Website Name" value="{{ old('website_name') }}">
                                        @error('website_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <p class="settings-label">Logo <span class="star-red">*</span></p>
                                        <div class="settings-btn">
                                            <input type="file" accept="image/*" name="logo" id="logo-input" class="hide-input" onchange="previewLogo()">
                                            <label for="logo-input" class="upload">
                                                <i class="feather-upload"></i>
                                            </label>
                                        </div>
                                        <h6 class="settings-size">Recommended image size is <span>150px x 150px</span></h6>
                                        <div class="upload-images">
                                            <img id="logo-preview" src="{{ asset('assets/img/logo.png') }}" alt="Logo Preview">
                                            <a href="javascript:void(0);" class="btn-icon logo-hide-btn" onclick="removeLogo()">
                                                <i class="feather-x-circle"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <p class="settings-label">Favicon <span class="star-red">*</span></p>
                                        <div class="settings-btn">
                                            <input type="file" accept="image/*" name="favicon" id="favicon-input" class="hide-input" onchange="previewFavicon()">
                                            <label for="favicon-input" class="upload">
                                                <i class="feather-upload"></i>
                                            </label>
                                        </div>
                                        <h6 class="settings-size">Recommended image size is <span>16px x 16px or 32px x 32px</span></h6>
                                        <h6 class="settings-size mt-1">Accepted formats: only png and ico</h6>
                                        <div class="upload-images upload-size">
                                            <img id="favicon-preview" src="{{ asset('assets/img/favicon.png') }}" alt="Favicon Preview">
                                            <a href="javascript:void(0);" class="btn-icon logo-hide-btn" onclick="removeFavicon()">
                                                <i class="feather-x-circle"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="accept-terms">
                                            <label class="form-check-label" for="accept-terms">
                                                I accept the <a href="#">Terms of Service</a>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0">
                                        <div class="settings-btns">
                                            <button type="submit" class="btn btn-orange" id="submit-btn">Update</button>
                                            <button type="button" class="btn btn-grey" onclick="resetForm()">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Address Details Form -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Address Details</h5>
                        </div>
                        <div class="card-body pt-0">
                            <form action="{{ url('settings.updateAddressDetails') }}" method="POST">
                                @csrf
                                <div class="settings-form">
                                    <div class="form-group">
                                        <label>Address Line 1 <span class="star-red">*</span></label>
                                        <input type="text" name="address_line_1" class="form-control" placeholder="Enter Address Line 1" value="{{ old('address_line_1') }}">
                                        @error('address_line_1')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Address Line 2</label>
                                        <input type="text" name="address_line_2" class="form-control" placeholder="Enter Address Line 2" value="{{ old('address_line_2') }}">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>City <span class="star-red">*</span></label>
                                                <input type="text" name="city" class="form-control" value="{{ old('city') }}">
                                                @error('city')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>State/Province <span class="star-red">*</span></label>
                                                <select class="select form-control" name="state_province">
                                                    <option value="" selected>Select</option>
                                                    <option value="California">California</option>
                                                    <option value="Tasmania">Tasmania</option>
                                                    <option value="Auckland">Auckland</option>
                                                    <option value="Marlborough">Marlborough</option>
                                                </select>
                                                @error('state_province')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Zip/Postal Code <span class="star-red">*</span></label>
                                                <input type="text" name="zip_code" class="form-control" value="{{ old('zip_code') }}">
                                                @error('zip_code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Country <span class="star-red">*</span></label>
                                                <select class="select form-control" name="country">
                                                    <option value="" selected>Select</option>
                                                    <option value="India">India</option>
                                                    <option value="London">London</option>
                                                    <option value="France">France</option>
                                                    <option value="USA">USA</option>
                                                </select>
                                                @error('country')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0">
                                        <div class="settings-btns">
                                            <button type="submit" class="btn btn-orange">Update</button>
                                            <button type="button" class="btn btn-grey" onclick="resetForm()">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> </div>

            <!-- Add more forms for other settings as needed -->
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script> // JavaScript for previewing and removing logo function previewLogo() { var logoInput = document.getElementById('logo-input'); var logoPreview = document.getElementById('logo-preview'); var file = logoInput.files[0]; var reader = new FileReader(); reader.onload = function(e) { logoPreview.src = e.target.result; }; reader.readAsDataURL(file); } function removeLogo() { var logoInput = document.getElementById('logo-input'); var logoPreview = document.getElementById('logo-preview'); logoInput.value = ''; logoPreview.src = "{{ asset('assets/img/logo.png') }}"; } // JavaScript for previewing and removing favicon function previewFavicon() { var faviconInput = document.getElementById('favicon-input'); var faviconPreview = document.getElementById('favicon-preview'); var file = faviconInput.files[0]; var reader = new FileReader(); reader.onload = function(e) { faviconPreview.src = e.target.result; }; reader.readAsDataURL(file); } function removeFavicon() { var faviconInput = document.getElementById('favicon-input'); var faviconPreview = document.getElementById('favicon-preview'); faviconInput.value = ''; faviconPreview.src = "{{ asset('assets/img/favicon.png') }}"; } // Prevent form submission if Terms of Service is not accepted document.getElementById('website-form').addEventListener('submit', function(event) { var termsAccepted = document.getElementById('accept-terms').checked; if (!termsAccepted) { alert('You must accept the Terms of Service before submitting.'); event.preventDefault(); } }); // JavaScript to reset form function resetForm() { document.getElementById('website-form').reset(); document.getElementById('logo-preview').src = "{{ asset('assets/img/logo.png') }}"; document.getElementById('favicon-preview').src = "{{ asset('assets/img/favicon.png') }}"; } </script>
@endsection