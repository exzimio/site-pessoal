@php
  $tr = fn (string $locale, string $field, $default = '') => old(
    "translations.$locale.$field",
    optional($project->translations->firstWhere('locale', $locale))->$field ?? $default
  );
  $oldTechIds = old('technology_ids', array_keys($selectedTech));
@endphp

<div>
  <label class="label" for="slug">Slug</label>
  <input class="field" type="text" id="slug" name="slug" value="{{ old('slug', $project->slug) }}" required />
  @error('slug') <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p> @enderror
</div>

<div class="grid gap-5 sm:grid-cols-2">
  <div>
    <label class="label" for="category">Categoria</label>
    <select class="field" id="category" name="category" required>
      @foreach (\App\Models\Project::CATEGORIES as $category)
        <option value="{{ $category }}" @selected(old('category', $project->category) === $category)>{{ $category }}</option>
      @endforeach
    </select>
    @error('category') <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p> @enderror
  </div>
  <div>
    <label class="label" for="media_key">Media</label>
    <select class="field" id="media_key" name="media_key" required>
      @foreach (\App\Models\Project::MEDIA_KEYS as $key)
        <option value="{{ $key }}" @selected(old('media_key', $project->media_key) === $key)>{{ $key }}</option>
      @endforeach
    </select>
    @error('media_key') <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p> @enderror
  </div>
</div>

<div class="grid gap-5 sm:grid-cols-3">
  <div>
    <label class="label" for="year">Ano</label>
    <input class="field" type="number" id="year" name="year" value="{{ old('year', $project->year) }}" required />
    @error('year') <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p> @enderror
  </div>
  <div>
    <label class="label" for="sort_order">Ordem</label>
    <input class="field" type="number" min="0" id="sort_order" name="sort_order" value="{{ old('sort_order', $project->sort_order ?? 0) }}" required />
    @error('sort_order') <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p> @enderror
  </div>
  <div>
    <label class="label" for="status">Estado</label>
    <select class="field" id="status" name="status" required>
      <option value="published" @selected(old('status', $project->status) === 'published')>Publicado</option>
      <option value="draft" @selected(old('status', $project->status) === 'draft')>Rascunho</option>
    </select>
    @error('status') <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p> @enderror
  </div>
</div>

<fieldset class="space-y-3 rounded-xl border border-line p-5">
  <legend class="px-1 text-xs font-semibold uppercase tracking-wider text-subtle">Tecnologias</legend>
  @if ($technologies->isEmpty())
    <p class="text-sm text-muted">Ainda não há tecnologias. Cria-as primeiro.</p>
  @else
    <ul class="space-y-2">
      @foreach ($technologies as $tech)
        @php
          $checked = in_array($tech->id, array_map('intval', (array) $oldTechIds), true);
          $order = old("sort_orders.{$tech->id}", $selectedTech[$tech->id] ?? $tech->sort_order);
        @endphp
        <li class="flex flex-wrap items-center gap-3 text-sm">
          <label class="flex min-w-[10rem] flex-1 items-center gap-2 text-muted">
            <input
              type="checkbox"
              name="technology_ids[]"
              value="{{ $tech->id }}"
              class="rounded border-line-strong accent-[var(--accent)]"
              @checked($checked)
            />
            {{ $tech->name }}
          </label>
          <input
            class="field w-20"
            type="number"
            min="0"
            name="sort_orders[{{ $tech->id }}]"
            value="{{ $order }}"
            aria-label="Ordem de {{ $tech->name }}"
          />
        </li>
      @endforeach
    </ul>
  @endif
  @error('technology_ids') <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p> @enderror
</fieldset>

@foreach ($locales as $locale)
  @php $label = strtoupper($locale); @endphp
  <fieldset class="space-y-4 rounded-xl border border-line p-5">
    <legend class="px-1 text-xs font-semibold uppercase tracking-wider text-subtle">{{ $label }}</legend>

    <div class="grid gap-5 sm:grid-cols-2">
      <div>
        <label class="label" for="badge_{{ $locale }}">Badge</label>
        <input class="field" type="text" id="badge_{{ $locale }}" name="translations[{{ $locale }}][badge]" value="{{ $tr($locale, 'badge') }}" required />
        @error("translations.$locale.badge") <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p> @enderror
      </div>
      <div>
        <label class="label" for="media_alt_{{ $locale }}">Alt da media</label>
        <input class="field" type="text" id="media_alt_{{ $locale }}" name="translations[{{ $locale }}][media_alt]" value="{{ $tr($locale, 'media_alt') }}" />
        @error("translations.$locale.media_alt") <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p> @enderror
      </div>
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
      <label class="label" for="description_{{ $locale }}">Descrição</label>
      <textarea class="field min-h-24" id="description_{{ $locale }}" name="translations[{{ $locale }}][description]" rows="4" required>{{ $tr($locale, 'description') }}</textarea>
      @error("translations.$locale.description") <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p> @enderror
    </div>
  </fieldset>
@endforeach
