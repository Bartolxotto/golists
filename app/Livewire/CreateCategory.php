<?php

namespace App\Livewire;

use App\Livewire\Forms\CategoryForm;
use Livewire\Component;
use App\Models\Category;

class CreateCategory extends Component
{
    public $open = false;
    public $openEmojiPicker = false;
    public $emojis = [
        "fruits"=>["🍇", "🍈", "🍉", "🍊", "🍋", "🍌", "🍍", "🥭", "🍎", "🍏", "🍐", "🍑", "🍒", "🍓", "🥝", "🍅", "🥥"],
        "vegetables"=>["🥑", "🍆", "🥔", "🥕", "🌽", "🌶️", "🥒", "🥬", "🥦", "🧄", "🧅", "🥜", "🌰"],
        "prepared foods"=>["🍞", "🥐", "🥖", "🥨", "🥯", "🥞", "🧇", "🧀", "🍖", "🍗", "🥩", "🥓", "🍔", "🍟", "🍕", "🌭", "🥪", "🌮", "🌯", "🥙", "🧆", "🥚", "🍳", "🥘", "🍲", "🥣", "🥗", "🍿", "🧈", "🧂", "🥫", "🍝"],
        "asian foods"=>["🍱", "🍘", "🍙", "🍚", "🍛", "🍜", "🍠", "🍢", "🍣", "🍤", "🍥", "🥮", "🍡", "🥟", "🥠", "🥡"],
        "sweets & desserts"=>["🍦", "🍧", "🍨", "🍩", "🍪", "🎂", "🍰", "🧁", "🥧", "🍫", "🍬", "🍭", "🍮", "🍯"],
        "drinks & dishware"=>["🍼", "🥛", "☕", "🍵", "🍶", "🍾", "🍷", "🍸", "🍹", "🍺", "🍻", "🥂", "🥃", "🥤", "🧃", "🧉", "🥢", "🍽️", "🍴", "🥄", "🔪"],
        "clothing"=>["🎀", "🎗️", "👓", "🥼", "🦺", "👔", "👕", "👖", "🧣", "🧤", "🧥", "🧦", "👗", "🩱", "🩲", "🩳", "👙", "👚", "👜", "👝", "🛍️", "🎒", "👞", "👟", "🥾", "👠", "🩰", "👢", "👑", "👒", "🎓", "🧢", "💄", "💍"],
        "others"=>["📱", "🧳", "🧸", "🧶", "✅", "☑️", "✔️", "❌", "❎"],
        "numbers"=>["0️⃣", "1️⃣", "2️⃣", "3️⃣", "4️⃣", "5️⃣", "6️⃣", "7️⃣", "8️⃣", "9️⃣"],
    ];

    public CategoryForm $form;

    public function save()
    {

        $this->form->validate();

        Category::create(
            $this->form->all()
        );

        $this->reset(['open']);
        $this->form->reset();

        $this->dispatch('render');
        $this->dispatch('alert', 'Category added successfully!!');
    }

    public function render()
    {
        return view('livewire.category.create-category');
    }
}
