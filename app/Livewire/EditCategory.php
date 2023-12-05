<?php

namespace App\Livewire;

use App\Livewire\Forms\CategoryForm;
use Livewire\Component;
use App\Models\Category;
use App\Models\Config;

class EditCategory extends Component
{

    public $openEdit = false;
    public $categoryId, $isDefaultCategory = 'false';
    public $openEmojiPicker = false;
    public $emojis = [
        "fruits" => ["🍇", "🍈", "🍉", "🍊", "🍋", "🍌", "🍍", "🥭", "🍎", "🍏", "🍐", "🍑", "🍒", "🍓", "🥝", "🍅", "🥥"],
        "vegetables" => ["🥑", "🍆", "🥔", "🥕", "🌽", "🌶️", "🥒", "🥬", "🥦", "🧄", "🧅", "🥜", "🌰"],
        "food" => ["🐟", "🦈", "🦞", "🦐", "🍖", "🍗", "🥩", "🥓", "🥚"],
        "prepared foods" => ["❄️", "🍞", "🥐", "🥖", "🥨", "🥯", "🥞", "🧇", "🧀", "🍔", "🍟", "🍕", "🌭", "🥪", "🌮", "🌯", "🥙", "🧆", "🥚", "🍳", "🥘", "🍲", "🥣", "🥗", "🍿", "🧈", "🧂", "🥫", "🍝"],
        "asian foods" => ["🍱", "🍘", "🍙", "🍚", "🍛", "🍜", "🍠", "🍢", "🍣", "🍤", "🍥", "🥮", "🍡", "🥟", "🥠", "🥡"],
        "sweets & desserts" => ["🍦", "🍧", "🍨", "🍩", "🍪", "🎂", "🍰", "🧁", "🥧", "🍫", "🍬", "🍭", "🍮", "🍯"],
        "drinks & dishware" => ["💧", "🧊", "🍼", "🥛", "🐄", "☕", "🍵", "🍶", "🍾", "🍷", "🍸", "🍹", "🍺", "🍻", "🥂", "🥃", "🥤", "🧃", "🧉", "🥢", "🍽️", "🍴", "🥄", "🔪"],
        "household" => ["🪑", "🚽", "🚿", "🛁", "🪒", "🧹", "🧺", "🧻", "🧼", "🧽", "🛒", "🎊", "🎉"],
        "clothing" => ["🎀", "🎗️", "👓", "🥼", "🦺", "👔", "👕", "👖", "🧣", "🧤", "🧥", "🧦", "👗", "🩱", "🩲", "🩳", "👙", "👚", "👜", "👝", "🛍️", "🎒", "👞", "👟", "🥾", "👠", "🩰", "👢", "👑", "👒", "🎓", "🧢", "💄", "💍"],
        "others" => ["📱", "🧳", "🧸", "🧶", "✅", "☑️", "✔️", "❌", "❎"],
        "numbers" => ["0️⃣", "1️⃣", "2️⃣", "3️⃣", "4️⃣", "5️⃣", "6️⃣", "7️⃣", "8️⃣", "9️⃣"],
    ];
    public CategoryForm $form;

    public function mount(Category $category)
    {

        $this->categoryId = $category->id;
        $this->form->name = $category->name;
        $this->form->icon = $category->icon;

        $config = Config::where('param', 'DEFAULT_CATEGORY')->first();
        if ($config)
            if ($config->value == $category->id)
                $this->isDefaultCategory = true;
    }

    public function save()
    {

        $this->form->validate();

        $category = Category::find($this->categoryId);
        $category->name = $this->form->name;
        $category->icon = $this->form->icon;
        $category->save();

        if ($this->isDefaultCategory) {
            $config = Config::where('param', 'DEFAULT_CATEGORY')->first();
            $config->value = $category->id;
            $config->save();
        }

        $this->reset(['openEdit']);
        //$this->dispatch('render');
        //$this->dispatch('alert', 'Category updated successfully!!');
        $this->js('window.location.reload()');
    }


    public function render()
    {
        return view('livewire.category.edit-category');
    }
}
