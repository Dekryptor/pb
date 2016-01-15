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

namespace Game.Network.ClientPacket
{
    class PROTOCOL_BATTLE_3368_REQ : ReceivePacket
    {
        public PROTOCOL_BATTLE_3368_REQ(GameNetwork Client, byte[] data)
        {
            makeme(Client, data);
        }
        public override void ReadImpl()
        {
        }
        public override void RunImpl()
        {
            Player player = getClient().getPlayer();
            Room room = player.getRoom();
            foreach (Player member in getClient().getPlayer().getRoom().getPlayers().Values)
            {
                getClient().SendPacket(new PROTOCOL_BATTLE_3368_ACK());
            }
        }
    }
}
