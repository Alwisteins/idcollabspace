<div>
    <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Detail Proyek</h2>
    <div>
        <form>
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label for="title" class="label">Nama Proyek</label>
                    <input wire:model="title" type="input" id="title" class="form-input"
                        placeholder="Cth. Aplikasi Catatan Keuangan" required />
                    @error('title')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="category_id" class="label">Kategori</label>
                    <select wire:model="category_id" name="category_id" id="category_id" class="form-input">
                        <option value="">Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="status" class="label">Status</label>
                    <select wire:model="status" name="status" id="status" class="form-input">
                        <option value="open">Open</option>
                        <option value="in progress">In Progress</option>
                    </select>
                    @error('status')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="is_paid" class="label">Tipe Proyek</label>
                    <select wire:model="is_paid" name="is_paid" id="is_paid" class="form-input">
                        <option value="1">Berbayar</option>
                        <option value="0">Tidak berbayar</option>
                    </select>
                    @error('is_paid')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="start_date" class="label">Tanggal Mulai</label>
                    <input wire:model="start_date" type="date" id="start_date"
                        min="{{ now()->subMonth()->format('Y-m-d') }}" class="form-input" required />
                    @error('start_date')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="end_date" class="label">Tanggal Selesai</label>
                    <input wire:model="end_date" type="date" id="end_date"
                        min="{{ $startDate ?? now()->format('Y-m-d') }}" class="form-input" required />
                    @error('end_date')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="my-4">
                <label for="description" class="label">Deskripsi</label>
                <textarea wire:model="description" id="description" class="form-input"
                    placeholder="Cth. Sebuah aplikasi yang berfungsi untuk mengelola catatan keuangan" required></textarea>
                @error('description')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </form>
    </div>
</div>
