<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.faqs.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a>
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
                    <i class="fas fa-question-circle"></i>
                </div>

                <div>
                    <p class="form-card-title">FAQ Information</p>
                    <p class="form-card-subtitle">Add question and answer</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="question">Question <span class="req">*</span></label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="question" id="question" value="{{ old('question', $faq->question ?? '') }}" required placeholder="Enter question" class="field-input {{ $errors->has('question') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('question'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('question') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="answer">Answer <span class="req">*</span></label>
                    <textarea name="answer" id="answer" rows="6" required placeholder="Enter answer" class="field-input {{ $errors->has('answer') ? 'error' : '' }}">{{ old('answer', $faq->answer ?? '') }}</textarea>

                    @if($errors->has('answer'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('answer') }}</p>
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
                    <p class="form-card-subtitle">Sorting and frontend visibility</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="sort_order">Sort Order</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>
                        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $faq->sort_order ?? 0) }}" class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="status">Status <span class="req">*</span></label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-toggle-on icon"></i>
                        <select name="status" id="status" required class="field-input {{ $errors->has('status') ? 'error' : '' }}">
                            <option value="1" {{ old('status', $faq->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $faq->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
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

        <a href="{{ route('admin.faqs.index') }}" class="btn-ghost">{{ trans('global.cancel') }}</a>
    </div>
</form>
