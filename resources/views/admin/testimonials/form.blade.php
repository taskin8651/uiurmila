<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.testimonials.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">{{ $title }}</h2>
        <p class="admin-page-subtitle">{{ $subtitle }}</p>
    </div>
</div>

<form method="POST" action="{{ $action }}">
    @csrf
    @if($method !== 'POST')
        @method($method)
    @endif

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-comment-dots"></i>
                </div>

                <div>
                    <p class="form-card-title">Testimonial Information</p>
                    <p class="form-card-subtitle">Add message, person name and icon</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="icon">Icon Class</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text" name="icon" id="icon"
                               value="{{ old('icon', $testimonial->icon ?? 'bi bi-person-fill') }}"
                               placeholder="bi bi-person-fill"
                               class="field-input {{ $errors->has('icon') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="name">Name <span class="req">*</span></label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-user icon"></i>
                        <input type="text" name="name" id="name"
                               value="{{ old('name', $testimonial->name ?? '') }}"
                               required
                               placeholder="Community Member"
                               class="field-input {{ $errors->has('name') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('name'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('name') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="designation">Designation / Subtitle</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-id-badge icon"></i>
                        <input type="text" name="designation" id="designation"
                               value="{{ old('designation', $testimonial->designation ?? '') }}"
                               placeholder="Health Camp Beneficiary"
                               class="field-input {{ $errors->has('designation') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="message">Message <span class="req">*</span></label>
                    <textarea name="message" id="message" rows="5"
                              required
                              placeholder="Enter testimonial message"
                              class="field-input {{ $errors->has('message') ? 'error' : '' }}">{{ old('message', $testimonial->message ?? '') }}</textarea>

                    @if($errors->has('message'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('message') }}</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-cog"></i>
                </div>

                <div>
                    <p class="form-card-title">Settings</p>
                    <p class="form-card-subtitle">Sorting and visibility</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="sort_order">Sort Order</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>
                        <input type="number" name="sort_order" id="sort_order"
                               value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="status">Status <span class="req">*</span></label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-toggle-on icon"></i>
                        <select name="status" id="status" required class="field-input">
                            <option value="1" {{ old('status', $testimonial->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $testimonial->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-save"></i>
            {{ $buttonText }}
        </button>

        <a href="{{ route('admin.testimonials.index') }}" class="btn-ghost">{{ trans('global.cancel') }}</a>
    </div>
</form>
