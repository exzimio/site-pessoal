<div>
  <label class="label" for="slug">Slug</label>
  <input class="field" type="text" id="slug" name="slug" value="{{ old('slug', $technology->slug) }}" required />
  @error('slug') <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p> @enderror
</div>

<div>
  <label class="label" for="name">Nome</label>
  <input class="field" type="text" id="name" name="name" value="{{ old('name', $technology->name) }}" required />
  @error('name') <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p> @enderror
</div>

<div class="grid gap-5 sm:grid-cols-2">
  <div>
    <label class="label" for="icon">Ícone</label>
    <select class="field" id="icon" name="icon" required>
      @foreach ($icons as $icon)
        <option value="{{ $icon }}" @selected(old('icon', $technology->icon) === $icon)>{{ $icon }}</option>
      @endforeach
    </select>
    @error('icon') <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p> @enderror
  </div>
  <div>
    <label class="label" for="sort_order">Ordem</label>
    <input class="field" type="number" min="0" id="sort_order" name="sort_order" value="{{ old('sort_order', $technology->sort_order ?? 0) }}" required />
    @error('sort_order') <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p> @enderror
  </div>
</div>

<label class="flex items-center gap-2 text-sm text-muted">
  <input type="checkbox" name="show_in_stack" value="1" class="rounded border-line-strong accent-[var(--accent)]" @checked(old('show_in_stack', $technology->show_in_stack ?? true)) />
  Mostrar na stack
</label>
