/*
 * C# Server Emulator Project Blackout / PointBlank
 * Authors: the__all
 * Copyright (C) 2015 | OZ-Network
 */
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using Core.Model;

namespace Game.Network.ServerPacket
{
    public class PROTOCOL_ROOM_INFO_ACK : SendPacket
    {
        private Room room;
        public PROTOCOL_ROOM_INFO_ACK(Room room)
        {
            this.room = room;
        }
        public override void WriteImpl()
        {
            WriteH(3861);
            if (room.getRoomSlotByPlayer(room.getLeader()) == null)
                room.setNewLeader();
            WriteD(room.getRoomSlotByPlayer(room.getLeader()).getId());
            for (int slotId = 0; slotId < 16; ++slotId)
            {
                SLOT roomSlot = room.getRoomSlot(slotId);
                WriteC((byte)roomSlot.getState());
                WriteC(roomSlot.getPlayer() == null ? (byte)0 : (byte)roomSlot.getPlayer().getRank());
                WriteB(new byte[9] {0x01, 0x01, 0x01, 0x01, 0x01, 0x01, 0x01, 0x01, 0x01});
                WriteC(roomSlot.getPlayer() == null || roomSlot.getPlayer().ClanID == 0 ? (byte)255 : (byte)roomSlot.getPlayer().Clan.Logo1);
                WriteC(roomSlot.getPlayer() == null || roomSlot.getPlayer().ClanID == 0 ? (byte)255 : (byte)roomSlot.getPlayer().Clan.Logo2);
                WriteC(roomSlot.getPlayer() == null || roomSlot.getPlayer().ClanID == 0 ? (byte)255 : (byte)roomSlot.getPlayer().Clan.Logo3);
                WriteC(roomSlot.getPlayer() == null || roomSlot.getPlayer().ClanID == 0 ? (byte)255 : (byte)roomSlot.getPlayer().Clan.Logo4);
                //WriteC(0);//цвет ника
                WriteD(roomSlot.getPlayer() == null || roomSlot.getPlayer().ClanID == 0 ? 0 : roomSlot.getPlayer().getPCCafe());//пк_кафе
                WriteH(roomSlot.getPlayer() == null || roomSlot.getPlayer().ClanID == 0 ? (short)0 : (short)roomSlot.getPlayer().getEmblem());//Лычка
                WriteS(roomSlot.getPlayer() == null || roomSlot.getPlayer().ClanID == 0 ? "" : roomSlot.getPlayer().Clan.Name, Clan.CLAN_NAME_SIZE);
                WriteH(0);//unk
                WriteC(0);//unk
                WriteC(0);//unk
            }
        }
    }
}