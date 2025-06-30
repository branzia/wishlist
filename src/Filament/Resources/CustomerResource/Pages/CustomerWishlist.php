<?php
namespace Branzia\Wishlist\Filament\Resources\CustomerResource\Pages;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Filament\Resources\Pages\ManageRelatedRecords;
use Branzia\Customer\Filament\Resources\CustomerResource;


class CustomerWishlist extends ManageRelatedRecords
{
    protected static string $resource = CustomerResource::class;

    protected static string $relationship = 'wishlists';

    
    public function getBreadcrumb(): string
    {
        return 'Wishlist';
    }
    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->required(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('id'),
            Tables\Columns\TextColumn::make('name'),
            Tables\Columns\TextColumn::make('created_at')->dateTime(),
        ])->headerActions([
            Tables\Actions\CreateAction::make(),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ]);
    }
}
