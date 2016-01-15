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
using Game.Managers;
using Core.Database.Tables;

namespace Game.Network.ClientPacket
{
    class PROTOCOL_LOBBY_JOIN_ROOM_REQ : ReceivePacket
    {
        private int roomId;
        public PROTOCOL_LOBBY_JOIN_ROOM_REQ(GameNetwork Client, byte[] data)
        {
            makeme(Client, data);
        }

        public override void ReadImpl()
        {
            roomId = ReadD();
        }

        public override void RunImpl()
        {

            if(getClient().getPlayer().getRoom() != null)
            {
                getClient().getPlayer().setRoom(null);
            }

            Room room = getClient().getPlayer().getChannel().getRoom(roomId);
            if (room == null)
            {
                getClient().SendPacket(new PROTOCOL_LOBBY_JOIN_ROOM_ACK(null, 0, 0x80001004));
                return;
            }
            getClient().getPlayer().setRoom(room);

            room.addPlayer(getClient().getPlayer());
           // RoomManager.AddPlayer(roomId, getClient());
            SLOT playerSlot = room.getRoomSlotByPlayer(getClient().getPlayer());
            if (playerSlot == null)
            {
                getClient().SendPacket(new PROTOCOL_LOBBY_JOIN_ROOM_ACK(null, 0, 0x80001004));
                getClient().SendPacket(new PROTOCOL_ROOM_INFO_ACK(room));
                return;
            }

          //  getClient().SendPacket(new PROTOCOL_ROOM_PLAYER_ENTER_ACK(playerSlot));
            foreach (Player member in getClient().getPlayer().getRoom().getPlayers().Values)
            {
                if (!getClient().getPlayer().PlayerID.Equals(member.PlayerID))
                {
                    //member.getClient().SendPacket(new PROTOCOL_ROOM_PLAYER_ENTER_ACK(playerSlot));
                    member.getClient().SendPacket(new PROTOCOL_ROOM_PLAYER_ENTER_ACK(playerSlot));
                }
                member.getClient().SendPacket(new PROTOCOL_ROOM_INFO_ACK(room));
            }

            getClient().getPlayer().getChannel().removePlayer(getClient().getPlayer());
            getClient().SendPacket(new PROTOCOL_LOBBY_JOIN_ROOM_ACK(room, playerSlot.getId(), 0));

            foreach (Player member in getClient().getPlayer().getRoom().getPlayers().Values)
            {
                member.getClient().SendPacket(new PROTOCOL_ROOM_INFO_ACK(room));
            }

            BattleHandler.AddPlayer(getClient().getPlayer());

        }
    }
}
