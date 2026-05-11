<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.donate-pages.index') }}" class="admin-back-link">
            &larr; {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">{{ $title }}</h2>
        <p class="admin-page-subtitle">{{ $subtitle }}</p>
    </div>
</div>

<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf
    @if($method !== 'POST')
        @method($method)
    @endif

    @php
        $sections = [
            'Hero Section' => [
                ['hero_badge', 'Hero Badge', 'text', 'fas fa-certificate'],
                ['hero_title', 'Hero Title', 'text', 'fas fa-heading'],
                ['hero_description', 'Hero Description', 'textarea', 'fas fa-align-left'],
                ['hero_primary_button_text', 'Primary Button Text', 'text', 'fas fa-mouse-pointer'],
                ['hero_secondary_button_text', 'Secondary Button Text', 'text', 'fas fa-mouse-pointer'],
                ['hero_feature_icon', 'Feature Icon', 'text', 'fas fa-icons'],
                ['hero_feature_title', 'Feature Title', 'text', 'fas fa-star'],
                ['hero_feature_text', 'Feature Text', 'textarea', 'fas fa-comment'],
            ],
            'Hero Cards' => [
                ['hero_card_one_icon', 'Card One Icon', 'text', 'fas fa-icons'],
                ['hero_card_one_title', 'Card One Title', 'text', 'fas fa-heading'],
                ['hero_card_two_icon', 'Card Two Icon', 'text', 'fas fa-icons'],
                ['hero_card_two_title', 'Card Two Title', 'text', 'fas fa-heading'],
                ['hero_card_three_icon', 'Card Three Icon', 'text', 'fas fa-icons'],
                ['hero_card_three_title', 'Card Three Title', 'text', 'fas fa-heading'],
                ['hero_card_four_icon', 'Card Four Icon', 'text', 'fas fa-icons'],
                ['hero_card_four_title', 'Card Four Title', 'text', 'fas fa-heading'],
            ],
            'Why Donate Section' => [
                ['why_badge', 'Why Badge', 'text', 'fas fa-certificate'],
                ['why_title', 'Why Title', 'text', 'fas fa-heading'],
                ['why_description', 'Why Description', 'textarea', 'fas fa-align-left'],
            ],
            'Donation Form Section' => [
                ['form_badge', 'Form Badge', 'text', 'fas fa-certificate'],
                ['form_title', 'Form Title', 'text', 'fas fa-heading'],
                ['form_description', 'Form Description', 'textarea', 'fas fa-align-left'],
                ['quick_amounts', 'Quick Amounts (comma or line separated)', 'textarea', 'fas fa-list'],
                ['payment_modes', 'Payment Modes (comma or line separated)', 'textarea', 'fas fa-list'],
                ['donation_purposes', 'Donation Purposes (comma or line separated)', 'textarea', 'fas fa-list'],
                ['form_button_text', 'Form Button Text', 'text', 'fas fa-mouse-pointer'],
                ['form_success_message', 'Success Message', 'text', 'fas fa-check-circle'],
            ],
            'Payment Details' => [
                ['payment_badge', 'Payment Badge', 'text', 'fas fa-certificate'],
                ['payment_title', 'Payment Title', 'text', 'fas fa-heading'],
                ['payment_description', 'Payment Description', 'textarea', 'fas fa-align-left'],
                ['account_name', 'Account Name', 'text', 'fas fa-building'],
                ['bank_name', 'Bank Name', 'text', 'fas fa-university'],
                ['account_number', 'Account Number', 'text', 'fas fa-credit-card'],
                ['ifsc_upi', 'IFSC / UPI ID', 'text', 'fas fa-qrcode'],
            ],
            'Tax And Support' => [
                ['tax_badge', 'Tax Badge', 'text', 'fas fa-certificate'],
                ['tax_title', 'Tax Title', 'text', 'fas fa-heading'],
                ['tax_description', 'Tax Description', 'textarea', 'fas fa-align-left'],
                ['tax_point_one', 'Tax Point One', 'text', 'fas fa-check'],
                ['tax_point_two', 'Tax Point Two', 'text', 'fas fa-check'],
                ['support_badge', 'Support Badge', 'text', 'fas fa-headset'],
                ['support_title', 'Support Title', 'text', 'fas fa-heading'],
                ['support_description', 'Support Description', 'textarea', 'fas fa-align-left'],
                ['support_phone', 'Support Phone', 'text', 'fas fa-phone'],
                ['support_email', 'Support Email', 'email', 'fas fa-envelope'],
            ],
            'CTA Section' => [
                ['cta_badge', 'CTA Badge', 'text', 'fas fa-bullhorn'],
                ['cta_title', 'CTA Title', 'text', 'fas fa-heading'],
                ['cta_description', 'CTA Description', 'textarea', 'fas fa-align-left'],
                ['cta_primary_button_text', 'CTA Primary Button Text', 'text', 'fas fa-mouse-pointer'],
                ['cta_secondary_button_text', 'CTA Secondary Button Text', 'text', 'fas fa-mouse-pointer'],
                ['cta_secondary_button_link', 'CTA Secondary Button Link', 'text', 'fas fa-link'],
            ],
        ];
    @endphp

    <div class="admin-form-grid">
        @foreach($sections as $sectionTitle => $fields)
            <div class="form-card">
                <div class="form-card-header">
                    <div class="form-card-icon"><i class="fas fa-hand-holding-heart"></i></div>
                    <div>
                        <p class="form-card-title">{{ $sectionTitle }}</p>
                        <p class="form-card-subtitle">Manage {{ strtolower($sectionTitle) }} content</p>
                    </div>
                </div>

                <div class="form-card-body">
                    <div class="row">
                        @foreach($fields as $field)
                            @php
                                [$name, $label, $type, $icon] = $field;
                                $value = old($name, $donatePage->$name ?? '');
                                $isTextarea = $type === 'textarea';
                            @endphp

                            <div class="{{ $isTextarea ? 'col-md-12' : 'col-md-6' }}">
                                <div class="field-group">
                                    <label class="field-label" for="{{ $name }}">{{ $label }}</label>

                                    @if($isTextarea)
                                        <textarea name="{{ $name }}" id="{{ $name }}" rows="4" class="field-input {{ $errors->has($name) ? 'error' : '' }}" placeholder="Enter {{ strtolower($label) }}">{{ $value }}</textarea>
                                    @else
                                        <div class="input-icon-wrap">
                                            <i class="{{ $icon }} icon"></i>
                                            <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}" placeholder="Enter {{ strtolower($label) }}" class="field-input {{ $errors->has($name) ? 'error' : '' }}">
                                        </div>
                                    @endif

                                    @if($errors->has($name))
                                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first($name) }}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-qrcode"></i></div>
                <div>
                    <p class="form-card-title">QR And Status</p>
                    <p class="form-card-subtitle">Manage QR image and frontend visibility</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="field-group">
                            <label class="field-label" for="qr_image">UPI QR Image</label>
                            <input type="file" name="qr_image" id="qr_image" class="field-input {{ $errors->has('qr_image') ? 'error' : '' }}">
                            @if($donatePage && $donatePage->qr_image)
                                <p class="field-help">Current: {{ $donatePage->qr_image }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="field-group">
                            <label class="field-label" for="status">Status <span class="req">*</span></label>
                            <div class="input-icon-wrap">
                                <i class="fas fa-toggle-on icon"></i>
                                <select name="status" id="status" required class="field-input {{ $errors->has('status') ? 'error' : '' }}">
                                    <option value="1" {{ old('status', $donatePage->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $donatePage->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>
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

        <a href="{{ route('admin.donate-pages.index') }}" class="btn-ghost">{{ trans('global.cancel') }}</a>
    </div>
</form>
