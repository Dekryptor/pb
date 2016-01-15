/*
 * C# Server Emulator Project Blackout / PointBlank
 * Authors: the__all
 * Copyright (C) 2015 | OZ-Network
 */
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using Game.Network.ServerPacket;
using Core.Model;
using Core.Database.Tables;

namespace Game.Network.ClientPacket
{
    class PROTOCOL_INVENTORY_LEAVE_REQ : ReceivePacket
    {
        public PROTOCOL_INVENTORY_LEAVE_REQ(GameNetwork Client, byte[] data)
        {
            makeme(Client, data);
        }

        private int type;
        public override void ReadImpl()
        {
            Player player = getClient().getPlayer();
            type = ReadD(); // Тип одеваемых предметов
            if (type == 3)
            { // если 3 - оружие + скины, маски, береты - 40 байт
                PlayerEquipTable.EquipAllSlots(player.AccountID, ReadD(), ReadD(), ReadD(), ReadD(), ReadD(), ReadD(), ReadD(), ReadD(), ReadD(), ReadD());


            }
            else if (type == 2)
            { // если 2 - оружие - 20 байт
                PlayerEquipTable.EquipWeaponsSlots(player.AccountID, ReadD(), ReadD(), ReadD(), ReadD(), ReadD());

            }
            else if (type == 1)
            { // если 1 - скины, маски, береты - 20 байт
                PlayerEquipTable.EquipArmorsSlots(player.AccountID, ReadD(), ReadD(), ReadD(), ReadD(), ReadD());
            }
        }
        public override void RunImpl()
        {
            Room room = getClient().getPlayer().getRoom();
            if (room != null & room.getPlayers().Count != 1)
            {
                getClient().getPlayer().getRoom().getRoomSlotByPlayer(getClient().getPlayer()).setState(SLOT_STATE.SLOT_STATE_NORMAL);
                foreach (Player member in getClient().getPlayer().getRoom().getPlayers().Values)
                {
                    member.getClient().SendPacket(new PROTOCOL_ROOM_INFO_ACK(room));
                }
            }

            getClient().SendPacket(new PROTOCOL_INVENTORY_LEAVE_ACK());
        }
    }
}
