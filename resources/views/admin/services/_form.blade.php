@php
  $tr = fn (string $locale, string $field, $default = '') => old(
    "translations.$locale.$field",
    optional($service->translations->firstWhere('locale', $locale))->$field ?? $default
  );
  $bullets = fn (string $locale) => old(
    "translations.$locale.bullets",
    implode("\n", optional($service->translations->firstWhere('locale', $locale))->bullets ?? [])
  );
  $priceEuros = old('price_euros', $service->exists ? number_format($service->price_cents / 100, 2, '.', '') : '0');
@endphp

<div>
  <label class="label" for="slug">Slug</label>
  <input class="field" type="text" id="slug" name="slug" value="{{ old('slug', $service->slug) }}" required />
  @error('slug') <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p> @enderror
</div>

<div class="grid gap-5 sm:grid-cols-2">
  <div>
    <label class="label" for="icon">Ícone</label>
    <select class="field" id="icon" name="icon" required>
      @foreach ($icons as $icon)
        <option value="{{ $icon }}" @selected(old('icon', $service->icon) === $icon)>{{ $icon }}</option>
      @endforeach
    </select>
    @error('icon') <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p> @enderror
  </div>
  <div>
    <label class="label" for="price_euros">Preço (€)</label>
    <input class="field" type="number" step="0.01" min="0" id="price_euros" name="price_euros" value="{{ $priceEuros }}" required />
    @error('price_euros') <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p> @enderror
  </div>
</div>

<div class="grid gap-5 sm:grid-cols-2">
  <div>
    <label class="label" for="sort_order">Ordem</label>
    <input class="field" type="number" min="0" id="sort_order" name="sort_order" value="{{ old('sort_order', $service->sort_order ?? 0) }}" required />
    @error('sort_order') <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p> @enderror
  </div>
  <div class="flex flex-col justify-end gap-3 pb-1">
    <label class="flex items-center gap-2 text-sm text-muted">
      <input type="checkbox" name="is_monthly" value="1" class="rounded border-line-strong accent-[var(--accent)]" @checked(old('is_monthly', $service->is_monthly)) />
      Preço mensal
    </label>
    <label class="flex items-center gap-2 text-sm text-muted">
      <input type="checkbox" name="is_active" value="1" class="rounded border-line-strong accent-[var(--accent)]" @checked(old('is_active', $service->is_active ?? true)) />
      Ativo
    </label>
  </div>
</div>

@foreach ($locales as $locale)
  @php $label = strtoupper($locale); @endphp
  <fieldset class="space-y-4 rounded-xl border border-line p-5">
    <legend class="px-1 text-xs font-semibold uppercase tracking-wider text-subtle">{{ $label }}</legend>

    <div>
      <label class="label" for="title_{{ $locale }}">Título</label>
      <input class="field" type="text" id="title_{{ $locale }}" name="translations[{{ $locale }}][title]" value="{{ $tr($locale, 'title') }}" required />
      @error("translations.$locale.title") <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p> @enderror
    </div>

    <div>
      <label class="label" for="description_{{ $locale }}">Descrição</label>
      <textarea class="field min-h-24" id="description_{{ $locale }}" name="translations[{{ $locale }}][description]" rows="3" required>{{ $tr($locale, 'description') }}</textarea>
      @error("translations.$locale.description") <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p> @enderror
    </div>

    <div>
      <label class="label" for="bullets_{{ $locale }}">Bullets (uma por linha)</label>
      <textarea class="field min-h-24" id="bullets_{{ $locale }}" name="translations[{{ $locale }}][bullets]" rows="4">{{ $bullets($locale) }}</textarea>
      @error("translations.$locale.bullets") <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p> @enderror
    </div>

    <div>
      <label class="label" for="duration_{{ $locale }}">Duração</label>
      <input class="field" type="text" id="duration_{{ $locale }}" name="translations[{{ $locale }}][duration_label]" value="{{ $tr($locale, 'duration_label') }}" />
      @error("translations.$locale.duration_label") <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p> @enderror
    </div>
  </fieldset>
@endforeach
