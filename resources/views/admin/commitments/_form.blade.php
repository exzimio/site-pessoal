@php
  $tr = fn (string $locale, string $field, $default = '') => old(
    "translations.$locale.$field",
    optional($commitment->translations->firstWhere('locale', $locale))->$field ?? $default
  );
@endphp

<div class="grid gap-5 sm:grid-cols-2">
  <div>
    <label class="label" for="sort_order">Ordem</label>
    <input class="field" type="number" min="0" id="sort_order" name="sort_order" value="{{ old('sort_order', $commitment->sort_order ?? 0) }}" required />
    @error('sort_order') <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p> @enderror
  </div>
  <div class="flex items-end pb-1">
    <label class="flex items-center gap-2 text-sm text-muted">
      <input type="checkbox" name="is_active" value="1" class="rounded border-line-strong accent-[var(--accent)]" @checked(old('is_active', $commitment->is_active ?? true)) />
      Ativo
    </label>
  </div>
</div>

@foreach ($locales as $locale)
  @php $label = strtoupper($locale); @endphp
  <fieldset class="space-y-4 rounded-xl border border-line p-5">
    <legend class="px-1 text-xs font-semibold uppercase tracking-wider text-subtle">{{ $label }}</legend>

    <div>
      <label class="label" for="label_{{ $locale }}">Etiqueta</label>
      <input class="field" type="text" id="label_{{ $locale }}" name="translations[{{ $locale }}][label]" value="{{ $tr($locale, 'label') }}" required />
      @error("translations.$locale.label") <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p> @enderror
    </div>

    <div>
      <label class="label" for="title_{{ $locale }}">Título</label>
      <input class="field" type="text" id="title_{{ $locale }}" name="translations[{{ $locale }}][title]" value="{{ $tr($locale, 'title') }}" required />
      @error("translations.$locale.title") <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p> @enderror
    </div>

    <div>
      <label class="label" for="subtitle_{{ $locale }}">Subtítulo</label>
      <input class="field" type="text" id="subtitle_{{ $locale }}" name="translations[{{ $locale }}][subtitle]" value="{{ $tr($locale, 'subtitle') }}" required />
      @error("translations.$locale.subtitle") <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p> @enderror
    </div>

    <div>
      <label class="label" for="body_{{ $locale }}">Texto</label>
      <textarea class="field min-h-24" id="body_{{ $locale }}" name="translations[{{ $locale }}][body]" rows="4" required>{{ $tr($locale, 'body') }}</textarea>
      @error("translations.$locale.body") <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p> @enderror
    </div>
  </fieldset>
@endforeach
