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
using Game.Network.ServerPacket;

namespace Game.Network.ClientPacket
{
    class PROTOCOL_ROOM_CHANGE_INFO_REQ : ReceivePacket
    {

        public PROTOCOL_ROOM_CHANGE_INFO_REQ(GameNetwork Client, byte[] data)
        {
            makeme(Client, data);
        }

        public override void ReadImpl()
        {
            Room room = getClient().getPlayer().getRoom();
            ReadD();
            room.setName(ReadS(23));
            room.setMapId(ReadC());
            int num2 = ReadC();
            room.setStage4v4(ReadC());
            room.setType(ReadC());
            int num3 = ReadC();
            int num4 = ReadC();
            room.setSlots(ReadC());
            int num5 = ReadC();
            room.setAllWeapons(ReadC());
            room.setRandomMap(ReadC());
            room.setSpecial(ReadC());
            room.setAiCount(ReadC());
            room.setAiLevel(ReadC());
        }

        public override void RunImpl()
        {
            foreach (Player member in getClient().getPlayer().getRoom().getPlayers().Values)
            {
                member.getClient().SendPacket(new PROTOCOL_BATTLE_ROOMINFO_ACK(getClient().getPlayer().getRoom()));
            }
        }
    }
}
