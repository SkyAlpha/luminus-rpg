import { ItemType } from '../../models/ItemType';

export const ITEM_TYPE = {
    EQUIP: new ItemType(1, 'Equip'),
    USABLE: new ItemType(2, 'Usable'),
    MISC: new ItemType(3, 'Misc'),
};
